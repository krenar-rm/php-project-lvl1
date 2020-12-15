<?php

namespace Brain\Games;

use Brain\Games\Exception\WrongAnswerException;

use function cli\line;
use function cli\prompt;

function run(string $gameDescription, callable $gameFunction)
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);

    try {
        line($gameDescription);

        startGame($gameFunction);

        line('Congratulations, %s!', $userName);
    } catch (WrongAnswerException $exception) {
        line($exception->getMessage());
        line('Let\'s try again, %s!', $userName);
    }
}
