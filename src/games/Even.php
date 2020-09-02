<?php

namespace Brain\Games\Even;

use function Brain\GameEngine\runGame;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function generatorQuestionAnswer()
{
    $question = rand(1, 99);
    $answer = isEven($question) ? 'yes' : 'no';
    return ['question' => $question, 'answer' => $answer];
}

function isEven($number)
{
    return ($number % 2) === 0;
}

function runEven()
{
    runGame(fn() => generatorQuestionAnswer(), TASK);
}
