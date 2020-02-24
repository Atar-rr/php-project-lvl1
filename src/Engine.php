<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

function runEngine($gameFunc, $gameRule)
{
    $roundsCount = 3;
    line('Welcome to the Brain Games!');
    line($gameRule . "\n");
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($i = 0; $i < $roundsCount; $i++) {
        ['correctAnswer' => $correctAnswer, 'question' => $question] = $gameFunc();
        line("Question: $question");
        $userAnswer = prompt("Your answer");
        if ($correctAnswer == (string)$userAnswer) {
            line('Correct');
        } else {
            line("$userAnswer is wrong answer ;(. Correct answer was $correctAnswer. ");
            line("Let's try again, $name!");
            exit();
        }
    }
    line("Congratulations, $name!");
}
