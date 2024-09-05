<?php

declare(strict_types=1);

namespace BrainGames\BrainProgression;

use function BrainGames\Engine\runGame;

function generateProgressionQuestionAndAnswer(): array
{
    $start = rand(1, 10);
    $step = rand(1, 10);
    $length = rand(5, 10);

    $progression = generateProgression($start, $step, $length);

    $hiddenPosition = rand(0, $length - 1);
    $correctAnswer = $progression[$hiddenPosition];
    $progression[$hiddenPosition] = '..';

    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function runBrainProgressionGame(): void
{
    $description = 'What number is missing in the progression?';
    runGame($description, function () {
        return generateProgressionQuestionAndAnswer();
    });
}

/**
 * Генерация арифметической прогрессии.
 *
 * @param int $start Начальное число прогрессии
 * @param int $step Шаг прогрессии
 * @param int $length Длина прогрессии
 * @return int[] Сгенерированная арифметическая прогрессия
 */
function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}
