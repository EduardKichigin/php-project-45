<?php

declare(strict_types=1);

namespace BrainGames\BrainPrime;

use function BrainGames\Engine\runGame;

function generatePrimeQuestionAndAnswer(): array
{
    $number = rand(1, 100);
    $question = $number;
    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function runBrainPrimeGame(): void
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    runGame($description, function () {
        return generatePrimeQuestionAndAnswer();
    });
}

/**
 * Проверяет, является ли число простым.
 *
 * @param int $number Число для проверки
 * @return bool Возвращает true, если число простое, иначе false
 */
function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2, $sqrt = sqrt($number); $i <= $sqrt; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
