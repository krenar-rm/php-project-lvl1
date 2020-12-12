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

    public function calculatorScenario()
    {
        line('What is the result of the expression?');
        $expressions = [
            '-',
            '+',
        ];

        $random = new Random();
        $math = new Math();
        $randomValue1 = $random->getRandomDigit();
        $randomValue2 = $random->getRandomDigit();



        "$ ./bin/brain-calc

Welcome to the Brain Games!
May I have your name? Sam
Hello, Sam!
What is the result of the expression?
Question: 4 + 10
Your answer: 14
Correct!
Question: 25 - 11
Your answer: 14
Correct!
Question: 25 * 7
Your answer: 175
Correct!
Congratulations, Sam!
Достаточно реализовать следующие операции: +, - и *.
Операции, как и числа, выбираются случайным образом.
В случае, если пользователь даст неверный ответ, необходимо вывести:

Question: 25 * 7
Your answer: 145
'145' is wrong answer ;(. Correct answer was '175'.
Let's try again, Sam!"
    }
}
