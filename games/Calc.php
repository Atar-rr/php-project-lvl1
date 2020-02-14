<?php

namespace Braingames\Calc;

use function Help_Function\checkAnswer;
use function Help_Function\congratule;
use function cli\line;
use function cli\prompt;
use function Help_Function\run;
use function Help_Function\makeRandomNum;
use function Help_Function\sayWelcome;
use function Help_Function\satRulesGame;

function randomOperand()
{
    $operandArr = ['+', '-', '*'];

    return $operandArr[makeRandomNum(0, 2)];
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

    sayWelcome();
    satRulesGame('What is the result of the expression?');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++) {
        $argument1 = makeRandomNum();
        $argument2 = makeRandomNum();
        $operand = randomOperand();
        $answerCorrect = makeOperation($operand, $argument1, $argument2);
        line("Question:  $argument1 $operand $argument2");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            return ;
        }
    }
    congratule($name);
}
