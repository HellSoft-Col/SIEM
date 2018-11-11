<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Calendar;


class CalendarController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Resource $resource
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

        return view('GeneralViews.ResourcesViews.Calendar.view', compact('calendar_details'));
    }
}
