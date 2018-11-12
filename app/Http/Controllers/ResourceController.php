<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Models\CharacteristicResource;
use App\Models\File;
use App\Models\Reservation;
use App\Models\Resource;
use App\Models\ResourceType;
use App\Models\User;
use Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
    public function createRoom()
    {
        $types = ResourceType::where('type', 'CLASSROOM')->get();
        $rcharacteristics = Characteristic::where('type', 'CLASSROOM')->get();
        return view('SpecificViews.Admin.Resource.create_classroom', compact('types', 'rcharacteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createInstrument()
    {
        $types = ResourceType::where('type', 'INSTRUMENT')->get();
        $rcharacteristics = Characteristic::where('type', 'INSTRUMENT')->get();
        return view('SpecificViews.Admin.Resource.create_instrument', compact('types', 'rcharacteristics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRoom(Request $request)
    {
        $type = 'CLASSROOM';
        $i = 0;
        $characteristics = [];
        $quantity = [];
        foreach ($request->all() as $rValue) {
            if ($i > 5) {
                if ($i % 2 != 0) {
                    array_push($characteristics, $rValue);
                } else {
                    array_push($quantity, $rValue);
                }
            }
            $i += 1;
        }
        $tClass = ResourceType::where('id', $request->rtype)->first();
        $r = Resource::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $type,
            'state' => 'AVAILABLE',
            'resource_type_id' => $tClass->id
        ]);
        $i = 0;
        foreach ($characteristics as $char) {
            if (is_numeric($char)){
                $charsDb = Characteristic::where('id',$char)->first();
            }else{
                $charsDb = Characteristic::create([
                    'name' => $char,
                    'type' => $type
                ]);
            }
            CharacteristicResource::create([
                'resource_id' => $r->id,
                'characteristic_id' => $charsDb->id,
                'quantity' => $quantity[$i]
            ]);
            $i += 1;
        }

        if($request->images != null){
            $photos = $request->images;
            foreach ($photos as $photo)  {
                $url = Storage::disk('local')->put($r->name. 'Folder', $photo);
                File::create([
                    'path' => $url,
                    'resource_id' => $r->id
                ]);
            }
        }
        $types = ResourceType::all();
        return view('SpecificViews.Admin.Resource.create_classroom', compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInstrument(Request $request)
    {
        $type = 'INSTRUMENT';
        $r = Resource::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $type,
            'state' => 'AVAILABLE',
        ]);
        //PENDIENTE CARACTERISTICAS
        $chars = isset($request['chars']) ? $request['chars'] : array();
        foreach ($chars as $value) {
            $charsDb = Characteristic::where('name',$value)->first();
            if ($charsDb == null){
                $charsDb = Characteristic::create([
                    'name' => $value
                ]);
            }
            CharacteristicResource::create([
                'resource_id' => $r->id,
                'characteristic_id' => $charsDb->id,
                'quantity' => $request->quantity
            ]);
        }
        if($request->images != null){
            $photos = $request->images;
            foreach ($photos as $photo)  {
                $url = Storage::disk('local')->put($r->name. 'Folder', $photo);
                File::create([
                    'path' => $url,
                    'resource_id' => $r->id
                ]);
            }
        }
        return view('TestViewsCocu.createInstrument');
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
    public function editResource(Request $request)
    {
        $resource = Resource::where('id',$request->ID)->first();
        if (strcmp($resource->type,'CLASSROOM') == 0) {
            return $this->editViewRoom($resource);
        }
        return $this->editViewInstrument($resource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function editViewRoom(Resource $resource)
    {
        $id = $resource->id;
        $name = $resource->name;
        $type = ResourceType::where('id', $resource->classroom_type_id)->first();
        $rtype = $type->name;
        $types = ResourceType::all();
        $state = $resource->state;
        $images = $resource->files;
        $characteristic = $resource->characteristics;
        $description = $resource->description;
        return view('TestViewsCocu.editRoom', compact('id', 'name', 'rtype', 'types',
            'state', 'images', 'characteristic', 'description') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function editViewInstrument(Resource $resource)
    {
        $id = $resource->id;
        $name = $resource->name;
        $state = $resource->state;
        $images = $resource->files;
        $characteristic = $resource->characteristics;
        $description = $resource->description;
        return view('TestViewsCocu.editInstrument', compact('id', 'name', 'state',
            'images', 'characteristic', 'description') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $resource = Resource::where('id',$request->id)->first();
        $resource->name = $request->name;
        $resource->state = $request->state;
        $resource->description = $request->description;
        if ($request->has('rtype')) {
            $type = ResourceType::where('name', $request->rtype)->first();
            $resource->classroom_type_id = $type->id;
        }
        //pendiente caracteristicas
        $resource->save();
        return view('home'); //Cambiar a busqueda de recursos
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resource = Resource::find($request->id);
        $resource->delete();
        return view('home');//cambiar
    }

    /**
     * Go to resources search.
     *
     * @return \Illuminate\Http\Response
     */
    public function gosearch()
    {
        $rtypes = DB::table('resource_type')
            ->where('resource_type.type', '=', 'CLASSROOM')
            ->get(['resource_type.name']);
        $rtypes_instrument = DB::table('resource_type')
            ->where('resource_type.type', '=', 'INSTRUMENT')
            ->get(['resource_type.name']);

        $rcaracteristics = DB::table('characteristic')
            ->where('characteristic.type', '=', 'CLASSROOM')
            ->distinct()->get(['characteristic.name']);

        $rcaracteristics_instrument = DB::table('characteristic')
            ->where('characteristic.type', '=', 'INSTRUMENT')
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

    public function view(Request $request){
        $resource = Resource::find($request['ID']);
        $rs = $resource->reservations;
        $reservations = [];
        foreach ($rs as $r){
            $user = User::find($r->user_id);
            $item = [
              'name' => $r->name,
              'nameUser' => $user->name,
              'startTime' => $r->start_time,
              'endTime' => $r->end_time
            ];
            array_push($reservations,$item);
        }
        return view('TestViewsCocu.viewResAdmin',compact('resource','reservations'));
    }

    public function reservationsByResource(Request $request){
        $resource = Resource::find($request['ID']);
        $rs = $resource->reservations->where('state','ACTIVE');
        $reservations = [];
        foreach ($rs as $r){
            $user = User::find($r->user_id);
            $item = [
                'id' => $r->id,
                'name' => $r->name,
                'nameUser' => $user->name,
                'startTime' => $r->start_time,
                'endTime' => $r->end_time
            ];
            array_push($reservations,$item);
        }
        return view('GeneralViews.ResourcesViews.reserves',compact('resource','reservations','user'));
    }

    /**
     * Cancela las reservas seleccionadas por el usuario actual
     *
     * @param
     * @return
     */
    public function cancelReservations()
    {
        $data = request()->all();
        $reservas = isset($data['selected']) ? $data['selected'] : array();

        if (!empty($data['all']) and strcmp($data['all'][0],'all') === 0 ) {
            $rReserv = Reservation::where('resource_id',$data['id'])
                        ->where('state','ACTIVE')->get();
            foreach ($rReserv as $item) {
                $item->state = 'CANCELED';
                $item->save();
            }
        } else {
            foreach ($reservas as $value) {
                $item = Reservation::where('id',$value)->first();
                $item->state = 'CANCELED';
                $item->save();
            }
        }
        return redirect(url()->previous());
    }

}

