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
}
