<?php

declare(strict_types=1);

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Cli
{
    public static function welcome()
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line('Hello, %s!', $name);
    }
}
