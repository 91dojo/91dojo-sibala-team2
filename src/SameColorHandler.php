<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/16
 * Time: 下午 10:59
 */

namespace JoeyDojo;


class SameColorHandler
{
    /**
     * @var Dice
     */
    private $dice;

    /**
     * SameColorHandler constructor.
     * @param $dice
     */
    public function __construct($dice)
    {
        $this->dice = $dice;
    }

    public function setResult()
    {
        $this->dice->points = $this->dice->dices[0];
        $this->dice->output = "same color";
        $this->dice->maxPoint = $this->dice->dices[0];
        $this->dice->state = Dice::SAME_COLOR;
    }

}