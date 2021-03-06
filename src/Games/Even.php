<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Games\Engine\run;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runEven(): void
{
    run(
        GAME_DESCRIPTION,
        function (): array {
            $randomValue = \random_int(1, 100);

            return [
                'question' => (string) $randomValue,
                'correctAnswer' => isEven($randomValue) ? 'yes' : 'no',
            ];
        }
    );
}

function isEven(int $value): bool
{
    return $value % 2 === 0;
}
