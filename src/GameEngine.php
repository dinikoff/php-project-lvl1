<?php

namespace Brain\GameEngine;

use Error;

use function Brain\Games\Calc\generateGameDataCalc;
use function Brain\Games\Even\generateGameDataEven;
use function Brain\Games\Gcd\generateGameDataGcd;
use function Brain\Games\Prime\generateGameDataPrime;
use function Brain\Games\Progression\generateGameDataProgression;
use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS_NUMBER = 3;

function runGame($gameType)
{
    switch ($gameType) {
        case 'even':
            $gameData = generateGameDataEven(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'calc':
            $gameData = generateGameDataCalc(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'gcd':
            $gameData = generateGameDataGcd(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'progression':
            $gameData = generateGameDataProgression(MAX_GAME_ROUNDS_NUMBER);
            break;
        case 'prime':
            $gameData = generateGameDataPrime(MAX_GAME_ROUNDS_NUMBER);
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
