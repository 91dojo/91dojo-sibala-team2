<?php

namespace JoeyDojo;

class Dice
{
    protected $dice;
    
    /**
     * Dice constructor.
     * @param array $input
     */
    public function __construct($input)
    {
        $this->dice = $input;
    }
    
    /**
     * @return int
     */
    public function getUniqueCount()
    {
        return count(array_unique($this->dice));
    }
    
    public function getNumber()
    {
        return $this->dice;
    }
    
    public function groupDice()
    {
    
    }
}
