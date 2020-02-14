<?php

namespace Braingames\Prime;

use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\randomNum;
use function Braingames\Cli\hello;
use function Braingames\Cli\rulesGame;
use function Braingames\Cli\congratulation;
use function Braingames\Cli\checkAnswer;

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

    hello();
    rulesGame('Answer "yes" if given number is prime. Otherwise answer "no".');
    $name = run();
    for ($i = 0; $i < $roundGame; $i++) {
        $randomNum = randomNum();
        $answerCorrect = isprime($randomNum) ? 'yes' : 'no';
        echo $answerCorrect . PHP_EOL;
        line("Qustions: $randomNum");
        $answerUser = prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            exit();
        }
    }
    congratulation($name);
}
