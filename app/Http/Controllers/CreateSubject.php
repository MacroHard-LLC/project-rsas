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
            'sub_name' => ['required','min:1','max:50','regex:/^[a-zA-Z\s]*$/'],
            'grade_level' => 'required',
            // days
            'time_st' => ['required'],
            'time_end' => ['required'],
            'as_room' => ['required','min:1','max:50','regex:/^[0-9a-zA-Z\s]*$/'],
            'year_st' => ['required'],
            'year_end' => ['required'],
        ]);
        

        
        $subject = new Subject_table;
        $subject->grade_level = $formFields['grade_level'];
        $subject->id = $formFields['sub_id'];
        $subject->name = $formFields['sub_name'];
        $subject->instructor_id = 0;
        $subject->room = $formFields['as_room'];
        $subject->year_start = new DateTime($formFields['year_st'].'-01-01');
        $subject->year_end = new DateTime($formFields['year_end'].'-12-31');
        $subject->added_on = now();
        $subject->added_by = 0;
        $subject->updated_on = now();
        $subject->updated_by = 0;
        $subject->is_deleted = 0;
        $subject->save();

        $machine = new Machine_table;
        $machine->room = $formFields['as_room'];
        $machine->status = 0;
        $machine->added_on = now();
        $machine->added_by = 0;
        $machine->updated_on = now();
        $machine->updated_by = 0;
        $machine->is_deleted = 0;
        $machine->save();

        $sched = new Schedule_table;
        $sched->subject_id = $formFields['sub_id'];
        $sched->grade_level = $formFields['grade_level'];
        // $sched->days = $formFields['days'];
        $sched->day = 'WED';
        $sched->time_start = $formFields['time_st'];
        $sched->time_end = $formFields['time_end'];
        $sched->added_on = now();
        $sched->added_by = 0;
        $sched->updated_on = now();
        $sched->updated_by = 0;
        $sched->is_deleted = 0;
        $sched->save();

        #$isUserSuccess = User_table::where('id','=',$instructor_id);
        
        // if($isInsertSuccess && $isSchedSuccess) echo '<h1>Create Subject Success</h1>';
       // else echo '<h1>Create Subject FAILED </h1>';*/
    //}
        echo('user sucess');
    }
}
