<?php

namespace Tests;

use JoeyDojo\Sibala;
use PHPUnit\Framework\TestCase;

class SibalaTest extends TestCase
{
    protected $sibala;

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testSamePoints_2222()
    {
        $input = [2, 2, 2, 2];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::SAME_POINTS);
        $this->pointsShouldBe(2);
        $this->outputShouldBe("Same Color");
        $this->maxNumberShouldBe(2);
    }

    private function stateShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->sibala->getState());
    }

    private function pointsShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->sibala->getPoints());
    }

    private function outputShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->sibala->output());
    }

    private function maxNumberShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->sibala->getMaxNumber());
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNoPoints_2134()
    {
        $input = [2, 1, 3, 4];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::NO_POINTS);
        $this->pointsShouldBe(0);
        $this->outputShouldBe("No Points");
        $this->maxNumberShouldBe(0);
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_3113_2pairs()
    {
        $input = [3, 1, 1, 3];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::N_POINTS);
        $this->pointsShouldBe(6);
        $this->outputShouldBe("6 Points");
        $this->maxNumberShouldBe(3);
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_1213_1pair()
    {
        $input = [1, 2, 1, 3];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::N_POINTS);
        $this->pointsShouldBe(5);
        $this->outputShouldBe("5 Points");
        $this->maxNumberShouldBe(3);
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNoPoints_4442_3dicesSamePoint()
    {
        $input = [4, 4, 4, 2];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::NO_POINTS);
        $this->pointsShouldBe(0);
        $this->outputShouldBe("No Points");
        $this->maxNumberShouldBe(0);
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_4412_1pair_BG()
    {
        $input = [4, 4, 1, 2];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::N_POINTS);
        $this->pointsShouldBe(3);
        $this->outputShouldBe("BG");
        $this->maxNumberShouldBe(2);
    }

    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_4466_1pair_sibala()
    {
        $input = [4, 4, 6, 6];

        $this->sibala = new Sibala($input);

        $this->stateShouldBe(Sibala::N_POINTS);
        $this->pointsShouldBe(12);
        $this->outputShouldBe("Sibala");
        $this->maxNumberShouldBe(6);
    }


}
