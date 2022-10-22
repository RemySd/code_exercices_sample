<?php 

function square_digits(int $number): int 
{
    $result = '';

    foreach (str_split(strval($number)) as $digitNumber) {
        $result = $result . intval($digitNumber)**2;
    } 

    return $result;
}

echo square_digits('9119');