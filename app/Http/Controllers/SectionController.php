<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    function CreateSection(){
        return view('levels.newgrlvl');
    }
}
