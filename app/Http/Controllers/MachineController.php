<?php

namespace App\Http\Controllers;

use App\Models\Machine_table;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'status' => ['required','integer','between:0,1'],
            'room' => ['required','min:1','max:20','regex:/^[a-zA-Z0-9_\s]*$/'],
        ]);

        Machine_table::create($formFields);
    }
}
