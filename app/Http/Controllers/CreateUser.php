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
        $fname = $request->input('first');
        $mname = $request->input('middle');
        $lname = $request->input('last');
        $sex = $request->input('gender');

        $isInsertSuccess = User_table::insert(['id'=>$id,
                                            'password'=>$password,
                                            'role'=>$role,
                                            'first'=>$fname,
                                            'middle'=>$mname,
                                            'last'=>$lname,
                                            'gender'=>$sex
                                        ]);
        
        if($isInsertSuccess) echo '<h1>Create User Success</h1>';
        else echo '<h1>Create User Failed </h1>';

    }
}
