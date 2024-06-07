<?php

namespace App\Http;

class Kernel
{
    protected $middlewares = [
        'global' => [
            // \App\Http\Middleware\AuthMiddleware::class
        ],
    ];

    protected $aliases = [
        'auth' => \App\Http\Middleware\AuthMiddleware::class,
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
