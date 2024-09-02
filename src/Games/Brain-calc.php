<?php

declare(strict_types=1);

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\greet;
use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function runBrainCalcGame(): void
{
    $name = greet();

    line('What is the result of the expression?');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];

        $question = sprintf('%d %s %d', $num1, $operator, $num2);
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        $correctAnswer = match ($operator) {
            '+' => $num1 + $num2,
            '-' => $num1 - $num2,
            '*' => $num1 * $num2,
        };

        if ((int)$userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            wrongAnswer($userAnswer, $correctAnswer, $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
