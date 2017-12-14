<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/14
 * Time: 下午 03:29
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
        if ($x->getPoints() === $y->getPoints()) {
            return $x->getMaxNumber() - $y->getMaxNumber();
        }
        return $x->getPoints() - $y->getPoints();
    }

}