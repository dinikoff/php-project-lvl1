<?php

namespace Brain\Games\Calc;

function getGameDataCalc()
{
    $result[0] = 'What is the result of the expression?';
    for ($i = 1; $i < 4; $i++) {
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
        }
        $result[$i] = [$question, strval($answer)];
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
    }
    return $result;
}
