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
        $isEnrolled = User::where('id','=',$incoming_id)->value('is_enrolled');
        # if the it is not a student or if it does not exist
        if (($role != 2) || ($nameID == ', ') || ($doesExist->count()==0) || ($isEnrolled == 1)){
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
                            ->where('role','=',2)
                            ->whereNull('is_enrolled')
                            ->get();
        }
        else{
            return '';
        }
        return $query->value('id');
    }

    function DataInsert(Request $request){
        $formFields = $request;
        /*$formFields = $request->validate([
            'adviserID' => ['required','integer','digits:9','regex:/[0-9]+/'],
            'allStudentID' => 'required',
            'sectionID' => 'required',
            'gradeLevel' => 'required',
        ]);*/

        foreach($formFields->input('allStudentID') as $studentID){
            $changeRow = User::select('id')->find($studentID);
            $changeRow->is_enrolled = 1;
            $changeRow->grade_level = $formFields['gradeLevel'];
            $changeRow->save();
        }
    }
}
