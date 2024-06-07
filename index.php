<?php 
require_once __DIR__ . '/vendor/load_env.php';

$url = $_ENV['APP_URL'];

header("Location: $url");