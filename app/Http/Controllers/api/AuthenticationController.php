<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
     * Authenticate user.
     */
    public function login(Request $request)
    {
        //
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
