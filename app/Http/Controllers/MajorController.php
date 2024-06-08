<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Major;
use App\Models\Course;
use App\Models\User;
use App\Models\UsersType;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Major::paginate(10);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Look for the major
        $major = Major::find($id);

        //Delete the major
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully.');
    }
}
