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
    public function testSamePoints()
    {
        $input = [2, 2, 2, 2];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::SAME_POINTS, $this->sibala->getState());
        $this->assertEquals(2, $this->sibala->getPoints());
        $this->assertEquals("Same Color", $this->sibala->output());
        $this->assertEquals(2, $this->sibala->getMaxNumber());
        
    }
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNoPoints()
    {
        $input = [2, 1, 3, 4];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::NO_POINTS, $this->sibala->getState());
        $this->assertEquals(0, $this->sibala->getPoints());
        $this->assertEquals("No Points", $this->sibala->output());
        $this->assertEquals(0, $this->sibala->getMaxNumber());
        
    }
    
}
