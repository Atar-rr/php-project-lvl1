<?php

namespace Braingames\Calc;

use function Src\Engine\runEngine;

function randomOperand()
{
    $operands = ['+', '-', '*'];

    return $operands[array_rand($operands, 1)];
}

function makeOperation($operand, $argument1, $argument2)
{
    switch ($operand) {
        case '+':
            $result = $argument1 + $argument2;
            break;
        case '-':
            $result =  $argument1 - $argument2;
            break;
        case '*':
            $result =  $argument1 * $argument2;
            break;
        default:
            return null;
    }
    return $result;
}

function calcGame()
{
    $gameRule = "What is the result of the expression?";
    $makeQuestionAndAnswer = function () {
        $argument1 = rand(1, 100);
        $argument2 = rand(1, 100);
        $operand = randomOperand();
        $correctAnswer = makeOperation($operand, $argument1, $argument2);
        return ['question' => "{$argument1} {$operand} {$argument2}", 'correctAnswer' => $correctAnswer];
    };
    runEngine($makeQuestionAndAnswer, $gameRule);
}
