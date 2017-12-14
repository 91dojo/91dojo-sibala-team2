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
        $this->sibala->state = Sibala::N_POINTS;
        $this->sibala->points = $this->getPointsWhenNormalPoints();
        $this->sibala->maxNumber = $this->getMaxNumberWhenNormalPoints();
        $this->sibala->output = $this->getOutputWhenNormalPoints();
    }


    /**
     * @return float|int
     */
    private function getPointsWhenNormalPoints()
    {
        $groupDice = $this->sibala->dice->groupDice();
        ksort($groupDice);
        if (count($groupDice) === 2) {
            //2,2,4,4的情況
            if (last($groupDice) === 2) {
                return last(array_keys($groupDice)) * 2;
            } else {
                //4,4,4,2的情況
                return collect($groupDice)->keys()->sum();
            }
        }
        if (count($groupDice) === 3) {
            return collect($groupDice)->reject(function ($item) {
                return $item > 1;
            })->keys()->sum();
        }
    }

    /**
     * @return int|mixed
     */
    private function getMaxNumberWhenNormalPoints()
    {
        $groupDice = $this->sibala->dice->groupDice();
        //[{1,2},{3,2}]
        ksort($groupDice);
        //
        if (count($groupDice) > 2) {
            $collectGroup = collect($groupDice)->reject(function ($item) {
                return $item > 1;
            });

            return last(array_keys($collectGroup->toArray()));
        } elseif (count($groupDice) == 2) {
            return last(array_keys($groupDice));
        }
        //預設值
        return 0;
    }

    /**
     * @return string
     */
    private function getOutputWhenNormalPoints(): string
    {
        if ($this->sibala->points === 3) {
            return "BG";
        } elseif ($this->sibala->points === 12) {
            return "Sibala";
        }

        return $this->sibala->points . " Points";
    }
}