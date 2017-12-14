<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/14
 * Time: 下午 03:26
 */

namespace JoeyDojo;


class SameColorComparer
{

    /**
     * @var array
     */
    private $lut = [
        1 => 6,
        4 => 5,
        6 => 4,
        5 => 3,
        3 => 2,
        2 => 1,
    ];

    /**
     * SameColorComparer constructor.
     */
    public function __construct()
    {
    }

    public function compare($x, $y)
    {
        return $this->lut[$x->getMaxNumber()] - $this->lut[$y->getMaxNumber()];
    }
}