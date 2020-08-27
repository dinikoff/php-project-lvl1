<?php

namespace Brain\Games\Even;

use function Brain\Games\Utils\addQuestionAnswerToResult;

function generateGameDataEven($roundNumber)
{
    $result['task'] = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < $roundNumber; $i++) {
        $question = rand(1, 99);
        $answer = isEven($question) ? 'yes' : 'no';
        $result = addQuestionAnswerToResult($result, $question, $answer);
    }
    return $result;
}


function isEven($number)
{
    return ($number % 2) === 0;
}
