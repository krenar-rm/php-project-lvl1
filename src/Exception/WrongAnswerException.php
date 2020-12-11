<?php

declare(strict_types=1);

namespace Brain\Games\Exception;

class WrongAnswerException extends \RuntimeException
{
    public const WRONG_ANSWER_TEMPLATE_EXCEPTION = '\'%s\' is wrong answer ;(. Correct answer was \'%s\'.';
}