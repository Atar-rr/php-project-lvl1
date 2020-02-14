<?php

namespace Braingames\Prime;

use function cli\line;
use function cli\prompt;
use function Help_Function\run;
use function Help_Function\makeRandomNum;
use function Help_Function\sayWelcome;
use function Help_Function\satRulesGame;
use function Help_Function\congratule;
use function Help_Function\checkAnswer;

function isprime($num)
{
    if ($num == 1) {
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
    $roundGame = 3;

    sayWelcome();
    satRulesGame('Answer "yes" if given number is prime. Otherwise answer "no".');
    $name = run();
    for ($i = 0; $i < $roundGame; $i++) {
        $randomNum = makeRandomNum();
        $answerCorrect = isprime($randomNum) ? 'yes' : 'no';
        line("Question: $randomNum");
        $answerUser = prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            return ;
        }
    }
    congratule($name);
}
