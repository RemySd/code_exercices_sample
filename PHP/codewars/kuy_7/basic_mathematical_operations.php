<?php 

function basicOp(string $operation, float $number1, float $number2): ?float
{
    $result = null;

    switch ($operation) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        case '/':
            $result = $number1 / $number2;
    }

    return $result + 0;
}

echo basicOp('+', 4, 7);
echo '<br>';
echo basicOp('-', 15, 18);
echo '<br>';
echo basicOp('*', 5, 5);
echo '<br>';
echo basicOp('/', 49, 7);
echo '<br>';
echo basicOp('+', 100.00, 8);
echo '<br>';