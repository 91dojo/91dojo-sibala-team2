<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/17
 * Time: 上午 12:55
 */

namespace JoeyDojo;


class SameColorComparer
{

    /**
     * SameColorComparer constructor.
     */
    public function __construct()
    {
    }

    public function compare($x, $y)
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
}