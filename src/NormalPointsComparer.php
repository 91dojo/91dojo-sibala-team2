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
        if ($this->isSamePoints($x, $y)) {
            return $x->getMaxPoint() - $y->getMaxPoint();
        }
        return $x->getPoints() - $y->getPoints();
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     */
    private function isSamePoints($x, $y): bool
    {
        return $x->getPoints() == $y->getPoints();
    }
}