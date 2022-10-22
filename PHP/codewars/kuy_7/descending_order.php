<?php 

function descendingOrder(int $number): int 
{
    $numberToArray = str_split(strval($number));
    rsort($numberToArray);
    
    return intval(implode($numberToArray));
}

echo descendingOrder(1021);