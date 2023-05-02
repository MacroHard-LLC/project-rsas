<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdviserViewController extends Controller
{
    function AdviserPage($id){
        $adviserId = $id;
        session()->put('adviser_id', $adviserId);
        return view('adviser.adviserpage');
    }

    function AttendancePage(){
        $adviserId = session()->get('adviser_id');
        return view('adviser.viewattendance', compact('adviserId'));
    }
}
