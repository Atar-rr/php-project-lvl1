<?php

namespace Braingames\Even;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratulation;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\randomNum;
use function Braingames\Cli\hello;
use function Braingames\Cli\rulesGame;

function answerCorrect($randomNumber)
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function evenGame()
{
    $roundGame = 3;

    hello();
    rulesGame('Answer "yes" if the number is even, otherwise answer "no".');
    $name = run();
    for ($i = 0; $i < $roundGame; $i++) {
        $randomNumber = randomNum();
        $answerCorrect = answerCorrect($randomNumber);
        line("Question:  $randomNumber");
        $answerUser = prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            exit();
        }
    }
    congratulation($name);
}
