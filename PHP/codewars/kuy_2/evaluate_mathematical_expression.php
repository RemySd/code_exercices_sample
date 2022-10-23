<?php

ini_set('display_errors', 1);


// (2 / (2 + 3.33) * 4) - -6

class Expression
{
    private Expression $leftValue;
    private Expression $rightValue;
    private $symbole;

    function __construct(Expression $leftValue, Expression $rightValue, $symbole)
    {
        $this->leftValue = $leftValue;
        $this->rightValue = $rightValue;
        $this->symbole = $symbole;
    }

    public function calculate(): float
    {
        switch ($this->symbole) {
            case '+':
                return $this->leftValue->calculate() + $this->rightValue->calculate();
                break;
            case '-':
                return $this->leftValue->calculate() - $this->rightValue->calculate();
                break;
            case '/':
                return $this->leftValue->calculate() / $this->rightValue->calculate();
                break;
            case '*':
                return $this->leftValue->calculate() * $this->rightValue->calculate();
                break;
        }
    }
}

class ParenthesisExpression extends Expression
{
}

class Value extends Expression
{
    private $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    public function calculate(): float
    {
        return $this->value;
    }
}

function catchParenthesis(string $value)
{
    $parts = [];
    $countOpenParenthesis = 0;
    $part = '';

    foreach (str_split($value) as $char) {
        if ($char === '(') {
            $countOpenParenthesis++;
        }

        if ($char === '(' && $countOpenParenthesis === 1) {
            $parts[] = $part;
            $part = '';
        }

        $part = $part . $char;

        if ($char === ')' && $countOpenParenthesis === 1) {
            $parts[] = catchParenthesis(mb_substr($part, 1, -1));
            $part = '';
        }

        if ($char === ')') {
            $countOpenParenthesis--;
        }
    }

    $parts[] = $part;

    return $parts;
}

function splitExpression(string $expression)
{
    $parts = [];
    $part = '';

    $previousChar = '';
    $previousSymboleIsOperator = false;

    foreach (str_split($expression) as $char) {
        if (is_numeric($previousChar)) {
            $previousChar = $previousChar . $char;
            continue;
        }
        
        if (
            preg_match('/^(\+|-|\*|\/)$/', $char) === 1 && 
            ($previousChar === ' ' || preg_match('/^[0-9]$/', $previousChar) === 1) &&
            $previousSymboleIsOperator === false
        ) {
            $previousSymboleIsOperator = true;
            $parts[] = $part;
            $parts[] = $char;
            $previousChar = $char;
            $part = '';
            continue;
        } 

        if (preg_match('/^[0-9]$/', $char) === 1) {
            $previousSymboleIsOperator = false;
        }

        $part = $part . $char;
        $previousChar = $char;
    }

    $parts[] = $part;

    return array_map('trim', $parts);
}

function solveExpression(string $expressionToSolve) 
{
    $value1 = null;
    $value2 = null;
    $operator = null;

    $result = 0;
    $posToRemove = [];

    $expressions = splitExpression($expressionToSolve);

    if (count($expressions) <= 1) {
        return '???';
    }

    if (!in_array('*', $expressions) && !in_array('/', $expressions)) {
        return solveAdditionSoustraction(implode($expressions));
    }

    // check * and /
    foreach ($expressions as $key => $expression) {
        if (is_numeric($expression) && empty($value1)) {
            $value1 = floatval($expression);
            $posToRemove[] = $key;
        }

        if (
            preg_match('/^(\*|\/)$/', $expression) && 
            empty($operator) && 
            !empty($value1)
        ) {
            $posToRemove[] = $key;
            $operator = $expression;
        }

        if (
            preg_match('/^(\+|\-)$/', $expression) 
        ) {
            $value1 = null;
            $value2 = null;
            $operator = null;
            $posToRemove = [];
        }

        if (
            is_numeric($expression) &&
            empty($value2) &&
            !empty($operator) && 
            !empty($value1)
        ) {
            $value2 = floatval($expression);
            $posToRemove[] = $key;
        }

        if ($value1 && $operator && $value2) {
            $result += applyOperator($value1, $value2, $operator);

            $value1 = null;
            $value2 = null;
            $operator = null;

            break;
        }
    }

    if (!empty($posToRemove)) {

        unset($expressions[$posToRemove[0]]);
        unset($expressions[$posToRemove[1]]);
        $expressions[$posToRemove[2]] = $result;
        $expressions = array_values($expressions);

        if (!in_array(['*', '/'], $expressions)) {
            return solveAdditionSoustraction(implode($expressions));
        }

        return solveExpression(implode($expressions));
    }

    return $result;
}

function solveAdditionSoustraction($expressionToSolve)
{
    $value1 = null;
    $value2 = null;
    $operator = null;

    $result = 0;
    $posToRemove = [];

    $expressions = splitExpression($expressionToSolve);


    if (count($expressions) <= 1) {
        return $expressions[0];
    }

    if (!in_array('+', $expressions) && !in_array('-', $expressions)) {
        return '???';
    }

    // check + and -
    foreach ($expressions as $key => $expression) {
        if (is_numeric($expression) && empty($value1)) {
            $value1 = floatval($expression);
            $posToRemove[] = $key;
        }

        if (
            preg_match('/^(\+|\-)$/', $expression) && 
            empty($operator) && 
            !empty($value1)
        ) {
            $posToRemove[] = $key;
            $operator = $expression;
        }

        if (
            is_numeric($expression) &&
            empty($value2) &&
            !empty($operator) && 
            !empty($value1)
        ) {
            $value2 = floatval($expression);
            $posToRemove[] = $key;
        }

        if ($value1 && $operator && $value2) {
            
            $result += applyOperator($value1, $value2, $operator);

            $value1 = null;
            $value2 = null;
            $operator = null;

            break;
        }
    }

    // ($result);

    if (!empty($posToRemove)) {

        unset($expressions[$posToRemove[0]]);
        unset($expressions[$posToRemove[1]]);
        $expressions[$posToRemove[2]] = $result;

        $expressions = array_values($expressions);

        if (in_array('+', $expressions) || in_array('-', $expressions)) {
            return solveAdditionSoustraction(implode($expressions));
        }
    }

    return $result;
}

function applyOperator($value1, $value2, $operator)
{
    switch ($operator) {
        case '+':
            return $value1 + $value2;
            break;
        case '-':
            return $value1 - $value2;
            break;
        case '/':
            return $value1 / $value2;
            break;
        case '*':
            return $value1 * $value2;
            break;
    }
}

function calc(string $expression): float
{
    // Ils faut catch les parenthère et les calcules interne
    // Il faut catch en partant de la gauche les * et les / en priorité puis les + et -
    // Faire un system d'arbre

    // Faire un system d'expression qui contient des expressions

    // Faire un Expression Builder qui va être utilisé par le catcher

    var_dump(solveExpression($expression));

    return 0;
}

// calc('5 + (2 / (2 + 3.33) * 4) - -6');
// calc('2 * 5 + -3 + -4 - 5 + 2 + 10');
calc('0 + 10');

