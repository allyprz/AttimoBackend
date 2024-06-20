<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
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
     * Search for a specific user.
     */
    public function search(Request $request)
    {
        $role = $request->input('role');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $query = User::query();
        if ($role) {
            $query->where('users_types_id', $role);
        }
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($lastname) {
            // Buscar tanto en lastname1 como en lastname2
            $query->where(function ($query) use ($lastname) {
                $query->where('lastname1', 'LIKE', '%' . $lastname . '%')
                    ->orWhere('lastname2', 'LIKE', '%' . $lastname . '%');
            });
        }
        $results = $query->paginate(10);
        $users = UsersType::all();
        $total = $results->total();
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
        $user = User::create([
            'users_types_id' => $request->users_types_id,
            'name' => $request->name,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'image' => "user_default.jpg",
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
        // Obtain the user type
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
        // The user is already being injected, no need to find it
        // Check if image was uploaded
        if ($request->hasFile('image')) {
            // Check if the old image exists and delete it
            $image_to_remove = 'images/' . $user->image;
            if (File::exists($image_to_remove)) {
                File::delete($image_to_remove);
            }

            // Store the new image with the user ID in the file name
            $image = $request->file('image');
            $filename = 'user_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        } else {
            $filename = $request->old_image;
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'users_types_id' => $request->users_types_id,
            'image' => $filename,
        ];

        // Check if password is provided and not empty
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Encrypt the password
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
        $user = User::find($id);

        // Check if the user's image should be deleted
        if ($user->image != 'user_default.jpg') {
            // Build the path to the image
            $imagePath = public_path('images/' . $user->image);

            // Check if the image exists and delete it
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the user
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
