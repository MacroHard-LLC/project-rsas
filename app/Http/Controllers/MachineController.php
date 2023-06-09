<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Machine_table;
use App\Models\Subject_table;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MachineController extends Controller
{

    // Show all users // to be updated to group to sections
    public function index() {
        return view('users.index', [
            'users' => User::latest('added_on')->filter(request(['role']))->paginate(15)
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'grade_num' => ['required','unique:grade_num,id','integer','digits:3'],
            'user_id' => ['required','exists:user.id','integer','digits:9'],
        ]);

        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        User::create($formFields);

        return redirect('/')->with('message', 'Section created successfully!');
    }

    public function update(Request $request, $id) {
        $formFields = $request->validate([
            'grade_num' => ['required',Rule::unique('user_id','id')->ignore($id),'integer','digits:9'],
            'grade_num' => ['required','unique:grade_id,id','integer','digits:3'],
            'user_id' => ['required','exists:id','integer','digits:9'],
        ]);

        User::find($id)->update($formFields);

        return back()->with('message', 'Section updated successfully!');
    }

    public function destroy(Request $request){
        // User::find($request->id)->update(['is_deleted' => 1]);
        User::find($request->id)->delete();
        return back()->with('message', 'Section deleted successfully');
    }

    public function AddMachine(Request $request){
        //var_dump($request->input('room'),$request->input('role'));
        $incoming_data = $request;

        $machine = new Machine_table;
        $machine->status = $incoming_data->input('role');
        $machine->room = $incoming_data->input('room');
        $machine->save();
        return back();

    }
}
