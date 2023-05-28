<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject_table;
use App\Models\Present;
use App\Models\Absent;
use App\Models\Late;
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
        $incoming_data = session()->get('adviser_id');
        $sectionId = Section::where('adviser_id','=',$incoming_data)->first()->id;

        $query = Student::where('section_id', $sectionId)
                 ->get('user_id');
        $attendanceArray = array();
        foreach($query as $student){
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $name = $last_name . ', ' . $first_name;

            $is_present = Present::where('student_id',$student['user_id'])
                        ->exists();
            $is_late = Late::where('student_id',$student['user_id'])
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
        $student_id = $incoming_data['student_id'];
        $target_date = $incoming_data['date'];
        $subject = $incoming_data['subject'];

        // get the row of the student, delete it
        $isRow = Present::where('student_id','=',$student_id);
        if (!isset($isRow)){
            $isRow = Late::where('student_id','=',$student_id);
            if (!isset($isRow)){
                $isRow = Absent::where('student_id','=',$student_id);
            }
        }
        if($isRow){
            $isRow->delete();
        }

        // create a new row in the specific attendance, and ADD IT
        if($new_status == 'Present'){
            $newRow = new Present;
        }
        else if($new_status == 'Late'){
            $newRow = new Late;
        }
        else{
            $newRow = new Absent;
        }

        $newRow->student_id = $student_id;
        //$newRow->subject_id = $subje
        $newRow->date = $target_date;
        $newRow->added_on = now();
        $newRow->save();
        // end

        session()->put('new_status',$new_status);
        
        $adviserId = session()->get('adviser_id');
        return view('adviser.viewattendance', compact('adviserId'));
    }

    function SubjectSetup(Request $request){
        $adviserId = $request->input_data;

        $section = Section::where('adviser_id','=',$adviserId)->first();
        $sectionId = $section->id;

        $subject = Subject_table::where('section_id','=',$sectionId)->get();
        return $subject;
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
