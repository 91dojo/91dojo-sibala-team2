<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/13
 * Time: 下午 07:47
 */

namespace JoeyDojo;


class SamePointHandler implements IDiceHandler
{
    /**
     * @var Sibala
     */
    private $sibala;

    /**
     * SamePointHandler constructor.
     */
    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setSibala(): void
    {
        $this->sibala->state = Sibala::SAME_POINTS;
        $this->sibala->points = $this->getPointsWhenSamePoints();
        $this->sibala->maxNumber = $this->getMaxNumberWhenSamePoints();
        $this->sibala->output = $this->outputWhenSamePoints();
    }

    private function getPointsWhenSamePoints()
    {
        return $this->sibala->dice->getNumber()[0];
    }

    private function getMaxNumberWhenSamePoints()
    {
        return $this->sibala->dice->getNumber()[0];
    }

    private function outputWhenSamePoints()
    {
        return "Same Color";
    }
}