<?php

namespace Brain\Games\Even;

function getGameDataEven($roundNumber)
{
    $result['task'] = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < $roundNumber; $i++) {
        $question = rand(1, 99);
        if (isEven($question)) {
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


function isEven($number)
{
    return ($number % 2) === 0;
}
