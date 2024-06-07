<?php

namespace App\Http\Controllers;

use App\Providers\Request;

class HomeController {
    public function show(Request $request) {
        return view('home');
    }
}