<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StudentInfoController extends Controller
{
    // Show all students and their status
    function StudentInfo($id){
    $incoming_data = session()->get('adviser_id');
        $sectionId = Section::where('adviser_id','=',$incoming_data)->first()->id;

        $query = Student::where('section_id', $sectionId)
                 ->get('user_id');
        $attendanceArray = array();
        foreach($query as $student){
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $name = $last_name . ', ' . $first_name;

            $is_dropped = Dropped::where('student_id',$student['user_id'])
                        ->where('status', 1)->exists();
            $is_not_dropped = Dropped::where('student_id',$student['user_id'])
                        ->where('status', 0)->exists();

            $student_tag = session() ->get('new_status');

            if($student['user_id'] == $student_tag){
                $status = session()->get('new_status');
            }
            else if($is_dropped){
                $status = 'Dropped';
            }
            else if($is_not_dropped){
                $status = 'Enrolled';
            }
            $attendanceArray[] = array(
                'name' => $name,
                'status' => $status,
            );
        }
        
        
        return $attendanceArray;

    }
}