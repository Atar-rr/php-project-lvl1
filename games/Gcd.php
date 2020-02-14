<?php

namespace Braingames\Gcd;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratule;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\makeRandomNum;
use function Braingames\Cli\sayWelcome;
use function Braingames\Cli\satRulesGame;

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
