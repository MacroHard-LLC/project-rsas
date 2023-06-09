<?php

namespace App\Http\Controllers;

use App\Models\Section;

use App\Models\Instructor;
use App\Models\Schoolyear;
use Illuminate\Http\Request;
use App\Models\Machine_table;
use App\Models\Subject_table;
use App\Models\Schedule_table;
use Illuminate\Validation\Rule;

class CreateSubject extends Controller
{
    function CreateSubjectIndex(){
        $schoolyears = Schoolyear::all();
        $instructors = Instructor::all();
        $machines = Machine_table::all();
        $subjects = Subject_table::latest('added_on')->filter(request(['grlvl']))->paginate(15);
        return view('subjects.viewsub', compact('subjects','schoolyears','instructors','machines'));
    }

    function DataInsert(Request $request){
        $formFields = $request->validate([
            'id' => ['required','unique:subject,id','integer','digits:5'],
            'name' => ['required','min:1','max:50','regex:/^[0-9a-zA-Z_ ,.]{0,50}$/'],
            'grade_level' => ['required','integer','between:7,10'],
            'schoolyear_id' => ['required','exists:schoolyear,id'],
            'semester' => ['required','integer','between:1,2'],
            'machine_id' => ['required','exists:machine,id'],
            'instructor_rfid' => ['required','exists:instructor,rfid_number'],
        ]);

        Subject_table::create($formFields);
        $section_id = Section::where('schoolyear_id',$formFields['schoolyear_id'])
            ->where('grade_level',$formFields['grade_level'])->value('id');
        Subject_table::where('id', $formFields['id'])->update(['section_id' => $section_id]);

        $input_days = json_decode($request->days,true);
        foreach ($input_days as $key => $value) {
            $sched = new Schedule_table;
            $sched->subject_id = $formFields['id'];
            $sched->day = $value;
            if ($value == 'MON'){
                $sched->time_start = $request->MON_time_st;
                $sched->time_end = $request->MON_time_end;
            }
            else if($value == 'TUE'){
                $sched->time_start = $request->TUE_time_st;
                $sched->time_end = $request->TUE_time_end;
            }
            else if($value == 'WED'){
                $sched->time_start = $request->WED_time_st;
                $sched->time_end = $request->WED_time_end;
            }
            else if($value == 'THU'){
                $sched->time_start = $request->THU_time_st;
                $sched->time_end = $request->THU_time_end;
            }
            else if($value == 'FRI'){
                $sched->time_start = $request->FRI_time_st;
                $sched->time_end = $request->FRI_time_end;
            }
            $sched->save();
        }
    }

    public function update(Request $request, $id) {
        $subject = Subject_table::find($id);

        $formFields = $request->validate([
            'id' => ['required',Rule::unique('subject','id')->ignore($id),'integer','digits:5'],
            'name' => ['required','min:1','max:50','regex:/^[0-9a-zA-Z_ ,.]{0,50}$/'],
            'grade_level' => ['required','integer','between:7,10'],
            'schoolyear_id' => ['required','exists:schoolyear,id'],
            'semester' => ['required','integer','between:1,2'],
            'machine_id' => ['required','exists:machine,id'],
            'instructor_rfid' => ['required','exists:instructor,rfid_number'],
        ]);

        $inputDays = json_decode($request->days,true);
        $request->merge(["days" => $inputDays]);
        $formDays = $request->validate([
            'days' => ['required','array'],
            'days.*'  => ['required','distinct'],
        ]);

        $subject->update($formFields);
        $section_id = Section::where('schoolyear_id',$formFields['schoolyear_id'])
            ->where('grade_level',$formFields['grade_level'])->value('id');
        Subject_table::where('id', $formFields['id'])->update(['section_id' => $section_id]);

        $requestedDays = $formDays['days'];
        $currentSchedules = Schedule_table::where('subject_id',$subject->id)->get();
        foreach ($currentSchedules as $schedule){
            if (($key = array_search($schedule->day, $requestedDays)) !== false)
                unset($requestedDays[$key]);
            else
                $schedule->delete();
        }

        foreach ($requestedDays as $key => $value) {
            $sched = new Schedule_table;
            $sched->subject_id = $formFields['id'];
            $sched->day = $value;
            if ($value == 'MON'){
                $sched->time_start = $request->MON_time_st;
                $sched->time_end = $request->MON_time_end;
            }
            else if($value == 'TUE'){
                $sched->time_start = $request->TUE_time_st;
                $sched->time_end = $request->TUE_time_end;
            }
            else if($value == 'WED'){
                $sched->time_start = $request->WED_time_st;
                $sched->time_end = $request->WED_time_end;
            }
            else if($value == 'THU'){
                $sched->time_start = $request->THU_time_st;
                $sched->time_end = $request->THU_time_end;
            }
            else if($value == 'FRI'){
                $sched->time_start = $request->FRI_time_st;
                $sched->time_end = $request->FRI_time_end;
            }
            $sched->save();
        }
    }

    public function destroy(Request $request){
        // Subject_table::find($request->id)->update(['is_deleted' => 1]);
        Subject_table::where('id', $request->id)->delete();
        return back()->with('message', 'Subject deleted successfully');
    }
}
