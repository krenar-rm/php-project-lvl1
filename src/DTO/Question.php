<?php

declare(strict_types=1);

namespace Brain\Games\DTO;

class Question
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $result;

    public function __construct(string $text, $result)
    {
        $this->text = $text;
        $this->result = $result;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
