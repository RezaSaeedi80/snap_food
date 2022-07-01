<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('buyer');

        return response()->json([
            'token' => $user->createToken('userApiToken')->plainTextToken,
            'msg' => 'You Registerd Successfully'
        ]);

    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'msg' => 'login faild'
            ]);
        }
        return response()->json([
            'apiToken' => \auth()->user()->createToken('userApiToken')->plainTextToken
        ], 201);
    }

    public function logout()
    {
        if (auth()->user()->tokens()->delete()) {
            return response()->json([
                'msg' => 'logout successfully',
            ]);
        }
        return response()->json([
            'msg' => 'logout faild',
        ]);
    }
}
