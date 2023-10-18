<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These routes
| are loaded by the RouteServiceProvider and assigned to the "web" middleware group.
*/

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});

// Define routes for MemberController
Route::get('/members', 'App\Http\Controllers\MemberController@index');

// Add more routes for MemberController actions as needed (e.g., create, edit, delete)

// Define routes for SchoolController
Route::get('/schools', 'App\Http\Controllers\SchoolController@index')->name('schools.index');
Route::get('/schools/{school}/members', [MemberController::class, 'membersBySchool'])->name('members.bySchool');


Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members', [MemberController::class, 'index'])->name('members.index'); // View a list of members
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');





