<?php

namespace App\Http;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\AuthMiddleware;

class Kernel
{
    protected $middlewares = [
        'global' => [
            // AuthMiddleware::class,
        ],
        'admin' => [
            AdminMiddleware::class,
        ],
        'manager' => [
            ManagerMiddleware::class,
        ],
    ];

    protected $aliases = [
        'auth' => AuthMiddleware::class,
        'admin' => AdminMiddleware::class,
        'manager' => ManagerMiddleware::class,
    ];

    public function getMiddlewaresForRoute($aliases)
    {
        $allMiddlewares = $this->getMiddlewareInstances($this->middlewares['global']);
        return array_merge($allMiddlewares, $this->getMiddlewareInstances($aliases));
    }

    protected function getMiddlewareInstances($middlewareIdentifiers)
    {
        return array_map(function ($identifier) {
            if (isset($this->aliases[$identifier])) {
                $identifier = $this->aliases[$identifier];
            }
            return new $identifier();
        }, $middlewareIdentifiers);
    }
}
