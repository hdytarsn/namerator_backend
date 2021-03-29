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
