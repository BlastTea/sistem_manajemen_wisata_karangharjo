<?php

use App\Providers\Route;

Route::get('api/user', 'UserController@show', ['auth']);