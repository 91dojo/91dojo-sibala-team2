<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/13
 * Time: 下午 08:46
 */

namespace JoeyDojo;


class NormalPointsComparer
{

    /**
     * NormalPointsComparer constructor.
     */
    public function __construct()
    {
    }

    public function compare($x, $y)
    {
        if ($x->points === $y->points) {
            return $x->maxNumber - $y->maxNumber;
        }
        return $x->points - $y->points;
    }
}