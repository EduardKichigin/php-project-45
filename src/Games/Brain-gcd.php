<?php

declare(strict_types=1);

namespace BrainGames\BrainGCD;

use function BrainGames\Engine\greet;
use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function runBrainGcdGame(): void
{
    $name = greet();
    line('Find the greatest common divisor of given numbers.');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        [$num1, $num2] = generateQuestion();
        $correctAnswer = gcd($num1, $num2);

        line("Question: %d %d", $num1, $num2);
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
 * Функция для вычисления наибольшего общего делителя (НОД) двух чисел
 *
 * @param int $a Первое число
 * @param int $b Второе число
 * @return int НОД двух чисел
 */
function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

/**
 * @return int[] Массив из двух случайных чисел
 */
function generateQuestion(): array
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    if ($num1 < $num2) {
        [$num1, $num2] = [$num2, $num1];
    }

    return [$num1, $num2];
}
