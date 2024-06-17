<?php

use App\Providers\Route;

// Guest Start
Route::get('home', 'HomeController@show');
Route::get('login', 'AuthController@showLogin');
Route::get('register', 'AuthController@showRegister');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
// Guest End


// <<<<<<<<< Admin Route Start >>>>>>>>>>
// view route
Route::get('dashboard/admin', 'DashboardAdminController@showIndex', ['auth', 'admin']);
Route::get('dashboard/admin/calendar-events', 'DashboardAdminController@showCalendarEvents', ['auth', 'admin']);
Route::get('dashboard/admin/holidays-package', 'DashboardAdminController@showPackageHoliday', ['auth', 'admin']);
Route::get('dashboard/admin/visitor-orders', 'DashboardAdminController@showInvoice', ['auth', 'admin']);

// create route
Route::post('dashboard/admin/paket/create', 'DashboardAdminController@addPackageHoliday', ['auth', 'admin']);

// update route
Route::post('dashboard/admin/paket/update', 'DashboardAdminController@updatePackageHoliday', ['auth', 'admin']);


// delete route
Route::post('dashboard/admin/paket/delete', 'DashboardAdminController@deletePackageHoliday', ['auth', 'admin']);

// <<<<<<<<< Admin Route End >>>>>>>>>>>>