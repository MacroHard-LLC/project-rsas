<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdviserViewController extends Controller
{
    function AdviserPage(){
        return view('adviser.adviserpage');
    }

    function AttendancePage(){
        return view('adviser.viewattendance');
    }
}
