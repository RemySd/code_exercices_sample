<?php 

function getCount($string) {
    $vowelsCount = 0;
    
    foreach (str_split('aeiou') as $vowel) {
        $vowelsCount += substr_count($string, $vowel);
    }
    
    return $vowelsCount;
}

echo getCount("bonjour");