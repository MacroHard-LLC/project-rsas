<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\Subject_table;
use App\Models\Machine_table;
use App\Models\Logsheet;

use App\Models\Present;
use App\Models\Late;
use App\Models\Absent;

use Carbon\Carbon;

use Illuminate\Http\Request;

class RFIDController extends Controller
{
    public function tap(Request $request)
    {
        // input from the rfid and machine id from RPi Machine
        $rfid = $request->input('rfid_number');
        $machine = $request->input('machine_id');

        // Check if RFID tag exists in the database
        $rfidExists = Student::where('rfid_number', $rfid)->where('role','student')->exists();

        // if it does exist
        if ($rfidExists) {
            // log sheet things - move this
            $logsheet = new Logsheet;
            $logsheet->time = now();
            $logsheet->rfid_number = $rfid;
            $logsheet->machine = $machine;
            $logsheet->save();

            // getting the thingies from time
            // $logsheet->time is problematic because I do not know how well it translate
            // the date since it has time
            $day_of_week = Carbon::parse($logsheet->time)->format('l');
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
            $subject_table = Subject_table::where('machine_id',$logsheet->machine)->get();
            foreach($subject_table as $subject){
                // get the day of the subject
                $current_sched = Schedule::where('subject_id',$subject->id)
                                        ->where('day',$day_of_week)->first();
                // if the current_sched exists, execute
                if($current_sched){
                    $sched_startTime = Carbon::createFromFormat('H:i:s',$current_sched->time_start);
                    $sched_endTime = Carbon::createFromFormat('H:i:s',$current_sched->time_end);

                    $now = Carbon::now();
                    
                    if($now->before($sched_startTime)){
                        $newRow = new Present;
                        $newRow->subject_id = $subject->id;
                        $newRow->date = now();

                        $student = Student::where('rfid_number',$rfid)->first();
                        $newRow->student_id = $student->id;
                        $newRow->save();
                    }
                    else if($now->between($sched_startTime,$sched_endTime)){
                        $newRow = new Late;
                        $newRow->subject_id = $subject->user_id;
                        $newRow->date = now();

                        $student = Student::where('rfid_number',$rfid)->first();
                        $newRow->student_id = $student->user_id;
                        $newRow->save();
                    }

                }
            };

            // Insert the timestamp into the attendance table
            DB::table('attendance')->insert([
                'rfid_tag' => $rfidTag,
                'timestamp' => now()
            ]);

            // Return a success response
            return response()->json(['message' => 'RFID tag tapped successfully']);
        }

        // Return a failure response
        return response()->json(['message' => 'RFID tag not found'], 404);
    }
}
