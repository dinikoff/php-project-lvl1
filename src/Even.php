<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line(' ');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line(' ');

    $numberOfCorrectAnswers = 0;
    while ($numberOfCorrectAnswers !== 3) {
        $number = rand(1, 99);
        line("Question: {$number}");
        $userAnswer = strtolower(trim(prompt("Your answer")));
        if (($userAnswer === 'yes' && isEven($number)) || ($userAnswer === 'no' && !isEven($number))) {
            line("Correct!");
            $numberOfCorrectAnswers++;
            if ($numberOfCorrectAnswers === 3) {
                line("Congratulations, {$name}!");
            }
        } else {
            $correctAnswer = getCorrectAnswer($number);
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}

function getCorrectAnswer($number)
{
    if (isEven($number)) {
        return "yes";
    }
    return "no";
}
