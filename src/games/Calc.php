<?php

namespace Brain\Games\Calc;

use Error;

use function Brain\Games\Utils\addQuestionAnswerToResult;

const TASK = 'What is the result of the expression?';
const MATH_OPERATIONS = ['+', '-', '*'];

function generatorQuestionAnswer()
{
    $firstNumber = rand(1, 99);
    $secondNumber = rand(1, 99);
    $mathOperation = MATH_OPERATIONS[rand(0, 2)];
    $question = "{$firstNumber} {$mathOperation} {$secondNumber}";
    switch ($mathOperation) {
        case '+':
            $answer = $firstNumber + $secondNumber;
            break;
        case '-':
            $answer = $firstNumber - $secondNumber;
            break;
        case '*':
            $answer = $firstNumber * $secondNumber;
            break;
        default:
            throw new Error("Unknown operation: {$mathOperation}");
    }
    return ['question' => $question, 'answer' => strval($answer)];
}
