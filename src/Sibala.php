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
        $handlerLookup = [
            Sibala::SAME_POINTS => new SamePointHandler($this),
            Sibala::NO_POINTS => new NoPointsHandler($this),
            Sibala::N_POINTS => new NormalPointsHandler($this),
        ];

        return $handlerLookup[$this->getState()];
    }

    public function getState()
    {
        $stateLookup = [
            4 => $this::SAME_POINTS,
            3 => $this::NO_POINTS,
            2 => $this::N_POINTS,
            1 => $this::NO_POINTS,
        ];

        return $stateLookup[collect($this->dice->groupDice())->max()];
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
