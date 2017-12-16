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

    public function test_normalPoints_1pair_5531()
    {
        $this->dice = new Dice([5, 5, 3, 1]);
        $this->pointsShouldBe(4);
        $this->outputShouldBe("4 points");
        $this->maxPointShouldBe(3);
        $this->typeShouldBe(Dice::NORMAL_POINTS);
    }

    public function test_normalPoints_2pair_5335()
    {
        $this->dice = new Dice([5, 3, 3, 5]);
        $this->pointsShouldBe(10);
        $this->outputShouldBe("10 points");
        $this->maxPointShouldBe(5);
        $this->typeShouldBe(Dice::NORMAL_POINTS);
    }

    public function test_normalPoints_1332_BG()
    {
        $this->dice = new Dice([1, 3, 3, 2]);
        $this->pointsShouldBe(3);
        $this->outputShouldBe("BG");
        $this->maxPointShouldBe(2);
        $this->typeShouldBe(Dice::NORMAL_POINTS);
    }

    public function test_normalPoints_6336_sibala()
    {
        $this->dice = new Dice([6, 3, 3, 6]);
        $this->pointsShouldBe(12);
        $this->outputShouldBe("Sibala");
        $this->maxPointShouldBe(6);
        $this->typeShouldBe(Dice::NORMAL_POINTS);
    }

    public function test_noPoints_3dicesSamePoint_3353()
    {
        $this->dice = new Dice([3, 3, 5, 3]);
        $this->pointsShouldBe(0);
        $this->outputShouldBe("no points");
        $this->maxPointShouldBe(0);
        $this->typeShouldBe(Dice::NO_POINTS);
    }
}

