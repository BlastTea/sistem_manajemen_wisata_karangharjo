<?php

use App\Providers\Response;

function view($viewName, $data = [])
{
    extract($data);
    require_once __DIR__ . '/../resources/views/' . $viewName . '.php';
    // ob_start();
    // require __DIR__ . '/../resources/views/' . $viewName . '.php';
    // $output = ob_get_clean();
    // echo $output;
}

function error($statusCode) {
    header("HTTP/1.1 $statusCode");
    require_once __DIR__ . '/../resources/errors/' . $statusCode . '.php';
}


function response() {
    return new Response();
}