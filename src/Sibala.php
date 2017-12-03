<?php

namespace JoeyDojo;

class Sibala
{
    Const SAME_POINTS = 2;
    Const NO_POINTS = 0;
    Const N_POINTS = 1;
    protected $dice;
    
    /**
     * Sibala constructor.
     * @param array $input
     */
    public function __construct($input)
    {
        $this->dice = new Dice($input);
    }
    
    public function getState()
    {
        $uniqueCount = $this->dice->getUniqueCount();
        
        if ($uniqueCount === 4) {
            return $this::NO_POINTS;
        }
        return $this::SAME_POINTS;
    }
    
    public function getPoints()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return 0;
        }
        if ($this->getState() === SELF::SAME_POINTS) {
            //回傳陣列隨便的一個值 (SAME_POINTS)
            return $this->dice->getNumber()[0];
        }
    }
    
}
