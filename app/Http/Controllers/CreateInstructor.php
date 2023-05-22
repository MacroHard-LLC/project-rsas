<?php

namespace App\Http\Controllers;

use App\Models\Instructor;

use Illuminate\Http\Request;

class CreateInstructor extends Controller
{
    function AddInstructor(Request $request){
        $incoming_id = $request->rfid_number;
        $formField = $request->validate([
            'rfid_number' => ['required','unique:instructor,rfid_number','integer','digits:10']
        ]);

        Instructor::create($formField);

        // $instructor = New Instructor;
        // $instructor->added_on = now();
        // $instructor->rfid_number = $incoming_id;
        // $instructor->save();
    }
}
