<?php

namespace Brain\Games\Even;

function getGameDataEven()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
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
