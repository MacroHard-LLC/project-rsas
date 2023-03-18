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
            'id' => 'required',
            'password' => 'required',
            'role' => 'required',
            'first' => 'required_unless:role,0',
            'middle' => 'required_unless:role,0',
            'last' => 'required_unless:role,0',
            'gender' => 'required_unless:role,0',
        ]);

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        User::create($formFields);

        return redirect('/')->with('message', 'User created successfully!');
    }
}
