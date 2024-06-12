<?php

use App\Providers\Route;

// Route::get('home', function () {
//     return view('home');
// }, ['auth']);

Route::get('home', 'HomeController@show', ['auth']);

Route::get('dashboard', 'DashboardController@show', ['auth']);

Route::get('dashboard/calender', 'DashboardController@showCalender', ['auth']);

// Route::get('home', 'home');

Route::get('login', 'AuthController@showLogin');

Route::get('register', 'AuthController@showRegister');

