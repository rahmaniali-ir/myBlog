<?php

$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
echo $protocol;
// Define constants
define('SITE_URL', $protocol . 'rahmaniali.ir/');
define('SITE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SITE_TITLE', 'Ali Rahmani');

// Start session
session_start();

// Include libraries
foreach(glob('src/lib/*.php') as $lib) {
    include_once($lib);
}
