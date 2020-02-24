<?php

namespace Braingames\Gcd;

use function Src\Engine\runEngine;

function findGcd($num1, $num2)
{
    $gcd = $num1 < $num2 ? $num1 : $num2;
    while ($num1 % $gcd > 0 || $num2 % $gcd > 0) {
        $gcd--;
    }
    return $gcd;
}

function gcdGame()
{
    $gameRule = 'Find the greatest common divisor of given numbers.';

    $makeQuestionAndAnswer = function () {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $correctAnswer = findGcd($num1, $num2);
        return ['question' => "{$num1} {$num2}", 'correctAnswer' => $correctAnswer];
    };
    runEngine($makeQuestionAndAnswer, $gameRule);
}
