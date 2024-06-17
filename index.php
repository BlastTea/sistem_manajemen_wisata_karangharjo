<?php 
require_once __DIR__ . '/vendor/load_env.php';
require_once __DIR__ . '/vendor/functions.php';

$url = base_url();

header("Location: $url");
exit;