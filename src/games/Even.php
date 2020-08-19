<?php

namespace Brain\Games\Even;

function getGameDataEven()
{
    $result[0] = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 1; $i < 4; $i++) {
        $question = rand(1, 99);
        if (isEven($question)) {
            $answer = 'yes';
        } else {
            $answer = 'no';
        }
        $result[$i] = [$question, $answer];
    }
    return $result;
}


function isEven($number)
{
    return ($number % 2) === 0;
}
