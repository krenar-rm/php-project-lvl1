<?php

declare(strict_types=1);

namespace Brain\Games\Service;

class Random
{
    public function getRandomDigit(int $min = 1, int $max = 100): int
    {
        return \random_int($min, $max);
    }
}
