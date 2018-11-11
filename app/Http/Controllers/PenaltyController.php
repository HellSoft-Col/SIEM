<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Models\User;
use Illuminate\Http\Request;

class PenaltyController extends Controller
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
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function show(Penalty $penalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function edit(Penalty $penalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penalty $penalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penalty $penalty)
    {
        //
    }

    /**
     * Muestra las multas activas de un usuario.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function activePenalties (Request $request)
    {
        $user = User::find($request['ID']);
        $reservations = $user->reservations;
        $penalties = [];

        foreach ($reservations as $r) {
            $p = Penalty::where('reservation_id',$r->id)->where('active',1)->first();
            if ($p != null){
                array_push($penalties,$p);
            }
        }
        return view('TestViewsCocu.activePenalties',compact('user','penalties'));
    }

    /**
     * Muestra las multas historicas de un usuario.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function loadHistoryPenalties(Request $request)
    {
        $user = User::find($request['ID']);
        $reservations = $user->reservations;
        $penalties = [];

        foreach ($reservations as $r) {
            $p = Penalty::where('reservation_id',$r->id)->where('active',0)->first();
            if ($p != null){
                array_push($penalties,$p);
            }
        }
        return view('TestViewsCocu.historyPenalties', ['user' => $user,
            'penalties' => $penalties]);
    }

    /**
     * Muestra las reservas historicas del usuario actual filtrado por fechas para el admin o monitor
     *
     * @param
     * @return
     */
    public function  personHistoryPenalties (Request $request){
        $data = request()->all();
        $starTime = strtotime($data['startTime']);
        $endTime = strtotime($data['endTime']);
        //$starTime = date('Y-m-d',strtotime($data['startTime']));
        //$endTime = date('Y-m-d',strtotime($data['endTime']));
        $user = User::find($request['ID']);
        $reservations = $user->reservations;
        $penalties = [];

        foreach ($reservations as $r) {
            $p = Penalty::where('reservation_id', $r->id)->where('active', 0)->first();
            if ($p != null and $this->matchBoolPenalty($p, $starTime, $endTime)) {
                array_push($penalties, $p);
            }
        }
        return view('TestViewsCocu.historyPenalties', ['user' => $user,
            'penalties' => $penalties]);
    }

    /**
     * Finaliza las multas seleccionadas por el administrador o monitor.
     *
     * @param
     * @return
     */
    public function endPenalties(Request $request){
        $data = request()->all();
        $penalties = isset($data['selected']) ? $data['selected'] : array();
        $user_id = $request->id;
        $user = User::find($user_id);
        if (!empty($data['all']) and $data['all'] == true) {
            $reservations = $user->reservations;
            foreach ($reservations as $r) {
                $p = Penalty::where('reservation_id',$r->id)->where('active',1)->first();
                if ($p != null){
                    $p->active = 0;
                    $p->save();
                }
            }
        } else {
            foreach ($penalties as $value) {
                $userItems = Penalty::where('id', $value)->get();
                foreach ($userItems as $item) {
                    $item->active = 0;
                    $item->save();
                }
            }
        }
        $url = url()->previous();
        return redirect($url);
    }

    private function matchBoolPenalty($penalty, $start_date, $end_date)
    {
        $acum = true;
        if ($start_date != NULL) {
            if (!(strtotime($penalty->date_time) >= $start_date)) {
                $acum = $acum && false;
            }
        }
        if ($end_date != NULL) {
            if (!(strtotime($penalty->penalty_end) <= $end_date)) {
                $acum = $acum && false;
            }
        }
        return $acum;
    }

}
