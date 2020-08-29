<?php

namespace Brain\GameEngine;

use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS_NUMBER = 3;

function runGame($generatorQuestionAnswer, $task)
{
    line('Welcome to the Brain Game!');
    line($task);
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    for ($i = 0; $i < MAX_GAME_ROUNDS_NUMBER; $i++) {
        ['question' => $question, 'answer' => $answer] = $generatorQuestionAnswer();
        line("Question: {$question}");
        $userAnswer = strtolower(trim(prompt('Your answer')));
        if ($userAnswer !== $answer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
