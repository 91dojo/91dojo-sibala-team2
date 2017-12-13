<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/13
 * Time: 下午 08:06
 */

namespace JoeyDojo;


class NormalPointsHandler implements IDiceHandler
{
    private $ignorePoint;
    /**
     * @var Sibala
     */
    private $sibala;

    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setSibala(): void
    {
        $points = $this->getPoints();

        $this->sibala->state = Sibala::N_POINTS;
        $this->sibala->points = $points->sum();
        $this->sibala->maxNumber = $points->max();
        $this->sibala->output = $this->outputWhenNormalPoints($points->sum());
    }

    private function getPoints()
    {
        $pairPoints = collect($this->sibala->dice->groupDice())->filter(function ($x) {
            return $x == 2;
        })->toArray();

        $this->ignorePoint = collect(array_keys($pairPoints))->min();

        return collect($this->sibala->dice->getNumber())->reject(function ($item) {
            return $item === $this->ignorePoint;
        });
    }

    /**
     * @param $points
     * @return string
     */
    private function outputWhenNormalPoints($points): string
    {
        $specialOutput = [
            3 => "BG",
            12 => "Sibala",
        ];

        return array_key_exists($points, $specialOutput) ? $specialOutput[$points] : $points . " Points";
    }
}