<?php

namespace Braingame\Progression;

use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\makeRandomNum;
use function Braingames\Cli\sayWelcome;
use function Braingames\Cli\satRulesGame;
use function Braingames\Cli\congratule;
use function Braingames\Cli\checkAnswer;

function makeProgression()
{
    $startNum = makeRandomNum();
    $makeNextNum = 2;
    $progressionArr = [$startNum];

    for ($j = 0; $j < 10; $j++) {
        $startNum += $makeNextNum;
        $progressionArr [] = $startNum;
    }
    return $progressionArr;
}

function progressionGame()
{
    $roundGame = 3;

    sayWelcome();
    satRulesGame('What number is missing in the progression?');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++) {
        $progressionArr = makeProgression();
        $randMiss = makeRandomNum(0, 10);
        $answerCorrect = $progressionArr[$randMiss];
        $progressionArr[$randMiss] = '..';
        $progressionStr = implode(' ', $progressionArr);
        line("Question: $progressionStr");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            return ;
        }
    }
    congratule($name);
}
