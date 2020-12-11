<?php

declare(strict_types=1);

namespace Brain\Games\Service;

class Random
{
    public function getRandomDigit(): int
    {
        return \random_int(1, 100);
    }
}