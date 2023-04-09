<?php

namespace App\Http\Controllers;

use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Subject_table; 
use App\Models\User_table;
use App\Models\Schedule_table; 
use App\Models\Machine_table;   

class CreateSubject extends Controller
{
    function CreateSubjectIndex(){
        return view('subjects.index');
    }

    function CreateSubjectForm(){
        return view('subjects.create');
    }


    function DataInsert(Request $request){
        // copied from UserController
        $formFields = $request->validate([
            'sub_id' => ['required','unique:subject,id','integer','digits:5'],
            'sub_name' => ['required','min:1','max:50'],
            'grade_level' => 'required',
            // days
            'time_st' => 'required',
            'time_end' => 'required',
            'as_room' => ['required','min:1','max:50','regex:/^[a-zA-Z\s]*$/'],
            'year_st' => 'required',
            'year_end' => 'required',
        ]);
        
        $subject = new Subject_table;
        $subject->grade_level = $formFields['grade_level'];
        $subject->id = $formFields['sub_id'];
        $subject->name = $formFields['sub_name'];
        $subject->instructor_id = 0;
        $subject->room = $formFields['as_room'];
        $subject->year_start = new DateTime($formFields['year_st'].'-01-01');
        $date = DateTime::createFromFormat('Y-12-31', $formFields['year_end']);
        $subject->year_end = new DateTime($formFields['year_end'].'-12-31');
        $subject->added_on = now();
        $subject->added_by = 0;
        $subject->updated_on = now();
        $subject->updated_by = 0;
        $subject->is_deleted = 0;
        $subject->save();
        /*
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
        } else {

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
        else echo '<h1>Create Subject FAILED </h1>';*/
    //}
        echo('user sucess');
    }
}
