<?php

use App\Providers\Route;

Route::get('home', 'HomeController@show', ['auth']);

Route::get('dashboard', 'DashboardController@show', ['auth']);

Route::get('dashboard/calendar', 'DashboardController@showCalendar', ['auth']);

Route::get('login', 'AuthController@showLogin');

Route::get('register', 'AuthController@showRegister');

Route::post('login', 'AuthController@login');

Route::post('register', 'AuthController@register');
