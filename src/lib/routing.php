<?php

$loadedModuleName = 'home';
function loadedModule() {
    global $loadedModuleName;
    return $loadedModuleName;
}

function getHomeURL($path = null) {
    if(!$path || $path == '/') {
        return SITE_URL;
    }

    return SITE_URL . $path;
}

function getModuleName() {
    $url = $_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1' ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'];
    $url .= $_SERVER['REQUEST_URI'];

    $req = str_replace(SITE_URL, '', $url);

    // Finding '?' symbol
    $symbolPosition = strpos($req, '?');
    if($symbolPosition !== false) {
        $req = substr($req, 0, $symbolPosition);
    }

    // Finding '#' symbol
    $symbolPosition = strpos($req, '#');
    if($symbolPosition !== false) {
        $req = substr($req, 0, $symbolPosition);
    }

    return $req;
}

function renderPage() {
    global $icons;
    include_once('src/layout/header.php');
    getContent();
    include_once('src/layout/footer.php');
}

function loadModule() {
    global $loadedModuleName;

    $moduleName = getModuleName();
    if(empty($moduleName)) {
        $moduleName = 'home';
    }
    
    if(file_exists('src/layout/module/' . $moduleName . '/index.php')) {
        require_once('src/layout/module/' . $moduleName . '/index.php');
        $loadedModuleName = $moduleName;
    } else {
        require_once('src/layout/module/404/index.php');
        $loadedModuleName = '404';
    }

    renderPage();
}
