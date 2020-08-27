<?php

namespace Brain\Games\Even;

function generateGameDataEven($roundNumber)
{
    $result['task'] = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < $roundNumber; $i++) {
        $question = rand(1, 99);
        $answer = isEven($question) ? 'yes' : 'no';
        $result['rounds'][] = [
            'question' => $question,
            'answer' => $answer
        ];
    }
    return $result;
}


function isEven($number)
{
    return ($number % 2) === 0;
}
