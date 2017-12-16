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
    private $specialOutput = [
        3 => "BG",
        12 => "Sibala",
    ];
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
        $this->dice->output = $this->getOutput();
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

    /**
     * @return mixed|string
     */
    private function getOutput()
    {
        return $this->isSpecialOutput()
            ? $this->getSpecialOutput()
            : $this->defaultOutput();
    }

    /**
     * @return bool
     */
    private function isSpecialOutput(): bool
    {
        return array_key_exists($this->dice->points, $this->specialOutput);
    }

    /**
     * @return mixed
     */
    private function getSpecialOutput()
    {
        return $this->specialOutput[$this->dice->points];
    }

    /**
     * @return string
     */
    private function defaultOutput(): string
    {
        $defaultOutput = $this->dice->points . " points";
        return $defaultOutput;
    }
}