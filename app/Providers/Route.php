<?php

namespace App\Providers;

class Route
{
    private static $routes = [];
    private static $middlewareLoader = null;

    public static function setMiddlewareLoader($loader)
    {
        self::$middlewareLoader = $loader;
    }

    public static function add($method, $uri, $action, $middlewares = [])
    {
        self::$routes[] = ['method' => strtoupper($method), 'uri' => $uri, 'action' => $action, 'middlewares' => $middlewares];
    }

    public static function get($uri, $action, $middlewares = [])
    {
        self::add('GET', $uri, $action, $middlewares);
    }

    public static function post($uri, $action, $middlewares = [])
    {
        self::add('POST', $uri, $action, $middlewares);
    }

    public static function put($uri, $action, $middlewares = [])
    {
        self::add('PUT', $uri, $action, $middlewares);
    }

    public static function patch($uri, $action, $middlewares = [])
    {
        self::add('PATCH', $uri, $action, $middlewares);
    }

    public static function delete($uri, $action, $middlewares = [])
    {
        self::add('DELETE', $uri, $action, $middlewares);
    }

    public static function head($uri, $action, $middlewares = [])
    {
        self::add('HEAD', $uri, $action, $middlewares);
    }

    public static function options($uri, $action, $middlewares = [])
    {
        self::add('OPTIONS', $uri, $action, $middlewares);
    }

    public static function run($basePath)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace($basePath, '', $uri);
        $uri = trim($uri, '/');

        foreach (self::$routes as $route) {
            $routeUri = trim($route['uri'], '/');

            if ($route['method'] === $requestMethod && $routeUri === $uri) {
                $action = $route['action'];
                $middlewareResponse = null;

                if (self::$middlewareLoader) {
                    $route['middlewares'] = call_user_func(self::$middlewareLoader, $route['middlewares']);
                }

                $request = new \App\Providers\Request();

                $middlewareChain = array_reduce(array_reverse($route['middlewares']), function ($next, $middleware) use ($request) {
                    return function () use ($middleware, $next, $request) {
                        return $middleware->handle($request, $next);
                    };
                }, function () use ($action, $request) {
                    if (is_callable($action)) {
                        return call_user_func($action, $request);
                    }

                    if (str_contains($action, '@')) {
                        list($controllerName, $method) = explode('@', $action);
                        $controllerClass = "App\\Http\\Controllers\\$controllerName";
                        $controller = new $controllerClass();
                        return $controller->$method($request);
                    }

                    $viewPath = __DIR__ . "/../../resources/views/{$action}.php";
                    if (!file_exists($viewPath)) {
                        return error('404');
                    }

                    require $viewPath;
                });

                return $middlewareChain($_SERVER);
            }
        }

        error('404');
    }
}
