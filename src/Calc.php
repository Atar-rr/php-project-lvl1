<?php

namespace Braingames\Calc;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratulation;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\randomNum;
use function Braingames\Cli\hello;
use function Braingames\Cli\rulesGame;

function randomOperand()
{
    $operandArr = ['+', '-', '*'];

    return $operandArr[randomNum(0, 2)];
}

function makeOperation($operand, $argument1, $argument2)
{
    if ($operand === '+') {
        return $argument1 + $argument2;
    } elseif ($operand === '-') {
        return  $argument1 - $argument2;
    } elseif ($operand === '*') {
        return  $argument1 * $argument2;
    }
}

function calcGame()
{
    $roundGame = 3;

    hello();
    rulesGame('What is the result of the expression?');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++) {
        $argument1 = randomNum();
        $argument2 = randomNum();
        $operand = randomOperand();
        $answerCorrect = makeOperation($operand, $argument1, $argument2);
        line("Question:  $argument1 $operand $argument2");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            exit();
        }
    }
    congratulation($name);
}
