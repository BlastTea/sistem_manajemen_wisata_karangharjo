<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\Hash;
use App\Providers\Request;
use App\Providers\Validator;

class AuthController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::where('username', '=', $request->input('username'))->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Password is wrong'], 401);
        }

        return response()->json(['message' => 'Login success', 'data' => $user]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|enum:admin,manager,visitor',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }
        
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return response()->json(['message' => 'User has been created']);
    }
}
