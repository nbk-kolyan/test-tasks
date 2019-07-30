<?php
namespace testWork\task2;

use InvalidArgumentException;

class Chamber
{
    const RIGHT_SYMBOL = "R";
    const LEFT_SYMBOL = "L";
    const EMPTY_SYMBOL = ".";
    const WHEEL_SYMBOL = "X";

    private $length = 0;
    private $speed = 0;
    private $structure;

    /**
     * @throws InvalidArgumentException
     * @param string $init
     */
    private function validate(string $init)
    {
        $valid = preg_match("/^[RL\.]+$/", $init);
        if($valid !== 1){
            throw new InvalidArgumentException("Invalid input: ". $init);
        }
    }

    public function animate(int $speed, string $init) : array
    {
        $this->initStructure($init, $speed);

        $output[] = $this->show();
        while (!$this->haveParticles())
        {
            $this->moveParticle();
            $output[] = $this->show();
        }

        return $output;
    }

    //initialization structure from intit
    private function initStructure(string $init, int $speed)
    {
        $this->validate($init);

        $this->length = strlen($init);
        $this->speed = $speed;
        $this->structure = $this->createStructure();

        //todo create class Particle(left and right) which can move and use it in move method
        $arrayOfStrings =  str_split($init);
        foreach ($arrayOfStrings as $index =>  $string)
        {
            $this->structure[$index] = [$string];
        }
        return $this->structure;
    }

    //create structure
    private function createStructure()
    {
        return array_fill(0,$this->length, [self::EMPTY_SYMBOL]);
    }

    //make representation of current state
    private function show() : string
    {
        $str = "";
        foreach($this->structure as $k =>  $v)
        {
            if($v === [self::EMPTY_SYMBOL])
            {
                $str .= self::EMPTY_SYMBOL;
            } else {
                $str .= self::WHEEL_SYMBOL;
            }
        }
        return $str;
    }

    //check that chamber have partitions
    private function haveParticles() : bool
    {
        foreach($this->structure as  $v)
        {
            if($v !== [self::EMPTY_SYMBOL])
            {
                return false;
            }
        }
        return true;
    }

    //here we should move current position wheels to the left and right
    //actually its calculating position of each particle in next step, and put it in chamber
    private function moveParticle() : array
    {
        $nextStep = $this->createStructure();

        //calculate position of each wheel - particle in the next step
        foreach($this->structure as $pos => $place)
        {
            foreach($place as $symbol){

                if($symbol === self::EMPTY_SYMBOL){
                    continue;
                }
                if($symbol === self::RIGHT_SYMBOL)
                {
                    $nextStep[$pos + $this->speed][] = $symbol;
                }
                if($symbol === self::LEFT_SYMBOL)
                {
                    $nextStep[$pos - $this->speed][] = $symbol;
                }
            }
        }

        $this->structure = array_splice($nextStep, 0 , $this->length);

        return $nextStep;
    }
}