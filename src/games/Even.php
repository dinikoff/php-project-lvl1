<?php

namespace Brain\Games\Even;

use function Brain\Games\Utils\addQuestionAnswerToResult;

function generateQuestionAnswerEven()
{
    $question = rand(1, 99);
    $answer = isEven($question) ? 'yes' : 'no';
    return ['question' => $question, 'answer' => $answer];
}

function getEvenGameTask()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function isEven($number)
{
    return ($number % 2) === 0;
}
