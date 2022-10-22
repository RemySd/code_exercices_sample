<?php 

function detect_pangram(string $string): bool
{
    $string = strtolower($string);
    // range('a', 'z');
    $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');

    foreach ($alphabet as $letter) {
        if (strpos($string, $letter) === false) {           
            return false;
        }
    }

    return true;
}

var_dump(detect_pangram('The five boxi*g wizards jump quickly.'));
var_dump(detect_pangram('ok'));