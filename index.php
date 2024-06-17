<?php 
require_once __DIR__ . '/vendor/load_env.php';

$url = base_url();

header("Location: $url");
exit;