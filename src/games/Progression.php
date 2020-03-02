<?php

namespace Braingame\Progression;

use function Src\Engine\runEngine;

function makeStepForProgression()
{
    $startStep = rand(0, 100);
    $nextStep = rand(1, 5);
    return ([$startStep, $nextStep]);
}

function makeProgression($startStep, $nextStep, $progressionLen)
{
    $progressions = [];

    for ($j = 0; $j < $progressionLen; $j++) {
        $startStep += $nextStep;
        $progressions [] = $startStep;
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
        $progressionLen = 10;
        [$startStep, $nextStep] = makeStepForProgression();
        $progressions = makeProgression($startStep, $nextStep, $progressionLen);
        $randSkip = array_rand($progressions);
        $correctAnswer = $progressions[$randSkip];
        $question = makeQuestion($progressions, $randSkip);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    runEngine($makeQuestionAndAnswer, $gameRule);
}
