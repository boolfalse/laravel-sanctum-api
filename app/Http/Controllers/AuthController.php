<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

//        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => "Successfully registered.",
//            'user' => $user,
//            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => "Bad credentials!",
            ], 401);
        }

        // argument of "createToken" method could be anything
        $token = $user->createToken(config('app.key'))->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => "Successfully logged in.",
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => "Logged out.",
        ], 201); // or 204
    }
}
