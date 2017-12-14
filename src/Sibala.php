<?php

namespace JoeyDojo;

class Sibala
{
    Const SAME_POINTS = 2;
    Const NO_POINTS = 0;
    Const N_POINTS = 1;
    public $points;
    public $maxNumber;
    public $state;
    public $output;
    public $dice;

    /**
     * Sibala constructor.
     * @param array $input
     */
    public function __construct($input)
    {
        $this->dice = new Dice($input);
        $this->initializeByStates();
    }

    private function initializeByStates()
    {
        $state = $this->getState();
        switch ($state) {
            case $this::NO_POINTS:
                $handler = new NoPointsHandler($this);
                $handler->setResult();
                break;
            case $this::SAME_POINTS:
                $handler = new SameColorHandler($this);
                $handler->setResult();
                break;
            case $this::N_POINTS:
                $handler = new NormalPointsHandler($this);
                $handler->setResult();
                break;
        }
    }

    public function getState()
    {
        $maxCountOfSamePoint = collect($this->dice->groupDice())->max();

        $stateLookup = [
            4 => $this::SAME_POINTS,
            3 => $this::NO_POINTS,
            2 => $this::N_POINTS,
            1 => $this::NO_POINTS,
        ];

        return $stateLookup[$maxCountOfSamePoint];
    }


    public function getPoints()
    {
        return $this->points;
    }

    public function output()
    {
        return $this->output;
    }

    public function getMaxNumber()
    {
        return $this->maxNumber;
    }
}
