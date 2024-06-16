<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\Middleware;
use App\Providers\Request;
use App\Providers\Route;

class AuthMiddleware implements Middleware {
    public function handle(Request $request, Closure $next) {
        if (!$request->getSession('user')) {
            return Route::redirect('login');
        }

        return $next($request);
    }
}
