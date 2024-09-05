<?php

declare(strict_types=1);

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\runGame;

/**
 * @return array{question: string, answer: ?int}
 */
function generateCalcQuestionAndAnswer(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];

    $question = sprintf('%d %s %d', $num1, $operator, $num2);
    $correctAnswer = calculateCorrectAnswer($num1, $num2, $operator);

    return [$question, $correctAnswer];
}

function runBrainCalcGame(): void
{
    $description = 'What is the result of the expression?';
    runGame($description, function () {
        return generateCalcQuestionAndAnswer();
    });
}

function calculateCorrectAnswer(int $num1, int $num2, string $operator): ?int
{
    return match ($operator) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => null
    };
}
