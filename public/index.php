<?php
require_once __DIR__ . '/../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

$page = basename($path) ?: 'home';

$viewPath = __DIR__ . "/../resources/views/{$page}.php";

if (file_exists($viewPath)) {
    require $viewPath;
} else {
    header("HTTP/1.1 404 Not Found");
    echo "404 Page Not Found";
}