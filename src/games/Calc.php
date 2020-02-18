<?php

namespace Braingames\Calc;

use function Src\Engine\runEngine;

function randomOperand()
{
    $operandArr = ['+', '-', '*'];

    return $operandArr[rand(0, count($operandArr) - 1)];
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
            $result = null;
            break;
    }
    return $result;
}

function calcGame()
{
    $rulesGame = "What is the result of the expression?";
    $calcGame = function () {
        $argument1 = rand(1, 100);
        $argument2 = rand(1, 100);
        $operand = randomOperand();
        $answerCorrect = makeOperation($operand, $argument1, $argument2);
        return ['question' => $argument1 . ' ' . $operand . ' ' . $argument2, 'answerCorrect' => $answerCorrect];
    };
    runEngine($calcGame, $rulesGame);
}
