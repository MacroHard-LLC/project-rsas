<?php

namespace App\Http\Controllers;

use App\Models\Schoolyear;
use Illuminate\Http\Request;

class CreateSchoolYear extends Controller
{
    function AddSchoolYear(Request $request){
        $formFields = $request->validate([
            'start_year' => ['required','regex:/^(19|20)\d{2}$/','integer','digits:4'],
            'end_year' => ['required','regex:/^(19|20)\d{2}$/','integer','digits:4'],
        ]);

        Schoolyear::create($formFields);
    }
}
