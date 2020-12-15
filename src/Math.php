<?php

namespace Brain\Games;

function isEven(int $value): bool
{
    return $value % 2 === 0;
}

function gcd(int $val1, int $val2): int
{
    while (true) {
        if ($val1 === $val2) {
            return $val2;
        }
        if ($val1 > $val2) {
            $val1 -= $val2;
        } else {
            $val2 -= $val1;
        }
    }
}

function isPrime(int $n): bool
{
    for ($x = 2; $x < $n; $x++) {
        if ($n % $x === 0) {
            return false;
        }
    }

    return true;
}
