<?php

declare(strict_types=1);

namespace BrainGames\BrainProgression;

use function BrainGames\Engine\greet;
use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function runBrainProgressionGame(): void
{
    $name = greet();

    line('What number is missing in the progression?');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        $start = rand(1, 10);
        $step = rand(1, 10);
        $length = rand(5, 10);

        $progression = generateProgression($start, $step, $length);

        $hiddenPosition = rand(0, $length - 1);
        $correctAnswer = $progression[$hiddenPosition];
        $progression[$hiddenPosition] = '..';

        line("Question: %s", implode(' ', $progression));
        $userAnswer = prompt('Your answer');

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

/**
 * Генерация арифметической прогрессии.
 *
 * @param int $start Начальное число прогрессии
 * @param int $step Шаг прогрессии
 * @param int $length Длина прогрессии
 * @return array Сгенерированная арифметическая прогрессия
 */
function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}
