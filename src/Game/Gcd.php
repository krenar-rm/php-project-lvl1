<?php

namespace Brain\Games\Game;

use function Brain\Games\gcd;

function getGcd(): callable
{
    return static function () {
        $randomValue1 = \random_int(1, 100);
        $randomValue2 = \random_int(1, 100);

        return [
            'text' => sprintf('%d %d', $randomValue1, $randomValue2),
            'result' => (string) gcd($randomValue1, $randomValue2),
        ];
    };
}

function getGcdDescription(): string
{
    return 'Find the greatest common divisor of given numbers.';
}
