<?php
namespace testWork\task1;

include 'Searcher.php';

use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * Test that methods were invoked
     */
    public function testGetMissingLettersMethodsInvoked()
    {
        $searcher = $this->getMockBuilder(Searcher::class)
            ->setMethodsExcept(['getMissingLetters'])
            ->getMock();

        $searcher->expects($this->once())
            ->method('setSentence')
            ->with($this->equalTo('Something'));

        $searcher->expects($this->atLeastOnce())
            ->method('getSentence');

        $searcher->getMissingLetters('Something');
    }

    /**
     * If we want test data from the task, then we can use dataProvider
     *
     * @dataProvider additionProvider
     */
    public function testGetMissingLettersData($sentence, $missingLetters )
    {
        $searcher = new Searcher();
        $this->assertSame($searcher->getMissingLetters($sentence), $missingLetters);
    }

    /**
     * Test data with expected results
     * @return array
     */
    public function additionProvider()
    {
        return [
            ["A quick brown fox jumps over the lazy dog", ""],
            ["A slow yellow fox crawls under the proactive dog", "bjkmqz"],
            ["Lions, and tigers, and bears, oh my!", "cfjkpquvwxz"],
            ["", "abcdefghijklmnopqrstuvwxyz"],
            ["Lions, and tigers, and bears, oh my! ЗЩВФВРЩГШИРФШИ ШГИВФЩИ ЩХШВИ", "cfjkpquvwxz"],
        ];
    }
}