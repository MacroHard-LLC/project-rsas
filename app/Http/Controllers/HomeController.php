<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function LandingPage(){
        return view('landingpage');
    }
    function AdminHome(){
        return view('homepage');
    }

    function AdviserHome(){
        return view('test');
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
