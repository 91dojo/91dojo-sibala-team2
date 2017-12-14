<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/14
 * Time: 下午 02:48
 */

namespace JoeyDojo;


class NoPointsHandler
{
    private $sibala;

    /**
     * NoPointsHandler constructor.
     */
    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setResult()
    {

        $this->sibala->state = Sibala::NO_POINTS;
        $this->sibala->points = $this->getPointsWhenNoPoints();
        $this->sibala->maxNumber = $this->getMaxNumberWhenNoPoints();
        $this->sibala->output = $this->getOutputWhenNoPoints();
    }

    /**
     * @return int
     */
    private function getPointsWhenNoPoints(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    private function getMaxNumberWhenNoPoints(): int
    {
        return 0;
    }

    /**
     * @return string
     */
    private function getOutputWhenNoPoints(): string
    {
        return "No Points";
    }

}