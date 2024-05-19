<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;




class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'username' => 'string',
            'name' => 'required|string',
            'phone_number' => 'string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //create user
        $user = User::create([
            'username' => $attrs['username'],
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'phone_number' => $attrs['phone_number'],
            'password' => bcrypt($attrs['password'])
        ]);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ], 200);
    }

    // login user

    public function login(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|'
        ]);

        // attemp login
        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 403);
        }

        //return user & token in response
        return response([
            //'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ], 200);
    }

    // logout user
    // logout user
    public function logout()
    {
        // Revoke all tokens for the authenticated user
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logout success.'
        ], 200);
    }

    // get usr details
    public function user()
    {
        return response([
            'users' => [auth()->user()]
        ], 200);
    }

    // refresh token
    public function refreshToken(Request $request)
    {
        try {
            // Retrieve the token from the request headers
            $token = $request->header('email');

            \Log::info('Received container data: ' . $token);

            if (!$token) {
                return response()->json(['error' => 'Token not provided'], 401);
            }

            // Authenticate the user using the provided token
            $user = User::where('email', $token)->first();

            if (!$user) {
                return response()->json(['error' => 'Invalid email'], 401);
            }

            // Generate a new token based on the user's email
            $newToken = $user->createToken($user->email)->plainTextToken;

            return response()->json(['token' => $newToken], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

  
}
