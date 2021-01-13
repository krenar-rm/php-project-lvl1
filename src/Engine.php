<?php

namespace Brain\Games\Games\Engine;

use Brain\Games\Exception\WrongAnswerException;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAME_ROUNDS = 3;

function run(string $gameDescription, callable $genRoundData): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);

    line($gameDescription);

    for ($i = 1; $i <= NUMBER_OF_GAME_ROUNDS; $i++) {
        $roundData = $genRoundData();
        line('Question: %s', $roundData['question']);

        $answer = prompt('Your answer');

        if ($roundData['correctAnswer'] === $answer) {
            line('Correct!');
        } else {
            line(
                sprintf(
                    '\'%s\' is wrong answer ;(. Correct answer was \'%s\'.',
                    $answer,
                    $roundData['correctAnswer']
                )
            );

            line('Let\'s try again, %s!', $userName);

            return;
        }
    }

    line('Congratulations, %s!', $userName);
}
