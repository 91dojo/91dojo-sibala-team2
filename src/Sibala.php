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
        $this->getHandler($this->getState())->setResult();
    }

    /**
     * @param $state
     * @return NoPointsHandler|NormalPointsHandler|SameColorHandler
     */
    private function getHandler($state)
    {
        $stateLookup = [
            $this::NO_POINTS => new NoPointsHandler($this),
            $this::SAME_POINTS => new SameColorHandler($this),
            $this::N_POINTS => new NormalPointsHandler($this),
        ];

        return $stateLookup[$state];
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
