<?php

$envPath = realpath(dirname(__FILE__) . '/../.env');
if (!file_exists($envPath)) {
    return false;
}

$envVars = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($envVars as $line) {
    if (strpos(trim($line), '#') === 0) {
        continue;
    }

    list($name, $value) = explode('=', $line, 2);
    $name = trim($name);
    $value = trim($value);

    if (!array_key_exists($name, $_ENV)) {
        $_ENV[$name] = $value;
    }
}

return true;
