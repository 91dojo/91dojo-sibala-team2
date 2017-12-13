<?php

namespace JoeyDojo;

class Sibala
{
    Const SAME_POINTS = 2;
    Const NO_POINTS = 0;
    Const N_POINTS = 1;
    public $state;
    public $points;
    public $output;
    public $maxNumber;
    public $dice;

    /**
     * Sibala constructor.
     * @param array $input
     */
    public function __construct($input)
    {
        $this->dice = new Dice($input);
        $this->initializeStates();
    }

    private function initializeStates()
    {
        $this->getHandler()->setSibala();
    }

    /**
     * @return NoPointsHandler|NormalPointsHandler|SamePointHandler
     */
    private function getHandler()
    {
        $state = $this->getState();
        switch ($state) {
            case Sibala::SAME_POINTS:
                return new SamePointHandler($this);
            case Sibala::NO_POINTS:
                return new NoPointsHandler($this);
            case Sibala::N_POINTS:
                return new NormalPointsHandler($this);
        }
    }

    public function getState()
    {
        $maxCountOfSamePoint = collect($this->dice->groupDice())->max();
        if ($maxCountOfSamePoint === 4) {
            return $this::SAME_POINTS;
        } else if ($maxCountOfSamePoint === 3 || $maxCountOfSamePoint === 1) {
            return $this::NO_POINTS;
        }

        return $this::N_POINTS;
    }

    public function getMaxNumber()
    {
        return $this->maxNumber;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function output()
    {
        return $this->output;
    }
}
