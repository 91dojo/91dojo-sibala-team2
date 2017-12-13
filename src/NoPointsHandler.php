<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/13
 * Time: 下午 08:02
 */

namespace JoeyDojo;


class NoPointsHandler implements IDiceHandler
{
    private $sibala;

    /**
     * NoPointsHandler constructor.
     */
    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setSibala(): void
    {
        $this->sibala->state = Sibala::NO_POINTS;
        $this->sibala->points = $this->getPointsWhenNoPoints();
        $this->sibala->maxNumber = $this->getMaxNumberWhenNoPoints();
        $this->sibala->output = $this->outputWhenNoPoints();
    }

    private function getPointsWhenNoPoints()
    {
        return 0;
    }

    private function getMaxNumberWhenNoPoints()
    {
        return 0;
    }

    private function outputWhenNoPoints()
    {
        return "No Points";
    }
}