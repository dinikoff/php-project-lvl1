<?php

namespace Brain\Games\Gcd;

function getGameDataGcd()
{
    $result[0] = 'Find the greatest common divisor of given numbers.';
    for ($i = 1; $i < 4; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = getGcd($firstNumber, $secondNumber);
        $answer = strval($gcd);
        $result[$i] = [$question, $answer];
    }
    return $result;
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
