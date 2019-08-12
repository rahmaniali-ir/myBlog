<?php

const HEX = '0123456789ABCDEF';

function hexHigher($char) {
    $pos = strpos(HEX, $char);

    if($pos === false) {
        return false;
    }
    
    if($pos + 1 >= 16) {
        return HEX[$pos];
    }
    
    return HEX[$pos + 1];
}

function hexLower($char) {
    $pos = strpos(HEX, $char);

    if($pos === false) {
        return false;
    }
    
    if($pos - 1 <= 0) {
        return HEX[$pos];
    }
    
    return HEX[$pos - 1];
}

function randomColor() {
    $color = '#';

    for($i = 0; $i < 6; $i++) {
        $color .= randChar(HEX);
    }

    return $color;
}

function lighterColor($color, $times = 1) {
    $color = str_replace('#', '', $color);
    $newColor = '#';

    for($i = 0; $i < strlen($color); $i++) {
        $temp = $color[$i];
        for($j = 0; $j < $times; $j++) {
            $temp = hexHigher($temp);
        }

        $newColor .= $temp;
    }

    return $newColor;
}
