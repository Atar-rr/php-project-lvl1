<?php

namespace Braingames\Even;

use function Braingames\Cli\checkAnswer;
use function Braingames\Cli\congratule;
use function cli\line;
use function cli\prompt;
use function Braingames\Cli\run;
use function Braingames\Cli\makeRandomNum;
use function Braingames\Cli\sayWelcome;
use function Braingames\Cli\satRulesGame;

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
