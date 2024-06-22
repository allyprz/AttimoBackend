<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

//Import models
use App\Models\Activity;
use App\Models\ActivitiesUser;
use App\Models\ActivitiesGroup;
use App\Models\Course;
use App\Models\Group;
use App\Models\UsersGroup;

class RegisteredActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get all activities and get the categories name, labels name and status name
        $activities = Activity::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.percent',
            'activities.scheduled_at',
            'labels_activities.name as label',
            'categories_activities.name as category',
            'status_activities.isActive as status'
        )
            ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id')
            ->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
            ->get();

        //Change the status to Active or Inactive instead of 1 or 0
        foreach ($activities as $activity) {
            $activity->image = "http://AttimoBackend.test/images/" . $activity->image;
            $activity->status = $activity->status == 1 ? 'Active' : 'Inactive';
        }

        //Change the format of the scheduled_at in date and time
        foreach ($activities as $activity) {
            $activity->date = date('F d, Y', strtotime($activity->scheduled_at));
            $activity->time = date('h:i A', strtotime($activity->scheduled_at));
        }

        //Remove the scheduled_at from the response
        foreach ($activities as $activity) {
            unset($activity->scheduled_at);
        }

        return $activities;
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
        //Get the activity by id
        $activity = Activity::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.percent',
            'activities.scheduled_at',
            'labels_activities.name as label',
            'categories_activities.name as category',
            'status_activities.isActive as status'
        )
            ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id')
            ->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
            ->where('activities.id', $id)
            ->orderBy('activities.scheduled_at', 'asc')
            ->get();

        //Change the status to Active or Inactive instead of 1 or 0
        foreach ($activity as $act) {
            $act->image = "http://AttimoBackend.test/public/images/" . $act->image;
            $act->status = $act->status == 1 ? 'Active' : 'Inactive';
        }
        //Change the format of the scheduled_at in date and time
        foreach ($activity as $act) {
            $act->date = date('F d, Y', strtotime($act->scheduled_at));
            $act->time = date('h:i A', strtotime($act->scheduled_at));
        }

        if ($activity) {
            return $activity;
        } else {
            return "Activity not found";
        }
    }

    public function showByUser($id)
    {
        //Get all activities by user
        $activities = ActivitiesUser::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.percent',
            'activities.scheduled_at',
            'labels_activities.name as label',
            'categories_activities.name as category',
            'status_activities.isActive as status'
        )
            ->join('activities', 'activities_users.activities_id', '=', 'activities.id')
            ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id')
            ->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
            ->where('activities_users.users_id', $id)
            ->orderBy('activities.scheduled_at', 'asc')
            ->get();

        //Change the status to Active or Inactive instead of 1 or 0
        foreach ($activities as $activity) {
            $activity->image = "http://AttimoBackend.test/images/" . $activity->image;
            $activity->status = $activity->status == 1 ? 'Active' : 'Inactive';
        }

        //Change the format of the scheduled_at in date and time
        foreach ($activities as $activity) {
            $activity->date = date('F d, Y', strtotime($activity->scheduled_at));
            $activity->time = date('h:i A', strtotime($activity->scheduled_at));
        }

        //Remove the scheduled_at from the response
        foreach ($activities as $activity) {
            unset($activity->scheduled_at);
        }
        return $activities;
    }

    public function showByGroup($id)
    {
        //Get all activities by group
        $activities = ActivitiesGroup::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.percent',
            'activities.scheduled_at',
            'labels_activities.name as label',
            'categories_activities.name as category',
            'status_activities.isActive as status'
        )
            ->join('activities', 'activities_groups.activities_id', '=', 'activities.id')
            ->join('labels_activities', 'activities.labels_activities_id', '=', 'labels_activities.id')
            ->join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
            ->where('activities_groups.groups_id', $id)
            ->orderBy('activities.scheduled_at', 'asc')
            ->get();

        //Change the status to Active or Inactive instead of 1 or 0
        foreach ($activities as $activity) {
            $activity->image = "http://AttimoBackend.test/images/" . $activity->image;
            $activity->status = $activity->status == 1 ? 'Active' : 'Inactive';
        }

        //Change the format of the scheduled_at in date and time
        foreach ($activities as $activity) {
            $activity->date = date('F d, Y', strtotime($activity->scheduled_at));
            $activity->time = date('h:i A', strtotime($activity->scheduled_at));
        }

        //Remove the scheduled_at from the response
        foreach ($activities as $activity) {
            unset($activity->scheduled_at);
        }
        return $activities;
    }


    public function countByGroup($idUser, $selectedOption)
    {
        // Obtain the groups of the user
        $groups = UsersGroup::select('groups_id')
            ->where('users_id', $idUser)
            ->get();

        // Obtain the number of the group and the name of the course related to it
        foreach ($groups as $group) {
            $group->group = Group::select('groups.id', 'groups.number', 'courses.name as course')
                ->join('courses', 'groups.courses_id', '=', 'courses.id')
                ->where('groups.id', $group->groups_id)
                ->get();
        }

        // Initialize activitiesCount array and othersCount variable
        $activitiesCount = [];
        $othersCount = 0;
        $totalActivities = 0;
        $activeActivities = 0;
        $inactiveActivities = 0;

        // Fetch count of activities for each group based on selectedOption
        switch ($selectedOption) {
            case 0: // All time (Semester)
                $this->fetchActivitiesCount($groups, $idUser, null, null, $activitiesCount, $totalActivities, $activeActivities, $inactiveActivities);
                $this->fetchOthersCount($idUser, null, null, $othersCount, $activeActivities, $inactiveActivities);
                break;

            case 1: // This week
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();
                $this->fetchActivitiesCount($groups, $idUser, $startOfWeek, $endOfWeek, $activitiesCount, $totalActivities, $activeActivities, $inactiveActivities);
                $this->fetchOthersCount($idUser, $startOfWeek, $endOfWeek, $othersCount, $activeActivities, $inactiveActivities);
                break;

            case 2: // Today
                $today = Carbon::now()->startOfDay();
                $endOfToday = Carbon::now()->endOfDay();
                $this->fetchActivitiesCount($groups, $idUser, $today, $endOfToday, $activitiesCount, $totalActivities, $activeActivities, $inactiveActivities);
                $this->fetchOthersCount($idUser, $today, $endOfToday, $othersCount, $activeActivities, $inactiveActivities);
                break;

            default:
                break;
        }

        // Add Others count to activitiesCount array
        $activitiesCount[] = [
            'group_id' => 0,
            'label' => 'Others',
            'number_activities' => $othersCount
        ];

        return response()->json([
            'chartInfo' => $activitiesCount,
            'totalActivities' => $totalActivities,
            'activeActivities' => $activeActivities,
            'inactiveActivities' => $inactiveActivities
        ]);
    }

    private function fetchActivitiesCount($groups, $idUser, $start, $end, &$activitiesCount, &$totalActivities, &$activeActivities, &$inactiveActivities)
    {
        foreach ($groups as $group) {
            $query = ActivitiesGroup::select('groups_id')
                ->join('activities', 'activities_groups.activities_id', '=', 'activities.id')
                ->where('groups_id', $group->groups_id);

            if ($start && $end) {
                $query->whereBetween('activities.scheduled_at', [$start, $end]);
            }

            $count = $query->count();
            $activeQuery = clone $query;
            $activeCount = $activeQuery->where('activities.status_activities_id', 1)->count();
            $inactiveCount = $count - $activeCount;

            $activitiesCount[] = [
                'group_id' => $group->groups_id,
                'label' => $group->group[0]->course,
                'number_activities' => $count
            ];

            $totalActivities += $count;
            $activeActivities += $activeCount;
            $inactiveActivities += $inactiveCount;
        }
    }

    private function fetchOthersCount($idUser, $start, $end, &$othersCount, &$activeActivities, &$inactiveActivities)
    {
        $query = ActivitiesUser::select('activities.id')
            ->join('activities', 'activities_users.activities_id', '=', 'activities.id')
            ->where('activities_users.users_id', $idUser)
            ->whereNotIn('activities.id', function ($query) {
                $query->select('activities_id')
                    ->from('activities_groups');
            });

        if ($start && $end) {
            $query->whereBetween('activities.scheduled_at', [$start, $end]);
        }

        $othersCount = $query->count();
        $activeQuery = clone $query;
        $activeOthersCount = $activeQuery->where('activities.status_activities_id', 1)->count();
        $inactiveOthersCount = $othersCount - $activeOthersCount;
        $activeActivities += $activeOthersCount;
        $inactiveActivities += $inactiveOthersCount;
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
