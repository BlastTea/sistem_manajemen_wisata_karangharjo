<?php

namespace App\Http\Controllers;

use App\Providers\Request;

class DashboardController {
    public function show(Request $request) {
        return view('app_admin/dashboard-admin');
    }
}