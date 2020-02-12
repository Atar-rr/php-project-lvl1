<?php

namespace Braingames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line();
    $name = prompt('May I have your name?');
    line("Hello, $name!");
}
