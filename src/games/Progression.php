<?php

namespace Brain\Games\Progression;

use function Brain\GameEngine\runGame;

const TASK = 'What number is missing in the progression?';

function generatorQuestionAnswer()
{
    $progressionLength = 10;
    $currentNumber = rand(1, 99);
    $step = rand(1, 10);
    $hiddenIndex = rand(0, $progressionLength - 1);
    $answer = null;
    $question = null;
    $parts = [];
    for ($j = 0; $j < $progressionLength; $j++) {
        if ($j === $hiddenIndex) {
            $parts[$j] = '..';
            $answer = strval($currentNumber);
        } else {
            $parts[$j] = $currentNumber;
        }
        $currentNumber += $step;
    }
    $question = implode(' ', $parts);
    return ['question' => $question, 'answer' => $answer];
}

function runProgression()
{
    runGame(fn() => generatorQuestionAnswer(), TASK);
}
