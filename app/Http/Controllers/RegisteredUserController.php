<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Activity;
use App\Models\ActivitiesUser;

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
     * Recover password based on email.
     */
    public function recoverPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8', 
        ]);

        $user = User::where('email', $request->email)->first();

        if($user) {
            $user->update(['password' => Hash::make($request->password)]);
            return response()->json(['message' => 'Password updated successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        // Create a new user
        $user = User::create([
            'users_types_id' => $request->users_types_id,
            'name' => $request->name,
            'lastname1' => $request->lastname1,
            'lastname2' => $request->lastname2,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'image' => "user_default.jpg",
        ]);

        // Get the ID of the new user
        $user_id = $user->id;

        // Store the image with the user ID in the file name
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'user_' . $user_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $user->update(['image' => $filename]);
        }

        // Obtain the IDs of the activities that belong to the category "Student"
        $activities = Activity::join('categories_activities', 'activities.categories_activities_id', '=', 'categories_activities.id')
            ->where('categories_activities.id', 3)
            ->pluck('activities.id'); // Only ids

        // Associate the user with the activities
        foreach ($activities as $activity_id) {
            ActivitiesUser::create([
                'users_id' => $user_id,
                'activities_id' => $activity_id,
            ]);
        }

        return response()->json([
            'message' => 'User created successfully',
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
        // Buscar al usuario por su ID
        $user = User::find($id);
    
        // Si el usuario no existe, devolver un error 404
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'name' => 'required',
            'lastname1' => 'required',
            'lastname2' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048', 
        ]);
    
        // Actualizar los campos del usuario
        $user->update([
            'name' => $validatedData['name'],
            'lastname1' => $validatedData['lastname1'],
            'lastname2' => $validatedData['lastname2'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
        ]);
    
        // Actualizar la imagen si se ha modificado
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe y no es la imagen por defecto
            $image_to_remove = 'images/' . $user->image;
            if (File::exists($image_to_remove) && $user->image != 'user_default.jpg') {
                File::delete($image_to_remove);
            }
    
            // Almacenar la nueva imagen con un nombre único
            $image = $request->file('image');
            $filename = 'user_' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $user->update(['image' => $filename]);
        }
    
        // Devolver una respuesta con los datos actualizados del usuario
        return response()->json([
            'message' => 'User updated successfully',
            'user' => [
                'id' => $user->id,
                'image' => "http://AttimoBackend.test/images/" . $user->image,
                'name' => $user->name,
                'lastname1' => $user->lastname1,
                'lastname2' => $user->lastname2,
                'email' => $user->email,
                'username' => $user->username,
                'users_types_id' => $user->users_types_id,
            ]
        ], 200);
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
