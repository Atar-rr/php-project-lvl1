<?php

namespace Braingames\Even;

use function cli\line;
use function cli\prompt;

function rulesGame()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function randomNum()
{
    $min = 1;
    $max = 100;

    return rand($min, $max);
}

function answerCorrect($randomNumber)
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function randomGame($name)
{
    $roundGame = 3;

    for($i = 0; $i < $roundGame; $i++) {
        $randomNumber = randomNum();
        $answerCorrect = answerCorrect($randomNumber);
        line("Question:  $randomNumber");
        $answerUser = prompt("Your answer");

        if ($answerCorrect == $answerUser) {
            line('Correct');
        } else {
            line("$answerUser is wrong answer ;(. Correct answer was $answerCorrect. ");
            line("Let's try again, $name!");
            exit();
        }
    }
    line("Congratulations, $name!");
}
