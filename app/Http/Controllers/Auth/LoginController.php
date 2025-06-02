<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Acont;

class LoginController extends Controller
{
    public function login(Request $request)
    {   
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Login successful',Auth::check(), 'token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

}
