<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Schedule_table;
use App\Models\Subject_table;
use App\Models\Machine_table;
use App\Models\Student_logsheet;
use App\Models\Instructor_logsheet;
use App\Models\Instructor;
use App\Models\Present;
use App\Models\Late;

use Carbon\Carbon;

use Illuminate\Http\Request;

class RFIDController extends Controller
{
    public function tap(Request $request)
    {
        // input from the rfid and machine id from RPi Machine
        $rfid = $request->input('rfid_number');
        $machine = $request->input('machine_id');

        // Check if RFID tag exists in the student table
        $student = Student::where('rfid_number', $rfid)->first();

        // If RFID tag not found in the student table, check in the instructor table
        $instructor = null;
        if (!$student) {
            $instructor = Instructor::where('rfid_number', $rfid)->first();
        }

        // If the RFID tag doesn't belong to any student or instructor, handle the error case
        if (!$student && !$instructor){
            return response()->json(['message' => 'RFID tag not found'], 404);
        }

        // If the RFID tag belongs to an instructor, associate the instructor with the logsheet
        if ($instructor) {
            $logsheet = new Instructor_logsheet;
            $logsheet->machine_id = $machine;
            $logsheet->rfid_number = $instructor->rfid_number;
            // testing only
            $logsheet->save();
        }
        // If the RFID tag belongs to a student, associate the student with the logsheet
        else {
            $logsheet = new Student_logsheet;
            $logsheet->machine_id = $machine;
            $logsheet->rfid_number = $student->rfid_number;

            // getting the thingies from time
            // $logsheet->time is problematic because I do not know how well it translate
            // the date since it has time
            $now = Carbon::now();
            $day_of_week = Carbon::parse($now)->format('l');
            if($day_of_week == 'Monday'){
                $day_of_week = 'MON';
            }
            else if($day_of_week == 'Tuesday'){
                $day_of_week = 'TUE';
            }
            else if($day_of_week == 'Wednesday'){
                $day_of_week = 'WED';
            }
            else if($day_of_week == 'Thursday'){
                $day_of_week = 'THU';
            }
            else if($day_of_week == 'Friday'){
                $day_of_week = 'FRI';
            }

            // get all the subjects in the table with the same machine
            $subjects = Subject_table::where('machine_id',$logsheet->machine_id)->get();

            if (!$subjects)
                return response()->json(['message' => 'Machine is not registered to any subjects'], 400);

            foreach($subjects as $subject){
                // get the day of the subject
                $current_sched = Schedule_table::where('subject_id',$subject->id)
                                        ->where('day',$day_of_week)->first();
                // if the current_sched exists, execute
                if ($current_sched){
                    $sched_startTime = Carbon::createFromFormat('H:i:s',$current_sched->time_start);
                    $sched_endTime = Carbon::createFromFormat('H:i:s',$current_sched->time_end);

                    if($now->isBefore($sched_startTime))
                        $newRow = new Present;
                    else if($now->isBetween($sched_startTime,$sched_endTime))
                        $newRow = new Late;

                    $newRow->subject_id = $subject->id;
                    $newRow->date = $now;
                    $newRow->student_id = $student->id;
                    $newRow->save();

                    $logsheet->save();
                } else{
                    return response()->json(['message' => 'No scheduled class right now'], 400);
                }
            };
        }
        return response()->json(['message' => 'RFID tag tapped successfully'], 200);
    }
}
