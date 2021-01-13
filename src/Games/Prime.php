<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Games\Engine\run;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime(): void
{
    run(
        GAME_DESCRIPTION,
        function (): array {
            $randomValue = \random_int(1, 100);

            return [
                'question' => (string) $randomValue,
                'correctAnswer' => isPrime($randomValue) ? 'yes' : 'no',
            ];
        }
    );
}

function isPrime(int $n): bool
{
    if ($n <= 1) {
        return false;
    }

    for ($x = 2; $x < $n; $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }

    return true;
}
