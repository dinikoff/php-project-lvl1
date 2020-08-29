<?php

namespace Brain\Games\Gcd;

const TASK = 'Find the greatest common divisor of given numbers.';

function makeGeneratorQuestionAnswer()
{
    return function () {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = getGcd($firstNumber, $secondNumber);
        $answer = strval($gcd);
        return ['question' => $question, 'answer' => $answer];
    };
}

function getGcd($firstNumber, $secondNumber)
{
    while ($firstNumber !== 0 && $secondNumber !== 0) {
        if ($firstNumber > $secondNumber) {
            $firstNumber = $firstNumber % $secondNumber;
        } else {
            $secondNumber = $secondNumber % $firstNumber;
        }
    }
    return $firstNumber + $secondNumber;
}
