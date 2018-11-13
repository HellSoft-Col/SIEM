<?php

namespace App\Http\Controllers;

use App\Models\Carreer;
use App\Models\File;
use App\Models\User;
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
        return view('GeneralViews.Persons.view',
            [
                'user' => $user,
            ]
        );
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

    /*******************************************************************/
    public function goSearchPerson()
    {
        $carreers = Carreer::all();
        return view('GeneralViews.Persons.search',
            [
                'carreers' => $carreers
            ]);
    }

    public function searchPerson(Request $request)
    {
        $name = $request->name;
        $username = $request->username;
        $identification = $request->identification;
        $id = $request->id;
        $semester = $request->semester;
        $role = $request->role;
        $type = $request->type;
        $radioActivePenalty = $request->activePenalty;
        $radioActiveReserves = $request->activeReserves;
        $carreer = $request->carreer;

        $people = $this->match($name, $username, $identification, $id, $semester, $role,
            $type, $radioActivePenalty, $radioActiveReserves, $carreer);
        return view('GeneralViews.Persons.result',
            [
                'people' => $people,
            ]);
    }

    private function match($name, $username, $identification, $id, $semester, $role,
                           $type, $radioActivePenalty, $radioActiveReserves, $carreer)
    {

        $u = [];
        $aux_users = User::all();

        foreach ($aux_users as $user) {
            if ($this->matchBool($user, $name, $username, $identification, $id, $semester, $role,
                $type, $radioActivePenalty, $radioActiveReserves, $carreer)) {
                array_push($u, $user);
            }
        }

        return $u;
    }

    private function matchBool($user, $name, $username, $identification, $id, $semester, $role,
                               $type, $radioActivePenalty, $radioActiveReserves, $carreer)
    {
        $acum = true;

        if ($name != NULL) {
            if (strpos(strtoupper($user->name), strtoupper($name)) !== false) {
                //
            } else {
                $acum = $acum && false;
            }
        }
        if ($username != NULL) {
            if (strtoupper($user->username) != strtoupper($username)) {
                $acum = $acum && false;
            }
        }

        if ($identification != NULL) {
            if ($user->identification != $identification) {
                $acum = $acum && false;
            }
        }

        if ($id != NULL) {
            if ($user->university_id != $id) {
                $acum = $acum && false;
            }
        }

        if ($semester != NULL) {
            if ($user->semester != $semester) {
                $acum = $acum && false;
            }
        }

        if ($role != NULL) {
            if (strtoupper($user->role) != strtoupper($role)) {
                $acum = $acum && false;
            }
        }

        if ($carreer != NULL) {
            if (strtoupper($user->carreer->name) != strtoupper($carreer)) {
                $acum = $acum && false;
            }
        }

        if ($type != NULL) {
            if (strtoupper($user->type) != strtoupper($type)) {
                $acum = $acum && false;
            }
        }

        if ($radioActivePenalty != NULL) {
            if (!($user->hasPenalties())) {
                $acum = $acum && false;
            }
        }


        if ($radioActiveReserves != NULL) {
            if (!($user->hasReservations())) {
                $acum = $acum && false;
            }
        }

        return $acum;
    }


    public function getUserPosts(User $user)
    {

        $posts = $user->publications;
        return view('GeneralViews.Persons.posts', ['user_posts' => $posts, 'user' => $user]);

    }
}

