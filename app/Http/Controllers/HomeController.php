<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schoolyear;

class HomeController extends Controller
{
    function Homepage(){
        $users = User::all();
        $schoolyears = Schoolyear::all();
        return view('homepage', compact('users','schoolyears'));
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
