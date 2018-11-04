<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {


        $now = new \DateTime('now');
        $reservations = $resource->reservationsIn($now->format('m'));


        $event_list = [];
        foreach ($reservations as $key => $reservation) {
            $event_list[] = Calendar::event(
                $reservation->user->name,
                false,
                new \DateTime($reservation->start_time),
                new \DateTime($reservation->end_time),
                null
            );
        }


        $calendar_details = Calendar::addEvents($event_list);

        return view('GeneralViews.ResourcesViews.view', compact('resource', 'reservations', 'calendar_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }

    /**
     * Go to resources search.
     *
     * @return \Illuminate\Http\Response
     */
    public function gosearch()
    {
        $rtypes = DB::table('resource')
            ->join('resource_type', 'resource.resource_type_id', '=', 'resource_type.id')
            ->where('resource.type', '=', 'CLASSROOM')
            ->distinct()->get(['resource_type.name']);
        $rtypes_instrument = DB::table('resource')
            ->join('resource_type', 'resource.resource_type_id', '=', 'resource_type.id')
            ->where('resource.type', '=', 'INSTRUMENT')
            ->distinct()->get(['resource_type.name']);

        $rcaracteristics = DB::table('resource')
            ->join('characteristic_resource', 'characteristic_resource.resource_id', '=', 'resource.id')
            ->join('characteristic', 'characteristic_resource.characteristic_id', '=', 'characteristic.id')
            ->where('resource.type', '=', 'CLASSROOM')
            ->distinct()->get(['characteristic.name']);

        $rcaracteristics_instrument = DB::table('resource')
            ->join('characteristic_resource', 'characteristic_resource.resource_id', '=', 'resource.id')
            ->join('characteristic', 'characteristic_resource.characteristic_id', '=', 'characteristic.id')
            ->where('resource.type', '=', 'INSTRUMENT')
            ->distinct()->get(['characteristic.name']);

        return view('GeneralViews.ResourcesViews.search',
            compact('rtypes', 'rcaracteristics', 'rtypes_instrument', 'rcaracteristics_instrument'));
    }

    /**
     * Search resources.
     *
     * @param  \App\Models\Resource $resource
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $i = 0;
        $keyword = "";
        $characteristics = [];
        $operators = [];
        $type = "";
        $c_type = "";

        //dd($request->input());

        foreach ($request->all() as $request) {
            if ($i == 2) {
                $keyword = $request;
            } else if ($i == 3) {
                $type = $request;
            } else if ($i == 4) {
                $c_type = $request;
            } else if ($i > 4) {
                if ($i == 5) {
                    array_push($characteristics, $request);
                    array_push($operators, NULL);
                } else if ($i % 2 != 0) {
                    array_push($characteristics, $request);
                } else if ($i % 2 == 0) {
                    array_push($operators, $request);
                }
            }
            $i += 1;
        }

        $resources = $this->match($keyword, $type, $c_type, $characteristics, $operators);
        return view('GeneralViews.ResourcesViews.result',
            [
                'characteristics' => $characteristics,
                'resources' => $resources,
                'keyword' => $keyword,
                'c_type' => $c_type,
                'type' => $type
            ]);
    }

    private function match($keyword, $type, $c_type, $characteristics, $operators)
    {
        $r = [];
        $aux_resources = Resource::all();

        foreach ($aux_resources as $resource){
            //dd($resource)->attributes;
            if (($this->matchBool($resource, $keyword, $type, $c_type, $characteristics, $operators))) {
                array_push($r, $resource);
            }
        }
        //dd($r);
        return $r;
    }

    private function matchBool($resource, $keyword, $type, $c_type, $characteristics, $operators){
        $acum = true;

        //dd($characteristics[0]);
        if ($characteristics[0] != NULL) {
            $acum_charact = $resource->hasCharacteristic($characteristics[0]);
            $iteration = 0;
            foreach ($characteristics as $i_characteristic) {
                if ($i_characteristic != NULL) {
                    if ($iteration != 0) {
                        //dd($i_characteristic, $operators[$iteration]);
                        $bool_value = $resource->hasCharacteristic($i_characteristic);
                        if ($operators[$iteration] == 'AND') {
                            $acum_charact = $acum_charact && $bool_value;
                        } else if ($operators[$iteration] == 'OR') {
                            $acum_charact = $acum_charact || $bool_value;
                        }
                    }
                }
                $iteration += 1;
            }
            $acum = $acum_charact;
        }

        if ($keyword != NULL) {
            if (strpos(strtoupper($resource->name), strtoupper($keyword)) !== false
                || strpos(strtoupper($resource->description), strtoupper($keyword)) !== false) {
                //
            } else {
                $acum = $acum && false;
            }
        }

        if ($type != NULL) {
            if ($resource->type != $type) {
                $acum = $acum && false;
            }
        }

        //dd($resource->type != $type, $resource->type, $type);
        if ($c_type != NULL) {
            if ($resource->resource_type->name != $c_type) {
                $acum = $acum && false;
            }
        }

        if ($resource->state == 'DAMAGED' || $resource->state == 'IN_MAINTENANCE') {
            $acum = $acum && false;
        }
        return $acum;
    }
}
