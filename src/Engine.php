<?php

namespace Brain\Games;

use Brain\Games\Exception\WrongAnswerException;

use function cli\line;
use function cli\prompt;

function startGame(callable $gameFunction)
{
    for ($i = 1; $i <= 3; $i++) {
        $question = $gameFunction();
        line('Question: %s', $question['text']);

        $answer = prompt('Your answer');

        if ($question['result'] === $answer) {
            line('Correct!');
        } else {
            throw new WrongAnswerException(
                sprintf(
                    WrongAnswerException::WRONG_ANSWER_TEMPLATE_EXCEPTION,
                    $answer,
                    $question['result']
                )
            );
        }
    }
}
