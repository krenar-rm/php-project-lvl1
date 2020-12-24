<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Games\Engine\run;

define('GAME_DESCRIPTION_PROGRESSION', 'What number is missing in the progression?');

function runProgression()
{
    run(
        GAME_DESCRIPTION_PROGRESSION,
        static function () {
            $randomLength = \random_int(5, 10);
            $randomStep = \random_int(2, 5);
            $hiddenValueKey = \random_int(2, $randomLength - 1);

            $startProgressionValue = \random_int(1, 100);

            $progressionArr = [];
            for ($i = 1; $i <= $randomLength; $i++) {
                $progressionArr[] = $startProgressionValue;
                $startProgressionValue += $randomStep;
            }

            $result = $progressionArr[$hiddenValueKey];
            $progressionArr[$hiddenValueKey] = '..';

            return [
                'question' => implode(' ', $progressionArr),
                'correctAnswer' => (string) $result,
            ];
        }
    );
}
