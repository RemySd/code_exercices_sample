<?php 

/**
 * Simple, given a string of words, return the length of the shortest word(s).
 * String will never be empty and you do not need to account for different data types.
 */
function findShort($str)
{
    $words = explode(' ', $str);

    usort($words, function($str1, $str2) {
        return strlen($str2) - strlen($str1);
    });

    return strlen($words[count($words) - 1]);
}

echo findShort("bitcoin take over the world maybe who knows perhaps");