<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule_table;

class CreateSched extends Controller
{
    function ScheduleInsert(Request $request){
        #grade_level need input
        $grade_level = 2;
        $subject_id = $request->input('subj_id');
        #dept_id is missing
        #$dept_id = $request->input('dept_id');
        

        $isInsertSuccess = Schedule_table::insert(['subject_id'=>$subject_id,
                                            'day'=>$day,
                                            'time_start'=>$time_start,
                                            'time_end'=>$time_end
                                        ]);
        
        #if($isInsertSuccess) echo '<h1>Create Subject Success</h1>';
        #else echo '<h1>Create Subject FAILED </h1>';
    }
}
