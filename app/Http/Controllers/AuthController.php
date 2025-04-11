<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'failed',
                'message' => $validator->errors()
            ], 400);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status'  => 'success',
            'message' => 'User registered successfully',
            'user'    => $user,
            'token'   => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Email atau password salah!'
            ], 401);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Login berhasil',
            'token'   => $token
        ]);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user'   => auth()->user()
        ]);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'status'  => 'success',
                'message' => 'Logout berhasil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Token tidak valid atau sudah logout'
            ], 500);
        }
    }
}
