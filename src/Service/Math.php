<?php

declare(strict_types=1);

namespace Brain\Games\Service;

class Math
{
    public function isEven(int $value): bool
    {
        return $value % 2 === 0;
    }

    public function plus($val1, $val2): int
    {
        return $val1 + $val2;
    }

    public function minus($val1, $val2): int
    {
        return $val1 - $val2;
    }

    public function multiply($val1, $val2): int
    {
        return $val1 * $val2;
    }

    public function gdc(int $val1, int $val2): int
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

    public function isPrime(int $n): bool
    {
        for ($x = 2; $x < $n; $x++) {
            if ($n % $x === 0) {
                return false;
            }
        }

        return true;
    }
}
