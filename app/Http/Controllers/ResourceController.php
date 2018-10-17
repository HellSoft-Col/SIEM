<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('test_views.recurso_detail', compact('resource', 'reservations'));
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
            ->join('classroom_type', 'resource.classroom_type_id', '=', 'classroom_type.id')
            ->where('resource.type', '=', 'CLASSROOM')
            ->distinct()->get(['classroom_type.name']);
        $rtypes_instrument = DB::table('resource')
            ->join('classroom_type', 'resource.classroom_type_id', '=', 'classroom_type.id')
            ->where('resource.type', '=', 'INSTRUMENT')
            ->distinct()->get(['classroom_type.name']);

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
                } else if ($i % 2 == 0) {
                    array_push($characteristics, $request);
                } else if ($i % 2 != 0) {
                    array_push($operators, $request);
                }
            }
            $i += 1;
        }

        $resources = $this->match($keyword, $type, $c_type, $characteristics, $operators);
        return view('test_views.resultados_buscar_recurso',
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
            if($this->matchBool($resource,$keyword, $type, $c_type, $characteristics, $operators)){
                array_push($r, $resource);
            }
        }
        /*
        foreach ($aux_resources as $resource) {
            if ($keyword == NULL) {
                if ($resource->estado != 'DAMAGED' && $resource->estado != 'IN_MAINTENANCE') {
                    if ($resource->type == $type) {

                        if ($resource->classroom_type->name == $c_type) {
                            $acum = $resource->hasCharacteristic($characteristics[0]);
                            $iteration = 0;
                            foreach ($characteristics as $i_characteristic) {
                                if ($iteration != 0) {
                                    $bool_value = $resource->hasCharacteristic($i_characteristic);
                                    if ($operators[$iteration] == 'AND') {
                                        $acum = $acum && $bool_value;
                                    } else if ($operators[$iteration] == 'OR') {
                                        $acum = $acum || $bool_value;
                                    }
                                }
                                $iteration += 1;
                            }
                            if ($acum) {
                                array_push($r, $resource);
                            }
                        }
                    }
                }
            } else if ($type == NULL) {
                if ($resource->estado != 'DAMAGED' && $resource->estado != 'IN_MAINTENANCE') {
                    if (strpos($resource->name, $keyword) !== false || strpos($resource->description, $keyword) !== false) {
                        if ($resource->classroom_type->name == $c_type) {
                            $acum = $resource->hasCharacteristic($characteristics[0]);
                            $iteration = 0;
                            foreach ($characteristics as $i_characteristic) {
                                if ($iteration != 0) {
                                    $bool_value = $resource->hasCharacteristic($i_characteristic);
                                    if ($operators[$iteration] == 'AND') {
                                        $acum = $acum && $bool_value;
                                    } else if ($operators[$iteration] == 'OR') {
                                        $acum = $acum || $bool_value;
                                    }
                                }
                                $iteration += 1;
                            }
                            if ($acum) {
                                array_push($r, $resource);
                            }
                        }
                    }
                }
            } else if ($c_type == NULL) {
                if ($resource->estado != 'DAMAGED' && $resource->estado != 'IN_MAINTENANCE') {
                    if (strpos($resource->name, $keyword) !== false || strpos($resource->description, $keyword) !== false) {
                        if ($resource->type == $type) {
                            $acum = $resource->hasCharacteristic($characteristics[0]);
                            $iteration = 0;
                            foreach ($characteristics as $i_characteristic) {
                                if ($iteration != 0) {
                                    $bool_value = $resource->hasCharacteristic($i_characteristic);
                                    if ($operators[$iteration] == 'AND') {
                                        $acum = $acum && $bool_value;
                                    } else if ($operators[$iteration] == 'OR') {
                                        $acum = $acum || $bool_value;
                                    }
                                }
                                $iteration += 1;
                            }
                            if ($acum) {
                                array_push($r, $resource);
                            }
                        }
                    }
                }
            } else if ($characteristics[0] == NULL) {
                if ($resource->estado != 'DAMAGED' && $resource->estado != 'IN_MAINTENANCE') {
                    if (strpos($resource->name, $keyword) !== false || strpos($resource->description, $keyword) !== false) {
                        if ($resource->type == $type) {
                            if ($resource->classroom_type->name == $c_type) {
                                array_push($r, $resource);
                            }
                        }
                    }
                }
            } else {
                if ($resource->estado != 'DAMAGED' && $resource->estado != 'IN_MAINTENANCE') {
                    if (strpos($resource->name, $keyword) !== false || strpos($resource->description, $keyword) !== false) {
                        if ($resource->type == $type) {
                            if ($resource->classroom_type->name == $c_type) {
                                $acum = $resource->hasCharacteristic($characteristics[0]);
                                $iteration = 0;
                                foreach ($characteristics as $i_characteristic) {
                                    if ($iteration != 0) {
                                        $bool_value = $resource->hasCharacteristic($i_characteristic);
                                        if ($operators[$iteration] == 'AND') {
                                            $acum = $acum && $bool_value;
                                        } else if ($operators[$iteration] == 'OR') {
                                            $acum = $acum || $bool_value;
                                        }
                                    }
                                    $iteration += 1;
                                }
                                if ($acum) {
                                    array_push($r, $resource);
                                }
                            }
                        }
                    }
                }
            }
        }*/
        return $r;
    }

    private function matchBool($resource, $keyword, $type, $c_type, $characteristics, $operators){
        $acum = true;
        if(($resource->estado == 'DAMAGED' && $resource->estado == 'IN_MAINTENANCE')){
            $acum = $acum && false;
        }
        if($keyword != NULL){
            if (strpos($resource->name, $keyword) !== false || strpos($resource->description, $keyword) !== false) {
                //
            }
            else{
                $acum = $acum && false;
            }
        }
        if ($type != NULL){
            if($resource->type != $type){
                $acum = $acum && false;
            }
        }
        if($c_type != NULL){
            if($resource->classroom_type->name == $c_type){
                $acum = $acum && false;
            }
        }
        else if ($characteristics[0] != NULL){
            $acum_charact = $resource->hasCharacteristic($characteristics[0]);
            $iteration = 0;
            foreach ($characteristics as $i_characteristic) {
                if ($iteration != 0) {
                    $bool_value = $resource->hasCharacteristic($i_characteristic);
                    if ($operators[$iteration] == 'AND') {
                        $acum_charact = $acum_charact && $bool_value;
                    } else if ($operators[$iteration] == 'OR') {
                        $acum_charact = $acum_charact || $bool_value;
                    }
                }
                $iteration += 1;
            }
            $acum = $acum && $acum_charact;
        }
        return $acum;
    }
}
