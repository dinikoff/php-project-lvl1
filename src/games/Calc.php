<?php

namespace Brain\Games\Calc;

function getGameDataCalc()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
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
