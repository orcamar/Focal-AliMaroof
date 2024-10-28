<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        };

        $user = Auth::user();
        // $token=$user->createToken('Api token')->plainTextToken;
        // $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['user' => $user], 200);
        
    }

    public function logout(Request $request)
    {
       
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
