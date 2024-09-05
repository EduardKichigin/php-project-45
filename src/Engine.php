<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(string $description, callable $generateQuestionAndAnswer): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        [$question, $correctAnswer] = $generateQuestionAndAnswer();

        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === (string)$correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            wrongAnswer($userAnswer, $correctAnswer, $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}

function wrongAnswer(string $userAnswer, string|int $correctAnswer, string $name): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}
