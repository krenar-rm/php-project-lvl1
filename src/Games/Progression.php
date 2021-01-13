<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Games\Engine\run;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function runProgression(): void
{
    run(
        GAME_DESCRIPTION,
        function (): array {
            $progression = createProgression(
                \random_int(1, 100),
                \random_int(2, 5),
                \random_int(5, 10)
            );

            $hiddenValueKey = \random_int(2, \count($progression) - 1);

            $result = $progression[$hiddenValueKey];
            $progression[$hiddenValueKey] = '..';

            return [
                'question' => implode(' ', $progression),
                'correctAnswer' => (string) $result,
            ];
        }
    );
}

function createProgression(int $firstValue, int $step, int $length): array
{
    $value = $firstValue;

    $progression = [];
    for ($i = 1; $i <= $length; $i++) {
        $progression[] = $value;
        $value += $step;
    }

    return $progression;
}
