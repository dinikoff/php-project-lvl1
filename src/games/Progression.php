<?php

namespace Brain\Games\Progression;

use function Brain\GameEngine\runGame;

const TASK = 'What number is missing in the progression?';

function generatorQuestionAnswer()
{
    $progressionLength = 10;
    $firstNumber = rand(1, 99);
    $step = rand(1, 10);
    $hiddenIndex = rand(0, $progressionLength - 1);
    $progression = generateProgression($firstNumber, $step, $progressionLength);
    $answer = strval($progression[$hiddenIndex]);
    $progression[$hiddenIndex] = '..';
    $question = implode(' ', $progression);
    return ['question' => $question, 'answer' => $answer];
}

function runProgression()
{
    runGame(fn() => generatorQuestionAnswer(), TASK);
}

function generateProgression($firstElement, $step, $progressionLength)
{
    $lastElement = $firstElement + $step * ($progressionLength - 1);
    return range($firstElement, $lastElement, $step);
}
