<?php

namespace Braingames\Cli;


require '../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function run()
{
    line();
    $name = prompt('May I have your name?');
    line("Hello, $name!");
}

run();