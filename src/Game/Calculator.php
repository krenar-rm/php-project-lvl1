<?php

namespace Brain\Games\Game;

function getCalculator(): callable
{
    return function () {
        $exprList = [
            '-',
            '+',
            '*'
        ];

        $randomValue1 = \random_int(1, 100);
        $randomValue2 = \random_int(1, 100);

        $randomExpresion = $exprList[\random_int(0, 2)];
        switch ($randomExpresion) {
            case '-':
                if ($randomValue2 > $randomValue1) {
                    $temp = $randomValue1;
                    $randomValue1 = $randomValue2;
                    $randomValue2 = $temp;
                }

                $result = $randomValue1 - $randomValue2;
                break;
            case '+':
                $result = $randomValue1 + $randomValue2;
                break;
            case '*':
                $result = $randomValue1 * $randomValue2;
                break;
        }

        return [
            'text' => implode(
                ' ',
                [
                    $randomValue1,
                    $randomExpresion,
                    $randomValue2,
                ]
            ),
            'result' => (string) $result
        ];
    };
}

function getCalculatorDescription(): string
{
    return 'What is the result of the expression?';
}
