<?php

<<<<<<< HEAD
use App\Http\Controllers\CreateUser;
use App\Http\Controllers\CreateSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckSubjectIdValid;

=======
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
>>>>>>> 3600eee073e6af8eec89a19fef695f22ae2d89b8

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

<<<<<<< HEAD
Route::get('/createsub',[CreateSubject::class,'CreateSubjectIndex']);
Route::post('dataInsert',[CreateSubject::class, 'DataInsert'])->middleware(CheckSubjectIdValid::class);

Auth::routes();
=======
>>>>>>> 3600eee073e6af8eec89a19fef695f22ae2d89b8

// show users
// supposed to be '/users', but '/' will do for now
Route::get('/', [UserController::class, 'index'])->name('home');

// show create user form
Route::get('/users/create', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store'])->name('register');
