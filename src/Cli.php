<?php

declare(strict_types=1);

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Cli
{
    /**
     * @var string
     */
    private static $name;

    public static function welcomeScenario()
    {
        line('Welcome to the Brain Game!');
        self::$name = prompt('May I have your name?');
        line('Hello, %s!', self::$name);
    }
}
