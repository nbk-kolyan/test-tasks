<?php
include_once "spinning_wheels.php";

$test[0]["speed"] = 2;
$test[0]["init"] = 1;

$test[1]["speed"] = 2;
$test[1]["init"] = "..R....";

$test[2]["speed"] = 3;
$test[2]["init"] = "RR..LRL";

$test[3]["speed"] = 2;
$test[3]["init"] = "LRLR.LRLR";

$test[4]["speed"] = 10;
$test[4]["init"] = "RLRLRLRLRL";

$test[5]["speed"] = 1;
$test[5]["init"] = "...";

$test[6]["speed"] = 1;
$test[6]["init"] = "LRRL.LR.LRR.R.LRRL.";

foreach($test as $i => $testCase)
{
    try{
        $resultArray  = animate($test[$i]["speed"], $test[$i]["init"]);
        echo "Test suit: $i" . PHP_EOL;
        echo "speed: " . $test[$i]["speed"] . PHP_EOL;
        echo "init: " . $test[$i]["init"] . PHP_EOL;
        var_dump($resultArray);
    } catch(Exception $e){
        echo "TEST FAILED: ". $e->getMessage() . PHP_EOL;
    }

}