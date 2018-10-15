<?php

namespace App\Http\Controllers;

use App\Models\Classroom_type;
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
        return view('test_views.recurso_detail', compact('resource'));
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
        $categories = Resource::distinct()->get(['type']);
        $rtypes =  DB::table('resource')
            ->join('classroom_type', 'resource.classroom_type_id', '=', 'classroom_type.id')->distinct()->get(['classroom_type.name']);
        $rcaracteristics = DB::table('resource')
            ->join('characteristic_resource', 'characteristic_resource.resource_id', '=', 'resource.id')
            ->join('characteristic', 'characteristic_resource.characteristic_id', '=', 'characteristic.id')
            ->distinct()->get(['characteristic.name']);
        return view('test_views.buscar_recurso', compact('categories','rtypes', 'rcaracteristics'));
    }

    /**
     * Search resources.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $resources = Resource::all();
        return view('test_views.resultados_buscar_recurso', compact('resources'));
    }
}
