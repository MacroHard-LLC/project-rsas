<?php

use App\Http\Controllers\CreateUser;
use App\Http\Controllers\CreateSubject;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckSubjectIdValid;

use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/createsub',[CreateSubject::class,'CreateSubjectIndex']);
Route::post('dataInsert',[CreateSubject::class, 'DataInsert'])->middleware(CheckSubjectIdValid::class);

// create subject
Route::get('/subjects/create',[CreateSubject::class, 'CreateSubjectForm']);
Route::post('/subjects', [CreateSubject::class, 'DataInsert'])->name('register_sub');
Route::post('/subjects-check', [CreateSubject::class, 'CheckSubIdExist'])->name('check_id');

// create section
Route::get('/section/create',[SectionController::class, 'CreateSection']);
Route::post('/section-request', [SectionController::class, 'GetStudentName'])->name('get_name_data');
Route::post('/section-adviser-request', [SectionController::class, 'DoesAdviserExist'])->name('get_adviser_id');
Route::post('/section-get-students', [SectionController::class, 'GetAllStudents'])->name('get_all_students');
Route::post('/section/register',[SectionController::class, 'DataInsert'])->name('register_section');
// Show Subjects
Route::get('/subjects', [CreateSubject::class, 'CreateSubjectIndex']);

// Delete Subject
Route::delete('/subjects', [CreateSubject::class, 'destroy'])->name('deleteSubject');

// goes to the homepage
// remember that this needs to have an input added later so that we will know what
// kind of user access this
Route::get('/home', [HomeController::class, 'Homepage']);

// show users
Route::get('/users', [UserController::class, 'index']);

// show create user form
Route::get('/users/create', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store'])->name('createUser');

// Show Edit User Form
Route::get('/users/{id}/edit/', [UserController::class, 'edit']);
// Route::get('/users/{user}/edit/', [UserController::class, 'edit']);

// Update User
Route::put('/users/{id}', [UserController::class, 'update']);

// Delete User
Route::delete('/users', [UserController::class, 'destroy'])->name('deleteUser');

// Show list of grade levels
Route::get('/gradelevels', [SectionController::class, 'index']);

// Show a section
Route::get('/gradelevels/{grade}', [SectionController::class, 'show']);
