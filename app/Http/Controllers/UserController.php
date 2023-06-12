<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users
    public function index() {
        return view('users.index', [
            'users' => User::latest('added_on')->filter(request(['role']))->paginate(15)
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'id' => ['required','unique:user,id','integer','digits:9'],
            'password' => ['required','min:1','max:20'],
            'role' => 'required',
            'first_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'sex' => 'required',
        ]);

        if ($request->role == 'student')
            $request->validate(['rfid_number' => ['sometimes','unique:student,rfid_number','integer','digits_between:8,12']]);

        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        // Create user
        User::create($formFields);

        if ($request->rfid_number){
            $student = new Student;
            $student->rfid_number = $request->rfid_number;
            $student->user_id = $request->id;
            $student->save();
        }

        return back();
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $formFields = $request->validate([
            'id' => ['required',Rule::unique('user','id')->ignore($id),'integer','digits:9'],
            'password' => ['sometimes','min:1','max:20'],
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
        User::find($request->id)->delete();
        return back()->with('message', 'User deleted successfully');
    }


}
