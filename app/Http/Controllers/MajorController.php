<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Major;
use App\Models\Course;
use App\Models\MajorsUser;
use App\Models\User;
use App\Models\UsersType;
use App\Models\Activity;
use App\Models\ActivitiesMajor;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Major::paginate(10);
        $users = User::all(); 
        return view('majors.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all();

        //Inner join between users and users_types to obtain users_types name
        $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();

        return view('majors.create', compact('majors', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10', 
            'users_id' => 'required|integer|exists:users,id', //coordinator
            'student_ids' => 'nullable|array',
            'student_ids.*' => 'integer|exists:users,id',
        ]);
    
        $major = new Major();
        $major->name = $validatedData['name'];
        $major->code = $validatedData['code'];
        $major->users_id = $validatedData['users_id']; //coordinator
        $major->save();

        //Assign the major to all admins
        $usersWithTypeOne = User::where('users_types_id', 3)->get(); 
        foreach ($usersWithTypeOne as $user) {
            MajorsUser::create([
                'users_id' => $user->id, 
                'majors_id' => $major->id, 
            ]);
        }

        //Assign the major to selected students
        if (!empty($validatedData['student_ids'])) {
            foreach ($validatedData['student_ids'] as $studentId) {
                MajorsUser::create([
                    'users_id' => $studentId,
                    'majors_id' => $major->id,
                ]);
            }
        }

        return redirect()->route('majors.index')->with('success', 'Major registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $major = Major::with('students')->find($id);
        $major = Major::select(
            'majors.id as major_id',
            'majors.name as major_name',
            'majors.code as major_code',
            'users.name as coordinator_name',
            'users.lastname1 as coordinator_lastname1',
            'users.lastname2 as coordinator_lastname2',
            'users.id as coordinator_id'
        )
        ->join('users', 'majors.users_id', '=', 'users.id')
        ->where('majors.id', $id)
        ->first();

        if (!$major) {
            return redirect()->route('majors.index')->with('error', 'Major not found.');
        }
        $students = User::join('majors_users', 'users.id', '=', 'majors_users.users_id')
        ->join('users_types', 'users_types.id', '=', 'users.users_types_id')
        ->where('majors_users.majors_id', $id)
        ->select('users.*', 'users_types.name as users_types_name')
        ->get();
    
        return view('majors.show', compact('major', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::with('students')->find($id);
        $major = Major::find($id);
        if (!$major) {
            return redirect()->route('majors.index')->with('error', 'Major not found.');
        }

        $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();

        return view('majors.edit', compact('major', 'users'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $major = Major::find($id);
        if (!$major) {
            return redirect()->route('majors.index')->with('error', 'Major not found.');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'users_id' => 'required|exists:users,id', // Coordinator
            'student_ids' => 'nullable|array',
            'student_ids.*' => 'integer|exists:users,id',
        ]);

        $major->name = $validatedData['name'];
        $major->code = $validatedData['code'];
        $major->users_id = $validatedData['users_id'];
        $major->save();

        // Assign the major to selected students if there are changes
        if (isset($validatedData['student_ids'])) {
            $major->students()->detach();
            $major->students()->attach($validatedData['student_ids']);
        }
        return redirect()->route('majors.index')->with('success', 'Major updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $major = Major::find($id);
        if ($major) {

            // Delete all activities associated with the major
            $activityIds = ActivitiesMajor::where('majors_id', $id)->pluck('activities_id')->toArray();
            Activity::whereIn('id', $activityIds)->delete();
            ActivitiesMajor::where('majors_id', $id)->delete(); 

            // Delete the major
            $major->delete();
            return redirect()->route('majors.index')->with('success', 'Major and associated activities deleted successfully.');
             
        }else{
            return redirect()->route('majors.index')->with('error', 'Major not found.');
        }
    }
}