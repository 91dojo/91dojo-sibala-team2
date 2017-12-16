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
            $handler = new NormalPointsHandler($this);
            $handler->setResult();
            return;
        }

        $handler = new NoPointsHandler($this);
        $handler->setResult();
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