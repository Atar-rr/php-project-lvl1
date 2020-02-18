<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

function runEngine($gameFunc, $rulesGame)
{
    $roundGames = 3;
    line('Welcome to the Brain Games!');
    line($rulesGame . "\n");
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    for ($i = 0; $i < $roundGames; $i++) {
        $informationForGame = $gameFunc();
        line("Question: $informationForGame[question]");
        $answerUser = prompt("Your answer");
        if ($informationForGame['answerCorrect'] == (string)$answerUser) {
            line('Correct');
        } else {
            line("$answerUser is wrong answer ;(. Correct answer was $informationForGame[answerCorrect]. ");
            line("Let's try again, $name!");
            return 0;
        }
    }
    line("Congratulations, $name!");
}
