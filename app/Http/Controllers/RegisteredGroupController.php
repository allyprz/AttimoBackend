<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import models
use App\Models\Group;
use App\Models\ActivitiesGroup;
use App\Models\Activity;
use App\Models\UsersGroup;

class RegisteredGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get all groups and gets the course name and description
        $groups = Group::select(
            'groups.id',
            'groups.number',
            'courses.description as description',
            'courses.image as image',
            'courses.name as name'
        )
            ->join('courses', 'groups.courses_id', '=', 'courses.id')
            ->get();

        //Calculate the progress of the group by the total percent of the activities
        foreach ($groups as $group) {
            // Concatenate the image URL
            $group->image = "http://AttimoBackend.test/images/" . $group->image;

            $activities = ActivitiesGroup::where('groups_id', $group->id)->pluck('activities_id')->toArray();
            $totalPercent = Activity::whereIn('id', $activities)->sum('percent');
            $group->progress = (int)min($totalPercent, 100); // Ensure progress does not exceed 100%
        }

        return $groups;
    }

    public function showByUser($id){
        //Get all groups by user id in the UsersGroup table
        $groups = Group::select(
            'groups.id',
            'groups.number',
            'courses.description as description',
            'courses.image as image',
            'courses.name as name'
        )
            ->join('courses', 'groups.courses_id', '=', 'courses.id')
            ->join('users_groups', 'groups.id', '=', 'users_groups.groups_id')
            ->where('users_groups.users_id', $id)
            ->get();

        //Calculate the progress of the group by the total percent of the activities
        foreach ($groups as $group) {
            // Concatenate the image URL
            $group->image = "http://AttimoBackend.test/images/" . $group->image;

            $activities = ActivitiesGroup::where('groups_id', $group->id)->pluck('activities_id')->toArray();
            $totalPercent = Activity::whereIn('id', $activities)->sum('percent');
            $group->progress = (int)min($totalPercent, 100); // Ensure progress does not exceed 100%
        }

        return $groups;
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
    public function show($id)
    {
        //Get the group by id
        $group = Group::select(
            'groups.id',
            'groups.number',
            'groups.consultations as consultations',
            'courses.description as description',
            'courses.image as image',
            'courses.name as name',
            'courses.acronyms as acronym',
            'users.name as teacher_name',
            'users.lastname1 as teacher_lastname1',
            'users.lastname2 as teacher_lastname2',
            'users.email as teacher_email',
        )
            ->join('courses', 'groups.courses_id', '=', 'courses.id')
            ->join('users', 'groups.users_id', '=', 'users.id')
            ->where('groups.id', $id)
            ->get();

        foreach ($group as $gro) {
            $gro->image = "http://AttimoBackend.test/images/" . $gro->image;
        }

        if ($group) {
            return $group;
        } else {
            return "Group not found";
        }
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
