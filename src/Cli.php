<?php

declare(strict_types=1);

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Cli
{
    /**
     * @var string
     */
    private static $name;

    public static function welcomeScenario()
    {
        line('Welcome to the Brain Game!');
        self::$name = prompt('May I have your name?');
        line('Hello, %s!', self::$name);
    }

    public function evenOrNotScenario()
    {
        $random = new Random();
        $math = new Math();

        line('Answer "yes" if the number is even, otherwise answer "no".');

        for ($i = 1; $i <= 3; $i++) {
            $randomValue = $random->getRandomDigit();
            line('Question: %d', $randomValue);
            $answer = prompt('Your answer:');

            $isEvenValue = $math->isEven($randomValue);
            if (('yes' === $answer && $isEvenValue) || ('no' === $answer && !$isEvenValue)) {
                line('Correct!');
            } else {
                line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $isEvenValue ? 'yes' : 'no');

                return;
            }
        }

        line('Congratulations, %s!', self::$name);
    }
}
