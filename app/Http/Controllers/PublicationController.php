<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('GeneralViews.Feeds.feed')
            ->with('publications', $this->getSomePublications(20));
    }

    public function indexAuth()
    {
        return view('SpecificViews.Person.feed')
            ->with('publications', $this->getSomePublications(20));
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
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }

    /**
     * Filtra las publicaciones
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $publications = [];
        $aux_publication = Publication::all();

        foreach ($aux_publication as $publication) {
            if ($this->matchBool($publication, $keyword, strtotime($start_date), strtotime($end_date))) {
                array_push($publications, $publication);
            }
        }

        return view('GeneralViews.Feeds.feed')
            ->with('publications', $publications);
    }

    /**
     * Filtra las publicaciones
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchuser(Request $request)
    {
        $keyword = $request->keyword;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $publications = [];
        $aux_publication = Publication::all();

        foreach ($aux_publication as $publication) {
            if ($this->matchBool($publication, $keyword, strtotime($start_date), strtotime($end_date))) {
                array_push($publications, $publication);
            }
        }

        return view('SpecificViews.Person.feed')
            ->with('publications', $publications);
    }

    /**
     * @param
     *  - limit: el numero maximo de publicaciones a retornar
     * @return
     *  - coleccion de publicaciones en orden de fecha descendente
     */
    private function getSomePublications($limit)
    {
        return Publication::all()->sortByDesc('date_time')->take($limit);
    }

    private function matchBool($publication, $keyword, $start_date, $end_date)
    {
        $acum = true;

        if ($keyword != NULL) {
            if (strpos(strtoupper($publication->header), strtoupper($keyword)) !== false
                || strpos(strtoupper($publication->description), strtoupper($keyword)) !== false
                || strpos(strtoupper($publication->user->name), strtoupper($keyword)) !== false) {
                //
            } else {
                $acum = $acum && false;
            }
        }

        if ($start_date != NULL) {
            if (!(strtotime($publication->date_time) >= $start_date)) {
                $acum = $acum && false;
            }
        }

        if ($end_date != NULL) {
            if (!(strtotime($publication->date_time) <= $end_date)) {
                $acum = $acum && false;
            }
        }

        return $acum;
    }

}
