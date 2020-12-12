<?php

declare(strict_types=1);

namespace Brain\Games\Scenario;

use Brain\Games\DTO\Question;
use Brain\Games\Service\Math;
use Brain\Games\Service\Random;
use function cli\line;
use function cli\prompt;

class GcdScenario extends AbstractScenario
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
        line('Find the greatest common divisor of given numbers.');
    }

    protected function getQuestion(): Question
    {
        $randomValue1 = $this->random->getRandomDigit();
        $randomValue2 = $this->random->getRandomDigit();

        return new Question(
            sprintf('%d %d', $randomValue1, $randomValue2),
            (string) $this->math->gdc($randomValue1, $randomValue2)
        );
    }
}
