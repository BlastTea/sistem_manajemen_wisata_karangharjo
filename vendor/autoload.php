<?php

spl_autoload_register(function ($className) {
    $baseDir = __DIR__ . '/../';
    $className = str_replace("\\", "/", $className);
    $file = $baseDir . $className . '.php';

    if (file_exists($file)) {
        require $file;
    }
});