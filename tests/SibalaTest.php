<?php

namespace Tests;



use PHPUnit\Util\Test;

class SibalaTest extends Test
{
    protected $sibala;
    
    public function testResultSamePoints()
    {
        $input = [2,2,2,2];
        
        $this->sibala = new Sibala($input);
        
        $act = $this->sibala->getState();
        
        $this->assertThat($act, Sibala::SAME_POINTS);
        
    }
}
