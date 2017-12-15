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
        $this->assertEquals(0, $this->dice->getPoints());
        $this->assertEquals("no points", $this->dice->getOutput());
        $this->assertEquals(0, $this->dice->getMaxPoint());
        $this->assertEquals(Dice::NO_POINTS, $this->dice->getType());
    }
}