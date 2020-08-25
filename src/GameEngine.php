<?php

namespace Brain\GameEngine;

use Error;
use function Brain\Games\Calc\getGameDataCalc;
use function Brain\Games\Even\getGameDataEven;
use function Brain\Games\Gcd\getGameDataGcd;
use function Brain\Games\Prime\getGameDataPrime;
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
            break;
        case 'prime':
            $gameData = getGameDataPrime();
            break;
        default:
            throw new Error("Unknown game type: {$gameType}!" );
    }

    $task = $gameData['task'];
    line('Welcome to the Brain Game!');
    line($task);
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    $rounds = $gameData['rounds'];

    for ($i = 0; $i < 3; $i++) {
        ['question' => $question, 'answer' => $answer] = $rounds[$i];
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
