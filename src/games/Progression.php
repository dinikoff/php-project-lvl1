<?php

namespace Brain\Games\Progression;

function getGameDataProgression($roundNumber)
{
    $result['task'] = 'What number is missing in the progression?';
    $progressionLength = 10;

    for ($i = 0; $i < $roundNumber; $i++) {
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
        $result['rounds'][] = [
            'question' => $question,
            'answer' => $answer
        ];
    }

    return $result;
}
