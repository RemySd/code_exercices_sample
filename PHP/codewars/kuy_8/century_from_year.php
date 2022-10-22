<?php 

/**
 * The first century spans from the year 1 up to and including the year 100, the second century - from the year 101 up to and including the year 200, etc.
 */
function centuryFromYear(int $year): ?int
{
    $century = intdiv($year, 100);

    if ($year % 100 > 0) {
        $century++;;
    }

    return $century;
}

echo centuryFromYear(1705);
echo '<br>';
echo centuryFromYear(1900);
echo '<br>';
echo centuryFromYear(1601);
echo '<br>';
echo centuryFromYear(2000);
