<?php

namespace App\Http\Controllers;

use App\Providers\Request;

class DashboardController {
    public function show(Request $request) {
        // $content = view('home');
        // echo $content;
        return view('dashboard');
    }
}