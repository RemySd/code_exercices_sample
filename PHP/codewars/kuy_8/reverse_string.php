<?php

function solution($str) 
{
    // strrev($str)
    return implode('', array_reverse(str_split($str)));
}

echo solution("hello");