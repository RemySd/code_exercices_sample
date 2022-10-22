<?php 

function isIsogram(string $string): bool 
{
    $string = strtolower($string);

    if (strlen($string) === 0) {
        return true;
    }

    foreach (str_split($string) as $char) {
        if (substr_count($string, $char) > 1) {
            return false;
        }
    }

    return true;
}

echo var_dump(isIsogram("Dermatoglyphics"));
echo '<br>';
echo var_dump(isIsogram("isogram"));
echo '<br>';
echo var_dump(isIsogram("aba"));
echo '<br>';
echo var_dump(isIsogram("moOse"));
echo '<br>';
echo var_dump(isIsogram("isIsogram"));
echo '<br>';
echo var_dump(isIsogram(""));
echo '<br>';