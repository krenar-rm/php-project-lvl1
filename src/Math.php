<?php

declare(strict_types=1);

namespace Brain\Games;

class Math
{
    public function isEven(int $value): bool
    {
        return $value % 2 === 0;
    }
}