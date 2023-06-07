<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\PresentAttendance;
use App\Models\LateAttendance;
use Illuminate\Http\Request;

class Form2Controller extends Controller
{
    // Show all users
    public function ShowForm() {
        //get the needed incoming data
        $adviser = session()->get('adviser_id');
        // $adviser = session() ->get('adviser_id');

        $section_id = Section::where('adviser_id', $adviser) -> get('id') -> first();

        $grade_level = Section::where('adviser_id', $adviser) -> get('grade_level') -> first();

        $month = now();/*->format('F');*/

        $query = Student::where('section_id', $section_id) -> get('user_id');

        // $attendanceArray = array();
        // foreach($query as $student){
        //     $first_name = User::where('id',$student['user_id'])->value('first_name');
        //     $last_name = User::where('id',$student['user_id'])->value('last_name');
        //     $name = $last_name . ', ' . $first_name;


        //     $is_present = PresentAttendance::where('student_id',$student['user_id'])
        //                 ->exists();
        //     $is_late = LateAttendance::where('student_id',$student['user_id'])
        //                 ->exists();
        //     $status = 'Absent';
            
        //     if($student['user_id'] == $student_tag){
        //         $status = session()->get('new_status');
        //     }
        //     else if($is_present){
        //         $status = 'Present';
        //     }
        //     else if($is_late){
        //         $status = 'Late';
        //     }
        // }

        //     $student_tag = session()->get('student_id'); //for the remarks
        // }

        // // $queryStudent = Student::where($incoming_data = session(),$incoming_data = session()->get('user_id'));

        // var_dump($attendanceArray);
        
        // return $attendanceArray;

        //var_dump($adviser);
        var_dump($grade_level);
        return($adviser);

        
    }
}
