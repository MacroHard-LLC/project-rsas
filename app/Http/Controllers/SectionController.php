<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    function CreateSection(){
        return view('levels.newgrlvl');
    }

    function GetStudentName(Request $request){
        $incoming_id = $request->input_data;
        $first = User::where('id','=',$incoming_id)->value('first');
        $last = User::where('id','=',$incoming_id)->value('last');
        $nameID = $last . ", " . $first;
        $role = User::where('id','=',$incoming_id)->value('role');
        # if the it is not a student or if it does not exist
        if (($role != 2) || ($nameID == null)){
            return null;
        }
        return $nameID;
    }
}
