<?php
require_once __DIR__ . '/../vendor/load_env.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Providers\Model;

$pdo = new PDO($_ENV['DB_CONNECTION'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
Model::setConnection($pdo);

use App\Http\Kernel;
use App\Providers\Route;

$appUrlPath = parse_url($_ENV['APP_URL'], PHP_URL_PATH);
$appUrlPath = rtrim($appUrlPath, '/');

$request = $_SERVER['REQUEST_URI'];
$requestPath = str_replace($appUrlPath, '', $request);

$path = parse_url($requestPath, PHP_URL_PATH);
$path = trim($path, '/');
$segments = explode('/', $path);

if ($segments[0] === '') {
    header("Location: " . $_ENV['APP_URL'] . "/home");
    exit;
}

require_once __DIR__ . '/../vendor/functions.php';

$kernel = new Kernel();

Route::setMiddlewareLoader(function ($aliases) use ($kernel) {
    return $kernel->getMiddlewaresForRoute($aliases);
});

require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/api.php';

Route::run(parse_url($_ENV['APP_URL'], PHP_URL_PATH));