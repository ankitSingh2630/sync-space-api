<?php
namespace App\Http\Controllers\Auth;

use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignInController extends Controller
{
    public function signin(Request $request)
    {
        // Validate login credentials (email and password)
        $credentials = $request->only('email', 'password');

        // Check if the email and password are provided
        if (empty($credentials['email']) || empty($credentials['password'])) {
            return response()->json(['message' => 'Email and password are required.'], 400);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful, get the user
            $user = Auth::user();

            // Create a token manually using the Token class
            $token = PersonalAccessToken::create([
                'tokenable_id' => $user->id,
                'tokenable_type' => get_class($user),
                'name' => 'laravel-sanctum-api',
                'abilities' => ['*'],  // You can specify abilities here, or leave as '*' for full access
                'expires_at' => now()->addDays(7),  // Set expiration, if needed
            ])->plainTextToken;

            // Return success message with token
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }

       
        return response()->json(['message' => 'success'], 200);
    }
}
