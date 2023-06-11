<?php

namespace App\Http\Controllers;

use App\Models\Instructor;

use Illuminate\Http\Request;

class CreateInstructor extends Controller
{
    function AddInstructor(Request $request){
        $formFields = $request->validate([
            'rfid_number' => ['required','unique:instructor,rfid_number','integer','digits_between:8,12'],
            'first_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
        ]);

        Instructor::create($formFields);
    }
}
