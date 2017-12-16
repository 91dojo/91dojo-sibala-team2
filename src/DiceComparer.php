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

        return $this->getComparer($x)->compare($x, $y);
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
     * @return NoPointsComparer|NormalPointsComparer|SameColorComparer
     */
    private function getComparer($x)
    {
        if ($x->getType() == Dice::NORMAL_POINTS) {
            return new NormalPointsComparer();
        }
        if ($x->getType() == Dice::SAME_COLOR) {
            return new SameColorComparer();
        }
        return new NoPointsComparer();
    }


}