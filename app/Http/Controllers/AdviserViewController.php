<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\PresentAttendance;
use App\Models\LateAttendance;
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
        $incoming_data = session()->get('section_id');
        $query = Student::where('section_id', $incoming_data)
                 ->get('user_id');
        $attendanceArray = array();
        foreach($query as $student){
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $name = $last_name . ', ' . $first_name;

            $is_present = PresentAttendance::where('student_id',$student['user_id'])
                        ->exists();
            $is_late = LateAttendance::where('student_id',$student['user_id'])
                        ->exists();
            $status = 'Absent';
            $student_tag =session()->get('student_id');

            if($student['user_id'] == $student_tag){
                $status = session()->get('new_status');
            }
            else if($is_present){
                $status = 'Present';
            }
            else if($is_late){
                $status = 'Late';
            }
            $attendanceArray[] = array(
                'id' => $student['user_id'],
                'name' => $name,
                'status' => $status,
            );
        }
        
        
        return $attendanceArray;
    }

    function ChangeAttendance(Request $request){
        $incoming_data = $request->input_data;
        $new_status = $incoming_data['new_status'];
        session()->put('new_status',$new_status);
        
        $adviserId = session()->get('adviser_id');
        return view('adviser.viewattendance', compact('adviserId'));
    }

    function StudentTag(Request $request){
        $incoming_data = $request->value;
        session()->put('student_id',$incoming_data);
        return $incoming_data;
    }

    function StudentPage(){
        return view('adviser.studentinfo');
    }

    function EditAttendance(){
        return view('adviser.editattendance');
    }

}
