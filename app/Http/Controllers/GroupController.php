<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Course;
use App\Models\User;
use App\Models\Activity; 

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
            ->orderBy('groups.courses_id', 'asc') // Order by courses_id
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
        $validatedData = $request->validate([
            'courses_id' => 'required|integer|exists:courses,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'users_id' => 'required|integer|exists:users,id', 
        ]);

        // Consultations
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
        $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
            ->select('users.*', 'users_types.name as users_types_name')
            ->get();
        
        return view('groups.show', compact('group', 'users', 'courses'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $group = Group::find($id);
       
        $courses = Course::all();
        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        }else{
            $users = User::join('users_types', 'users_types.id', '=', 'users.users_types_id')
                ->select('users.*', 'users_types.name as users_types_name')
                ->get();
        }
        
        return view('groups.edit', compact('group', 'users','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'courses_id' => 'required|exists:courses,id',
            'users_id' => 'required|exists:users,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        // Buscar el grupo a actualizar
        $group = Group::find($id);
        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found.');
        }
    
        // Procesar los datos del formulario
        $consultations = $request->input('day_of_week') . ' ' . $request->input('start_time') . ' - ' . $request->input('end_time');
    
        // Actualizar el grupo en la base de datos
        $group->courses_id = $request->input('courses_id');
        $group->users_id = $request->input('users_id');
        $group->consultations = $consultations;
        $group->save();
    
        // Redireccionar a la vista de índice con un mensaje de éxito
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
        }else{
            $group->delete();
            return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
        }
    }
}