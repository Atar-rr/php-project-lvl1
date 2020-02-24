<?php

namespace Braingame\Progression;

use function Src\Engine\runEngine;

function makeProgression()
{
    $startNum = rand(0, 100);
    $makeNextNum = 2;
    $progressionsCount = 10;
    $progressions = [];

    for ($j = 0; $j < $progressionsCount; $j++) {
        $startNum += $makeNextNum;
        $progressions [] = $startNum;
    }
    return $progressions;
}

function makeQuestion($progressions, $randSkip)
{
    $progressions[$randSkip] = '..';
    return implode(' ', $progressions);
}

function progressionGame()
{
    $gameRule = 'What number is missing in the progression?';

    $makeQuestionAndAnswer = function () {
        $progressions = makeProgression();
        $randSkip = rand(0, count($progressions) - 1);
        $correctAnswer = $progressions[$randSkip];
        $question = makeQuestion($progressions, $randSkip);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    runEngine($makeQuestionAndAnswer, $gameRule);
}
