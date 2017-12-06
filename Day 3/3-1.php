<?php

$input = 347991;
$roundUp = ceil((sqrt($input) + 1) / 2) * 2 - 1;

$lastNumInCircle = pow($roundUp, 2);
$sideLength = sqrt($lastNumInCircle) - 1;
$firstNumInCircle = ($lastNumInCircle - ($sideLength * 4) + 1);

$distanceFromStartOfSide = (($input - $firstNumInCircle) + 1) % $sideLength;
$distanceToNearestCorner = min($distanceFromStartOfSide, $sideLength - $distanceFromStartOfSide);

echo 'Day 3, problem 1: ' . ($sideLength - $distanceToNearestCorner);
