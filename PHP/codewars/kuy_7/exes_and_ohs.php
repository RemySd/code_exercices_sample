<?php 

/**
 * Check to see if a string has the same amount of 'x's and 'o's. 
 * The method must return a boolean and be case insensitive. 
 * The string can contain any char.
 */
function XO($string) {
    $string = strtolower($string);

    return substr_count($string, 'x') === substr_count($string, 'o');
}

echo XO('OOXXxz');