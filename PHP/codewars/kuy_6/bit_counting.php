<?php 

function countBits($number) 
{
    return strlen(str_replace('0', '', decbin($number)));
}

echo countBits(5);