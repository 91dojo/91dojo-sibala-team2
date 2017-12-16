<?php
/**
 * Created by PhpStorm.
 * User: JoeyChen
 * Date: 2017/12/17
 * Time: 上午 12:30
 */

namespace Tests;

use JoeyDojo\Dice;
use JoeyDojo\DiceComparer;
use PHPUnit\Framework\TestCase;

class DiceComparerTest extends TestCase
{
    public function test_noPoints_is_equal_to_noPoints()
    {
        $x = new Dice([3, 4, 6, 5]);
        $y = new Dice([4, 3, 4, 4]);

        $this->firstShouldBeEqualToSecond($x, $y);
    }

    /**
     * @param $x
     * @param $y
     */
    private function firstShouldBeEqualToSecond($x, $y): void
    {
        $this::assertEquals(0, (new DiceComparer())->compare($x, $y));
    }
}