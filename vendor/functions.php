<?php

function view($viewName, $data = [])
{
    extract($data);
    require_once __DIR__ . '/../resources/views/' . $viewName . '.php';
}

function error($statusCode) {
    header("HTTP/1.1 $statusCode");
    require_once __DIR__ . '/../resources/errors/' . $statusCode . '.php';
}