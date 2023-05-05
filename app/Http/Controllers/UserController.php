<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;

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

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

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
        $formFields = $request->validate([
            'id' => ['required',Rule::unique('user','id')->ignore($id),'integer','digits:9'],
            'password' => ['required','min:1','max:20'],
            'role' => 'required',
            'first_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last_name' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'sex' => 'required',
        ]);

        $user = User::find($id)->first();
        // info($user);
        if ($user->role == 'student' && $request->role != 'student'){
            info($user);
            dd($user);
            info(Student::where('user_id', $id)->delete());
        } else if ($user->role != 'student' && $request->role == 'student'){
            $student = new Student;
            $student->rfid_number = $request->rfid_number;
            $student->user_id = $request->id;
            $student->save();
        }

        User::find($id)->update($formFields);
        // $user->update($formFields);

        return back();
    }

    public function destroy(Request $request){
        // User::find($request->id)->update(['is_deleted' => 1]);
        User::find($request->id)->delete();
        return back()->with('message', 'User deleted successfully');
    }
}
