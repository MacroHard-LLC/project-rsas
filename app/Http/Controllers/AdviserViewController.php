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

    function SessionStudentID(Request $request){
        $student = $request->input_data;
        session()->put('student_id', $student['subject_id']);
        session()->put('target_date',$student['target_date']);

        return $student;
    }

    function SessionStudent(Request $request){
        $student = $request->input_data;
        //session()->put('subject', $student['subject']);
        session()->put('subject',$student);
        return $student;
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

    function startGradeLevel(Request $request){
        // this is the adviser id request.
        $incoming_id = $request->input_data;

        // section id
        $sectionId = Section::where('adviser_id','=',$incoming_id)->value('grade_level');
        return $sectionId;
    }

    function GetAllStudents(Request $request){
        $data = $request->input_data;
        $subject_id = $data['subject_id'];
        $target_date = $data['date'];

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
                        ->where('subject_id',$subject_id)
                        ->where('date',$target_date)
                        ->exists();
            $is_late = Late::where('student_id',$student['user_id'])
                        ->where('date',$target_date)
                        ->where('subject_id',$subject_id)
                        ->exists();
            $status = 'Absent';
            $student_tag =session()->get('student_id');

            if($is_present){
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

    function GetAllStudentsInSubject(Request $request){
        $data = $request->input_data;
        $subject_id = $data['subject_id'];
        $target_date = $data['date'];
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
                        ->where('subject_id',$subject_id)
                        ->where('date',$target_date)
                        ->exists();
            $is_late = Late::where('student_id',$student['user_id'])
                        ->where('subject_id',$subject_id)
                        ->where('date',$target_date)
                        ->exists();
            $status = 'Absent';

            if($is_present){
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

    function GetStudentStatus(){
        $incoming_data = session()->get('adviser_id');
        $sectionId = Section::where('adviser_id','=',$incoming_data)->first()->id;

        $query = Student::where('section_id', $sectionId)
                 ->get('user_id');
        $attendanceArray = array();
        foreach($query as $student){
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $name = $last_name . ', ' . $first_name;

            $student_status = User::where('id',$student['user_id'])->value('is_enrolled');
            $status = 'Absent';

            if($student_status != 1){
                $status = 'Dropped';
            }
            else{
                $status = 'Enrolled';
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
        $student_id = session()->get('student_id');
        $target_date = session()->get('target_date');
        $subject = session()->get('subject');

        $subject = $subject['subject_id'];

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

        $newRow->date = $target_date;
        $newRow->student_id = $student_id;
        $newRow->subject_id = $subject;
        $newRow->added_on = now();
        $newRow->save();
        // end

        //session()->put('new_status',$new_status);
        
        $adviserId = session()->get('adviser_id');
        return view('adviser.viewattendance', compact('adviserId'));
    }

    function ChangeStatus(Request $request){
        $incoming_data = $request->input_data;
        $new_status = $incoming_data['new_status'];
        $student_id = session()->get('student_id');

        // get the row of the student, delete it
        $isRow = User::where('id','=',$student_id)->first();
        if ($new_status == 'Dropped'){
            $isRow->is_enrolled = 0;
        }
        else {
            $isRow->is_enrolled = 1;
        }
        $isRow->save();
        //session()->put('new_status',$new_status);
        
        $adviserId = session()->get('adviser_id');
        return view('adviser.studentinfo', compact('adviserId'));
    }

    function SubjectSetup(Request $request){
        $adviserId = $request->input_data;

        $section = Section::where('adviser_id','=',$adviserId)->first();
        $gradeLevel = $section->grade_level;

        $subject = Subject_table::where('grade_level','=',$gradeLevel)->get();
        return $subject;
    }

    function StudentTag(Request $request){ // I think this is hte update tag oof
        $incoming_data = $request->value;
        session()->put('student_id',$incoming_data);
        return $incoming_data;
    }

    /*function StudentTag(Request $request){
        
        $status = Student::get($request->student_id);

        $status->status = $request->status;

        $status->save();

        return redirect()->back();
       
        
    }*/

    function StudentPage(){
        $adviserId = session()->get('adviser_id');
        return view('adviser.studentinfo', compact('adviserId'));
    }

    function EditAttendance(){
        return view('adviser.editattendance');
    }

}