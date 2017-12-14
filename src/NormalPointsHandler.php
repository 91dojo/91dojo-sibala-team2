<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/14
 * Time: 下午 02:56
 */

namespace JoeyDojo;


class NormalPointsHandler
{
    private $ignorePoint;
    /**
     * @var Sibala
     */
    private $sibala;

    /**
     * NormalPointsHandler constructor.
     * @param Sibala $sibala
     */
    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setResult()
    {
        $points = $this->getPoints();

        $this->sibala->state = Sibala::N_POINTS;
        $this->sibala->points = $points->sum();
        $this->sibala->maxNumber = $points->max();
        $this->sibala->output = $this->getOutputWhenNormalPoints();
    }

    private function getPoints()
    {
        $pairPoints = collect($this->sibala->dice->groupDice())->filter(function ($x) {
            return $x === 2;
        })->toArray();

        $this->ignorePoint = collect(array_keys($pairPoints))->min();

        $points = collect($this->sibala->dice->getNumber())->reject(function ($item) {
            return $item === $this->ignorePoint;
        });
        return $points;
    }

    /**
     * @return string
     */
    private function getOutputWhenNormalPoints(): string
    {
        $specialOutput = [
            3 => "BG",
            12 => "Sibala",
        ];

        $points = $this->sibala->points;
        return array_key_exists($points, $specialOutput)
            ? $specialOutput[$points]
            : $points . " Points";
    }
}