<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/17
 * Time: 上午 12:53
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
        if ($x->getPoints() == $y->getPoints()) {
            return $x->getMaxPoint() - $y->getMaxPoint();
        }
        return $x->getPoints() - $y->getPoints();
    }
}