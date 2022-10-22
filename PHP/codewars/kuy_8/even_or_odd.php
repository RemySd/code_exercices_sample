<?php 

function even_or_odd(int $number): string {
    return $number%2 === 0 ? 'Even' : 'Odd';
}

echo even_or_odd(14);