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
            $comparer = new NormalPointsComparer();
            return $comparer->compare($x, $y);
        }
        if ($x->getType() == Dice::SAME_COLOR) {
            $comparer = new SameColorComparer();
            return $comparer->compare($x, $y);
        }
        return $this->compareResultWhenNoPoints($x, $y);
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
     * @param $x Dice
     * @param $y Dice
     * @return int
     */
    private function compareResultWhenNoPoints($x, $y): int
    {
        return 0;
    }
}