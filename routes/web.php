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
Route::get('dashboard-admin', 'Dashboard\DashboardAdminController\Dashboard@show', ['auth', 'admin']);
Route::get('dashboard-admin-calendar-events', 'Dashboard\DashboardAdminController\CalendarEvent@show', ['auth', 'admin']);
Route::get('dashboard-admin-holidays-packages', 'Dashboard\DashboardAdminController\PackageHoliday@show', ['auth', 'admin']);
Route::get('dashboard-admin-visitor-orders', 'Dashboard\DashboardAdminController\VisitorOrders@show', ['auth', 'admin']);

// create route
Route::post('dashboard-admin-package-holidays-create', 'Dashboard\DashboardAdminController\PackageHoliday@add', ['auth', 'admin']);
Route::post('dashboard-admin-visitor-orders-create', 'Dashboard\DashboardAdminController\VisitorOrders@add', ['auth', 'admin']);

// update route
Route::post('dashboard-admin-package-holidays-update', 'Dashboard\DashboardAdminController\PackageHoliday@update', ['auth', 'admin']);


// delete route
Route::post('dashboard-admin-package-holidays-delete', 'Dashboard\DashboardAdminController\PackageHoliday@delete', ['auth', 'admin']);

// <<<<<<<<< Admin Route End >>>>>>>>>>>>