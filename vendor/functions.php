<?php

use App\Providers\Response;

function view($viewName, $data = [])
{
    extract($data);
    $filePath = __DIR__ . '/../resources/views/' . $viewName . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        echo "Error: File not found - " . $filePath;
    }
}

function error($statusCode)
{
    header("HTTP/1.1 $statusCode");
    require_once __DIR__ . '/../resources/errors/' . $statusCode . '.php';
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
