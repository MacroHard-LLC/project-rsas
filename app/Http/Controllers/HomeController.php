<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schoolyear;
use App\Models\Instructor;

class HomeController extends Controller
{
    function Homepage(){
        $users = User::all();
        $schoolyears = Schoolyear::all();
        $instructors = Instructor::all();
        return view('homepage', compact('users','schoolyears','instructors'));
    }

    function LandingPage(){
        return view('landingpage');
    }
    function AdminHome(){
        return view('homepage');
    }

    /*
   { /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct()
    {
        $this->middleware('auth');
    }


     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable

    public function index()
    {
        return view('home');
    }}*/
}
