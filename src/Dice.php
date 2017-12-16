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
            $this->points = 2;
            $this->output = "same color";
            $this->maxPoint = 2;
            $this->state = $this::SAME_COLOR;
            return;
        }
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