<?php

use map\Point;
use map\Road;
use PHPUnit\Framework\TestCase;

class RoadTest extends TestCase
{
    public function testManhattanDistance_manhattenDistance_correctOutput(){
        $road = Road::make();
        $point1 = Point::make(1,2);
        $point2 = Point::make(2,3);
        $road->addPoint($point1);
        $road->addPoint($point2);
        $this->assertEquals(2, $road->manhattanDistance());
    }

    public function testOf_make_roadObject(){
        $this->assertInstanceOf(Road::class, Road::make());
    }

}