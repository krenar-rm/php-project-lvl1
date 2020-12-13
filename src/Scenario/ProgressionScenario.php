<?php

declare(strict_types=1);

namespace Brain\Games\Scenario;

use Brain\Games\DTO\Question;
use Brain\Games\Service\Math;
use Brain\Games\Service\Random;
use function cli\line;
use function cli\prompt;

class ProgressionScenario extends AbstractScenario
{
    /**
     * @var Random
     */
    private $random;

    public function __construct()
    {
        $this->random = new Random();
    }

    protected function gameDescription()
    {
        line('What number is missing in the progression?');
    }

    protected function getQuestion(): Question
    {
        $randomLength = $this->random->getRandomDigit(5, 10);
        $randomStep = $this->random->getRandomDigit(2, 5);
        $hiddenValueKey = $this->random->getRandomDigit(2, $randomLength - 1);

        $startProgressionValue = $this->random->getRandomDigit(1);

        $progressionArr = [];
        for ($i = 1; $i <= $randomLength; $i++) {
            $progressionArr[] = $startProgressionValue;
            $startProgressionValue += $randomStep;
        }

        $result = $progressionArr[$hiddenValueKey];
        $progressionArr[$hiddenValueKey] = '..';

        return new Question(
            implode(' ', $progressionArr),
            (string) $result
        );
    }
}
