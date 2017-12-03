<?php

namespace Tests;

use JoeyDojo\Sibala;
use JoeyDojo\SibalaComparer;
use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual === 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual < 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual > 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual < 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual < 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual < 0));
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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual > 0));
    }
}
