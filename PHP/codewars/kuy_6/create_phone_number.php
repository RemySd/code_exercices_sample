<?php 

function createPhoneNumber($numbersArray) {
    preg_match("/^([0-9]{0,3})([0-9]{0,3})([0-9]{0,4})$/i", implode($numbersArray), $matches);
    
    return "({$matches[1]}) {$matches[2]}-{$matches[3]}";

    // return vsprintf("(%d%d%d) %d%d%d-%d%d%d%d", $numbersArray);
}

echo createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]);
