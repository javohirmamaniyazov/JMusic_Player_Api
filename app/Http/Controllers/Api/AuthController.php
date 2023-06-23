<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:sanctum', ['except' => ['register', 'login']]);
    }
    public function register(Request $request){
         $request->validate([
            'name'=> 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
         ]);

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
         ]);

         $token = $user->createToken('token-name')->plainTextToken;

         return response()->json([
            'success'=>true,
            'user' => $user,
            'token' =>$token
         ]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logget out successfully',

        ]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid login details'
            ]);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'token' => $token
        ]);
    }
}
