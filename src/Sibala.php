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
                $this->setResultWhenNormalPoints();
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


    private function setResultWhenNormalPoints(): void
    {
        $this->state = $this::N_POINTS;
        $this->points = $this->getPointsWhenNormalPoints();
        $this->maxNumber = $this->getMaxNumberWhenNormalPoints();
        $this->output = $this->getOutputWhenNormalPoints();
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
     * @return int|mixed
     */
    private function getMaxNumberWhenNormalPoints()
    {
        $groupDice = $this->dice->groupDice();
        //[{1,2},{3,2}]
        ksort($groupDice);
        //
        if (count($groupDice) > 2) {
            $collectGroup = collect($groupDice)->reject(function ($item) {
                return $item > 1;
            });

            return last(array_keys($collectGroup->toArray()));
        } elseif (count($groupDice) == 2) {
            return last(array_keys($groupDice));
        }
        //預設值
        return 0;
    }

    /**
     * @return string
     */
    private function getOutputWhenNormalPoints(): string
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

    public function getMaxNumber()
    {
        return $this->maxNumber;
    }
}
