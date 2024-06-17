<?php

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../';
    $className = str_replace("\\", "/", $className);
    $pathParts = explode('/', $className);

    $pathParts = array_map(function($part) {
        return $part === 'App' ? 'app' : $part;
    }, $pathParts);

    $className = implode('/', $pathParts);
    $file = $baseDir . $className . '.php';

    if (file_exists($file)) {
        require $file;
    }
});