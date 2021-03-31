<?php

function generateString($length = 5)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function slugify($string, $separator = '-')
{
    $string = str_replace(
        ['ü', 'Ü', 'ö', 'Ö'],
        ['u', 'U', 'o', 'O'],
        $string
    );

    return Str::slug($string, $separator);
}
function toLowerCase($string)
{

    $string = str_replace('Ç', 'c', $string);
    $string = str_replace('Ğ', 'g', $string);
    $string = str_replace('I', 'i', $string);
    $string = str_replace('İ', 'i', $string);
    $string = str_replace('Ö', 'o', $string);
    $string = str_replace('Ş', 's', $string);
    $string = str_replace('Ü', 'u', $string);
    $string = strtolower($string);
    return $string;
}
