<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/16
 * Time: 下午 11:12
 */

namespace JoeyDojo;


class NoPointsHandler
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * NoPointsHandler constructor.
     * @param Dice $dice
     */
    public function __construct($dice)
    {
        $this->dice = $dice;
    }

    public function setResult()
    {
        $this->dice->points = 0;
        $this->dice->maxPoint = 0;
        $this->dice->state = Dice::NO_POINTS;
        $this->dice->output = "no points";
    }
}