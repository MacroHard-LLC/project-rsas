<?php

namespace App\Http\Controllers;

use App\Models\Instructor;

use Illuminate\Http\Request;

class CreateInstructor extends Controller
{
    function AddInstructor(Request $request){
        $formField = $request->validate([
            'rfid_number' => ['required','unique:instructor,rfid_number','integer','digits:10']
        ]);

        Instructor::create($formField);
    }
}
