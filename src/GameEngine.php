<?php

namespace Brain\GameEngine;

use function Brain\Games\Calc\getGameDataCalc;
use function Brain\Games\Even\getGameDataEven;
use function cli\line;
use function cli\prompt;

function runGame($gameType)
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    switch ($gameType) {
        case 'even':
            $gameData = getGameDataEven();
            break;
        case 'calc':
            $gameData = getGameDataCalc();
            break;
    }

    for ($i = 0; $i < 3; $i++) {
        $question = $gameData[$i][0];
        $answer = $gameData[$i][1];
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
