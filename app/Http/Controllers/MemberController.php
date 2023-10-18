<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member; // Import the Member model
use App\Models\School;

class MemberController extends Controller
{
    // Display a list of members
    public function index()
    {
        $members = Member::all(); // Fetch members from the database
        return view('members.members', ['members' => $members]);
    }

    // Add more methods for creating, updating, and deleting members as needed
    public function create()
    {
        $schools = School::all(); // Retrieve the list of schools
        return view('members.create', compact('schools'));
    }
    
    public function store(Request $request)
    {
        // Validate the input
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'school_name' => 'required|exists:schools,SchoolName',
        ]);
    
        // Retrieve the school ID by matching the school name
        $schoolId = School::where('SchoolName', $request->input('school_name'))->value('id');
    
        if ($schoolId === null) {
            return redirect()->route('members.create')->with('error', 'School not found.');
        }
    
        // Create a new member with the found school_id
        Member::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'school_id' => $schoolId,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('members.create')->with('success', 'Member added successfully!');
    }
    

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    public function membersBySchool(School $school = null)
{
    if ($school) {
        // Build the query without executing it
        $query = Member::where('school_id', $school->id);

        // Execute the query and retrieve the members
        $members = $query->get();

        // Return the members as JSON data
        return response()->json($members);
    } else {
        // Handle the case when no school parameter is provided (e.g., in the /schools route)
        return response()->json(['message' => 'No school selected.']);
    }
}

}
