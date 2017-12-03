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
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints()
    {
        $input = [1, 2, 1, 2];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::N_POINTS, $this->sibala->getState());
        $this->assertEquals(4, $this->sibala->getPoints());
        $this->assertEquals("4 Points", $this->sibala->output());
        $this->assertEquals(2, $this->sibala->getMaxNumber());
        
    }
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_test_1_2_1_3_group()
    {
        $input = [1, 2, 1, 3];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::N_POINTS, $this->sibala->getState());
        $this->assertEquals(5, $this->sibala->getPoints());
        $this->assertEquals("5 Points", $this->sibala->output());
        $this->assertEquals(3, $this->sibala->getMaxNumber());
        
    }
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_test_4_4_4_2_group()
    {
        $input = [4, 4, 4, 2];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::N_POINTS, $this->sibala->getState());
        $this->assertEquals(6, $this->sibala->getPoints());
        $this->assertEquals("6 Points", $this->sibala->output());
        $this->assertEquals(4, $this->sibala->getMaxNumber());
        
    }
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testNPoints_test_4_4_1_2_group()
    {
        $input = [4, 4, 1, 2];
        
        $this->sibala = new Sibala($input);
        
        $this->assertEquals(Sibala::N_POINTS, $this->sibala->getState());
        $this->assertEquals(3, $this->sibala->getPoints());
        $this->assertEquals("BG", $this->sibala->output());
        $this->assertEquals(2, $this->sibala->getMaxNumber());
        
    }
    
    
}
