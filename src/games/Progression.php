<?php

namespace Braingame\Progression;

use function Src\Engine\runEngine;

function makeProgression()
{
    $startNum = rand(0, 100);
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
    $rulesGame = 'What number is missing in the progression?';

    $progressionGame = function () {
        $progressionArr = makeProgression();
        $randMiss = rand(0, 10);
        $answerCorrect = $progressionArr[$randMiss];
        $progressionArr[$randMiss] = '..';
        $progressionStr = implode(' ', $progressionArr);
        return ['question' => $progressionStr, 'answerCorrect' => $answerCorrect];
    };

    runEngine($progressionGame, $rulesGame);
}
