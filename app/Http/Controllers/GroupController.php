<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersGroup;
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
        $groups = Group::join('courses', 'courses.id', '=', 'groups.courses_id')
            ->join('users', 'users.id', '=', 'groups.users_id')
            ->select('groups.*', 'courses.name as course_name', 'users.name as professor_name', 'users.lastname1', 'users.lastname2')
            ->orderBy('groups.courses_id', 'asc') // Order by courses_id
            ->paginate(10);

        $courses = Course::all();
        $users = User::all();
        $professors = User::where('users_types_id', 2)->get();

        return view('groups.index', compact('groups', 'courses', 'users', 'professors'));
    }

    /**
     * Search for a specific group.
     */
    public function search(Request $request)
    {
        $groupNumber = $request->input('group_number');
        $courseName = $request->input('course_name');
        $professorId = $request->input('professor_name');
        $query = Group::join('courses', 'courses.id', '=', 'groups.courses_id')
                      ->join('users', 'users.id', '=', 'groups.users_id')
                      ->select('groups.*', 'courses.name as course_name', 'users.name as professor_name', 'users.lastname1', 'users.lastname2');
        if ($groupNumber) {
            $query->where('groups.number', 'LIKE', "%{$groupNumber}%");
        }
        if ($courseName) {
            $query->where('courses.name', 'LIKE', "%{$courseName}%");
        }
        if ($professorId) {
            $query->where('users.id', $professorId);
        }
        $groups = $query->paginate(10);
        $professors = User::where('users_types_id', 2)->get(); // Asumiendo que el tipo de usuario profesor tiene el ID 2
        $total = $groups->total();
        return view('groups.result', compact('groups', 'professors', 'total'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();

        return view('groups.create', compact('courses', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos del formulario...
        $validatedData = $request->validate([
            'courses_id' => 'required|integer|exists:courses,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'users_id' => 'required|integer|exists:users,id',
            'student_ids' => 'nullable|array', // Asegura que sea un array
            'student_ids.*' => 'integer|exists:users,id', // Asegura que cada ID sea válido
        ]);

        $consultations = $validatedData['day_of_week'] . ' ' . $validatedData['start_time'] . ' - ' . $validatedData['end_time'];

        // Group number
        $lastGroup = Group::where('courses_id', $validatedData['courses_id'])->orderBy('number', 'desc')->first();
        $newNumber = $lastGroup ? $lastGroup->number + 1 : 1;

        $group = new Group();
        $group->courses_id = $validatedData['courses_id'];
        $group->number = $newNumber;
        $group->consultations = $consultations;
        $group->users_id = $validatedData['users_id'];
        $group->save();

        // Students
        if (isset($validatedData['student_ids'])) {
            foreach ($validatedData['student_ids'] as $studentId) {
                $userGroup = new UsersGroup();
                $userGroup->users_id = $studentId;
                $userGroup->groups_id = $group->id;
                $userGroup->save();
            }
        }

        return redirect()->route('groups.index')->with('success', 'Group registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        }

        $courses = Course::all();

        // Obtener solo los usuarios que están en el grupo
        $students = $group->students()
            ->join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();

        return view('groups.show', compact('group', 'students', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        }

        $courses = Course::all();
        $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();

        $groupStudents = $group->students->pluck('id')->toArray(); // Obtener los IDs de los estudiantes del grupo

        return view('groups.edit', compact('group', 'users', 'courses', 'groupStudents'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'courses_id' => 'required|exists:courses,id',
            'users_id' => 'required|exists:users,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'student_ids' => 'array',
            'student_ids.*' => 'exists:users,id'
        ]);

        $group = Group::find($id);

        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        }

        $consultations = $request->input('day_of_week') . ' ' . $request->input('start_time') . ' - ' . $request->input('end_time');
        $group->courses_id = $request->input('courses_id');
        $group->users_id = $request->input('users_id');
        $group->consultations = $consultations;
        $group->save();

        $group->students()->sync($request->student_ids);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::find($id);
        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        } else {
            $group->delete();
            return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
        }
    }
}
