<?php

namespace Braingames\Prime;

use function Src\Engine\runEngine;

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i ** 2 <= $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function primeGame()
{
    $gameRule = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $makeQuestionAndAnswer = function () {
        $question = rand(0, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    runEngine($makeQuestionAndAnswer, $gameRule);
}
