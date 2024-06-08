<?php

namespace App\Http\Controllers;

use App\Providers\Request;

class HomeController {
    public function show(Request $request) {
        // $content = view('home');
        // echo $content;
        return view('home');
    }
}