<?php

const RIGHT_SYMBOL = "R";
const LEFT_SYMBOL = "L";
const EMPTY_SYMBOL = ".";
const WHEEL_SYMBOL = "X";

//here we should move current position wheels to the left and right
function moveWheels($speed, $wheel) : array
{
    if(is_string($wheel)){
        $wheel = str_split($wheel);
    }
    if(!is_array($wheel)){
        throw new InvalidArgumentException("wrong wheel format");
    }
    $emptyWheel = array_fill(0, count($wheel), [EMPTY_SYMBOL]);

    foreach($wheel as $pos => $place)
    {
        foreach($place as $symbol){
            if($symbol === EMPTY_SYMBOL){
                continue;
            }
            if($symbol === RIGHT_SYMBOL)
            {
                $emptyWheel[$pos + $speed][] = $symbol;
            }
            if($symbol === LEFT_SYMBOL)
            {
                $emptyWheel[$pos - $speed][] = $symbol;
            }
        }
    }

    //unset keys which are <0 and > count($wheel), which are gone from wheel
    $emptyWheel = array_splice($emptyWheel, 0 , count($wheel));

    return $emptyWheel;
}

//because in some steps on same place could be 2 symbols , which we should use in the next steps,
//we need save wheels as array of symbols
function formatWheel(string $input) : array
{
    $arrayOfStrings =  str_split($input);
    $res = [];
    foreach ($arrayOfStrings as $string)
    {
        $res[] = [$string];
    }
    return $res;
}

//reformat our structure to the string, for output as in example
function reformatWheel(array $array): string
{
    $str = "";
    foreach($array as $k =>  $v)
    {
        if($v === [EMPTY_SYMBOL])
        {
            $str .= EMPTY_SYMBOL;
        } else {
            $str .= WHEEL_SYMBOL;
        }
    }
    return $str;
}

//main function
function animate(int $speed, string $init)
{
    $animateArray = [];
    $valid = preg_match("/^[RL\.]+$/", $init);
    if($valid !== 1){
        throw new Exception("Invalid input: ". $init);
    }

    $currentStep = $init;
    $currentStep = formatWheel($currentStep);

    do {
        //visualization for step
        $visualizatedStep = reformatWheel($currentStep);
        $partsExists = strpos($visualizatedStep, WHEEL_SYMBOL);
        $animateArray[] = $visualizatedStep;

        // move wheels to the left and right
        $currentStep = moveWheels($speed, $currentStep);

    } while ($partsExists !== false);

    return $animateArray;
}