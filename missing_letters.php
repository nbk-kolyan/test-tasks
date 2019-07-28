<?php

//Function based on the generators
function getMissingLettersGenerator(string $str) : Generator
{
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $alphabetArray = str_split($alphabet);

    foreach ($alphabetArray as $letter)
    {
        $pos      = strripos($str, $letter);
        if ($pos === false){
            yield $letter;
        }
    }
}


function getMissingLetters(string $input) : string
{
    $expectedResult =  getMissingLettersGenerator($input);
    $missingLetters = "";

    foreach ($expectedResult as $value)
    {
        $missingLetters = $missingLetters . $value;
    }
    return $missingLetters;
}