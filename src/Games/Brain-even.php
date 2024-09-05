<?php

declare(strict_types=1);

namespace BrainGames\BrainEvenven;

use function BrainGames\Engine\runGame;

function generateEvenQuestionAndAnswer(): array
{
    $number = rand(1, 100);
    $question = $number;
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function runBrainEvenGame(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame($description, function () {
        return generateEvenQuestionAndAnswer();
    });
}
