<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/14
 * Time: 下午 02:53
 */

namespace JoeyDojo;


class SameColorHandler
{
    /**
     * @var Sibala
     */
    private $sibala;

    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setResult()
    {
        $this->sibala->state = Sibala::SAME_POINTS;
        $this->sibala->points = $this->getPointsWhenSameColor();
        $this->sibala->maxNumber = $this->getMaxNumberWhenSameColor();
        $this->sibala->output = $this->getOutputWhenSameColor();
    }

    /**
     * @return mixed
     */
    private function getPointsWhenSameColor()
    {
        return $this->sibala->dice->getNumber()[0];
    }

    /**
     * @return mixed
     */
    private function getMaxNumberWhenSameColor()
    {
        return $this->sibala->dice->getNumber()[0];
    }

    /**
     * @return string
     */
    private function getOutputWhenSameColor(): string
    {
        return "Same Color";
    }
}