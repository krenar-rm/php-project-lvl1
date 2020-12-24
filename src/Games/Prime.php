<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Games\Engine\run;

define('GAME_DESCRIPTION_PRIME', 'Answer "yes" if given number is prime. Otherwise answer "no".');

function runPrime()
{
    run(
        GAME_DESCRIPTION_PRIME,
        static function () {
            $randomValue = \random_int(1, 100);

            return [
                'question' => (string) $randomValue,
                'correctAnswer' => \Brain\Games\Games\Prime\isPrime($randomValue) ? 'yes' : 'no',
            ];
        }
    );
}

function isPrime(int $n): bool
{
    for ($x = 2; $x < $n; $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }

    return true;
}
