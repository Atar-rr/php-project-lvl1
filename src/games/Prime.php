<?php

namespace Braingames\Prime;

use function Src\Engine\runEngine;

function isprime($num)
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
    $rulesGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $primeGame = function () {
        $randomNum = rand(0, 100);
        $answerCorrect = isprime($randomNum) ? 'yes' : 'no';
        return ['question' => $randomNum, 'answerCorrect' => $answerCorrect];
    };
    runEngine($primeGame, $rulesGame);
}
