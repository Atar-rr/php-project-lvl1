<?php

namespace Braingames\Even;

use function Src\Engine\runEngine;

function makeCorrectAnswer($randomNumber)
{
    return $randomNumber % 2 === 0 ? true : false;
}

function evenGame()
{
    $rulesGame = 'Answer "yes" if the number is even, otherwise answer "no".';

    $evenGame = function () {
        $randomNumber = rand(0, 100);
        $answerCorrect = makeCorrectAnswer($randomNumber) ? 'yes' : 'no';
        return ['question' => $randomNumber, 'answerCorrect' => $answerCorrect];
    };
    runEngine($evenGame, $rulesGame);
}
