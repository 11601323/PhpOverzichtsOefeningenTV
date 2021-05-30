<?php
namespace map;

use http\Exception\InvalidArgumentException;

class Point{
    private $x;
    private $y;

    private function __construct($x, $y)
    {
        if($x < 0 || $x >= 100){
            throw new InvalidArgumentException('X moet groter of gelijk zijn als 0 en kleiner als 100');
        }
        if($y < 0 || $y >= 100){
            throw new InvalidArgumentException('Y moet groter of gelijk zijn als 0 en kleiner als 100');
        }

        $this->x = $x;
        $this->y = $y;
    }

    public static function make($x, $y){
        return new self($x, $y);
    }


    public function manhattanDistance($point) :int
    {
        return abs($this->x - $point->getX()) + abs($this->y - $point->getY());
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

}

