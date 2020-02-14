<?php

namespace Braingames\Calc;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratule;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\makeRandomNum;
use function Braingames\Cli\sayWelcome;
use function Braingames\Cli\satRulesGame;

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
