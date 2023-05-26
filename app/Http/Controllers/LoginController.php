<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function login(){
        return view('loginpage');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    function loginPost(Request $request){
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('id','password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();

            //mured jud ni sya, pls ignore lmao -yza
            if($user->isAdmin()){
                return redirect()->intended(route('adminhome'));
            } elseif($user->isAdviser()){
                return redirect()->intended(route('adviserhome'));
            } elseif($user->isStudent()){
                return redirect()->intended(route('login'));
            }
            
        }
        return redirect(route('login'))->with("error","Login failed.");
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
