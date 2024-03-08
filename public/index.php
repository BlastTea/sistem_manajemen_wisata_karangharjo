<?php
require_once __DIR__ . '/../vendor/autoload.php';

$appUrlPath = parse_url($_ENV['APP_URL'], PHP_URL_PATH);
$appUrlPath = rtrim($appUrlPath, '/');

$request = $_SERVER['REQUEST_URI'];
$requestPath = str_replace($appUrlPath, '', $request);

$path = parse_url($requestPath, PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

if ($segments[0] === 'components') {
    header("HTTP/1.1 404 Not Found");
    echo "404 Page Not Found";
    exit;
}

$page = $segments[0] ?: 'home';

$viewPath = __DIR__ . "/../resources/views/{$page}.php";

if (file_exists($viewPath)) {
    require $viewPath;
} else {
    header("HTTP/1.1 404 Not Found");
    echo "404 Page Not Found";
}