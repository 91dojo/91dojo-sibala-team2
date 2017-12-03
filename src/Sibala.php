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
        return $this::SAME_POINTS;
    }
    
    public function getPoint()
    {
        return 2;
    }
}
