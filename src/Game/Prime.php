<?php

namespace Brain\Games\Game;

use function Brain\Games\isPrime;

function getPrime(): callable
{
    return static function () {
        $randomValue = \random_int(1, 100);

        return [
            'text' => (string) $randomValue,
            'result' => isPrime($randomValue) ? 'yes' : 'no',
        ];
    };
}

function getPrimeDescription(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}
