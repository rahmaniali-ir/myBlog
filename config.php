<?php

// Define constants
define('SITE_URL', 'http://localhost/LearnPath/');
define('SITE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SITE_TITLE', 'LearnPath');

// Start session
session_start();

// Include libraries
foreach(glob('src/lib/*.php') as $lib) {
    include_once($lib);
}
