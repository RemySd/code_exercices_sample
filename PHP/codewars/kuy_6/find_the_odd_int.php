<?php 

function findIt(array $values) : int
{
    $numbers = array_count_values($values);

    foreach ($numbers as $key => $value) {
        if ($value % 2 === 1) {
            return $key;
        }
    }
}

echo findIt([20,1,-1,2,-2,3,3,5,5,1,2,4,20,4,-1,-2,5]);