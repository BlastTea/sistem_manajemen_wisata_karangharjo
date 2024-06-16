<?php
require_once __DIR__ . '/../vendor/load_env.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/functions.php';

use App\Providers\Model;
use App\Http\Kernel;
use App\Providers\Route;

try {
    // set_error_handler(function ($severity, $message, $file, $line) {
        //     throw new ErrorException($message, 0, $severity, $file, $line);
        // });
        
        set_exception_handler(function ($exception) {
            logError($exception);
        });
        
        if (!session_id()) {
            session_start();
        }
        
        $pdo = new PDO($_ENV['DB_CONNECTION'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        Model::setConnection($pdo);
        
        $appUrlPath = parse_url(base_url(), PHP_URL_PATH);
        $appUrlPath = rtrim($appUrlPath, '/');
        
        $request = $_SERVER['REQUEST_URI'];
        $requestPath = str_replace($appUrlPath, '', $request);
        
        $path = parse_url($requestPath, PHP_URL_PATH);
        $path = trim($path, '/');
        $segments = explode('/', $path);
        
        if ($segments[0] === '') {
            header("Location: " . base_url('home'));
            exit;
        }
        
        $kernel = new Kernel();
        
        Route::setMiddlewareLoader(function ($aliases) use ($kernel) {
            return $kernel->getMiddlewaresForRoute($aliases);
        });
        
        require_once __DIR__ . '/../routes/web.php';
        require_once __DIR__ . '/../routes/api.php';
        
        Route::run(parse_url(base_url(), PHP_URL_PATH));
    } catch (\Exception $e) {
        logError($e);
    }