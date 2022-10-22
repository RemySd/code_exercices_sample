<?php 

ini_set('display_errors', 1);

function pluralize($word, $quantity) 
{
    return $quantity > 1 ? $word . 's' : $word;
}

function format_duration($seconds) 
{
    if ($seconds === 0) {
        return 'now';
    }

    $secondByDurations = [
        'year' => 31536000, 
        'day' => 86400, 
        'hour' => 3600, 
        'minute' => 60, 
        'second' => 1
    ];

    $resultArray = [];

    foreach ($secondByDurations as $key => $secondByDuration) {
        $value = intdiv($seconds, $secondByDuration);

        if ($value === 0) {
            continue;
        }

        $resultArray[] = $value . ' ' . pluralize($key, $value);
        
        $seconds = $seconds -  $value * $secondByDuration;
    }

    if (count($resultArray) > 1) {
        $last = array_pop($resultArray);

        return implode(', ', $resultArray) . ' and ' . $last;
    }

    return $resultArray[0];
}

echo format_duration(31536062);