<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/15
 * Time: 下午 02:36
 */

namespace JoeyDojo;


class Dice
{
    const NO_POINTS = 0;
    const SAME_COLOR = 2;
    private $points;
    private $maxPoint;
    private $state;
    private $output;

    /**
     * Dice constructor.
     * @param array $array
     */
    public function __construct($array)
    {
        $this->initializeByState();
    }

    private function initializeByState()
    {
        $this->setResultWhenNoPoints();
    }

    private function setResultWhenNoPoints()
    {
        $this->points = 0;
        $this->maxPoint = 0;
        $this->state = $this::NO_POINTS;
        $this->output = "no points";
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getMaxPoint()
    {
        return $this->maxPoint;
    }

    public function getType()
    {
        return $this->state;
    }
}