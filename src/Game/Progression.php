<?php

namespace Brain\Games\Game;

function getProgression(): callable
{
    return static function () {
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
            'text' => implode(' ', $progressionArr),
            'result' => (string) $result,
        ];
    };
}

function getProgressionDescription(): string
{
    return 'What number is missing in the progression?';
}
