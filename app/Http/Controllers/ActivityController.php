<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $results = Activity::paginate(10);
        $categories = CategoriesActivity::all();
        $labels = LabelsActivity::all();
        $status = StatusActivity::all();
        return view('activities.index', compact('results', 'categories', 'labels', 'status'));
    }
    
    /**
     * Search for activities based on the search criteria.
     */
    public function search(Request $request)
    {
        $activities = Activity::select(
            'activities.id',
            'activities.name as title',
            'categories_activities.id as category_id',
            'categories_activities.name as category',
            'labels_activities.id as label_id',
            'labels_activities.name as label'
        )->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
        ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id');
            
        if ($request->filled('title')) {
            $activities->where(function($query) use ($request) {
                $query->where('activities.name', 'LIKE', '%' . $request->title . '%');
            });
        }
        if ($request->filled('category')) {
            $activities->where('activities.categories_activities_id', $request->category);
        }
        if ($request->filled('label')) {
            $activities->where('activities.labels_activities_id', $request->label);
        }
        // Order by status=2(active) first, then by id
        $activities->orderByRaw('CASE WHEN status_activities_id = 2 THEN 0 ELSE 1 END, activities.id');
        $results = $activities->paginate(10);
        $total = $results->total();
        return view('activities.result', compact('results', 'total'));
    }

    /**
     * Show dates in calendar with an activity asigned
     */
    public function getHighlightedDays()
    {
        $dates = DB::table('activities')->pluck('scheduled_at');
        $highlightedDays = $dates->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        });
        return response()->json($highlightedDays);
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

    // Assign the selected category to the activity
    public function assignCategory($activity_id, $category_id, $group_id = null, $major_id = null)
    {
        switch ($category_id) {
            case 1:
                // Associate the activity with the group
                ActivitiesGroup::create([
                    'activities_id' => $activity_id,
                    'groups_id' => $group_id,
                ]);

                // Obtain the users of the group
                $user_ids = UsersGroup::where('groups_id', $group_id)->pluck('users_id');

                // Associate the activity for each user
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user_id,
                    ]);
                }
                break;

            case 2:
                // Obtain all users
                $users = User::all();

                // Associate the activity for each user
                foreach ($users as $user) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user->id,
                    ]);
                }
                break;

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

            case 4:
                // Associate the activity with the major
                ActivitiesMajor::create([
                    'activities_id' => $activity_id,
                    'majors_id' => $major_id,
                ]);

                // Obtain all the students/teachers/admins of the major
                $user_ids = MajorsUser::where('majors_id', $major_id)->pluck('users_id');

                // Associate the activity for each user
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::create([
                        'activities_id' => $activity_id,
                        'users_id' => $user_id,
                    ]);
                }
                break;

            default:
                break;
        }
    }

    private function deleteOldCategoriesAssociations($activity_id, $category_id, $group_id = null, $major_id = null)
    {
        switch ($category_id) {
            case 1:
                ActivitiesGroup::where('activities_id', $activity_id)
                    ->where('groups_id', $group_id)
                    ->delete();
                $user_ids = UsersGroup::where('groups_id', $group_id)->pluck('users_id');
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::where('activities_id', $activity_id)
                        ->where('users_id', $user_id)
                        ->delete();
                }
                break;

            case 2:
                ActivitiesUser::where('activities_id', $activity_id)->delete();
                break;

            case 3:
                $students = User::where('users_types_id', 1)->get();
                foreach ($students as $student) {
                    ActivitiesUser::where('activities_id', $activity_id)
                        ->where('users_id', $student->id)
                        ->delete();
                }
                break;

            case 4:
                ActivitiesMajor::where('activities_id', $activity_id)
                    ->where('majors_id', $major_id)
                    ->delete();
                $user_ids = MajorsUser::where('majors_id', $major_id)
                    ->pluck('users_id');
                foreach ($user_ids as $user_id) {
                    ActivitiesUser::where('activities_id', $activity_id)
                        ->where('users_id', $user_id)
                        ->delete();
                }
                break;

            default:
                // Should not happen
                break;
        }
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

        $this->assignCategory($activity_id, $request->category_id, $request->group_id, $request->major_id);
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
        $activity = Activity::find($id);

        if ($activity) {
            $filename = $activity->image;

            if ($request->hasFile('image')) {
                $image_to_remove = 'images/' . $activity->image;
                if (File::exists($image_to_remove)) {
                    File::delete($image_to_remove);
                }

                $image = $request->file('image');
                $filename = 'activity_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
            }

            // If the category has changed, delete the old associations and create the new ones
            if ($activity->categories_activities_id != $request->category_id) {
                $this->deleteOldCategoriesAssociations($activity->id, $activity->categories_activities_id, $request->old_group_id, $request->old_major_id);
                $this->assignCategory($activity->id, $request->category_id, $request->group_id, $request->major_id);
            } else {
                // If the category is the same, update the group or major if they have changed
                if ($request->category_id == 1 && $activity->groups_id != $request->group_id) {
                    ActivitiesGroup::where('activities_id', $activity->id)
                        ->update(['groups_id' => $request->group_id]);
                } elseif ($request->category_id == 4 && $activity->majors_id != $request->major_id) {
                    ActivitiesMajor::where('activities_id', $activity->id)
                        ->update(['majors_id' => $request->major_id]);
                }
            }

            if ($request->label_id != 2) {
                $request->merge(['percent' => 0]);
            }

            $scheduled_at = new \DateTime($request->date . ' ' . $request->time);
            $status_id = $scheduled_at <= now() ? 2 : 1;

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

        // Check if the activity has an existing image and delete it
        $image_to_remove = 'images/' . $activity->image;
        if (File::exists($image_to_remove)) {
            File::delete($image_to_remove);
        }

        //Delete the activity
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
