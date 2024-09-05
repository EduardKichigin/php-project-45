<?php

declare(strict_types=1);

namespace BrainGames\BrainGCD;

use function BrainGames\Engine\runGame;

/**
 * @return array{question: string, answer: int}
 */
function generateGcdQuestionAndAnswer(): array
{
    [$num1, $num2] = generateQuestion();
    $question = "$num1 $num2";
    $correctAnswer = gcd($num1, $num2);

    return [$question, $correctAnswer];
}

function runBrainGcdGame(): void
{
    $description = 'Find the greatest common divisor of given numbers.';
    runGame($description, function () {
        return generateGcdQuestionAndAnswer();
    });
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
