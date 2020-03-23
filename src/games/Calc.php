<?php

namespace Braingames\games\Calc;

use function Braingames\Engine\runEngine;

function randomOperand()
{
    $operations = ['+', '-', '*'];

    return $operations[array_rand($operations, 1)];
}

function makeOperation($operation, $argument1, $argument2)
{
    switch ($operation) {
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
        $operation = randomOperand();
        $correctAnswer = makeOperation($operation, $argument1, $argument2);
        return ['question' => "{$argument1} {$operation} {$argument2}", 'correctAnswer' => $correctAnswer];
    };
    runEngine($makeQuestionAndAnswer, $gameRule);
}
