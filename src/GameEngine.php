<?php

namespace Brain\GameEngine;

use function Brain\Games\Calc\getGameDataCalc;
use function Brain\Games\Even\getGameDataEven;
use function Brain\Games\Gcd\getGameDataGcd;
use function Brain\Games\Progression\getGameDataProgression;
use function cli\line;
use function cli\prompt;

function runGame($gameType)
{

    switch ($gameType) {
        case 'even':
            $gameData = getGameDataEven();
            break;
        case 'calc':
            $gameData = getGameDataCalc();
            break;
        case 'gcd':
            $gameData = getGameDataGcd();
            break;
        case 'progression':
            $gameData = getGameDataProgression();
    }

    $message = $gameData[0];

    line('Welcome to the Brain Game!');
    line($message);
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    for ($i = 1; $i < 4; $i++) {
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
