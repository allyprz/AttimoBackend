<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\DB;

//Models that are always used
use App\Models\Activity;
use App\Models\CategoriesActivity;
use App\Models\LabelsActivity;
use App\Models\User;
use App\Models\StatusActivity;
use App\Models\ActivitiesUser;

//Models that are used if category==major
use App\Models\Major;
use App\Models\MajorsUser;
use App\Models\ActivitiesMajor;

//Models that are used if category==course
use App\Models\Group;
use App\Models\ActivitiesGroup;
use App\Models\UsersGroup;

//Models that are used if category==students

//Models that are used if category==university

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Activity::all();
        $categories = CategoriesActivity::all();
        $labels = LabelsActivity::all();
        return view('activities.index', compact('results', 'categories', 'labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoriesActivity::all();
        $labels = LabelsActivity::all();
        $groups = Group::all();
        $majors = Major::all();

        // Inner join between groups and courses
        $groups = Group::select(
            'groups.id',
            'courses.name as course_name',
            'groups.number'
        )
            ->join('courses', 'groups.courses_id', '=', 'courses.id')
            ->get();

        return view('activities.create', compact('categories', 'labels', 'groups', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // If the label is not "homework", the percent is 0
        if ($request->label_id != 2) {
            $request->merge(['percent' => 0]);
        }

        // Combine the date with the time to create scheduled_at
        $scheduled_at = $request->date . ' ' . $request->time;

        if ($scheduled_at < now()) {
            $status_id = 2; // Inactive, the activity is in the past
        } else {
            $status_id = 1; // Active, the activity is in the future
        }

        // Create the activity
        $activity = Activity::create([
            'name' => $request->name,
            'image' => "image.jpg",
            'description' => $request->description,
            'scheduled_at' => $scheduled_at, // Corregido aquí
            'percent' => $request->percent,
            'categories_activities_id' => $request->category_id, // Corregido aquí
            'labels_activities_id' => $request->label_id,
            'status_activities_id' => $status_id,
        ]);


        // Retrieve the ID of the newly created activity
        $activity_id = $activity->id;

        switch ($request->category_id) {
                // Category == course
            case 1:
                //Associate the activity with the group
                ActivitiesGroup::create([
                    'activities_id' => $activity_id,
                    'groups_id' => $request->group_id,
                ]);

                // Obtain the students/teacher of the group
                $user_ids = UsersGroup::where('groups_id', $request->group_id)->pluck('users_id');

                // Associate the activity for each student/teacher
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user_id,
                    ]);
                }
                break;

                // Category == university
            case 2:
                // Obteins all the users
                $users = User::all();

                // Associate the activity for each student/teacher
                foreach ($users as $user) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user->id,
                    ]);
                }
                break;

                // Category 3 == students
            case 3:
                // Obtiene todos los estudiantes (users con users_types_id == 1)
                $students = User::where('users_types_id', 1)->get();

                // Asocia la actividad con cada estudiante
                foreach ($students as $student) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $student->id,
                    ]);
                }
                break;

                // Category 4 == major
            case 4:
                // Associate the activity with the major
                ActivitiesMajor::create([
                    'activities_id' => $activity_id,
                    'majors_id' => $request->major_id,
                ]);

                // Obtain all the students/teachers/admins of the major
                $users = MajorsUser::where('majors_id', $request->major_id)
                    ->pluck('users_id');

                // Associate the activity for each student/teacher/admin
                foreach ($users as $user_id) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user_id,
                    ]);
                }
                break;


            default:
                // Default case
                break;
        }
        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
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
