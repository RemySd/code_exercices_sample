<?php 

function toJadenCase($string) 
{
    $strings = explode(' ', $string);
    
    return implode(
        ' ', 
        array_map(function($word) {
            return ucfirst($word);
        }, $strings)
    );
}

echo toJadenCase("How can mirrors be real if our eyes aren't real");