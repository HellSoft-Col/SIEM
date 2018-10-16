<?php

namespace App\Http\Controllers;

use App\Models\Classroom_type;
use App\Models\File;
use App\Models\Reservation;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SeeReservationsController extends Controller
{
    public function activeReservations()
    {
        $user_id = 10;
        $reservations = [];
        $userItems = Reservation::where('user_id',$user_id)->where('state','ACTIVE')->get();
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $classroom = Classroom_type::where('id',$resource->classroom_type_id)->first();
            $item = [
                "id" => $uItem->id,
                "name" => $resource->name,
                "salon" => $classroom->name,
                "inicio" => $uItem->start_time,
                "fin" => $uItem->end_time
            ];
            array_push($reservations, $item);
        }
        return view('seeReservationsPerson.reservations',['reservations' => $reservations ]);
    }

    public function loadHistoryReservations()
    {
        $reservations = [];
        return view('seeReservationsPerson.history',['reservations' => $reservations ]);
    }

    public function historyReservations()
    {
        $data = request()->all();
        $starTime = $data['startTime'];
        $endTime = $data['endTime'];
        $user_id = 1;
        $reservations = [];
        if (!empty($starTime) and !empty($endTime)) {
            $userItems = Reservation::where('user_id', $user_id)
                ->where('state','!=','ACTIVE')
                ->whereDate('start_time', '>=', $starTime)
                ->whereDate('end_time', '<=', $endTime)->get();
        }else {
            $userItems = Reservation::where('user_id', $user_id)
                ->where('state','!=','ACTIVE')->get();
        }
        foreach ($userItems as $uItem) {
            $resource = Resource::where('id', $uItem->resource_id)->first();
            $image = File::where('resource_id', $resource->id)->first();
            $classroom = Classroom_type::where('id', $resource->classroom_type_id)->first();
            $item = [
                "imagePath" => $image->path,
                "name" => $resource->name,
                "salon" => $classroom->name,
                "inicio" => $resource->start_time,
                "fin" => $resource->end_time
            ];
            array_push($reservations, $item);
        }
        return view('seeReservationsPerson.history',['reservations' => $reservations ]);
    }

    public function cancelReservations()
    {
        $data = request()->all();
        $reservas = isset($data['selected']) ? $data['selected'] : array();
        $user_id = 10;
        if(!empty($data['all']) and $data['all'] == true){
            $userItems = Reservation::where('user_id', $user_id)->get();
            foreach ($userItems as $item){
                $item->state = 'CANCELED';
                $item->save();
            }
        }else{
            foreach ($reservas as $value) {
                $userItems = Reservation::where('user_id', $user_id)
                    ->where('id', $value)->get();
                foreach ($userItems as $item) {
                    $item->state = 'CANCELED';
                    $item->save();
                }
            }
        }
        return redirect(route('person.activeReservations'));
    }
}
