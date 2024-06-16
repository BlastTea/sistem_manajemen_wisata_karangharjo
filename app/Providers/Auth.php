<?php

namespace App\Providers;

use App\Models\User;

class Auth
{
    public static function user()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return null;
    }

    public static function check()
    {
        return self::user() !== null;
    }

    public static function id()
    {
        $user = self::user();
        return $user ? $user->id : null;
    }

    public static function login(User $user)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['user'] = $user;
    }

    public static function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['user']);
        session_destroy();
    }
}
