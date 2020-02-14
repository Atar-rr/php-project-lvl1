<?php

namespace Braingames\Even;

use function cli\line;
use function cli\prompt;
use function Help_Function\checkAnswer;
use function Help_Function\congratule;
use function Help_Function\run;
use function Help_Function\makeRandomNum;
use function Help_Function\sayWelcome;
use function Help_Function\satRulesGame;

function makeCorrectAnswer($randomNumber)
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function evenGame()
{
    $roundGame = 3;

    sayWelcome();
    satRulesGame('Answer "yes" if the number is even, otherwise answer "no".');
    $name = run();
    for ($i = 0; $i < $roundGame; $i++) {
        $randomNumber = makeRandomNum();
        $answerCorrect = makeCorrectAnswer($randomNumber);
        line("Question:  $randomNumber");
        $answerUser = prompt("Your answer");
        if (!checkAnswer($answerCorrect, $answerUser, $name)) {
            return ;
        }
    }
    congratule($name);
}
