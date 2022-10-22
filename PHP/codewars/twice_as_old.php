<?php

/**
 * Сalculate how many years ago the father was twice as old as his son (or in how many years he will be twice as old). 
 * The answer is always greater or equal to 0, no matter if it was in the past or it is in the future.
 */
function twiceAsOld(int $dadYearsOld, int $sonYearsOld): int 
{    
    for ($i = 0; $i < $dadYearsOld * 2; $i++) {
        if ($dadYearsOld - $sonYearsOld + $i ===  $i * 2) {
            return abs($i - $sonYearsOld);
        }
    }
 }

 function twiceAsOldRefacto(int $dadYearsOld, int $sonYearsOld): int 
 {
    return abs($dadYearsOld - $sonYearsOld * 2);
 }

 echo twiceAsOldRefacto(36, 7);
 echo '<br>';
 echo twiceAsOldRefacto(55, 30);
 echo '<br>';
 echo twiceAsOld(42, 21);
 echo '<br>';
 echo twiceAsOld(22, 1);
 echo '<br>';
 echo twiceAsOld(29, 0);
