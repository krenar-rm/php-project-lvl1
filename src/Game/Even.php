<?php

namespace Brain\Games\Game;

use function Brain\Games\isEven;

function getEven(): callable
{
    return function () {
        $randomValue = \random_int(1, 100);

        return [
            'text' => (string) $randomValue,
            'result' => isEven($randomValue) ? 'yes' : 'no',
        ];
    };
}

function getEvenDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
