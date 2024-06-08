<?php

namespace App\Http\Controllers;

use App\Providers\Request;

class AuthController {
    public function login(Request $request) {
        return response()->json(['message' => 'Login diterima']);
    }
}