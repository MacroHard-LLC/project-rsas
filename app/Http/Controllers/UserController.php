<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'first' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'gender' => 'required',
        ]);

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        User::create($formFields);

        return redirect('/')->with('message', 'User created successfully!');
    }

    public function update(Request $request, $id) {
        $formFields = $request->validate([
            'id' => ['required',Rule::unique('user','id')->ignore($id),'integer','digits:9'],
            'password' => ['required','min:1','max:20'],
            'role' => 'required',
            'first' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'middle' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'last' => ['required','min:1','max:20','regex:/^[a-zA-Z\s]*$/'],
            'gender' => 'required',
        ]);

        User::find($id)->update($formFields);

        return back()->with('message', 'User updated successfully!');
    }

    public function destroy(User $user){
        // $user->update(['is_deleted' => 1]);
        $user->delete();
        return back()->with('message', 'User deleted successfully');
    }
}
