<?php

namespace Brain\Games\Gcd;

function getGameDataGcd($roundNumber)
{
    $result['task'] = 'Find the greatest common divisor of given numbers.';
    for ($i = 0; $i < $roundNumber; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $question = "{$firstNumber} {$secondNumber}";
        $gcd = getGcd($firstNumber, $secondNumber);
        $answer = strval($gcd);
        $result['rounds'][] = [
            'question' => $question,
            'answer' => $answer
        ];
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
