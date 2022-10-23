<?php 

function summation($n) {
    return $n > 0 ? $n + summation($n - 1) : 0;
}

echo summation(10);