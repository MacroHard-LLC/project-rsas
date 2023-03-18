<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


// show users
// supposed to be '/users', but '/' will do for now
Route::get('/', [UserController::class, 'index']);

// show create user form
Route::get('/users/create', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store']);
