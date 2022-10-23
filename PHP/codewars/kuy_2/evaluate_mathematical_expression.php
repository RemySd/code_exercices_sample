<?php 

// (2 / (2 + 3.33) * 4) - -6

class Expression {
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

class Value extends Expression {
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

class ExpressionCatcher {
    public static function catchExpression(string $value) {
        
    }

    public static function catchParenthesis(string $value) 
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
                $parts[] = $part;
                $part = '';
            }

            if ($char === ')') {
                $countOpenParenthesis--;
            }
        }

        $parts[] = $part;

        return $parts;
    }
}

function calc(string $expression): float 
{
    // Ils faut catch les parenthère et les calcules interne
    // Il faut catch en partant de la gauche les * et les / en priorité puis les + et -
    // Faire un system d'arbre

    // Faire un system d'expression qui contient des expressions

    // Faire un Expression Builder qui va être utilisé par le catcher

    var_dump(ExpressionCatcher::catchParenthesis($expression));

    return 0;
}

calc('5 + (2 / (2 + 3.33) * 4) - -6');