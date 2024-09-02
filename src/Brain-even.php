<?php

namespace BrainGames\BrainEvenven;

use function cli\line;
use function cli\prompt;

function runBrainEvenGame(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', null, ': ');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersCount = 0;

    while ($correctAnswersCount < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $answer = prompt('Your answer');

        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line('Correct!');
            $correctAnswersCount++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
