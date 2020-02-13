<?php

namespace Braingame\Progression;

use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\randomNum;
use function Braingames\Cli\hello;
use function Braingames\Cli\rulesGame;
use function Braingames\Cli\congratulation;
use function Braingames\Cli\checkAnswer;

function makeProgression()
{
    $firstNum = randomNum();
    $makeNextNum = 2;
    $progressionArr = [$firstNum];

    for ($j = 0; $j < 10; $j++)
    {
        $firstNum += $makeNextNum;
        $progressionArr [] = $firstNum;
    }
    return $progressionArr;
}

function progressionGame()
{
    $roundGame = 3;

    hello();
    rulesGame('What number is missing in the progression?');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++)
    {
        $progressionArr = makeProgression();
        $randMiss = randomNum(0, 10);
        $answerCorrect = $progressionArr[$randMiss];
        $progressionArr[$randMiss] = '..';
        $progressionStr = implode(' ', $progressionArr);
        line("Qustions: $progressionStr");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name))
            exit();
    }
    congratulation($name);
}