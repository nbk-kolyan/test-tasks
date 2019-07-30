<?php
namespace testWork\task2;

include_once "Chamber.php";

use PHPUnit\Framework\TestCase;


class ChamberTest extends TestCase
{

    /**
     * Test data from the task
     * @dataProvider additionProvider
     */
    public function testAnimateData($speed, $init, $presentation)
    {
        $chamber = new Chamber();
        $this->assertEquals($chamber->animate($speed, $init), $presentation);
    }

    /**
     * test throwing exception on validation
     */
    public function testValidation()
    {
        $chamber = new Chamber();
        $this->expectException(\InvalidArgumentException::class);
        $chamber->animate(1, "..A");
    }

    /**
     * Test data with expected results
     * @return array
     */
    public function additionProvider()
    {
        return [

            [10, "RLRLRLRLRL", [
                 "XXXXXXXXXX",
                 "..........",
            ] ],
            [1, "...", ["..."]],
            [2, "..R....", [
                "..X....",
                "....X..",
                "......X",
                ".......",
            ] ],
            [3, "RR..LRL", [
                "XX..XXX",
                ".X.XX..",
                "X.....X",
                "......."
            ]],
            [1, "LRRL.LR.LRR.R.LRRL.", [
                "XXXX.XX.XXX.X.XXXX.",
                "..XXX..X..XX.X..XX.",
                ".X.XX.X.X..XX.XX.XX",
                "X.X.XX...X.XXXXX..X",
                ".X..XXX...X..XX.X..",
                "X..X..XX.X.XX.XX.X.",
                "..X....XX..XX..XX.X",
                ".X.....XXXX..X..XX.",
                "X.....X..XX...X..XX",
                ".....X..X.XX...X..X",
                "....X..X...XX...X..",
                "...X..X.....XX...X.",
                "..X..X.......XX...X",
                ".X..X.........XX...",
                "X..X...........XX..",
                "..X.............XX.",
                ".X...............XX",
                "X.................X",
                "..................."]
        ]];
    }
}