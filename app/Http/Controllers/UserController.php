<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersType;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = User::paginate(10);
        $users = UsersType::all();
        return view('users.index', compact('results', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users_type = UsersType::all();

        return view('users.create', compact('users_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'users_types_id' => $request->users_types_id,
            'name' => $request->name,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'image' => "image.jpg",
        ]);

        return redirect()->route('users.index')->with('success','User registered successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        //     'password' => 'nullable|string|min:8',
        // ]);

        // $user->update([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        // ]);

        // return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Look for the user
        $results = User::find($id);
        //Delete the user
        $results->delete();
        
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}