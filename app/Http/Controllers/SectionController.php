<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use App\Models\Schoolyear;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class SectionController extends Controller
{
    // Show list of grade levels
    public function index() {
        return view('sections.index');
    }

    // Show a section
    public function show($grade_level) {
        $section = Section::where('grade_level','=',$grade_level)->first();
        $students = Student::where('section_id','=',$section->id)->get();
        $schoolyears = Schoolyear::all();
        $unenrolled_students = User::where('role','=','student')->where('is_enrolled','=',0)->get();
        $unenrolled_advisers = User::where('role','=','adviser')->where('is_enrolled','=',0)->get();
        // $unenrolled_students = User::where(['role','=','student'],
        //     ['is_enrolled','=','0'],['is_deleted','=','0'])->get();
        return view('sections.show',
            compact('schoolyears','students','section','unenrolled_students','unenrolled_advisers'));
    }

    function store(Request $request){
        $formFields = $request->validate([
            'adviser_id' => ['required','exists:user,id'],
            'allStudentID' => ['required','array'],
            'allStudentID.*'  => ['required','distinct','exists:user,id'],
            'name' => ['required','max:50'],
            'grade_level' => ['required','integer','between:7,10'],
            'schoolyear_id' => ['required','exists:schoolyear,id'],
        ]);

        // this is for the section table
        $addRow = new Section;
        $addRow->name = $formFields['name'];
        $addRow->grade_level = $formFields['grade_level'];
        $addRow->adviser_id = $formFields['adviser_id'];
        $addRow->schoolyear_id = $formFields['schoolyear_id'];
        $addRow->save();

        $studentIds = $formFields['allStudentID'];

        // this is for the students
        foreach($studentIds as $studentID){
            User::where('id', $studentID)->update(['is_enrolled' => 1]);
            Student::where('user_id', $studentID)->update(['section_id' => $addRow->id]);
        }

        User::where('id', $request->adviser_id)->update(['is_enrolled' => 1]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $formFields = $request->validate([
            'id' => ['required',Rule::unique('user','id')->ignore($id),'integer','digits:9'],
            'password' => ['required','min:1','max:20'],
            'role' => 'required',
            'first_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'sex' => 'required',
        ]);

        if ($user->role == 'student'){
            $form_rfid_number = $request->validate([
                'rfid_number' => Rule::unique('student')->ignore($user->student->rfid_number, 'rfid_number'),
            ]);
        }

        if ($user->role == 'student' && $request->role != 'student'){
            Student::where('user_id', $id)->delete();
        } else if ($user->role != 'student' && $request->role == 'student'){
            info($user->role);
            $student = new Student;
            $student->rfid_number = $request->rfid_number;
            $student->user_id = $request->id;
            $student->save();
        } else if ($user->role == 'student' && $user->student->rfid_number != $request->rfid_number) {
            Student::where('user_id', $id)->update($form_rfid_number);
        }

        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        $user->update($formFields);

        return back();
    }

    public function destroy(Request $request){
        // User::find($request->id)->update(['is_deleted' => 1]);
        Section::find($request->id)->delete();
        return back();
    }
}
