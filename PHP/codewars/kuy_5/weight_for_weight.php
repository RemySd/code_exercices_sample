<?php 

ini_set('display_errors', 1);




function sumOfDigitNumber($value)
{
    $numbers = str_split(strval($value));

    $sum = 0;

    foreach ($numbers as $number) {
        $sum += intval($number);
    }

    return $sum;
}

function sortBySumDigitNumber($number1, $number2) 
{
    $sum1 = sumOfDigitNumber($number1);
    $sum2 = sumOfDigitNumber($number2);

    if ($sum1 == $sum2) {
        $array = [$number1, $number2];
        sort($array, SORT_STRING);

        if ($number1 === $number2) {
            return 0;
        }
        
        if ($array[0] === $number1) {
            return -1;
        }

        return 1;
    }
    return ($sum1 < $sum2) ? -1 : 1;
}


function orderWeight($str) {
    $nums = explode(" ", $str);
    usort($nums, "sortBySumDigitNumber");
    return implode(' ', $nums);
}

var_dump(orderWeight("2000 10003 1234000 44444444 9999 11 11 22 123"));