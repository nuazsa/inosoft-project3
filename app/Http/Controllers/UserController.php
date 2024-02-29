<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $existingUser = \App\Models\User::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json([
                'message' => 'Email already exists'
            ], 409);
        }

        \App\Models\User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return response()->json([
            "messege" => 'Success created a user'
        ], 201);
    }
}
