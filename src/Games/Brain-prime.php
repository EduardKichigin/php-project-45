<?php

declare(strict_types=1);

namespace BrainGames\BrainPrime;

use function BrainGames\Engine\greet;
use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function runBrainPrimeGame(): void
{
    $name = greet();

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $userAnswer = prompt('Your answer');

        $correctAnswer = isPrime($number) ? 'yes' : 'no';

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
