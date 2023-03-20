<?php

use App\Http\Controllers\CreateUser;
use App\Http\Controllers\CreateSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckSubjectIdValid;


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

Route::get('/',[CreateUser::class,'CreateUserIndex']);
Route::post('dataInsert',[CreateUser::class, 'DataInsert']);

Route::get('/createsub',[CreateSubject::class,'CreateSubjectIndex']);
//Route::post('/dataInsert', 'CreateSubject@DataInsert')->middleware('check-method');
Route::post('dataInsert',[CreateSubject::class, 'DataInsert'])->middleware(CheckSubjectIdValid::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
