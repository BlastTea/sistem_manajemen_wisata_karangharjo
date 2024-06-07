<?php

use App\Providers\Route;

// Route::get('home', function () {
//     return view('home');
// }, ['auth']);

Route::get('home', 'HomeController@show', ['auth']);

// Route::get('home', 'home');

Route::get('login', 'LoginController@show');
