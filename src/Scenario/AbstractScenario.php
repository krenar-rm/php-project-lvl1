<?php

declare(strict_types=1);

namespace Brain\Games\Scenario;

use Brain\Games\DTO\Question;
use Brain\Games\Exception\WrongAnswerException;
use function cli\line;
use function cli\prompt;

abstract class AbstractScenario
{
    private $userName = '';

    public function execute()
    {
        $this
            ->welcome()
            ->initilizeName()
            ->helloUser()
            ->gameDescription();

        try {
            for ($i = 1; $i <= 3; $i++) {
                $question = $this->askQuestion();
                $this->checkAnswer($question);
            }

            $this->congratulations();
        } catch (WrongAnswerException $exception) {
            line($exception->getMessage());
            line('Let\'s try again, %s!', $this->userName);
        }
    }

    abstract protected function gameDescription();
    abstract protected function getQuestion(): Question;

    private function welcome(): self
    {
        line('Welcome to the Brain Game!');

        return $this;
    }

    private function initilizeName(): self
    {
        $this->userName = prompt('May I have your name?');

        return $this;
    }

    private function helloUser(): self
    {
        line('Hello, %s!', $this->userName);

        return $this;
    }

    private function congratulations(): self
    {
        line('Congratulations, %s!', $this->userName);

        return $this;
    }

    private function askQuestion(): Question
    {
        $question = $this->getQuestion();

        line('Question: %s', $question->getText());

        return $question;
    }

    private function getAnswer(): string
    {
        return prompt('Your answer');
    }

    private function checkAnswer(Question $question)
    {
        $answer = $this->getAnswer();

        if ($question->getResult() === $answer) {
            line('Correct!');
        } else {
            throw new WrongAnswerException(sprintf(WrongAnswerException::WRONG_ANSWER_TEMPLATE_EXCEPTION, $answer, $question->getResult()));
        }
    }
}
