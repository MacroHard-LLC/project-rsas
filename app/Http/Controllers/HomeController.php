<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    function Homepage(){
        $users = User::all();
        return view('homepage', compact('users'));
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
