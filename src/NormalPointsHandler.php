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

    /**
     * NormalPointsHandler constructor.
     * @param Sibala $this
     */
    public function __construct($sibala)
    {
        $this->sibala = $sibala;
    }

    public function setSibala(): void
    {
        $this->sibala->state = Sibala::N_POINTS;
        $this->sibala->points = $this->getPointsWhenNormalPoints();
        $this->sibala->maxNumber = $this->getMaxNumberWhenNormalPoints();
        $this->sibala->output = $this->outputWhenNormalPoints();
    }

    /**
     * @return float|int
     */
    private function getPointsWhenNormalPoints()
    {
        $pairPoints = collect($this->sibala->dice->groupDice())->filter(function ($x) {
            return $x == 2;
        })->toArray();

        $this->ignorePoint = collect(array_keys($pairPoints))->min();

        return collect($this->sibala->dice->getNumber())->reject(function ($item) {
            return $item === $this->ignorePoint;
        })->sum();
    }

    /**
     * @return int|mixed
     */
    private function getMaxNumberWhenNormalPoints()
    {
        $groupDice = $this->sibala->dice->groupDice();
        ksort($groupDice);

        if (count($groupDice) > 2) {
            //[{3,2},{4,1},{5,1}]
            $collectGroup = collect($groupDice)->reject(function ($item) {
                return $item > 1;
            });

            return last(array_keys($collectGroup->toArray()));
        } elseif (count($groupDice) == 2) {
            //[{1,2},{3,2}]
            return last(array_keys($groupDice));
        }

        return 0;
    }

    /**
     * @return string
     */
    private function outputWhenNormalPoints(): string
    {
        $specialOutput = [
            3 => "BG",
            12 => "Sibala",
        ];

        $points = $this->sibala->points;
        return array_key_exists($points, $specialOutput) ? $specialOutput[$points] : $points . " Points";
    }

}