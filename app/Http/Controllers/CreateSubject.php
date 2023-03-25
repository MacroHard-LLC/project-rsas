<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Subject_table; 
use App\Models\User_table;
use App\Models\Schedule_table; 
use App\Models\Machine_table;   

class CreateSubject extends Controller
{
    function CreateSubjectIndex(){
        return view('createsub');
    }


    function DataInsert(Request $request){
        #grade_level need input
        $grade_level = $request->input('grade_level');
        #instructor need input
        $instructor_id = 0; #temporary

        $id = $request->input('subj_id');
        $name = $request->input('subj_name');
        #dept_id is missing
        #$dept_id = $request->input('dept_id');
        #db is not string :adiksayo:
        $room = $request->input('as_room');

        //$sched_days = $request->input('sched_days');
        $time_start = $request->input('time_st');
        $time_end = $request->input('time_end');
        $year_start = Carbon::createFromDate($request->input('year_st'), 1, 1);
        $year_end = Carbon::createFromDate($request->input('year_end'), 1, 1);

        /*if (Subject_table::where('id', $id)->exists()) {
            echo '<script type="text/javascript">
                window.onload = function () { alert("Subject ID Already Exists"); } 
                </script>';
        } else {*/

        $isInsertSuccess = Subject_table::insert([
                                            'grade_level'=>$grade_level,
                                            'instructor_id'=>$instructor_id,
                                            'id'=>$id,
                                            'name'=>$name,
                                            'room'=>$room,                                            
                                            'year_start'=>$year_start->format('Y-m-d'),
                                            'year_end'=>$year_end->format('Y-m-d'),
                                            'added_on'=>now(),
                                            'added_by'=>0,
                                            'updated_on'=>now(),
                                            'updated_by'=>NULL,
                                            'is_deleted'=>0
                                        ]);

        $isMachineSuccess = Machine_table::insert([
                                            'room'=>$room,
                                            'status'=>0,
                                            'added_on'=>now(),
                                            'added_by'=>0,
                                            'updated_on'=>NULL,
                                            'updated_by'=>NULL,
                                            'is_deleted'=>0
        ]);

        $isSchedSuccess = Schedule_table::insert([

                                            'subject_id' => $id,
                                            'grade_level'=> $grade_level,
                                            //'day'=>$sched_days,
                                            'day'=>'MON',
                                            'time_start'=>$time_start,
                                            'time_end'=>$time_end,
                                            'added_on'=>now(),
                                            'added_by'=>0,
                                            'updated_on'=>now(),
                                            'updated_by'=>NULL,
                                            'is_deleted'=>0
        ]);

        #$isUserSuccess = User_table::where('id','=',$instructor_id);
        
        if($isInsertSuccess && $isSchedSuccess) echo '<h1>Create Subject Success</h1>';
        else echo '<h1>Create Subject FAILED </h1>';
    //}
    }
}
