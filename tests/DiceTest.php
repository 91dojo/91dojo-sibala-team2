<?php

namespace Tests;

use JoeyDojo\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    protected $dice;

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_sameColor()
    {
        $input = [2, 2, 2, 2];
        $this->dice = new Dice($input);

        $act = $this->dice->getUniqueCount();

        $this->assertEquals($act, 1);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_noPoint()
    {
        $input = [2, 1, 4, 3];
        $this->dice = new Dice($input);

        $act = $this->dice->getUniqueCount();

        $this->assertEquals($act, 4);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_normalPoints_1pair()
    {
        $input = [2, 2, 4, 3];
        $this->dice = new Dice($input);

        $act = $this->dice->getUniqueCount();

        $this->assertEquals($act, 3);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_normalPoints_2pair()
    {
        $input = [3, 3, 4, 4];
        $this->dice = new Dice($input);

        $act = $this->dice->getUniqueCount();

        $this->assertEquals($act, 2);
    }


    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_sameColor()
    {
        $input = [2, 2, 2, 2];
        $this->dice = new Dice($input);

        $act = $this->dice->groupDice();

        $this->assertEquals([2 => 4], $act);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_noPoint()
    {
        $input = [2, 3, 4, 1];
        $this->dice = new Dice($input);

        $act = $this->dice->groupDice();

        $this->assertEquals([2 => 1, 3 => 1, 4 => 1, 1 => 1], $act);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_normalPoints_1_pair()
    {
        $input = [2, 3, 4, 2];
        $this->dice = new Dice($input);

        $act = $this->dice->groupDice();

        $this->assertEquals([2 => 2, 3 => 1, 4 => 1], $act);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_normalPoints_2_pair()
    {
        $input = [4, 2, 4, 2];
        $this->dice = new Dice($input);

        $act = $this->dice->groupDice();

        $this->assertEquals([2 => 2, 4 => 2], $act);
    }
}
