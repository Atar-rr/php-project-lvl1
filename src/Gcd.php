<?php

namespace Braingames\Gcd;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratulation;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\randomNum;
use function Braingames\Cli\hello;
use function Braingames\Cli\rulesGame;

function gcdGame()
{
    $roundGame = 3;

    hello();
    rulesGame('Find the greatest common divisor of given numbers.');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++) {
        $num1 = randomNum();
        $num2 = randomNum();
        $nod = $num1 < $num2 ? $num1 : $num2;
        while ($num1 % $nod > 0 || $num2 % $nod > 0) {
            $nod--;
        }
        $answerCorrect = $nod;
        line("Qustions: $num1 $num2");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            exit();
        }
    }
    congratulation($name);
}
