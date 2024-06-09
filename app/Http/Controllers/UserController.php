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
        // dd($request->all());
        // Create the user
        $user = User::create([
            'users_types_id' => $request->users_types_id,
            'name' => $request->name,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'image' => "defaultImage",
        ]);

        // Retrieve the ID of the newly created user
        $user_id = $user->id;

        if ($request->hasFile('image')) {
            //Store the image with the user ID in the file name
            $image = $request->file('image');
            $filename = 'user_' . $user_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            // Update the user with the image name
            $user->update(['image' => $filename]);
        }

        return redirect()->route('users.index')->with('success', 'User registered successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Obtener el tipo de usuario del usuario
        $userType = UsersType::find($user->users_types_id);

        return view('users.show', compact('user', 'userType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Look for the user
        $user = User::find($id);
        // Look for the usersTypes
        $users = UsersType::all();

        return view('users.edit', compact('users', 'user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'users_types_id' => $request->users_types_id,
        ];

        // Check if password is provided and not empty
        if ($request->filled('password')) {
            $data['password'] = $request->password; // Assign password directly without bcrypt
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Look for the user
        $results = User::find($id);
        // Delete the user
        $results->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}