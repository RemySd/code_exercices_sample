<?php 

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
