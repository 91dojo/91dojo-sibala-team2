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
    public function testGetState()
    {
        $input = [2, 2, 2, 2];
        
        $this->sibala = new Sibala($input);
        
        $act = $this->sibala->getState();
        
        $this->assertEquals($act, Sibala::SAME_POINTS);
        
    }
    
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testGetPointsSamePoints()
    {
        $input = [2, 2, 2, 2];
        
        $this->sibala = new Sibala($input);
        
        $act = $this->sibala->getPoints();
        
        $this->assertEquals($act, 2);
        
    }
    
    /**
     * @test
     * @grpup SibalaTest
     */
    public function testGetPointsNoPoints()
    {
        $input = [2, 1, 3, 4];
        
        $this->sibala = new Sibala($input);
        
        $act = $this->sibala->getPoints();
        
        $this->assertEquals($act, 0);
        
    }
    
    
}
