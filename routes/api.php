<?php

use App\Providers\Route;

Route::post('api/login', 'AuthController@login');
Route::post('api/register', 'AuthController@register');