<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\Hash;
use App\Providers\Request;
use App\Providers\Validator;
use App\Providers\Route;

class AuthController
{
    public function login(Request $request)
    {
        try {
            // Validate the request input
            $validator = Validator::make($request->all(), [
                'login' => 'required|string|max:100',
                'password' => 'required|string|max:100',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()], 422);
            }

            $loginField = $request->input('login');
            $password = $request->input('password');

            // Attempt to find the user by email
            $userByEmail = User::where('email', '=', $loginField)->first();

            // Attempt to find the user by username
            $userByUsername = User::where('username', '=', $loginField)->first();

            // Check if either user is found and validate password
            $user = null;
            if ($userByEmail && Hash::check($password, $userByEmail->password)) {
                $user = $userByEmail;
            } elseif ($userByUsername && Hash::check($password, $userByUsername->password)) {
                $user = $userByUsername;
            }


            if (!$user || !Hash::check($password, $user->password)) {
                return response()->json(['message' => 'Invalid email/username or password'], 401);
            }


            // Set session user
            $request->setSession('user', $user);

            // Redirect based on user role
            if ($user->role === 'admin' || $user->role === 'manager') {
                Route::redirect('dashboard'); // Redirect to dashboard for admin/manager
            } else {
                Route::redirect('home'); // Redirect to home for other roles
            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong. Please try again later.'], 500);
        }
    }


    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100|unique:users',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Create a new User instance
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        // Set role to 'visitor' by default
        $user->role = 'visitor';

        try {
            // Save the user
            $user->save();

            // Set session user
            $request->setSession('user', $user);

            // Redirect to home page with a success message
            Route::redirect('home');

        } catch (\Exception $e) {
            // Check if the error is due to duplicate username
            if (strpos($e->getMessage(), 'users_username_unique') !== false) {
                return response()->json(['message' => 'Username already exists. Please choose a different username.'], 422);
            }

            // Handle other exceptions as needed
            return response()->json(['message' => 'Failed to create user.'], 500);
        }
    }




    public function showLogin(Request $request)
    {
        return view('auth/login');
    }

    public function showRegister(Request $request)
    {
        return view('auth/register');
    }
}
