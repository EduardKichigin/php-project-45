<?php

declare(strict_types=1);

namespace BrainGames\BrainEvenven;

use function BrainGames\Engine\greet;
use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function runBrainEvenGame(): void
{
    $name = greet();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $userAnswer = prompt('Your answer');

        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            wrongAnswer($userAnswer, $correctAnswer, $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
