<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/17
 * Time: 上午 12:31
 */

namespace JoeyDojo;


class DiceComparer
{

    /**
     * DiceComparer constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $x Dice
     * @param $y Dice
     * @return int
     */
    public function compare($x, $y)
    {
        if ($x->getType() != $y->getType()) {
            return $this->compareResultWhenStateIsDifferent($x, $y);
        }

        if ($x->getType() == Dice::NORMAL_POINTS) {
            return $this->compareResultWhenNormalPoints($x, $y);
        }
        if ($x->getType() == Dice::SAME_COLOR) {
            return $this->compareResultWhenSameColor($x, $y);
        }
        return $this->compareResultWhenNoPoints();
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    private function compareResultWhenStateIsDifferent($x, $y)
    {
        return $x->getType() - $y->getType();
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    private function compareResultWhenNormalPoints($x, $y)
    {
        if ($x->getPoints() == $y->getPoints()) {
            return $x->getMaxPoint() - $y->getMaxPoint();
        }
        return $x->getPoints() - $y->getPoints();
    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    private function compareResultWhenSameColor($x, $y)
    {
        $sameColorWeightLookup = [
            1 => 6,
            4 => 5,
            6 => 4,
            5 => 3,
            3 => 2,
            2 => 1,
        ];

        return $sameColorWeightLookup[$x->getPoints()] - $sameColorWeightLookup[$y->getPoints()];
    }

    /**
     * @return int
     */
    private function compareResultWhenNoPoints(): int
    {
        return 0;
    }
}