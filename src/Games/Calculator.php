<?php

namespace Brain\Games\Games\Calculator;

use function Brain\Games\Games\Engine\run;

const OPERATORS = [
    '-',
    '+',
    '*'
];

function runCalculator(): void
{
    define('GAME_DESCRIPTION', 'What is the result of the expression?');

    run(
        function (): array {
            $val1 = \random_int(1, 100);
            $val2 = \random_int(1, 100);
            $operator = OPERATORS[\random_int(0, \count(OPERATORS) - 1)];

            return [
                'question' => implode(
                    ' ',
                    [
                        $val1,
                        $operator,
                        $val2,
                    ]
                ),
                'correctAnswer' => (string) makeArithmeticOperation(
                    $val1,
                    $val2,
                    $operator
                )
            ];
        }
    );
}

function makeArithmeticOperation(int $val1, int $val2, string $operator): int
{
    switch ($operator) {
        case '-':
            return $val1 - $val2;
        case '+':
            return $val1 + $val2;
        case '*':
            return $val1 * $val2;
        default:
            throw new \RuntimeException('Invalid operator specified');
    }
}
