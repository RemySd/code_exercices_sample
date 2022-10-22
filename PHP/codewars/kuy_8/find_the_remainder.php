<?php 

/**
 * Write a function that accepts two integers and returns the remainder of dividing the larger value by the smaller value.
 * Division by zero should return an empty value.
 */
function remainder(int $number1, int $number2): ?int {

    $largerValue = $number1;
    $smallerValue = $number2;
    
    if ($largerValue < $smallerValue) {
        $largerValue = $number2;
        $smallerValue = $number1;
    }

    if ($smallerValue === 0) {
        return null;
    }

    return $largerValue % $smallerValue;
}

function remainderRefacto(int $number1, int $number2): ?int {

    $lowestNumber = min($number1, $number2);

    if ($lowestNumber === 0) {
        return null;
    }

    return max($number1, $number2) % $lowestNumber;
}

echo remainderRefacto(17, 5);
echo "<br>";
echo remainderRefacto(13, 72);
echo "<br>";
echo remainderRefacto(0, -1);
echo "<br>";
echo remainderRefacto(0, 1);