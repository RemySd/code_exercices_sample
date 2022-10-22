<?php 

function betterThanAverage(array $classsScores, int $yourScore): bool
{
    return array_sum($classsScores) / count($classsScores) < $yourScore;
}

echo betterThanAverage([2, 3], 5);
echo '<br>';
echo betterThanAverage([100, 40, 34, 57, 29, 72, 57, 88], 75);
echo '<br>';
echo betterThanAverage([12, 23, 34, 45, 56, 67, 78, 89, 90], 69);
echo '<br>';
echo betterThanAverage([41, 75, 72, 56, 80, 82, 81, 33], 50);
echo '<br>';
echo betterThanAverage([29, 55, 74, 60, 11, 90, 67, 28], 21);
echo '<br>';