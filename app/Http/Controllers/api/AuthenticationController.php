<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * Authenticate user.
     */
    public function login(Request $request)
    {
        $login_credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($login_credentials)) {
            return response()->json(['message' => 'Incorrect email or password']);
        }

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'token_type' => 'Bearer']);
    }


    /**
     * Register a new user into the system.
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|',
            'last_name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email|string',
            'password' => 'required|confirmed'
        ]);

        User::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'User Registration Successful'
        ]);
    }

    /**
     * Display the specified userProfile.
     */
    public function profile(Request $request)
    {
        //
    }

    /**
     * Update the specified userProfile in storage.
     */
    public function updateProfile(Request $request, User $user)
    {
        //
    }
}
