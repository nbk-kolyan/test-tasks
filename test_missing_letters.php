<?php
include_once "missing_letters.php";

$start_time=microtime(true);

$test[1] = "A quick brown fox jumps over the lazy dog";
$result[1] = "";
$test[2] = "A slow yellow fox crawls under the proactive dog";
$result[2] = "bjkmqz";
$test[3] = "Lions, and tigers, and bears, oh my!";
$result[3] = "cfjkpquvwxz";
$test[4] = "";
$result[4] = "abcdefghijklmnopqrstuvwxyz";
$test[5] = "Lions, and tigers, and bears, oh my! ЗЩВФВРЩГШИРФШИ ШГИВФЩИ ЩХШВИ";
$result[5] = "cfjkpquvwxz";

/*
//function for generating random strings
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

//big test string
$test[6] =  generateRandomString(10000000);
$result[6]= "";

for($i = 7; $i <= 10000; $i++)
{
    $test[$i] =  generateRandomString(rand(0, 50));
}
*/

//run all tests
for($i = 1; $i <= count($test) ; $i++)
{
    echo "Test suite $i: " . PHP_EOL;
    $missingLetters =  getMissingLetters($test[$i]);
    echo "Test sentence: " .$test[$i] . PHP_EOL;
    echo "Missing letters: " . $missingLetters . PHP_EOL;
}

$end_time=microtime(true);

echo "time: ", ($end_time - $start_time), PHP_EOL;
echo "memory (byte): ", memory_get_peak_usage(true), PHP_EOL;

