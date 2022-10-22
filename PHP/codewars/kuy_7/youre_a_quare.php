<?php 

/**
 * Given an integral number, determine if it's a square number:
 */
function isSquare($number)
{
    return sqrt($number) == floor(sqrt($number));
}

echo isSquare(5);
