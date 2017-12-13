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
    protected $dice;

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
        $state = $this->getState();
        switch ($state) {
            case Sibala::SAME_POINTS:
                $this->state = Sibala::SAME_POINTS;
                $this->points = $this->getPointsWhenSamePoints();
                $this->maxNumber = $this->getMaxNumber();
                $this->output = $this->outputWhenSamePoints();
                break;
            case Sibala::NO_POINTS:
                $this->state = Sibala::NO_POINTS;
                $this->points = $this->getPointsWhenNoPoints();
                $this->maxNumber = $this->getMaxNumber();
                $this->output = $this->outputWhenNoPoints();
                break;
            case Sibala::N_POINTS:
                $this->state = Sibala::N_POINTS;
                $this->points = $this->getPointsWhenNormalPoints();
                $this->maxNumber = $this->getMaxNumber();
                $this->output = $this->outputWhenNormalPoints();
                break;
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

    private function getPointsWhenSamePoints()
    {
        return $this->dice->getNumber()[0];
    }

    public function getMaxNumber()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return 0;
        }
        if ($this->getState() === SELF::SAME_POINTS) {
            return $this->dice->getNumber()[0];
        }

        return $this->getMaxNumberWhenNormalPoints();
    }

    /**
     * @return int|mixed
     */
    private function getMaxNumberWhenNormalPoints()
    {
        $groupDice = $this->dice->groupDice();
        ksort($groupDice);

        if (count($groupDice) > 2) {
            //[{3,2},{4,1},{5,1}]
            $collectGroup = collect($groupDice)->reject(function ($item) {
                return $item > 1;
            });

            return last(array_keys($collectGroup->toArray()));
        } elseif (count($groupDice) == 2) {
            //[{1,2},{3,2}]
            return last(array_keys($groupDice));
        }

        return 0;
    }

    private function outputWhenSamePoints()
    {
        return "Same Color";
    }

    private function getPointsWhenNoPoints()
    {
        return 0;
    }

    private function outputWhenNoPoints()
    {
        return "No Points";
    }

    /**
     * @return float|int
     */
    private function getPointsWhenNormalPoints()
    {
        $groupDice = $this->dice->groupDice();
        ksort($groupDice);
        if (count($groupDice) === 2) {
            //2,2,4,4的情況
            if (last($groupDice) === 2) {
                return last(array_keys($groupDice)) * 2;
            } else {
                //4,4,4,2的情況
                return collect($groupDice)->keys()->sum();
            }
        }
        if (count($groupDice) === 3) {
            return collect($groupDice)->reject(function ($item) {
                return $item > 1;
            })->keys()->sum();
        }
    }

    /**
     * @return string
     */
    private function outputWhenNormalPoints(): string
    {
        if ($this->points === 3) {
            return "BG";
        } elseif ($this->points === 12) {
            return "Sibala";
        }

        return $this->points . " Points";
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
