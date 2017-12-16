<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/15
 * Time: 下午 02:36
 */

namespace JoeyDojo;


use function PHPSTORM_META\type;

class Dice
{
    const NO_POINTS = 0;
    const SAME_COLOR = 2;
    const NORMAL_POINTS = 1;
    private $points;
    private $maxPoint;
    private $state;
    private $output;
    private $dices;

    /**
     * Dice constructor.
     * @param $dices
     */
    public function __construct($dices)
    {
        $this->dices = $dices;
        $this->initializeByState();
    }

    private function initializeByState()
    {
        $maxCount = collect(array_count_values($this->dices))->max();
        if ($maxCount == 4) {
            $this->setResultWhenSameColor();
            return;
        }
        $this->setResultWhenNoPoints();
    }

    private function setResultWhenSameColor()
    {
        $this->points = $this->dices[0];
        $this->output = "same color";
        $this->maxPoint = $this->dices[0];
        $this->state = $this::SAME_COLOR;
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