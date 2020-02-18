<?php

namespace Braingames\Gcd;

use function Src\Engine\runEngine;

function gcdGame()
{
    $rulesGame = 'Find the greatest common divisor of given numbers.';

    $gcdGame = function () {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $nod = $num1 < $num2 ? $num1 : $num2;
        while ($num1 % $nod > 0 || $num2 % $nod > 0) {
            $nod--;
        }
        $answerCorrect = $nod;
        return ['question' => $num1 . ' ' . $num2, 'answerCorrect' => $answerCorrect];
    };
    runEngine($gcdGame, $rulesGame);
}
