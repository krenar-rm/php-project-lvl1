<?php

namespace Brain\Games\Games\Engine;

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

        startGameRounds($gameFunction);

        line('Congratulations, %s!', $userName);
    } catch (WrongAnswerException $exception) {
        line($exception->getMessage());
        line('Let\'s try again, %s!', $userName);
    }
}

function startGameRounds(callable $gameFunction)
{
    for ($i = 1; $i <= NUMBER_OF_GAME_ROUNDS; $i++) {
        $question = $gameFunction();
        line('Question: %s', $question['question']);

        $answer = prompt('Your answer');

        if ($question['correctAnswer'] === $answer) {
            line('Correct!');
        } else {
            throw new WrongAnswerException(
                sprintf(
                    WrongAnswerException::WRONG_ANSWER_TEMPLATE_EXCEPTION,
                    $answer,
                    $question['correctAnswer']
                )
            );
        }
    }
}
