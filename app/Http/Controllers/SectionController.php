<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    // Show list of grade levels
    public function index() {
        return view('levels.index');
    }

    // Show a section
    public function show($grade_level) {
        $section = Section::where('grade_level','=',$grade_level)->first();
        $students = Student::where('section_id','=',$section->id)->get();
        return view('levels.show', [
            'section' => $section,
            'students' => $students,
        ]);
    }

    function CreateSection(){
        return view('levels.newgrlvl');
    }

    function GetStudentName(Request $request){
        $incoming_id = $request->input_data;
        $first = User::where('id','=',$incoming_id)->value('first_name');
        $last = User::where('id','=',$incoming_id)->value('last_name');
        $nameID = $last . ", " . $first;
        $role = User::where('id','=',$incoming_id)->value('role');
        $doesExist = User::where('id','=',$incoming_id)->get();
        $isEnrolled = User::where('id','=',$incoming_id)->value('is_enrolled');
        # if the it is not a student or if it does not exist
        if (($role != 'student') || ($nameID == ', ') || ($doesExist->count()==0) || ($isEnrolled == 1)){
            return null;
        }
        return $nameID;
    }

    function DoesAdviserExist(Request $request){
        $incoming_id = $request->input_data;
        $doesExist = User::where('id','=',$incoming_id)->get();
        $role = User::where('id','=',$incoming_id)->value('role');
        if (($role == 'adviser') && ($doesExist->count() == 1)){
            return true;
        }
        return false;
    }

    function DoesSectionIdExist(Request $request){
        $incoming_id = $request->input_data;
        $doesExist = Section::where('id','=',$incoming_id)->get();
        if ($doesExist == true){
            return true;
        }
        return false;
    }

    function GetAllStudents(Request $request){
        $incoming_data = $request->input('input_data');
        $incoming_data = explode(',',$incoming_data);
        $lastName = $incoming_data[0];
        $firstName = "";
        $firstNameFlag = count($incoming_data) == 2;
        $results = "";
        if ($firstNameFlag){
            $firstName = $incoming_data[1];
            $firstName = ltrim($firstName,' ');
        };
        if($firstNameFlag){
            $query = User::where('last','=',$lastName)
                            ->where('first','=',$firstName)
                            ->where('role','=','student')
                            ->whereNull('is_enrolled')
                            ->get();
        }
        else{
            return '';
        }
        return $query->value('id');
    }

    function DataInsert(Request $request){
        $formFields = $request->validate([
            'adviser_id' => ['required','integer','digits:9','regex:/[0-9]+/'],
            'allStudentID' => 'required',
            'name' => 'required',
            'grade_level' => 'required',
        ]);

        // this is for the section table
        $addRow = new Section;
        $addRow->name = $formFields['name'];
        $addRow->grade_level = $formFields['grade_level'];
        $addRow->adviser_id = $formFields['adviser_id'];
        $addRow->save();

        $studentIds = $formFields['allStudentID'];

        // this is for the students
        foreach($studentIds as $studentID){
            User::where('id', $studentID)->update(['is_enrolled' => 1]);
        }

        User::where('id', $request->adviser_id)->update(['is_enrolled' => 1]);
    }
}
