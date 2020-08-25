<?php

namespace Brain\Games\Prime;

use function Brain\Games\Even\isEven;

function getGameDataPrime()
{
    $result['task'] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    for ($i = 1; $i < 4; $i++) {
        $question = rand(1, 99);
        if (isPrime($question)) {
            $answer = 'yes';
        } else {
            $answer = 'no';
        }
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