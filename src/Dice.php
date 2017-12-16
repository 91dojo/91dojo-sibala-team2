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
    public $points;
    public $maxPoint;
    public $state;
    public $output;
    public $dices;
    private $ignorePoint;

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
            $handler = new SameColorHandler($this);
            $handler->setResult();
            return;
        } else if ($maxCount == 2) {
            $this->setResultWhenNormalPoints();
            return;
        }
        $this->setResultWhenNoPoints();
    }


    private function setResultWhenNormalPoints()
    {
        $pointsOfDices = $this->pointsOfDices();

        $this->state = $this::NORMAL_POINTS;
        $this->points = $pointsOfDices->sum();
        $this->output = $this->points . " points";
        $this->maxPoint = $pointsOfDices->max();
    }

    private function pointsOfDices()
    {
        $pairPoints = collect(array_count_values($this->dices))->filter(function ($x) {
            return $x == 2;
        })->toArray();

        $this->ignorePoint = collect(array_keys($pairPoints))->min();

        $pointsOfDices = collect($this->dices)->reject(function ($item) {
            return $item == $this->ignorePoint;
        });
        return $pointsOfDices;
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