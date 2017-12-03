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
    public function testGetUniqueCount()
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
    public function testGroupDiceValueCount()
    {
        $input = [2, 2, 2, 2];
        $this->dice = new Dice($input);
        
        $act = $this->dice->groupDice();
        
        $this->assertEquals([2 => 4], $act);
    }
}
