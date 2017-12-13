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

        if ($this->getPoints() === 3) {
            return "BG";
        } elseif ($this->getPoints() === 12) {
            return "Sibala";
        }

        return $this->getPoints() . " Points";
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

    public function getPoints()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return 0;
        } elseif ($this->getState() === SELF::SAME_POINTS) {
            //回傳陣列隨便的一個值 (SAME_POINTS)
            return $this->dice->getNumber()[0];
        } else {
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
    }

    public function getMaxNumber()
    {
        if ($this->getState() === SELF::NO_POINTS) {
            return 0;
        }
        if ($this->getState() === SELF::SAME_POINTS) {
            return $this->dice->getNumber()[0];
        }
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
        //預設值
        return 0;

    }

    /**
     * @param $uniqueCount
     * @return bool
     */
    private function IsSamePoints($uniqueCount): bool
    {
        return $uniqueCount === 1;
    }

    /**
     * @param $groupDice
     * @return array
     */
    private function hasSamePointWith3Dices($groupDice): array
    {
        return array_where(collect($groupDice)->toArray(), function ($item) {
            return $item === 3;
        });
    }
}
