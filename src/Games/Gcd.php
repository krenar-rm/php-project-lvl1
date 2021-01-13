<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Games\Engine\run;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function runGcd(): void
{
    run(
        GAME_DESCRIPTION,
        function (): array {
            $randomValue1 = \random_int(1, 100);
            $randomValue2 = \random_int(1, 100);

            return [
                'question' => sprintf('%d %d', $randomValue1, $randomValue2),
                'correctAnswer' => (string) gcd($randomValue1, $randomValue2),
            ];
        }
    );
}

function gcd(int $val1, int $val2): int
{
    while (true) {
        if ($val1 === $val2) {
            return $val2;
        }
        if ($val1 > $val2) {
            $val1 -= $val2;
        } else {
            $val2 -= $val1;
        }
    }
}
