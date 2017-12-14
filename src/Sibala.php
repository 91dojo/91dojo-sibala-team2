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

    public function output()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return "No Points";
        }
        if ($this->getState() === SELF::SAME_POINTS) {
            return "Same Color";
        }

        return $this->getOutputWhenNormalPoints();
    }

    public function getState()
    {
        $maxCountOfSamePoint = collect($this->dice->groupDice())->max();

        $uniqueCount = $this->dice->getUniqueCount();

        if ($uniqueCount === 4 || $maxCountOfSamePoint === 3) {
            return $this::NO_POINTS;
        }

        if ($uniqueCount === 1) {
            return $this::SAME_POINTS;
        }

        return $this::N_POINTS;
    }

    /**
     * @return string
     */
    private function getOutputWhenNormalPoints(): string
    {
        if ($this->getPoints() === 3) {
            return "BG";
        } elseif ($this->getPoints() === 12) {
            return "Sibala";
        }

        return $this->getPoints() . " Points";
    }

    public function getPoints()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return $this->getPointsWhenNoPoints();
        }

        if ($this->getState() === SELF::SAME_POINTS) {
            //回傳陣列隨便的一個值 (SAME_POINTS)
            return $this->getPointsWhenSameColor();
        }
        return $this->getPointsWhenNormalPoints();
    }

    /**
     * @return int
     */
    private function getPointsWhenNoPoints(): int
    {
        return 0;
    }

    /**
     * @return mixed
     */
    private function getPointsWhenSameColor()
    {
        return $this->dice->getNumber()[0];
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

    public function getMaxNumber()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return $this->getMaxNumberWhenNoPoints();
        }
        if ($this->getState() === SELF::SAME_POINTS) {
            return $this->getMaxNumberWhenSameColor();
        }
        return $this->getMaxNumberWhenNormalPoints();

    }

    /**
     * @return int
     */
    private function getMaxNumberWhenNoPoints(): int
    {
        return 0;
    }

    /**
     * @return mixed
     */
    private function getMaxNumberWhenSameColor()
    {
        return $this->dice->getNumber()[0];
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
}
