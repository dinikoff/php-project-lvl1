<?php

namespace Brain\Games\Prime;

function getGameDataPrime($roundNumber)
{
    $result['task'] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($i = 0; $i < $roundNumber; $i++) {
        $question = rand(1, 99);
        $answer = isPrime($question) ? 'yes' : 'no';
        $result['rounds'][] = [
            'question' => $question,
            'answer' => $answer
        ];
    }
    return $result;
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
