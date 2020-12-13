<?php

declare(strict_types=1);

namespace Brain\Games\Scenario;

use Brain\Games\DTO\Question;
use Brain\Games\Service\Math;
use Brain\Games\Service\Random;
use function cli\line;
use function cli\prompt;

class PrimeScenario extends AbstractScenario
{
    /**
     * @var Math
     */
    private $math;

    /**
     * @var Random
     */
    private $random;

    public function __construct()
    {
        $this->math = new Math();
        $this->random = new Random();
    }

    protected function gameDescription()
    {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
    }

    protected function getQuestion(): Question
    {
        $randomValue = $this->random->getRandomDigit();

        return new Question(
            (string) $randomValue,
            $this->math->isPrime($randomValue) ? 'yes' : 'no'
        );
    }
}
