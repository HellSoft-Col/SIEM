<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('test_views.crear_reserva', compact('resource_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $resource = Resource::find($request->resource_id);
        $end_time = strtotime($request->end_date. " " .$request->end_time);
        $start_time = strtotime($request->start_date. " " .$request->start_time);

        $message = $this->canReserve($user,$resource,$start_time,$end_time);

        if($message==""){
            Reservation::create([
                'state' => 'ACTIVE',
                'start_time' =>  $request->start_date. " " .$request->start_time,
                'end_time' => $request->end_date. " " .$request->end_time,
                'user_id' => $user->id,
                'resource_id' => $resource->id,
                'moulted' => '0',
            ]);
            $message .= "Reserva exitosa" ;
        }
        return redirect()->route('reservation.create')->with('message', [$message]);
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
        //
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
        //
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
    public function canReserve($user, $resource, $start_time, $end_time)
    {
        $max_hours = 0;
        $min_hours = 1;
        $hours =  ($end_time - $start_time)/3600;
        $anteriority = ($start_time - time())/60;
        $error_message = "";

        if($resource->type == 'CLASSROOM'){
            if($user->type == 'STUDENT'){
                $max_hours = 2;
            }
            else{
                $max_hours = 4;
            }
        }
        else if($resource->type == 'INSTRUMENT'){
            $min_hours = 24;
            $max_hours = 168;
        }

        if($anteriority<0){
            $error_message.=" - Fecha en el pasado - ";
        }
        if($hours<0){
            $error_message.=" - Fechas inconsistentes - ";
        }
        if(is_int($hours) && $hours>=$min_hours && $hours<=$max_hours){
            if($resource->type == 'CLASSROOM'){
                if($anteriority>=30 && $anteriority <= 10080){
                    //
                }
                else{
                    $error_message.=" - No se encuentra en un tiempo valido - ";
                }
            }
            else if($resource->type == 'INSTRUMENT'){
                if($anteriority>=120 && $anteriority <= 10080){
                    //
                }
                else{
                    $error_message.= " - No se encuentra en un tiempo valido - ";
                }
            }
        }
        else{
            $error_message.=" - Bloque incorrecto - ";
        }

        if($user->hasPenalties()){
            $error_message.=" - El usuario tiene multas - ";
        }

        if(!$resource->isAvailableBetween($start_time,$end_time)){
            $error_message.=" - No está disponible - ";
        }
        return $error_message;
    }


}
