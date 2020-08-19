<?php

namespace Brain\Games\Progression;

function getGameDataProgression()
{
    $result[0] = 'What number is missing in the progression?';
    $progressionLength = 10;

    for ($i = 1; $i < 4; $i++) {
        $currentNumber = rand(1, 99);
        $step = rand(1, 10);
        $hiddenIndex = rand(0, $progressionLength - 1);
        $answer = null;
        $question = null;
        $parts = [];
        for ($j = 0; $j < $progressionLength; $j++) {
            if ($j === $hiddenIndex) {
                $parts[$j] = '..';
                $answer = strval($currentNumber);
            } else {
                $parts[$j] = $currentNumber;
            }
            $currentNumber += $step;
        }
        $question = implode(' ', $parts);
        $result[$i] = [$question, $answer];
    }

    return $result;
}