<?php

namespace App\Providers;

use Closure;
use App\Providers\Request;

interface Middleware {
    public function handle(Request $request, Closure $next);
}
