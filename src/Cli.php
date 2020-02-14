<?php

namespace Braingames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    return $name;
}

function randomNum($min = 1, $max = 100)
{
    return rand($min, $max);
}

function hello()
{
    line('Welcome to the Brain Games!');
}

function rulesGame($rules)
{
    line($rules . PHP_EOL);
}

function congratulation($name)
{
    line("Congratulations, $name!");
}

function checkAnswer($answerCorrect, $answerUser, $name)
{
    if ($answerCorrect === $answerUser) {
        line('Correct');
        return 1;
    } else {
        line("$answerUser is wrong answer ;(. Correct answer was $answerCorrect. ");
        line("Let's try again, $name!");
        return 0;
    }
}