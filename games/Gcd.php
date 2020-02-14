<?php

namespace Braingames\Gcd;

use function Help_Function\checkAnswer;
use function Help_Function\congratule;
use function cli\line;
use function cli\prompt;
use function Help_Function\run;
use function Help_Function\makeRandomNum;
use function Help_Function\sayWelcome;
use function Help_Function\satRulesGame;

function gcdGame()
{
    $roundGame = 3;

    sayWelcome();
    satRulesGame('Find the greatest common divisor of given numbers.');
    $name = run();

    for ($i = 0; $i < $roundGame; $i++) {
        $num1 = makeRandomNum();
        $num2 = makeRandomNum();
        $nod = $num1 < $num2 ? $num1 : $num2;
        while ($num1 % $nod > 0 || $num2 % $nod > 0) {
            $nod--;
        }
        $answerCorrect = $nod;
        line("Question: $num1 $num2");
        $answerUser = (int)prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            return ;
        }
    }
    congratule($name);
}
