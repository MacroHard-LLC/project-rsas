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

        //gets the number of male students that belong to the section
        $male_query = User::join('student', 'student.user_id', '=', 'user.id')
            // ->where('student.section_id', $section_id)
            ->where('sex', 'M')
            ->where('section_id',$section->id)
            ->get();

        // to remove later
        $male_query_counter = User::join('student', 'student.user_id', '=', 'user.id')
            ->where('sex', 'M')
            ->where('section_id',$section->id)
            ->count();

        // Get the current month and year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // Get the first and last day of the current month
        $firstDayOfMonth = Carbon::create($currentYear, $currentMonth, 1)->startOfMonth();
        $lastDayOfMonth = Carbon::create($currentYear, $currentMonth, 1)->endOfMonth();

        $init_dayOfWeek = $firstDayOfMonth->dayOfWeek;

        // Initialize an array to store the days
        $days = [];

        // Add dummy things depending on which day the start of the month
        for($i = 1; $i < $init_dayOfWeek; $i++){
            $days[] = 'x';
        }

        $daysLabel = []; // Label of the days i.e. M, W, F
        $daysNumber = []; // Label of the date i.e. 1 , 12, 23


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
        foreach($days as $loop){
            if($loop == 'x'){
                $daysLabel[] = 'x';
                $daysNumber[] = 'x';
            }
            else{
                $carbonDate = Carbon::parse($loop);
                $target_dayOfWeek = $carbonDate->dayOfWeek;
                $target_day = $carbonDate->day;
                $daysNumber[] = $target_day;
                if($target_dayOfWeek == 1){
                    $scape = 'M';
                }
                else if($target_dayOfWeek == 2){
                    $scape = 'T';
                }
                else if($target_dayOfWeek == 3){
                    $scape = 'W';
                }
                else if($target_dayOfWeek == 4){
                    $scape = 'Th';
                }
                else if($target_dayOfWeek == 5){
                    $scape = 'F';
                }
                $daysLabel[] = $scape;
            }
        }

        $male_attendance_array = array();
        $total_attendance_male = array_fill(0, count($days), 0);
        foreach($male_query as $student){
            $attendance_array = array();

            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $middle_name = User::where('id',$student['user_id'])->value('middle_name');
            $name = $last_name . ', ' . $first_name . ' ' . $middle_name;
            $counter = 0;

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
                    $total_attendance_male[$counter] += 1;
                    $present_counter++;
                }
                else if ($lateExist){
                    $attendance_array[] = 2;
                    $total_attendance_male[$counter] += 1;
                    $late_counter++;
                }
                else{
                    $attendance_array[] = 0;
                    $absent_counter++;
                }
                $counter += 1;
            }

            $male_attendance_array[] = array(
                'name' => $name,
                'attendance' => $attendance_array,
                'present_counter' => $present_counter,
                'late_counter' => $late_counter,
                'absent_counter' => $absent_counter,
                'is_enrolled' => User::where('id',$student['user_id'])->value('is_enrolled'),
            );
        }

        //gets the number of female students that belong to the section
        $female_query = User::join('student', 'student.user_id', '=', 'user.id')
            ->where('sex', 'F')
            ->where('section_id',$section->id)
            ->get();

        // to remove later
        $female_query_counter = User::join('student', 'student.user_id', '=', 'user.id')
            ->where('sex', 'F')
            ->where('section_id',$section->id)
            ->count();

        $female_attendance_array = array();
        $total_attendance_female = array_fill(0, count($days), 0);
        foreach($female_query as $student){
            $attendance_array = array();
            $first_name = User::where('id',$student['user_id'])->value('first_name');
            $last_name = User::where('id',$student['user_id'])->value('last_name');
            $middle_name = User::where('id',$student['user_id'])->value('middle_name');
            $name = $last_name . ', ' . $first_name . ' ' . $middle_name;

            $present_counter = 0;
            $late_counter = 0;
            $absent_counter = 0;

            $counter = 0;
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
                    $total_attendance_female[$counter] += 1;
                }
                else if ($lateExist){
                    $attendance_array[] = 2;
                    $late_counter++;
                    $total_attendance_female[$counter] += 1;
                }
                else{
                    $attendance_array[] = 0;
                    $absent_counter++;
                }
                $counter += 1;
            }

            $total_attendance = array_fill(0, count($days), 0);
            $counter = 0;
            foreach($total_attendance_male as $looper){
                $total_attendance[$counter] += $looper;
                $counter += 1;
            }
            $counter = 0;
            foreach($total_attendance_female as $looper){
                $total_attendance[$counter] += $looper;
                $counter += 1;
            }
            $female_attendance_array[] = array(
                'name' => $name,
                'attendance' => $attendance_array,
                'present_counter' => $present_counter,
                'late_counter' => $late_counter,
                'absent_counter' => $absent_counter,
                'is_enrolled' => User::where('id',$student['user_id'])->value('is_enrolled'),
            );

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

        // to get the total number of female lates per month
        $female_total_late = 0;
        foreach ($female_attendance_array as $female_attendance) {
            $female_total_late = $female_total_late + $female_attendance['late_counter'];
        }

        $total_absent = $male_total_absent + $female_total_absent;
        $total_late = $male_total_late + $female_total_late;

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
        -> with('total_late', $total_late)
        -> with('total_attendance_male', $total_attendance_male)
        -> with('total_attendance', $total_attendance)
        -> with('days', $days)
        -> with('daysLabel', $daysLabel)
        -> with('daysNumber', $daysNumber)
        -> with('total_attendance_female', $total_attendance_female);
    }
}
