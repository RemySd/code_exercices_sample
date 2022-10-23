<?php 

/**
 * A beer can pyramid will square the number of cans in each level - 1 can in the top level, 4 in the second, 9 in the next, 16, 25...
 * Complete the beeramid function to return the number of complete levels of a beer can pyramid you can make, given the parameters of:
 * - your referral bonus, and
 * - the price of a beer can
 */
function beeramid($bonus, $price) {

    if ($bonus <= 0) {
        return 0;
    }

    $maxBeer = (int) $bonus / $price;

    $countCurrentBeer = 0;
    $iterator = 0;

    while ($countCurrentBeer <= $maxBeer) {
        $iterator++;
        $countCurrentBeer += $iterator**2;
    }

    return $iterator - 1;
}

echo beeramid(658, 7.8);