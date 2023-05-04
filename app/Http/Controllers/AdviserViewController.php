<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;

class AdviserViewController extends Controller
{
    function AdviserPage($id){
        $adviserId = $id;
        session()->put('adviser_id', $adviserId);
        return view('adviser.adviserpage');
    }

    function AttendancePage(){
        $adviserId = session()->get('adviser_id');
        return view('adviser.viewattendance', compact('adviserId'));
    }

    function start(Request $request){
        // this is the adviser id request.
        $incoming_id = $request->input_data;

        // section id
        $sectionId = Section::where('adviser_id','=',$incoming_id)->value('id');
        session()->put('section_id',$sectionId);
        $first = User::where('id','=',$incoming_id)->value('first_name');
        $middle = User::where('id','=',$incoming_id)->value('middle_name');
        $last = User::where('id','=',$incoming_id)->value('last_name');
        $nameID = $last . ", " . $first . " " . $middle;
        return $nameID;
    }

    function GetAllStudents(){
        
    }

    function StudentPage(){
        return view('adviser.studentinfo');
    }

    function EditAttendance(){
        return view('adviser.editattendance');
    }

}
