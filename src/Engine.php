<?php

namespace Brain\Games\Games\Engine;

use Brain\Games\Exception\WrongAnswerException;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAME_ROUNDS = 3;

function run(callable $genRoundData)
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);

    try {
        line(GAME_DESCRIPTION);

        startGameRounds($genRoundData);

        line('Congratulations, %s!', $userName);
    } catch (WrongAnswerException $exception) {
        line($exception->getMessage());
        line('Let\'s try again, %s!', $userName);
    }
}

function startGameRounds(callable $genRoundData)
{
    for ($i = 1; $i <= NUMBER_OF_GAME_ROUNDS; $i++) {
        $roundData = $genRoundData();
        line('Question: %s', $roundData['question']);

        $answer = prompt('Your answer');

        if ($roundData['correctAnswer'] === $answer) {
            line('Correct!');
        } else {
            throw new WrongAnswerException(
                sprintf(
                    WrongAnswerException::WRONG_ANSWER_TEMPLATE_EXCEPTION,
                    $answer,
                    $roundData['correctAnswer']
                )
            );
        }
    }
}
