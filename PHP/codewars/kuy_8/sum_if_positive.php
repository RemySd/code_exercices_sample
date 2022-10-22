<?php 

function positive_sum(array $numbers): float
{
    return array_sum(array_filter($numbers, function ($number) {
        return $number > 0;
    }));
}

echo positive_sum([1, 2, 3, 4, 5]);