<?php

namespace Tests;

use JoeyDojo\Sibala as SibalaBase;
use JoeyDojo\SibalaComparer;
use PHPUnit\Framework\TestCase;

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
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual == 0));
    }

    /**
     * @test
     * @testdox 有點比一色
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比一色()
    {
        $x = new Sibala([]);
        $y = new Sibala([]);
        $target = new SibalaComparer($x, $y);
        $expected = '';

        $actual = $target->compare();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @tes
     * @testdox 有點比沒點
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比沒點()
    {
        $x = new Sibala([]);
        $y = new Sibala([]);
        $target = new SibalaComparer($x, $y);
        $expected = '';

        $actual = $target->compare();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @tes
     * @testdox 一色比一色
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 一色比一色()
    {
        $x = new Sibala([]);
        $y = new Sibala([]);
        $target = new SibalaComparer($x, $y);
        $expected = '';

        $actual = $target->compare();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @tes
     * @testdox 有點比有點，點數相同
     * @covers \JoeyDojo\SibalaComparer::compare()
     */
    public function 有點比有點，點數相同()
    {
        $x = new Sibala([]);
        $y = new Sibala([]);
        $target = new SibalaComparer($x, $y);
        $expected = '';

        $actual = $target->compare();

        $this->assertEquals($expected, $actual);
    }
}

class Sibala extends SibalaBase
{
    public function getState()
    {
        return 0;
    }
}
