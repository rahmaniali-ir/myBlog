<?php

$icons = [];

foreach(glob('src/icon/*.svg') as $icon) {
    try {
        $svg = file_get_contents($icon);
        $icons[basename($icon, '.svg')] = $svg;
    } catch (Exception $e) {}
}

function icon($index, $style = '', $defs = '') {
    global $icons;

    if(!isset($icons[$index])) {
        return false;
    };

    $ico = $icons[$index];

    if($style) {
        $ico = str_replace('<svg', '<svg style="' . $style . '"', $ico);
    }

    if($defs) {
        $ico = str_replace('</svg>', '<defs>' . $defs .'</defs></svg>', $ico);
    }

    return $ico;
}
