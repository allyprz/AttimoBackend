<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

//Models that are always used
use App\Models\Activity;
use App\Models\CategoriesActivity;
use App\Models\LabelsActivity;
use App\Models\StatusActivity;
use App\Models\User;
use App\Models\ActivitiesUser;

//Models that are used if category==major
use App\Models\Major;
use App\Models\MajorsUser;
use App\Models\ActivitiesMajor;

//Models that are used if category==course
use App\Models\Group;
use App\Models\ActivitiesGroup;
use App\Models\UsersGroup;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $results = Activity::all();
        $results = Activity::paginate(10);
        $categories = CategoriesActivity::all();
        $labels = LabelsActivity::all();
        $status = StatusActivity::all();
        return view('activities.index', compact('results', 'categories', 'labels', 'status'));
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
        $scheduled_at = new \DateTime($request->date . ' ' . $request->time);

        if ($scheduled_at <= now()) {
            $status_id = 2; // Inactive, the activity is in the past
        } else {
            $status_id = 1; // Active, the activity is in the future
        }

        // Create the activity
        $activity = Activity::create([
            'name' => $request->name,
            'image' => "defaultImage.jpg",
            'description' => $request->description,
            'scheduled_at' => $scheduled_at,
            'percent' => $request->percent,
            'categories_activities_id' => $request->category_id,
            'labels_activities_id' => $request->label_id,
            'status_activities_id' => $status_id,
        ]);

        // Retrieve the ID of the newly created activity
        $activity_id = $activity->id;

        if ($request->hasFile('image')) {
            //Store the image with the activity ID in the file name
            $image = $request->file('image');
            $filename = 'activity_' . $activity_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);

            // Update the activity with the image name
            $activity->update(['image' => $filename]);
        }

        switch ($request->category_id) {
                // Category 1 == course
            case 1:
                //Associate the activity with the group
                ActivitiesGroup::create([
                    'activities_id' => $activity_id,
                    'groups_id' => $request->group_id,
                ]);

                // Obtain the users of the group
                $user_ids = UsersGroup::where('groups_id', $request->group_id)->pluck('users_id');

                // Associate the activity for each user
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user_id,
                    ]);
                }
                break;

                // Category 2 == university
            case 2:
                // Obteins all the users
                $users = User::all();

                // Associate the activity for each user
                foreach ($users as $user) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user->id,
                    ]);
                }
                break;

                // Category 3 == students
            case 3:
                // Obtain all students (users with users_types_id == 1)
                $students = User::where('users_types_id', 1)->get();

                // Associate the activity with each student
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
                break;
        }
        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Look for the activity
        $activity = Activity::select(
            'activities.id',
            'activities.name as name',
            'activities.description',
            'activities.image',
            'activities.percent',
            'activities.scheduled_at',
            'activities.categories_activities_id',
            'categories_activities.name as category_name',
            'labels_activities.name as label_name'
        )
            ->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id')
            ->where('activities.id', $id)
            ->first();

        $groupDetails = null;
        $major = null;

        switch ($activity->categories_activities_id) {
            case 1: // Category 1 == course
                $groupActivity = ActivitiesGroup::where('activities_id', $id)->first();
                if ($groupActivity) {
                    $groupDetails = Group::select(
                        'courses.name as course_name',
                        'groups.number as group_number'
                    )
                        ->join('courses', 'groups.courses_id', '=', 'courses.id')
                        ->where('groups.id', $groupActivity->groups_id)
                        ->first();
                }
                break;

            case 4: // Category 4 == major
                $majorActivity = ActivitiesMajor::where('activities_id', $id)->first();
                if ($majorActivity) {
                    $major = Major::find($majorActivity->majors_id)->name;
                }
                break;
        }

        return view('activities.show', compact('activity', 'groupDetails', 'major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Look for the activity
        $activity = Activity::find($id);

        // Look for the categories, labels, majors and groups
        $categories = CategoriesActivity::all();
        $labels = LabelsActivity::all();
        $majors = Major::all();

        $groups = Group::select(
            'groups.id',
            'groups.number',
            'courses.name as course_name'
        )
            ->join('courses', 'groups.courses_id', '=', 'courses.id')
            ->get();

        $groupDetails = null;
        $activityMajor = null;

        switch ($activity->categories_activities_id) {
            case 1: // Category 1 == course
                $groupActivity = ActivitiesGroup::where('activities_id', $id)->first();
                if ($groupActivity) {
                    $groupDetails = Group::select(
                        'groups.id',
                        'groups.number',
                        'courses.name as course_name'
                    )
                        ->join('courses', 'groups.courses_id', '=', 'courses.id')
                        ->where('groups.id', $groupActivity->groups_id)
                        ->first();
                }
                break;

            case 4: // Category 4 == major
                $majorActivity = ActivitiesMajor::where('activities_id', $id)->first();
                if ($majorActivity) {
                    $activityMajor = Major::find($majorActivity->majors_id);
                }
                break;
        }
        return view('activities.edit', compact('activity', 'categories', 'labels', 'groups', 'majors', 'groupDetails', 'activityMajor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Look for the activity
        $activity = Activity::find($id);

        if ($activity) {
            // Check if image was uploaded
            if ($request->image != null) {
                // Check if the old image exists and delete it
                $image_to_remove = 'images/' . $activity->image;
                if (File::exists($image_to_remove)) {
                    File::delete($image_to_remove);
                }

                // Store the new image with the activity ID in the file name
                $image = $request->file('image');
                $filename = 'activity_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
            } else {
                $filename = $request->old_image;
            }

            // If the category of the activity has changed
            if ($activity->categories_activities_id != $request->category_id) {
                // 1. Delete the old associations
                switch ($request->old_category_id) {
                    case 1: // Category 1 == course
                        // Delete the association of the activity with the old group
                        ActivitiesGroup::where('activities_id', $activity->id)
                            ->where('groups_id', $request->old_group_id)
                            ->delete();

                        // Obtain the users of the group and delete the association of the activity for each user
                        $user_ids = UsersGroup::where('groups_id', $request->old_group_id)->pluck('users_id');

                        foreach ($user_ids as $user_id) {
                            ActivitiesUser::where('activities_id', $activity->id)
                                ->where('users_id', $user_id)
                                ->delete();
                        }
                        break;

                    case 2: // Category 2 == university
                        //Delete the association of the activity with all users
                        ActivitiesUser::where('activities_id', $activity->id)->delete();
                        break;

                    case 3: // Category 3 == students
                        //Obtain all students (users with users_types_id == 1) and delete the association of the activity with each student
                        $students = User::where('users_types_id', 1)->get();

                        foreach ($students as $student) {
                            ActivitiesUser::where('activities_id', $activity->id)
                                ->where('users_id', $student->id)
                                ->delete();
                        }
                        break;

                    case 4: // Category 4 == major
                        //Delete the association of the activity with the old major
                        ActivitiesMajor::where('activities_id', $activity->id)
                            ->where('majors_id', $request->old_major_id)
                            ->delete();

                        // Obtain all the users of the major and delete the association of the activity for each user
                        $users = MajorsUser::where('majors_id', $request->old_major_id)
                            ->pluck('users_id');

                        foreach ($users as $user_id) {
                            ActivitiesUser::where('activities_id', $activity->id)
                                ->where('users_id', $user_id)
                                ->delete();
                        }
                        break;

                    default:
                        break;
                }

                // 2. Create the new associations
                switch ($request->category_id) {
                    case 1: // Category 1 == course
                        // Associate the activity with the new group
                        ActivitiesGroup::create([
                            'activities_id' => $activity->id,
                            'groups_id' => $request->group_id,
                        ]);

                        // Obtain the users of the group and associate the activity for each user
                        $user_ids = UsersGroup::where('groups_id', $request->group_id)->pluck('users_id');

                        foreach ($user_ids as $user_id) {
                            ActivitiesUser::create([
                                'activities_id' => $activity->id,
                                'users_id' => $user_id,
                            ]);
                        }
                        break;

                    case 2: // Category 2 == university
                        // Obtain all users and associate the activity for each user
                        $users = User::all();

                        foreach ($users as $user) {
                            ActivitiesUser::create([
                                'activities_id' => $activity->id,
                                'users_id' => $user->id,
                            ]);
                        }
                        break;

                    case 3: // Category 3 == students
                        // Obtain all students (users with users_types_id == 1) and associate the activity with each student
                        $students = User::where('users_types_id', 1)->get();

                        foreach ($students as $student) {
                            ActivitiesUser::create([
                                'activities_id' => $activity->id,
                                'users_id' => $student->id,
                            ]);
                        }
                        break;

                    case 4: // Category 4 == major
                        // Associate the activity with the new major
                        ActivitiesMajor::create([
                            'activities_id' => $activity->id,
                            'majors_id' => $request->major_id,
                        ]);

                        // Obtain all the students/teachers/admins of the major and associate the activity for each student/teacher/admin
                        $users = MajorsUser::where('majors_id', $request->major_id)
                            ->pluck('users_id');

                        foreach ($users as $user_id) {
                            ActivitiesUser::create([
                                'activities_id' => $activity->id,
                                'users_id' => $user_id,
                            ]);
                        }
                        break;
                    default:
                        break;
                }
            } else {
                // If the category of the activity has not changed, verify if the group/major has changed

                //Look for the group/major of the activity (ActivitiesGroup/ActivitiesMajor: matches activites_id) and change the group/major if it has changed
                if ($request->category_id == 1) {
                    $groupActivity = ActivitiesGroup::where('activities_id', $id)->first();
                    if ($groupActivity->groups_id != $request->group_id) {
                        ActivitiesGroup::where('activities_id', $activity->id)
                            ->update(['groups_id' => $request->group_id]);
                    }
                } else if ($request->category_id == 4) {
                    $majorActivity = ActivitiesMajor::where('activities_id', $id)->first();
                    if ($majorActivity->majors_id != $request->major_id) {
                        ActivitiesMajor::where('activities_id', $activity->id)
                            ->update(['majors_id' => $request->major_id]);
                    }
                }
            }

            //If the label is not "homework", the percent is 0
            if ($request->label_id != 2) {
                $request->merge(['percent' => 0]);
            }

            // Combine the date with the time to create scheduled_at
            $scheduled_at = new \DateTime($request->date . ' ' . $request->time);

            if ($scheduled_at <= now()) {
                $status_id = 2; // Inactive, the activity is in the past
            } else {
                $status_id = 1; // Active, the activity is in the future
            }

            // Update activity
            $activity->update([
                'name' => $request->name,
                'image' => $filename,
                'description' => $request->description,
                'scheduled_at' => $scheduled_at,
                'percent' => $request->percent,
                'categories_activities_id' => $request->category_id,
                'labels_activities_id' => $request->label_id,
                'status_activities_id' => $status_id,
            ]);
            return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Look for the activity
        $activity = Activity::find($id);

        //Delete the activity
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
