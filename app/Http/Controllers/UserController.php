<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show all users
    public function index() {
        return view('users.index');
    }

    // Show create user form
    function create(){
        return view('users.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'id' => ['required','unique:user,id','integer','digits:9'],
            'password' => ['required','min:1','max:20'],
            'role' => 'required',
            'first' => ['required','min:1','max:20','alpha:ascii'],
            'middle' => ['required','min:1','max:20','alpha:ascii'],
            'last' => ['required','min:1','max:20','alpha:ascii'],
            'gender' => 'required',
        ]);

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        User::create($formFields);

        return redirect('/')->with('message', 'User created successfully!');
    }
}
