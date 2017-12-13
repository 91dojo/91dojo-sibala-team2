<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/13
 * Time: 下午 08:41
 */

namespace JoeyDojo;


class SamePointComparer
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
     * SamePointComparer constructor.
     */
    public function __construct()
    {
    }

    public function compare($x, $y)
    {
        return $this->lut[$x->maxNumber] - $this->lut[$y->maxNumber];
    }
}