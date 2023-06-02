<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\PresentAttendance;
use App\Models\LateAttendance;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all users
    public function ShowForm() {
        //get the needed incoming data
        $section_id = session() -> get('section_id');
        $start_year = session() -> get('start_year');
        $start_year = session() -> get('end_year');
        $grade_level = session() -> get('grade_level');

        $month = now()->format('F');

        $query = Student::where('section_id', $section_id) -> get(user_id);

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
            
            if($student['user_id'] == $student_tag){
                $status = session()->get('new_status');
            }
            else if($is_present){
                $status = 'Present';
            }
            else if($is_late){
                $status = 'Late';
            }


            $student_tag = session()->get('student_id'); //for the remarks
        }

        // $queryStudent = Student::where($incoming_data = session(),$incoming_data = session()->get('user_id'));

        var_dump($attendanceArray);
        
        return $attendanceArray;

        
    }
}
