<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Course;
use App\Models\User;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Inner join between majors, courses and users to obtain the name of the course and the user
        $groups = Group::join('courses', 'courses.id', '=', 'groups.courses_id')
            ->join('users', 'users.id', '=', 'groups.users_id')
            ->select('groups.*', 'courses.name as course_name', 'users.name as professor_name')
            ->paginate(10);

        $courses = Course::all();
        $users = User::all();
        return view('groups.index', compact('groups', 'courses', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
