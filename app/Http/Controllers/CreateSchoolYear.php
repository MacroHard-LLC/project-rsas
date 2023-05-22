<?php

namespace App\Http\Controllers;

use App\Models\Schoolyear;

use Illuminate\Http\Request;

class CreateSchoolYear extends Controller
{
    function AddSchoolYear(Request $request){
        $start_year = $request->year_start;
        $end_year = $request->year_end;
        
        $schedule = New Schoolyear;
        $schedule->added_on = now();
        $schedule->start_year = $start_year;
        $schedule->end_year = $end_year;
        $schedule->save();
    }
}
