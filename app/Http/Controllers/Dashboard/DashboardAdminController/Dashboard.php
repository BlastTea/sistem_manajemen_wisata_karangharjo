<?php

namespace App\Http\Controllers\Dashboard\DashboardAdminController;

use App\Providers\Auth;

class Dashboard
{
    public function show()
    {
        return view('app_admin/dashboard-admin', ['data' => Auth::user()]);
    }
}