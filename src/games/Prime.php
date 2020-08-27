<?php

namespace Brain\Games\Prime;

function generateQuestionAnswerPrime()
{
    $question = rand(1, 99);
    $answer = isPrime($question) ? 'yes' : 'no';
    return ['question' => $question, 'answer' => strval($answer)];
}

function getPrimeGameTask()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
