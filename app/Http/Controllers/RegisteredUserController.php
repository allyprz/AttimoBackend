<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validate the request data
        $credentials = $request->only('username', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // If the authentication is successful, get the authenticated user
            $user = Auth::user();
            // Return a JSON response with the user data
            return response()->json([
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'image' => "http://AttimoBackend.test/images/" . $user->image,
                    'name' => $user->name,
                    'lastname1' => $user->lastname1,
                    'lastname2' => $user->lastname2,
                    'email' => $user->email,
                    'username' => $user->username,
                ]
            ], 200);
        } else {
            // If the authentication is not successful, return a JSON response with an error message
            return response()->json(['message' => 'Invalid username or password'], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function logout()
    {
        Auth::logout();
        // Redirige a la página de inicio de sesión o envía una respuesta de éxito
        return response()->json(['message' => 'Logout successful'], 200);
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
            'password' =>  bcrypt($request->password),
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

        // Return a JSON response with a success message and the user data
        return response()->json([
            'message' => 'User created
            successfully',
            'user' => [
                'id' => $user->id,
                'image' => "http://AttimoBackend.test/images/" . $user->image,
                'name' => $user->name,
                'lastname1' => $user->lastname1,
                'lastname2' => $user->lastname2,
                'email' => $user->email,
                'username' => $user->username,
            ]
        ], 201);
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
    public function update(Request $request, $id)
    {
        //Get the user to update
        $user = User::find($id);

        //Verifies if the user exists
        if ($user) {
            //Verifies which fields are being updated (compares the new value with the old value)
            if ($request->name != $user->name) {
                $user->name = $request->name;
            }
            if ($request->lastname1 != $user->lastname1) {
                $user->lastname1 = $request->lastname1;
            }

            if ($request->lastname2 != $user->lastname2) {
                $user->lastname2 = $request->lastname2;
            }

            if ($request->email != $user->email) {
                $user->email = $request->email;
            }

            if ($request->username != $user->username) {
                $user->username = $request->username;
            }

            if ($request->hasFile('image')) {
                //Store the image with the user ID in the file name
                $image = $request->file('image');
                $filename = 'user_' . $id . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
                // Update the user with the image name
                $user->update(['image' => $filename]);
            }

            //Save the updated user
            $user->save();

            //Return a JSON response with a success message
            // return response()->json(['message' => 'User updated'], 200);

        } else {
            //Return a JSON response with an error message
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
