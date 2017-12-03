<?php

namespace Tests;

use PHPUnit\Util\Test;

class DiceTest extends Test
{
    protected $dice;
    
    public function testGetUniqueCount()
    {
        $input = [2,2,2,2];
        $act = $this->dice = new Dice($input);
        
        $this->assertSame($act , 1);
    }
}
