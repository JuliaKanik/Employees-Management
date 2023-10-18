<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School; // Import the School model

class SchoolController extends Controller
{
    // Display a list of schools
    public function index()
{
    $schools = School::all();

    //dd($schools); // This will dump and die, showing the retrieved schools
    return view('schools.schools', ['schools' => $schools]);
}


    // Add more methods for creating, updating, and deleting schools as needed
}
