<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/15
 * Time: 下午 02:36
 */

namespace Tests;

use JoeyDojo\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{

    private $dice;

    public function test_NoPoints_2365()
    {
        $this->dice = new Dice([2, 3, 6, 5]);
        $this->pointsShouldBe(0);
        $this->outputShouldBe("no points");
        $this->maxPointShouldBe(0);
        $this->typeShouldBe(Dice::NO_POINTS);
    }

    private function pointsShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->dice->getPoints());
    }

    private function outputShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->dice->getOutput());
    }

    private function maxPointShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->dice->getMaxPoint());
    }

    private function typeShouldBe($type): void
    {
        $this->assertEquals($type, $this->dice->getType());
    }

    public function test_SameColor_2222()
    {
        $this->dice = new Dice([2, 2, 2, 2]);
        $this->pointsShouldBe(2);
        $this->outputShouldBe("same color");
        $this->maxPointShouldBe(2);
        $this->typeShouldBe(Dice::SAME_COLOR);
    }
}