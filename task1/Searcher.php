<?php
namespace testWork\task1;

class Searcher
{
    /**
     * @var string
     */
    private $sentence;
    /**
     * @var string
     */
    private $pattern;
    /**
     * @var array
     */
    private $searchArray = [];


    public function __construct(string $str = "")
    {
        $this->sentence = $str;
        $this->pattern = "abcdefghijklmnopqrstuvwxyz";
        $this->searchArray = str_split($this->pattern);
    }

    public function setSentence(string  $str)
    {
        $this->sentence = $str;
    }

    public function getSentence() : string
    {
        return $this->sentence;
    }

    public function getMissingLetters(string $str) : string
    {
        $this->setSentence($str);
        $ret = "";

        foreach ($this->searchArray as $letter)
        {
            $pos = strripos($this->getSentence(), $letter);
            if ($pos === false){
                $ret .= $letter;
            }
        }
        return $ret;
    }
}
