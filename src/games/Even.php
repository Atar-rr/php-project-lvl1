<?php

namespace Braingames\Even;

use function Src\Engine\runEngine;

function isEven($randomNumber)
{
    return $randomNumber % 2 === 0;
}

function evenGame()
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no".';

    $makeQuestionAndAnswer = function () {
        $question = rand(0, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    runEngine($makeQuestionAndAnswer, $gameRule);
}
