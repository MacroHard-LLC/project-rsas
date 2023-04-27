<?php

namespace App\Http\Controllers;

use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Models\Subject_table;
use App\Models\User;
use App\Models\Schedule_table;
use App\Models\Machine_table;

class CreateSubject extends Controller
{
    function CreateSubjectIndex(){
        return view('subjects.viewsub', [
            'subjects' => Subject_table::latest('added_on')->filter(request(['grlvl']))->paginate(15)
        ]);
    }

    function CreateSubjectForm(){
        return view('subjects.newsub');
    }

    function CheckSubIdExist(Request $request){
        $incoming_id = $request->input_data;
        $isUserSuccess = Subject_table::where('id','=',$incoming_id)->first();
        if ($isUserSuccess){
            return response()->json(['exists' => true]);
        }
        else{
            return response()->json(['exists' => false]);
        }
    }


    function DataInsert(Request $request){
        // copied from UserController
        $formFields = $request->validate([
            'sub_id' => ['required','unique:subject,id','integer','digits:5'],
            'sub_name' => ['required','min:1','max:50','regex:/^[0-9a-zA-Z_ ,.]*$/'],
            'grade_level' => 'required',
            'days' => 'required',
            'time_st' => ['required'],
            'time_end' => ['required'],
            'as_room' => ['required','min:1','max:20','regex:/^[0-9a-zA-Z_ ,.]*$/'],
            'year_st' => ['required'],
            'year_end' => ['required'],
        ]);



        $subject = new Subject_table;
        $subject->grade_level = $formFields['grade_level'];
        $subject->id = $formFields['sub_id'];
        $subject->name = $formFields['sub_name'];
        $subject->instructor_id = 0;
        $subject->room = $formFields['as_room'];
        $subject->year_start = new DateTime($formFields['year_st'].'-01-01');
        $subject->year_end = new DateTime($formFields['year_end'].'-12-31');
        $subject->added_on = now();
        $subject->added_by = 0;
        $subject->updated_on = now();
        $subject->updated_by = 0;
        $subject->is_deleted = 0;
        $subject->save();

        $machine = new Machine_table;
        $machine->room = $formFields['as_room'];
        $machine->status = 0;
        $machine->added_on = now();
        $machine->added_by = 0;
        $machine->updated_on = now();
        $machine->updated_by = 0;
        $machine->is_deleted = 0;
        $machine->save();

        $sched = new Schedule_table;
        $sched->subject_id = $formFields['sub_id'];
        $sched->grade_level = $formFields['grade_level'];
        $sched->day = $formFields['days'];
        $sched->time_start = $formFields['time_st'];
        $sched->time_end = $formFields['time_end'];
        $sched->added_on = now();
        $sched->added_by = 0;
        $sched->updated_on = now();
        $sched->updated_by = 0;
        $sched->is_deleted = 0;
        $sched->save();

        #$isUserSuccess = User_table::where('id','=',$instructor_id);

        // if($isInsertSuccess && $isSchedSuccess) echo '<h1>Create Subject Success</h1>';
       // else echo '<h1>Create Subject FAILED </h1>';*/
    //}
        echo('user sucess');
    }

    public function destroy(Request $request){
        // Subject_table::find($request->id)->update(['is_deleted' => 1]);
        Subject_table::where('id', $request->id)->delete();
        return back()->with('message', 'Subject deleted successfully');
    }
}
