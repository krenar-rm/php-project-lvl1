<?php

declare(strict_types=1);

namespace Brain\Games\Scenario;

use Brain\Games\DTO\Question;
use Brain\Games\Service\Math;
use Brain\Games\Service\Random;

use function cli\line;

class CalculatorScenario extends AbstractScenario
{
    private const EXPR_MINUS = '-';
    private const EXPR_PLUS = '+';
    private const EXPR_MULTIPLY = '*';

    private const EXPR_LIST = [
        self::EXPR_MINUS,
        self::EXPR_PLUS,
        self::EXPR_MULTIPLY,
    ];

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
        line('What is the result of the expression?');
    }

    protected function getQuestion(): Question
    {
        $randomValue1 = $this->random->getRandomDigit();
        $randomValue2 = $this->random->getRandomDigit();

        $randomExpresion = self::EXPR_LIST[random_int(0, 2)];

        switch ($randomExpresion) {
            case '-':
                if ($randomValue2 > $randomValue1) {
                    $temp = $randomValue1;
                    $randomValue1 = $randomValue2;
                    $randomValue2 = $randomValue1;
                }

                $result = $this->math->minus($randomValue1, $randomValue2);
                break;
            case '+':
                $result = $this->math->plus($randomValue1, $randomValue2);
                break;
            case '*':
                $result = $this->math->multiply($randomValue1, $randomValue2);
                break;
        }

        return new Question(
            implode(
                ' ',
                [
                    $randomValue1,
                    $randomExpresion,
                    $randomValue2,
                ]
            ),
            (string) $result
        );
    }
}
