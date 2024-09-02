<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greet(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function wrongAnswer(string $userAnswer, string|int $correctAnswer, string $name): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}
