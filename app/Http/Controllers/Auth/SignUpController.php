<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function signup(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Return success response with 201 status code
            return response()->json([
                'message' => 'User created successfully!',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            // Handle any error that might occur during user creation
            return response()->json([
                'message' => 'Error creating user. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
