<?php
namespace map;
use \map\Point;

class Road{
    private $points;

    private function __construct()
    {
        $this->points = [];
    }

    public static function make(){
        return new self();
    }

    public function addPoint(Point $point){
        array_push($this->points, $point);
    }

    public function manhattanDistance() :int
    {
        $result = 0;
        $point = null;
        foreach($this->points as $newPoint){
            if($point != null){
                $result += abs($point->getX() - $newPoint->getX()) + abs($point->getY()  - $newPoint->getY());
            }
            $point = $newPoint;
        }
        return $result;
    }

}

