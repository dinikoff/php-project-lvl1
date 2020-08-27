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

const MAX_GAME_ROUNDS_NUMBER = 3;

function runGame($gameType)
{
    switch ($gameType) {
        case 'even':
            $gameData = getGameDataEven(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'calc':
            $gameData = getGameDataCalc(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'gcd':
            $gameData = getGameDataGcd(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'progression':
            $gameData = getGameDataProgression(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'prime':
            $gameData = getGameDataPrime(MAX_GAME_ROUNDS_NUMBER);
            break;
        default:
            throw new Error("Unknown game type: {$gameType}!");
    }

    $task = $gameData['task'];
    line('Welcome to the Brain Game!');
    line($task);
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    $rounds = $gameData['rounds'];

    for ($i = 0; $i < MAX_GAME_ROUNDS_NUMBER; $i++) {
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
