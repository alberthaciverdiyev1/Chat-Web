<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    function Register(Request $request): string
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'confirmPassword' => ['required', 'string', 'min:4', 'same:password'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'message' => 'User registered successfully!',
            ], 201);
        } catch (\Illuminate\Database\QueryException|\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);

        }

    }

    function Login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('username', $credentials['username'])->first();

        if (!$user || !password_verify($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Username or password is invalid',
            ], 401);
        }

        try {
            $token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Could not create token'], 500);
        }
//        $token = JWTAuth::attempt($credentials);
//        if (!$token) {
//            return response()->json([
//                'message' => 'Username or password is invalid',
//            ], 401);
//        }
        return response()->json([
            'message' => 'Login successful',
            'token' => $token
        ], 200)->cookie('token', $token, 60, null, null, true, true);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }
}
