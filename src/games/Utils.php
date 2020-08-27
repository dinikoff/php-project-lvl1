<?php

namespace Brain\Games\Utils;

function addQuestionAnswerToResult($result, $question, $answer)
{
    $result['rounds'][] = [
        'question' => $question,
        'answer' => $answer
    ];
    return $result;
}