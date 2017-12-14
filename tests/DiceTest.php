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

        $this->uniqueCountShouoldBe(1);
    }

    private function uniqueCountShouoldBe($expected): void
    {
        $act = $this->dice->getUniqueCount();

        $this->assertEquals($expected, $act);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_noPoints()
    {
        $input = [2, 3, 4, 6];
        $this->dice = new Dice($input);

        $this->uniqueCountShouoldBe(4);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_normalPoints_1pair()
    {
        $input = [2, 4, 4, 6];
        $this->dice = new Dice($input);

        $this->uniqueCountShouoldBe(3);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGetUniqueCount_normalPoints_2pair()
    {
        $input = [3, 4, 4, 3];
        $this->dice = new Dice($input);

        $this->uniqueCountShouoldBe(2);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_sameColor()
    {
        $input = [2, 2, 2, 2];
        $this->dice = new Dice($input);

        $this->groupDiceShouldBe([2 => 4]);
    }

    private function groupDiceShouldBe($expected): void
    {
        $act = $this->dice->groupDice();

        $this->assertEquals($expected, $act);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_noPoints()
    {
        $input = [3, 2, 5, 6];
        $this->dice = new Dice($input);

        $this->groupDiceShouldBe([3 => 1, 2 => 1, 5 => 1, 6 => 1]);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_normalPoints_1pair()
    {
        $input = [3, 5, 5, 6];
        $this->dice = new Dice($input);

        $this->groupDiceShouldBe([3 => 1, 5 => 2, 6 => 1]);
    }

    /**
     * @test
     * @group DiceTest
     */
    public function testGroupDiceValueCount_normalPoints_2pair()
    {
        $input = [3, 5, 5, 3];
        $this->dice = new Dice($input);

        $this->groupDiceShouldBe([3 => 2, 5 => 2]);
    }


}
