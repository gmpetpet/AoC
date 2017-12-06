<?php

$input = 347991;
$sum = 0;

$a[0][0] = 1;
$currentPosition = ['x' => 0, 'y' => 0];
$directions = ['s', 'e', 'n', 'w'];
$direction = 0;
$go = [
    's' => [ 0, -1],
    'e' => [ 1,  0],
    'n' => [ 0,  1],
    'w' => [-1,  0]
];

do {
    $forward = $directions[$direction % 4];
    $left = $directions[($direction + 1) % 4];
    $checkPosition = [
        'x' => $currentPosition['x'] + $go[$left][0],
        'y' => $currentPosition['y'] + $go[$left][1]
    ];

    if (isset($a[$checkPosition['x']][$checkPosition['y']])) {
        $currentPosition = [
            'x' => $currentPosition['x'] + $go[$forward][0],
            'y' => $currentPosition['y'] + $go[$forward][1]
        ];
    } else {
        $currentPosition = $checkPosition;
        ++$direction;
    }

    $sum = calculateNeighbourSum($currentPosition, $a);

    $a[$currentPosition['x']][$currentPosition['y']] = $sum;
} while ($sum < $input);

echo 'Day 3, problem 2: ' . $sum;

function calculateNeighbourSum($position, $a)
{
    $sum = 0;

    for ($i = -1; $i <= 1; $i++) {
        for ($j = -1; $j <= 1; $j++) {
            if ($i === 0 && $j === 0) {
                continue;
            }

            if (isset($a[$position['x'] + $i][$position['y'] + $j])) {
                $sum += $a[$position['x'] + $i][$position['y'] + $j];
            }
        }
    }

    return $sum;
}
