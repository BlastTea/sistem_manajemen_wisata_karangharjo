<?php

use App\Providers\Route;

// Guest Start
Route::get('home', 'HomeController@show', ['home']);
Route::get('login', 'AuthController@showLogin');
Route::get('register', 'AuthController@showRegister');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
// Guest End


// Admin Route Start
Route::get('dashboard', 'DashboardAdminController@show', ['auth']);
Route::get('dashboard/calendar', 'DashboardAdminController@showCalendar', ['auth']);
Route::get('dashboard/paket', 'DashboardAdminController@showPakets', ['auth']);
Route::post('dashboard/paket/create', 'DashboardAdminController@addPakets', ['auth']);
Route::post('dashboard/paket/update', 'DashboardAdminController@updatePakets', ['auth']);
Route::post('/dashboard/paket/delete', 'DashboardAdminController@deletePaket', ['auth']);
Route::get('dashboard/pesanan', 'DashboardAdminController@showInvoice', ['auth']);
// Admin Route End