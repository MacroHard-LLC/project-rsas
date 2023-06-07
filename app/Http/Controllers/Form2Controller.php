<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\PresentAttendance;
use App\Models\LateAttendance;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Form2Controller extends Controller
{
    // Show all users
    public function ShowForm() {
        //get the needed incoming data
        $adviser = session()->get('adviser_id'); // gets the adviser id
        // $adviser = session() ->get('adviser_id');

        //finds out the id of the section that the adviser handles
        //also helps with finding the students that belong to the section
        $section_id = Section::where('adviser_id', $adviser) -> pluck('name');

        //finds out the grade level that the adviser handles
        $grade_level = Section::where('adviser_id', $adviser) -> pluck('grade_level');

        //gives the current month of asking the report
        $month = now()->format('F');

        // $students = Student::where('section_id', $section_id)->get();

        // $male_query = User::where('sex','M')
        //     ->whereHas('student', function (Builder $query) {
        //     $query->where('section_id',$section_id);
        // })->get();

        //gets the number of male students that belong to the section
        $male_query = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'M')
            ->get();

        // to remove later
        $male_query_counter = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'M')
            ->count();

        $male_attendance_array = array();
        foreach($male_query as $student){
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $middle_name = User::where('id',$student['user_id'])->value('middle_name');
            $name = $last_name . ', ' . $first_name . ' ' . $middle_name;

            $male_attendance_array[] = array(
                'name' => $name,
            );



            // $is_present = PresentAttendance::where('student_id',$student['user_id'])
            //             ->exists();
            // $is_late = LateAttendance::where('student_id',$student['user_id'])
            //             ->exists();
            // $status = 'Absent';
            
            // if($student['user_id'] == $student_tag){
            //     $status = session()->get('new_status');
            // }
            // else if($is_present){
            //     $status = 'Present';
            // }
            // else if($is_late){
            //     $status = 'Late';
            // }
        }

        //     $student_tag = session()->get('student_id'); //for the remarks
        // }

        // // $queryStudent = Student::where($incoming_data = session(),$incoming_data = session()->get('user_id'));

        //gets the number of female students that belong to the section
        $female_query = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'F')
            ->get();

        // to remove later
        $female_query_counter = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'F')
            ->count();

        //var_dump($adviser);
        // var_dump($grade_level);
        echo $male_query_counter;
        echo $female_query_counter;
        echo $male_query;
        echo $female_query;
        // echo $male_attendance_array[1]['id'];
        return view('adviser.form2')
        -> with('month', $month)
        -> with('section_id', $section_id)
        -> with('grade_level', $grade_level)
        -> with('male_query', $male_query)
        -> with('female_query', $female_query)
        -> with('male_attendance_array', $male_attendance_array);
        
    }
}
