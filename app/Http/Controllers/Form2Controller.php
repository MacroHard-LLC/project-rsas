<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\Present;
use App\Models\Late;
use App\Models\PresentAttendance;
use App\Models\LateAttendance;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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
        $section = Section::where('adviser_id', $adviser) -> first();
        $section_id = $section->name;

        //finds out the grade level that the adviser handles
        $grade_level = Section::where('adviser_id', $adviser) -> pluck('grade_level');
        $grade_level = $section->grade_level;

        //gives the current month of asking the report
        $month = now()->format('F');

        // $students = Student::where('section_id', $section_id)->get();

        // $male_query = User::where('sex','M')
        //     ->whereHas('student', function (Builder $query) {
        //     $query->where('section_id',$section_id);
        // })->get();

        //gets the number of male students that belong to the section
        $male_query = User::join('Student', 'Student.user_id', '=', 'User.id')
            // ->where('student.section_id', $section_id)
            ->where('sex', 'M')
            ->where('section_id',$section->id)
            ->get();

        // to remove later
        $male_query_counter = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'M')
            ->where('section_id',$section->id)
            ->count();

        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Get the first and last day of the current month
        $firstDayOfMonth = Carbon::create($currentYear, $currentMonth, 1)->startOfMonth();
        $lastDayOfMonth = Carbon::create($currentYear, $currentMonth, 1)->endOfMonth();

        // Initialize an array to store the days
        $days = [];

        // Start from the first day and loop until the last day
        $currentDay = $firstDayOfMonth;
        while ($currentDay <= $lastDayOfMonth) {
            // Check if the current day is between Monday (1) and Friday (5)
            $dayOfWeek = $currentDay->dayOfWeek;
            if ($dayOfWeek >= Carbon::MONDAY && $dayOfWeek <= Carbon::FRIDAY) {
                // Add the current day to the array
                $days[] = $currentDay->format('Y-m-d');
            }

            // Move to the next day
            $currentDay->addDay();
        }
        // days is here

        $male_attendance_array = array();
        $attendance_array = array();
        foreach($male_query as $student){

            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $middle_name = User::where('id',$student['user_id'])->value('middle_name');
            $name = $last_name . ', ' . $first_name . ' ' . $middle_name;

            $present_counter = 0;
            $late_counter = 0;
            $absent_counter = 0;

            foreach($days as  $loop){
                $presentExist = Present::where('student_id',$student['user_id'])
                                        ->where('date',$loop)
                                        ->first();
                $lateExist = Late::where('student_id',$student['user_id'])
                                        ->where('date',$loop)
                                        ->first();
                if($presentExist){
                    $attendance_array[] = 1;
                }
                else if ($lateExist){
                    $attendance_array[] = 2;
                }
                else{
                    $attendance_array[] = 0;
                }
            }
            $male_attendance_array[] = array(
                'name' => $name,
                'attendance' => $attendance_array,
                'present_counter' => $present_counter,
                'late_counter' => $late_counter,
                'absent_counter' => $absent_counter
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
            ->where('section_id',$section->id)
            ->get();

        // to remove later
        $female_query_counter = User::join('Student', 'Student.user_id', '=', 'User.id')
            ->where('sex', 'F')
            ->where('section_id',$section->id)
            ->count();

        $female_attendance_array = array();
        $attendance_array = array();
        foreach($female_query as $student){

            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $middle_name = User::where('id',$student['user_id'])->value('middle_name');
            $name = $last_name . ', ' . $first_name . ' ' . $middle_name;

            $present_counter = 0;
            $late_counter = 0;
            $absent_counter = 0;

            foreach($days as  $loop){
                $presentExist = Present::where('student_id',$student['user_id'])
                    ->where('date',$loop)
                    ->first();
                $lateExist = Late::where('student_id',$student['user_id'])
                    ->where('date',$loop)
                    ->first();
                if($presentExist){
                    $attendance_array[] = 1;
                    $present_counter++;
                }
                else if ($lateExist){
                    $attendance_array[] = 2;
                    $late_counter++;
                }
                else{
                    $attendance_array[] = 0;
                    $absent_counter++;
                }
            }

            $female_attendance_array[] = array(
                'name' => $name,
                'attendance' => $attendance_array,
                'present_counter' => $present_counter,
                'late_counter' => $late_counter,
                'absent_counter' => $absent_counter
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

        //to get the total number of male absents per month
        $male_total_absent = 0;
        foreach ($male_attendance_array as $male_attendance) {
            $male_total_absent = $male_total_absent + $male_attendance['absent_counter'];
        }
        
        // to get the total number of male lates per month
        $male_total_late = 0;
        foreach ($male_attendance_array as $male_attendance) {
            $male_total_late = $male_total_late + $male_attendance['late_counter'];
        }

        // to get the total number of female absents per month
        $female_total_absent = 0;
        foreach ($female_attendance_array as $female_attendance) {
            $female_total_absent = $female_total_absent + $female_attendance['absent_counter'];
        }
        echo $female_total_absent;

        // to get the total number of female lates per month
        $female_total_late = 0;
        foreach ($female_attendance_array as $female_attendance) {
            $female_total_late = $female_total_late + $female_attendance['late_counter'];
        }

        $total_absent = $male_total_absent + $female_total_absent;
        $total_late = $male_total_late + $female_total_late;

        // echo $female_total_late;

        //var_dump($adviser);
        // var_dump($grade_level);
        // echo $male_query_counter;
        // echo $female_query_counter;
        // echo $male_query;
        // echo $female_query;
        // echo $male_attendance_array[1]['id'];

        // foreach ($male_attendance_array as $male_attendance) {
        //     echo $male_attendance['absent_counter'];
        // }
        
        return view('adviser.form2')
        -> with('month', $month)
        -> with('section_id', $section_id)
        -> with('grade_level', $grade_level)
        -> with('male_query', $male_query)
        -> with('female_query', $female_query)
        -> with('male_attendance_array', $male_attendance_array)
        -> with('female_attendance_array', $female_attendance_array)
        -> with('male_total_absent', $male_total_absent)
        -> with('female_total_absent', $female_total_absent)
        -> with('male_total_late', $male_total_late)
        -> with('female_total_late', $female_total_late)
        -> with('total_absent', $total_absent)
        -> with('total_late', $total_late);
    }
}
