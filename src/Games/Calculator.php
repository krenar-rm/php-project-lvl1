<?php

namespace Brain\Games\Games\Calculator;

use function Brain\Games\Games\Engine\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';

const OPERATORS = [
    '-',
    '+',
    '*'
];

function runCalculator(): void
{
    run(
        GAME_DESCRIPTION,
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
                'correctAnswer' => (string) calculate(
                    $val1,
                    $val2,
                    $operator
                )
            ];
        }
    );
}

function calculate(int $val1, int $val2, string $operator): int
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
