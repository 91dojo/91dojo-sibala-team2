<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/16
 * Time: 下午 11:04
 */

namespace JoeyDojo;


class NormalPointsHandler
{
    /**
     * @var Dice
     */
    private $dice;
    private $ignorePoint;

    /**
     * NormalPointsHandler constructor.
     * @param $dice
     */
    public function __construct($dice)
    {
        $this->dice = $dice;
    }

    public function setResult()
    {
        $pointsOfDices = $this->pointsOfDices();

        $this->dice->state = Dice::NORMAL_POINTS;
        $this->dice->points = $pointsOfDices->sum();
        $this->dice->output = $this->dice->points . " points";
        $this->dice->maxPoint = $pointsOfDices->max();
    }

    private function pointsOfDices()
    {
        $pairPoints = collect(array_count_values($this->dice->dices))->filter(function ($x) {
            return $x == 2;
        })->toArray();

        $this->ignorePoint = collect(array_keys($pairPoints))->min();

        $pointsOfDices = collect($this->dice->dices)->reject(function ($item) {
            return $item == $this->ignorePoint;
        });
        return $pointsOfDices;
    }
}