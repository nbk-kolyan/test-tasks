<?php
//search letters throw standart php functions
function getMissingLetters(string $str) : string
{
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $strArray = str_split($alphabet);
    $ret = "";

    foreach ($strArray as $letter)
    {
        $pos      = strripos($str, $letter);
        if ($pos === false){
            $ret .= $letter;
        }
    }
    return $ret;
}

