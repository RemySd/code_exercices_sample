<?php 

function longest($a, $b) {
    $arrayUnique = array_unique(array_merge(str_split($a), str_split($b)));
    // $arrayUnique = array_unique(str_split($a . $b));
    sort($arrayUnique);
    return implode($arrayUnique);
}

echo longest("aretheyhere", "yestheyarehere");