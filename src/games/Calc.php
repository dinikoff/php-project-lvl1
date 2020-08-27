<?php

namespace Brain\Games\Calc;

use function Brain\Games\Utils\addQuestionAnswerToResult;

function generateGameDataCalc($roundNumber)
{
    $result['task'] = 'What is the result of the expression?';
    for ($i = 0; $i < $roundNumber; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $mathOperation = getMathOperation();
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
        $result = addQuestionAnswerToResult($result, $question, $answer);
    }
    return $result;
}

function getMathOperation()
{
    $randNumber = rand(0, 2);
    switch ($randNumber) {
        case 0:
            $result = '+';
            break;
        case 1:
            $result = '-';
            break;
        case 2:
            $result = '*';
            break;
        default:
            throw new Error("Random number is out of range");
    }
    return $result;
}
