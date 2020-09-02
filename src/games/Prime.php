<?php

namespace Brain\Games\Prime;

use function Brain\GameEngine\runGame;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function generatorQuestionAnswer()
{
    $question = rand(1, 99);
    $answer = isPrime($question) ? 'yes' : 'no';
    return ['question' => $question, 'answer' => strval($answer)];
}

function isPrime($n)
{
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x == 0) {
            return false;
        }
    }
    return true;
}

function runPrime()
{
    runGame(fn() => generatorQuestionAnswer(), TASK);
}
