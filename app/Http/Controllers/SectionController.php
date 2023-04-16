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
        $doesExist = User::where('id','=',$incoming_id)->get();
        # if the it is not a student or if it does not exist
        if (($role != 2) || ($nameID == ', ') || ($doesExist->count()==0)){
            return null;
        }
        return $nameID;
    }

    function DoesAdviserExist(Request $request){
        $incoming_id = $request->input_data;
        $doesExist = User::where('id','=',$incoming_id)->get();
        $role = User::where('id','=',$incoming_id)->value('role');
        if (($role == 1) && ($doesExist->count() == 1)){
            return true;
        }
        return false;
    }

    function GetAllStudents(Request $request){
        $incoming_data = $request->input('input_data');
        $incoming_data = explode(',',$incoming_data);
        $lastName = $incoming_data[0];
        $firstName = "";
        $firstNameFlag = count($incoming_data) == 2;
        $results = "";
        if ($firstNameFlag){
            $firstName = $incoming_data[1];
            $firstName = ltrim($firstName,' ');
        };
        if($firstNameFlag){
            $query = User::where('last','=',$lastName)
                            ->where('first','=',$firstName)
                            ->where('role','=',2)->get();
        }
        else{
            return '';
            $query = User::where('last','like','%'.$lastName.'%')
                            ->where('role','=',2)->get();
        }
        return $query->value('id');
        /*$results = $query->pluck('last', 'first')->map(function ($last, $first) {
            return $last.', '.$first;
        })->values()->toArray();*/

        return $results;
    }
}
