<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\Middleware;
use App\Providers\Request;

class AuthMiddleware implements Middleware {
    public function handle(Request $request, Closure $next) {
        if (!$request->getSession('user')) {
            return view('auth/login');
        }

        return $next($request);
    }
}
