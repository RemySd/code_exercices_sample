<?php 

/**
 * You are going to be given a word. 
 * Your job is to return the middle character of the word. 
 * If the word's length is odd, return the middle character. 
 * If the word's length is even, return the middle 2 characters.
 */
function getMiddle($text) 
{
    $middleIndex = intval(strlen($text) / 2);

    if (strlen($text) % 2 === 0) {
        return substr($text, $middleIndex - 1, 1) . substr($text, $middleIndex, 1) ;
    }

    return substr($text, $middleIndex, 1);
}

echo getMiddle('okokok');