<?php

function dieJson($arr) {
    if(!is_array($arr)) {
        return false;
    }

    die(json_encode($arr));
}

function explodeIn($text, $tag = 'div', $by = ' ') {
    if(empty($text)) {
        return '';
    }

    if(empty($tag) || empty($by)) {
        return $text;
    }

    $parts = explode($by, $text);
    $result = '';
    foreach($parts as $part) {
        $result .= "<$tag>$part</$tag>";
    }

    return $result;
}

function randChar($str) {
    if(strlen($str) == 0) {
        return false;
    }

    return $str[rand(0, strlen($str) - 1)];
}

function calcPrice($price = 0, $percent = 0) {
    try {
        $off = ($price * $percent) / 100;
        return $price - $off;
    } catch(Exception $e) {
        return false;
    }
}

function priceFormat($price) {
    $price = strval(strrev($price));
    str_replace(',', '', $price);

    $parts = str_split($price, 3);

    return strrev(implode(',', $parts));
}

function faNumber($input) {
    $input = str_split(($input));

    $faNumbers = [
        '۰',
        '۱',
        '۲',
        '۳',
        '۴',
        '۵',
        '۶',
        '۷',
        '۸',
        '۹'
    ];

    $result = '';
    foreach($input as $char) {
        if(is_numeric($char)) {
            $result .= $faNumbers[$char];
        } else {
            $result .= $char;
        }
    }

    return $result;
}

function highlightWord($string, $word = '') {
    return str_replace($word, '<span class="highlight">' . $word . '</span>', $string);
}
