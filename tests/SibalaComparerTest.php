<?php

namespace Tests;

use JoeyDojo\Sibala;
use JoeyDojo\SibalaComparer;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * @covers \JoeyDojo\SibalaComparer
 */
class SibalaComparerTest extends TestCase
{
    /**
     * @test
     * @testdox 沒點比沒點
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 沒點比沒點()
    {
        $x = new Sibala([2, 1, 3, 4]);
        $y = new Sibala([3, 4, 5, 6]);
        $this->firstOneShouldBeEqualToSecond($x, $y);
    }

    /**
     * @test
     * @testdox 沒點比一色
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 沒點比一色()
    {
        $x = new Sibala([2, 1, 3, 4]);
        $y = new Sibala([2, 2, 2, 2]);

        $this->firstOneShouldBeSmallerThanSecond($x, $y);
    }

    /**
     * @test
     * @testdox 有點比沒點
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比沒點()
    {
        $x = new Sibala([2, 2, 1, 3]);
        $y = new Sibala([1, 2, 3, 4]);
        $this->firstOneShouldBeLargerThanSecond($x, $y);
    }

    /**
     * @test
     * @testdox 一色比一色
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 一色比一色()
    {
        $x = new Sibala([2, 2, 2, 2]);
        $y = new Sibala([4, 4, 4, 4]);
        $this->firstOneShouldBeSmallerThanSecond($x, $y);
    }

    /**
     * @test
     * @testdox 有點比一色
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比一色()
    {
        $x = new Sibala([2, 2, 1, 3]);
        $y = new Sibala([4, 4, 4, 4]);
        $this->firstOneShouldBeSmallerThanSecond($x, $y);
    }

    /**
     * @test
     * @testdox 有點比有點，點數不同
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比有點，點數不同()
    {
        $x = new Sibala([2, 2, 1, 3]);
        $y = new Sibala([5, 5, 3, 4]);
        $this->firstOneShouldBeSmallerThanSecond($x, $y);
    }

    /**
     * @test
     * @testdox 有點比有點，點數相同
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比有點，點數相同()
    {
        $x = new Sibala([2, 2, 1, 4]);
        $y = new Sibala([5, 5, 2, 3]);
        $this->firstOneShouldBeLargerThanSecond($x, $y);
    }

    /**
     * @param $x
     * @param $y
     */
    private function firstOneShouldBeEqualToSecond($x, $y): void
    {
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual === 0));
    }

    /**
     * @param $x
     * @param $y
     */
    private function firstOneShouldBeSmallerThanSecond($x, $y): void
    {
        $target = new SibalaComparer($x, $y);
        $actual = $target->compare();
        $this->assertTrue(($actual < 0));
    }

    /**
     * @param $x
     * @param $y
     */
    private function firstOneShouldBeLargerThanSecond($x, $y): void
    {
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual > 0));
    }
}
