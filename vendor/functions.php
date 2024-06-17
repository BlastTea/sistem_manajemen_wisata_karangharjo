<?php

use App\Providers\Response;

function trim_path($path)
{
    return ltrim(str_replace('\\', '/', $path), '/');
}

function resource_path($path = '')
{
    return __DIR__ . '/../resources/' . trim_path($path);
}

function view_path($path = '')
{
    return resource_path('views/') . trim_path($path);
}

function error_path($path = '')
{
    return resource_path('errors/') . trim_path($path);
}

function base_url($path = '')
{
    return $_ENV['APP_URL'] . $_ENV['PUBLIC_PATH'] . '/' . trim_path($path);
}

function css_path($path = '')
{
    return base_url('css/') . trim_path($path);
}

function js_path($path = '')
{
    return base_url('js/') . trim_path($path);
}

function storage_path($path = '')
{
    return base_url('storage/') . trim_path($path);
}

function view($viewName, $data = [])
{
    extract($data);
    $filePath = view_path($viewName) . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        return error(404);
    }
}

function error($statusCode)
{
    header("HTTP/1.1 $statusCode");
    require_once error_path($statusCode) . '.php';
}

function response()
{
    return new Response();
}

function logError(Throwable $e)
{
    $date = date('Y-m-d H:i:s');
    $errorMessage = "{$date} - Error: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "\n";

    file_put_contents(__DIR__ . '/../logs/error.log', $errorMessage, FILE_APPEND);
}

class CustomErrorException extends ErrorException
{
}

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    logError(new CustomErrorException($errstr, 0, $errno, $errfile, $errline));
});

set_exception_handler(function ($exception) {
    logError($exception);
});

register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== NULL) {
        logError(new CustomErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']));
    }
});

function isUserRole($role)
{
    return isset($_SESSION['user']) && $_SESSION['user']->role === $role;
}
