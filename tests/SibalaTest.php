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
    public function testResultSamePoints()
    {
        $input = [2, 2, 2, 2];
        
        $this->sibala = new Sibala($input);
        
        $act = $this->sibala->getState();
        
        $this->assertEquals($act, Sibala::SAME_POINTS);
        
    }
}
