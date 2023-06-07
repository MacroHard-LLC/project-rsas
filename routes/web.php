<?php

use App\Http\Controllers\CreateUser;
use App\Http\Controllers\CreateSubject;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdviserViewController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CreateInstructor;
use App\Http\Controllers\CreateSchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckSubjectIdValid;

use App\Http\Controllers\UserController;
use App\Models\User;

use Barryvdh\DomPDF\Facade\PDF;

/*
For Technician
use App\Http\Controllers\CreateUser;
use App\Http\Controllers\CreateSubject;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController as TechHomeController

use App\Http\Middleware\CheckSubjectIdValid;
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// index - Show all [something]
// show - Show single [something]
// create - Show form to create new [something]
// store - Store new [something]
// edit - Show form to edit [something]
// update - Update [something]
// destroy - Delete [something]

// goes to the homepage
// remember that this needs to have an input added later so that we will know what
// kind of user access this

Route::get('/', [HomeController::class, 'LandingPage'] )->name('landingpage');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('adminhome');
        } elseif ($user->isAdviser()) {
            return redirect()->route('adviserhome', ['id' => $user->id]);
        } else {
            return redirect()->route('login')->with("error", "Access Denied");
        }
    })->name('home');

    //Routes for admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [HomeController::class, 'Homepage'])->name('adminhome');
    });
    //Route for adviser
    Route::middleware('role:adviser')->group(function () {
        Route::get('/adviser/{id}', [AdviserViewController::class, 'AdviserPage'] )->name('adviserhome');
    });
});



Route::get('/createsub',[CreateSubject::class,'CreateSubjectIndex']);
Route::post('dataInsert',[CreateSubject::class, 'DataInsert'])->middleware(CheckSubjectIdValid::class);

// create subject
Route::get('/subjects/create',[CreateSubject::class, 'CreateSubjectForm']);
Route::post('/subjects', [CreateSubject::class, 'DataInsert'])->name('register_sub');
Route::post('/subjects-check', [CreateSubject::class, 'CheckSubIdExist'])->name('check_id');

// create section
Route::post('/section-check-instruct',[CreateSubject::class, 'DoesInstructorIdExist'])->name('check_instruct_rfid');
Route::post('/section-get-schoolyear',[CreateSubject::class, 'GetAllSchoolyear'])->name('get_all_schoolyear');
Route::post('/gradelevels',[SectionController::class, 'store'])->name('create_section');
Route::put('/gradelevels/{section}', [SectionController::class, 'update']);

// Show Subjects
Route::get('/subjects', [CreateSubject::class, 'CreateSubjectIndex']);

// instructor
Route::post('/instructor/add',[CreateInstructor::class, 'AddInstructor'])->name('add_instructor');

// instructor
Route::post('/schoolyear/add',[CreateSchoolYear::class, 'AddSchoolYear'])->name('add_schoolyear');

// Delete Subject
Route::delete('/subjects', [CreateSubject::class, 'destroy'])->name('deleteSubject');


// show users
Route::get('/users', [UserController::class, 'index']);

// show create user form
Route::get('/users/create', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store'])->name('createUser');

// Update User
Route::put('/users/{id}', [UserController::class, 'update']);

// Delete User
Route::delete('/users', [UserController::class, 'destroy'])->name('deleteUser');

// Show list of grade levels
Route::get('/gradelevels', [SectionController::class, 'index']);

// Show a section
Route::get('/gradelevels/{grade}', [SectionController::class, 'show']);

// goes to adviser views
Route::get('/view-attendance', [AdviserViewController::class, 'AttendancePage'] );
Route::get('/student-info', [AdviserViewController::class, 'StudentPage'] );

//edit attendance in attendance page of adviser
Route::get('/edit', [AdviserViewController::class, 'EditAttendance'] );
Route::post('/view-attendance-start', [AdviserViewController::class, 'start'])->name('adviser_startup');
Route::post('/view-attendance-get-students', [AdviserViewController::class, 'GetAllStudents'])->name('get_all_students_adviser');
Route::post('/view-attendance-change', [AdviserViewController::class,'ChangeAttendance'])->name('change_attendance');
Route::post('/view-attendance-add-id', [AdviserViewController::class, 'StudentTag'])->name('add_id_edit_status');
Route::post('/view-attendance-setup', [AdviserViewController::class, 'SubjectSetup'])->name('setUp_subjects');


//Authentications
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');
Route::get('logout',[LoginController::class,'logout'])->name('logout');





//I tried to group them - Pris
//Route::resource('subjects', CreateSubject::class) -> only(['CreateSubjectForm', 'DataInsert', 'CheckSubIdExist']);

/*
Route::prefix('tech') -> middleware('is_tech' -> group(function) (){
    Route::get('home', [TechHomeController::class, 'index']); // Dashboard

    // Create Subject
    Route::get('/createsub',[CreateSubject::class,'CreateSubjectIndex']); // Create Subject
    Route::post('dataInsert',[CreateSubject::class, 'DataInsert'])->middleware(CheckSubjectIdValid::class); // Data Insert

    // create subject Form
    Route::get('/subjects/create',[CreateSubject::class, 'CreateSubjectForm']);
    Route::post('/subjects', [CreateSubject::class, 'DataInsert'])->name('register_sub');
    Route::post('/subjects-check', [CreateSubject::class, 'CheckSubIdExist'])->name('check_id');

    // show users
    Route::get('/users', [UserController::class, 'index']);

    // show create user form
    Route::get('/users/create', [UserController::class, 'create']);

    // create new user
    Route::post('/users', [UserController::class, 'store'])->name('createUser');

    // Show Edit User Form
    Route::get('/users/{id}/edit/', [UserController::class, 'edit']);
});

Route::prefix('admin' -> middleware('is_admin') ->group(function) (){
    Route::get('home'), [HomeController::class, 'index']);
})
*/
