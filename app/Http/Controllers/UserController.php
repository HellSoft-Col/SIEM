<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data =  Validator::make($request->all(), [
            'cedula' => 'required|numeric',
            'identification' => 'required|numeric',
            'role' => 'required|string',
            'semester' => 'required|numeric',
        ]);

        if ($data->fails()) {
            return redirect('/user/update')
                ->withErrors($data)
                ->withInput();
        }
        $finald = $request->all();

        $user = Auth::user();
        $user->semester = $finald['semester'] ;
        $user->university_id = $finald['identification'] ;
        $user->identification = $finald['cedula'] ;
        $user->type = $finald['role'] ;

        if ( $request->hasFile('img')){
            $url = Storage::disk('public')->put(Auth::user()->username . 'Folder', $request->file('img'));
            $file = File::create([
                'path' => $url,
                'description' => Auth::user()->username . " Profile photo",
                'type' => 'USER',
            ]);
            $user->file_id = $file->id ;
        }

        $user->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => 'required|numeric',
            'identification' => 'required|numeric',
            'role' => 'required|string',
            'semester' => 'required|numeric',
        ]);
    }
}
