<?php

/**
 * Given an array of integers, return a new array with each value doubled.
 */
function maps(array $map): array
{
    return array_map(function($value) {
        return $value * 2;
    }, $map);
}

var_dump(maps([1, 2, 3]));
echo '<br>';
var_dump(maps([4, 1, 1, 1, 4]));
echo '<br>';
var_dump(maps([2, 2, 2, 2, 2, 2]));
