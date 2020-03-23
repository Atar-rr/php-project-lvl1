<?php

namespace Braingames\games\Progression;

use function Braingames\Engine\runEngine;

function makeStepForProgression()
{
    $startProgression = rand(0, 100);
    $nextStep = rand(1, 5);
    return ([$startProgression, $nextStep]);
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
        [$startProgression, $nextStep] = makeStepForProgression();
        $progressions = makeProgression($startProgression, $nextStep, $progressionLen);
        $randSkip = array_rand($progressions);
        $correctAnswer = $progressions[$randSkip];
        $question = makeQuestion($progressions, $randSkip);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    runEngine($makeQuestionAndAnswer, $gameRule);
}
