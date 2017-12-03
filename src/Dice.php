<?php

namespace JoeyDojo;

class Dice
{
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
}
