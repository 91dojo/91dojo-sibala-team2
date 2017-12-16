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
        if ($x->getType() == Dice::SAME_COLOR) {
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
        return 0;
    }
}