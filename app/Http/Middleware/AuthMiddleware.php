<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\Middleware;
use App\Providers\Request;

class AuthMiddleware implements Middleware {
    public function handle(Request $request, Closure $next) {
        // if (!isset($_SESSION['user'])) {
        //     header('Location: login.php');
        //     exit;
        // }

        echo "Lewat Auth Middleware dulu bro! : " . $request->input('id');

        return $next($request);
    }
}
