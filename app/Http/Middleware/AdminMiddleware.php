<?php

namespace App\Http\Middleware;

use Closure;
use Throwable;
use App\Models\User;
use App\Providers\Auth;
use App\Providers\Route;
use App\Providers\Request;
use App\Providers\Middleware;

class AdminMiddleware implements Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            // Log error jika pengguna bukan admin
            $this->logUnauthorizedAccess($user);
            Route::redirect('home');
        }

        return $next($request);
    }

    private function logUnauthorizedAccess($userId)
    {
        try {
            $message = "Unauthorized access attempt by user ID: $userId";
            logError(new \Exception($message));
        } catch (Throwable $e) {
            // Handle error logging failure if necessary
        }
    }
}
