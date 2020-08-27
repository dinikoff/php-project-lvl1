<?php

namespace Brain\GameEngine;

use Error;

use function Brain\Games\Calc\generateQuestionAnswerCalc;
use function Brain\Games\Calc\getCalcGameTask;
use function Brain\Games\Even\generateQuestionAnswerEven;
use function Brain\Games\Even\getEvenGameTask;
use function Brain\Games\Gcd\generateQuestionAnswerGCD;
use function Brain\Games\Gcd\getGCDGameTask;
use function Brain\Games\Prime\generateQuestionAnswerPrime;
use function Brain\Games\Prime\getPrimeGameTask;
use function Brain\Games\Progression\generateQuestionAnswerProgression;
use function Brain\Games\Progression\getProgressionGameTask;
use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS_NUMBER = 3;

function runGame($gameType)
{
    $task = getGameTask($gameType);
    line('Welcome to the Brain Game!');
    line($task);
    line(' ');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line(' ');

    for ($i = 0; $i < MAX_GAME_ROUNDS_NUMBER; $i++) {
        ['question' => $question, 'answer' => $answer] = generateQuestionAnswer($gameType);
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

function getGameTask($gameType)
{
    switch ($gameType) {
        case 'even':
            $gameTask = getEvenGameTask();
            break;
        case 'calc':
            $gameTask = getCalcGameTask();
            break;
        case 'gcd':
            $gameTask = getGCDGameTask();
            break;
        case 'progression':
            $gameTask = getProgressionGameTask();
            break;
        case 'prime':
            $gameTask = getPrimeGameTask();
            break;
        default:
            throw new Error("Unknown game type: {$gameType}!");
    }
    return $gameTask;
}

function generateQuestionAnswer($gameType)
{
    switch ($gameType) {
        case 'even':
            $result = generateQuestionAnswerEven();
            break;
        case 'calc':
            $result = generateQuestionAnswerCalc();
            break;
        case 'gcd':
            $result = generateQuestionAnswerGCD();
            break;
        case 'progression':
            $result = generateQuestionAnswerProgression();
            break;
        case 'prime':
            $result = generateQuestionAnswerPrime();
            break;
        default:
            throw new Error("Unknown game type: {$gameType}!");
    }
    return $result;
}
