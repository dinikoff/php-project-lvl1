<?php

namespace Brain\Games\Calc;

use Error;


const TASK = 'What is the result of the expression?';
const MATH_OPERATIONS = ['+', '-', '*'];

function generatorQuestionAnswer()
{
    $firstNumber = rand(1, 99);
    $secondNumber = rand(1, 99);
    $mathOperation = MATH_OPERATIONS[rand(0, count(MATH_OPERATIONS) - 1)];
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
