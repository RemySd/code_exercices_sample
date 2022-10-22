<?php 

function highAndLow($numbers)
{
    $numbersExplode = explode(' ', $numbers);

    return max($numbersExplode) . ' ' . min($numbersExplode);
}

echo highAndLow("8 3 -5 42 -1 0 0 -9 4 7 4 -4");