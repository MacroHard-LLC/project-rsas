<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User_table; 

class CreateUser extends Controller
{
    function CreateUserIndex(){
        return view('createuser');
    }

    function DataInsert(Request $request){
        $id = $request->input('user_id');
        $password = $request->input('user_pswrd');
        $role = $request->input('role');
        $first = $request->input('first');
        $middle = $request->input('middle');
        $last = $request->input('last');
        $gender = $request->input('gender');

        $isInsertSuccess = User_table::insert(['id'=>$id,
                                            'password'=>$password,
                                            'role'=>$role,
                                            'first'=>$first,
                                            'middle'=>$middle,
                                            'last'=>$last,
                                            'gender'=>$gender
                                        ]);
        
        if($isInsertSuccess) echo '<h1>Create User Success</h1>';
        else echo '<h1>Create User Failed </h1>';

    }
}
