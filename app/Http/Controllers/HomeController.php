<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     *
     */
    public function home()
    {
        if ( Auth::user()->role == 'ADMIN'){
            return view('SpecificViews/Admin/home');
        }elseif (Auth::user()->role == 'MODERATOR'){
            return view('SpecificViews/Moderator/home');
        }elseif (Auth::user()->role == 'USER'){
            return view('SpecificViews/Person/home');
        };
    }
}