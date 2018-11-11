<?php

namespace App\Http\Controllers;

use App\Models\ResourceType;
use App\Models\File;
use App\Models\Reservation;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class ReservationController extends Controller
{
    var $resourceCookie;
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
    public function create(Request $request)
    {
        $resource_id = $request->_resource;
        $message = "";
        return view('GeneralViews.Reserves.create', compact('resource_id', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $resource = Resource::find($request->resource_id);
        $end_time = date('Y-m-d H:i:s', strtotime($request->end_time));
        $start_time = date('Y-m-d H:i:s', strtotime($request->start_time));
        $message = $this->canReserve($user, $resource, strtotime($start_time), strtotime($end_time),false);
        if ($message == "") {
            Reservation::create([
                'state' => 'ACTIVE',
                'start_time' => date('Y-m-d H:i:s', strtotime($request->start_time)),
                'end_time' => date('Y-m-d H:i:s', strtotime($request->end_time)),
                'user_id' => $user->id,
                'resource_id' => $resource->id,
                'moulted' => '0'
            ]);
            $sT = date('l jS \of F Y h:i:s A', strtotime($start_time));
            $eT = date('l jS \of F Y h:i:s A', strtotime($end_time));
            $message .= "Reserva exitosa";
            $email = [
                'nameUser' => $user->name,
                'emailUser' => $user->email,
                'message' => $message,
                'resourceId' => $resource->id,
                'resourceName' => $resource->name,
                'startTime' => $sT,
                'endTime' => $eT,
                'resource_tipo' => $resource->type,
            ];
            $this->sendConfirmEmail($email);
        } else {
            $start_time . date('l jS \of F Y h:i:s A');
            $end_time . date('l jS \of F Y h:i:s A');
            $email = [
                'nameUser' => $user->name,
                'emailUser' => $user->email,
                'message' => $message,
                'resourceId' => $resource->id,
                'resourceName' => $resource->name,
                'resource_tipo' => $resource->type,
                'startTime' => $start_time,
                'endTime' => $end_time
            ];
            $this->sendErrorEmail($email);
        }
        $resource_id = $resource->id;
        return view('GeneralViews.Reserves.create', compact('resource_id', 'message'));
    }
    /**
     * Send a confirm e-mail to the user.
     *
     * @email -> important info
     */
    public function sendConfirmEmail($email)
    {
        Mail::send('mails.successMail', ['body' => $email], function ($message) use ($email) {
            $message->to($email['emailUser'], $email['nameUser'])
                ->subject('Reserva creada exitosamente.');
            $message->from('siemHellsoft2018@gmail.com', 'SIEM');
        });
    }

    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function sendErrorEmail($email)
    {
        Mail::send('mails.errorMail', ['body' => $email], function ($message) use ($email) {
            $message->to($email['emailUser'], $email['nameUser'])
                ->subject('Reserva fallida.');
            $message->from('siemHellsoft2018@gmail.com', 'SIEM');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $act_resource = $reservation->resource;
        $resources = [];
        $message = "";
        if($reservation->resource->type == 'CLASSROOM'){
            $resources = DB::table('resource')
                ->where('resource.type', '=', 'CLASSROOM')->get();
        }
        else if($reservation->resource->type == 'INSTRUMENT'){
            $resources = DB::table('resource')
                ->where('resource.type', '=', 'INSTRUMENT')->get();
        }
        return view('GeneralViews.Reserves.edit',
            [
                'reservation' => $reservation,
                'resources' => $resources,
                'act_resource' => $act_resource,
                'message' => $message
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $resource_id = $request->resource;
        $resources = [];
        $message = "";
        $user = $reservation->user;
        $resource = Resource::find($resource_id);


        if($reservation->resource->type == 'CLASSROOM'){
            $resources = DB::table('resource')
                ->where('resource.type', '=', 'CLASSROOM')->get();
        }
        else if($reservation->resource->type == 'INSTRUMENT'){
            $resources = DB::table('resource')
                ->where('resource.type', '=', 'INSTRUMENT')->get();
        }


        $message = $this->canReserve($user, $resource, strtotime($start_time), strtotime($end_time),true);
        if ($message == "") {
            Reservation::find($reservation->id)->update([
                'state' => 'ACTIVE',
                'start_time' => date('Y-m-d H:i:s', strtotime($request->start_time)),
                'end_time' => date('Y-m-d H:i:s', strtotime($request->end_time)),
                'user_id' => $user->id,
                'resource_id' => $resource->id,
                'moulted' => '0'
            ]);
            $sT = date('l jS \of F Y h:i:s A', strtotime($start_time));
            $eT = date('l jS \of F Y h:i:s A', strtotime($end_time));
            $message .= "Reserva actualizada";
            $email = [
                'nameUser' => $user->name,
                'emailUser' => $user->email,
                'message' => $message,
                'resourceId' => $resource->id,
                'resourceName' => $resource->name,
                'startTime' => $sT,
                'endTime' => $eT,
                'resource_tipo' => $resource->type,
            ];
            //$this->sendConfirmEmail($email);
        } else {
            $start_time . date('l jS \of F Y h:i:s A');
            $end_time . date('l jS \of F Y h:i:s A');
            $email = [
                'nameUser' => $user->name,
                'emailUser' => $user->email,
                'message' => $message,
                'resourceId' => $resource->id,
                'resourceName' => $resource->name,
                'resource_tipo' => $resource->type,
                'startTime' => $start_time,
                'endTime' => $end_time
            ];
            //$this->sendErrorEmail($email);
        }
        $reservation = Reservation::find($reservation->id);
        $resource = $reservation->resource;
        return view('GeneralViews.Reserves.edit',
            [
                'act_resource' => $resource,
                'reservation' => $reservation,
                'resources' => $resources,
                'message' => $message
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    /**
     * Verifica si se puede realizar una reserva
     *
     * @param
     * @return
     */
    private function canReserve($user, $resource, $start_time, $end_time, $update)
    {
        $max_hours = 0;
        $min_hours = 1;
        $hours = ($end_time - $start_time) / 3600;
        $anteriority = ($start_time - time()) / 60;
        $error_message = "";
        $act_user_role = Auth::user()->role;

        if($resource == NULL){
            $error_message .= " -Error encontrando recurso - ";
            return $error_message;
        }

        if(!$update){
            if($user->hasReservationsOf($resource->type)){
                $error_message .= " - Usted posee reservas activas - ";
            }

        }

        if($act_user_role === 'USER'){
            if ($resource->type == 'CLASSROOM') {
                if ($user->type == 'STUDENT') {
                    $max_hours = 2;
                } else {
                    $max_hours = 4;
                }
            } else if ($resource->type == 'INSTRUMENT') {
                $min_hours = 24;
                $max_hours = 168;
            }
            date_default_timezone_set('America/Bogota');

            if (is_int($hours) && $hours >= $min_hours && $hours <= $max_hours) {
                if ($resource->type == 'CLASSROOM') {
                    if ($anteriority >= 30 && $anteriority <= 10080) {
                        //
                    } else {
                        $error_message .= " - No se encuentra en un tiempo valido - ";
                    }
                } else if ($resource->type == 'INSTRUMENT') {
                    if ($anteriority >= 120 && $anteriority <= 10080) {
                        //
                    } else {
                        $error_message .= " - No se encuentra en un tiempo valido - ";
                    }
                }
            } else {
                $error_message .= " - Bloque incorrecto - ";
            }

            if ($user->hasPenalties()) {
                $error_message .= " - El usuario tiene multas - ";
            }
        }
        if ($anteriority < 0) {
            $error_message .= " - Fecha en el pasado - ";
        }

        if ($hours < 0) {
            $error_message .= " - Fechas inconsistentes - ";
        }

        if (!$resource->isAvailableBetween(date('Y-m-d H:i:s', $start_time), date('Y-m-d H:i:s', $end_time),$user)) {
            $error_message .= " - No está disponible - ";
        }
        return $error_message;
    }

    /**-------------------------------------------------------------------------**/
     /**
      * Muestra las reservas activas del usuario actual.
      *
      * @param
      * @return
      */
    public function activeReservations()
    {
        $user_id = Auth::user()->id;
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)->where('state', 'ACTIVE')->get();
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
            $item = [
                "id" => $uItem->id,
                "id_resource" => $resource->id,
                "name" => $resource->name,
                "salon" => $classroom->name,
                "inicio" => $uItem->start_time,
                "fin" => $uItem->end_time
            ];
            array_push($reservations, $item);
        }
        return view('SpecificViews.Person.reserves-active', ['reservations' => $reservations]);
    }

    /**
     * Muestra las reservas históricas del usuario actual.
     *
     * @param
     * @return
     */
    public function loadHistoryReservations()
    {
        $user_id = Auth::user()->id;
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)
            ->where('state', 'FINALIZED')->get();
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $image = File::where('resource_id', $uItem->id)->first();
            $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
            $item = [
                "id_resource" => $resource->id,
                "imagePath" => $image->path,
                "name" => $resource->name,
                "salon" => $classroom->name,
                "inicio" => $uItem->start_time,
                "fin" => $uItem->end_time
            ];
            array_push($reservations, $item);
        }
        return view('SpecificViews.Person.reserves-history', ['reservations' => $reservations]);
    }

    /**
     * Muestra las reservas historicas del usuario actual filtrado por fechas
     *
     * @param
     * @return
     */
    public function historyReservations()
    {
        $data = request()->all();
        $starTime = strtotime($data['startTime']);
        $endTime = strtotime($data['endTime']);
        //$starTime = date('Y-m-d',strtotime($data['startTime']));
        //$endTime = date('Y-m-d',strtotime($data['endTime']));
        $user_id = Auth::user()->id;
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)->get();
        foreach ($userItems as $uItem) {
            if($this->matchBool($uItem,$starTime,$endTime)) {
                $resource = Resource::where('id', $uItem->resource_id)->first();
                $image = File::where('resource_id', $uItem->id)->first();
                $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
                $item = [
                    "id_resource" => $resource->id,
                    "imagePath" => $image->path,
                    "name" => $resource->name,
                    "salon" => $classroom->name,
                    "inicio" => $resource->start_time,
                    "fin" => $resource->end_time
                ];
                array_push($reservations, $item);
            }
        }
        return view('SpecificViews.Person.reserves-history', ['reservations' => $reservations]);
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
        $user_id = Auth::user()->id;
        if (!empty($data['all']) and $data['all'] == true) {
            $userItems = Reservation::where('user_id', $user_id)->get();
            foreach ($userItems as $item) {
                $item->state = 'CANCELED';
                $item->save();
            }
        } else {
            foreach ($reservas as $value) {
                $userItems = Reservation::where('user_id', $user_id)
                    ->where('id', $value)->get();
                foreach ($userItems as $item) {
                    $item->state = 'CANCELED';
                    $item->save();
                }
            }
        }
        return view('SpecificViews.Person.reserves-active');
    }

    /**
     * Muestra las reservas históricas del usuario actual.
     *
     * @param
     * @return
     */
    public function loadPersonHistoryReservations(Request $request)
    {
        $user_id = $request['ID'];
        $user = User::find($user_id);
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)
            ->where('state', 'FINALIZED')->get();
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $image = File::where('resource_id', $uItem->id)->first();
            $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
            $item = [
                "id_resource" => $resource->id,
                "imagePath" => $image->path,
                "name" => $resource->name,
                "salon" => $classroom->name,
                "inicio" => $uItem->start_time,
                "fin" => $uItem->end_time
            ];
            array_push($reservations, $item);
        }
        return view('GeneralViews.Persons.reserves_history', ['user' => $user,
            'reservations' => $reservations]);
    }

    /**
     * Muestra las reservas historicas del usuario actual filtrado por fechas para el admin o monitor
     *
     * @param
     * @return
     */
    public function  personHistoryReservations (Request $request){
        $data = request()->all();
        $starTime = strtotime($data['startTime']);
        $endTime = strtotime($data['endTime']);
        //$starTime = date('Y-m-d',strtotime($data['startTime']));
        //$endTime = date('Y-m-d',strtotime($data['endTime']));
        $user = User::find($request['ID']);
        $user_id = $request['ID'];
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)->get();
        foreach ($userItems as $uItem) {
            if ($this->matchBool($uItem,$starTime,$endTime)) {
                $resource = Resource::where('id', $uItem->resource_id)->first();
                $image = File::where('resource_id', $uItem->id)->first();
                $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
                $item = [
                    "id_resource" => $resource->id,
                    "imagePath" => $image->path,
                    "name" => $resource->name,
                    "salon" => $classroom->name,
                    "inicio" => $resource->start_time,
                    "fin" => $resource->end_time
                ];
                array_push($reservations, $item);
            }
        }
        return view('GeneralViews.Persons.reserves_history', ['user' => $user,
            'reservations' => $reservations]);
    }

    /**
     * Muestra las reservas activas del usuario escogido por el administrador o monitor.
     *
     * @param
     * @return
     */
    public function personActiveReservations(Request $request){
        $user_id = $request['ID'];
        $user = User::find($user_id);
        $reservations = [];
        $userItems = Reservation::where('user_id', $user_id)->where('state', 'ACTIVE')->get();
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $classroom = ResourceType::where('id', $resource->resource_type_id)->first();
            $item = [
                "id" => $uItem->id,
                "name" => $resource->name,
                "id_resource" => $resource->id,
                "salon" => $classroom->name,
                "inicio" => $uItem->start_time,
                "fin" => $uItem->end_time
            ];
            array_push($reservations, $item);
        }
        return view('GeneralViews.Persons.reserves_active', [
            'user' => $user,
            'reservations' => $reservations]);
    }

    /**
     * Cancela las reservas seleccionadas por el administrador o monitor.
     *
     * @param
     * @return
     */
    public function  cancelReservationsAdminMonitor (Request $request){
        $data = request()->all();
        $reservas = isset($data['selected']) ? $data['selected'] : array();
        $user_id = $request->id;
        if (!empty($data['all']) and $data['all'] == true) {
            $userItems = Reservation::where('user_id', $user_id)->get();
            foreach ($userItems as $item) {
                $item->state = 'CANCELED';
                $item->save();
            }
        } else {
            foreach ($reservas as $value) {
                $userItems = Reservation::where('user_id', $user_id)
                    ->where('id', $value)->get();
                foreach ($userItems as $item) {
                    $item->state = 'CANCELED';
                    $item->save();
                }
            }
        }
        $url = url()->previous();
        return redirect($url);
    }

    private function matchBool($reservation, $start_date, $end_date)
    {
        $acum = true;
        if ($start_date != NULL) {
            if (!(strtotime($reservation->date_time) >= $start_date)) {
                $acum = $acum && false;
            }
        }
        if ($end_date != NULL) {
            if (!(strtotime($reservation->date_time) <= $end_date)) {
                $acum = $acum && false;
            }
        }
        return $acum;
    }
}
