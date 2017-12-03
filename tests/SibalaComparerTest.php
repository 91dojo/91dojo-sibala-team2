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
        $x = Mockery::mock(Sibala::class, [2, 1, 3, 4]);
        $y = Mockery::mock(Sibala::class, [3, 4, 5, 6]);
        $x->shouldReceive('getState')->once()->andReturn(0);
        $y->shouldReceive('getState')->once()->andReturn(0);
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
        $x = Mockery::mock(Sibala::class, [2, 1, 3, 4]);
        $y = Mockery::mock(Sibala::class, [2, 2, 2, 2]);
        $x->shouldReceive('getState')->once()->andReturn(0);
        $y->shouldReceive('getState')->once()->andReturn(2);
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
        $x = Mockery::mock(Sibala::class, [2, 2, 1, 3]);
        $y = Mockery::mock(Sibala::class, [1, 2, 3, 4]);
        $x->shouldReceive('getState')->once()->andReturn(1);
        $y->shouldReceive('getState')->once()->andReturn(0);
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
        $x = Mockery::mock(Sibala::class, [2, 2, 2, 2]);
        $y = Mockery::mock(Sibala::class, [4, 4, 4, 4]);
        $x->shouldReceive('getState')->once()->andReturn(2);
        $y->shouldReceive('getState')->once()->andReturn(2);
        $x->shouldReceive('getMaxNumber')->once()->andReturn(2);
        $y->shouldReceive('getMaxNumber')->once()->andReturn(4);
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
        $x = Mockery::mock(Sibala::class, [2, 2, 1, 3]);
        $y = Mockery::mock(Sibala::class, [4, 4, 4, 4]);
        $x->shouldReceive('getState')->once()->andReturn(1);
        $y->shouldReceive('getState')->once()->andReturn(2);
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
        $x = Mockery::mock(Sibala::class, [2, 2, 1, 3]);
        $y = Mockery::mock(Sibala::class, [5, 5, 3, 4]);
        $x->shouldReceive('getState')->once()->andReturn(1);
        $y->shouldReceive('getState')->once()->andReturn(1);
        $x->shouldReceive('getPoints')->once()->andReturn(4);
        $y->shouldReceive('getPoints')->once()->andReturn(7);
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
        $x = Mockery::mock(Sibala::class, [2, 2, 1, 4]);
        $y = Mockery::mock(Sibala::class, [5, 5, 2, 3]);
        $x->shouldReceive('getState')->once()->andReturn(1);
        $y->shouldReceive('getState')->once()->andReturn(1);
        $x->shouldReceive('getPoints')->once()->andReturn(5);
        $y->shouldReceive('getPoints')->once()->andReturn(5);
        $x->shouldReceive('getMaxNumber')->once()->andReturn(4);
        $y->shouldReceive('getMaxNumber')->once()->andReturn(3);
        $target = new SibalaComparer($x, $y);

        $actual = $target->compare();

        $this->assertTrue(($actual > 0));
    }
}
