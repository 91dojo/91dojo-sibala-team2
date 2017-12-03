<?php

namespace JoeyDojo;

class SibalaComparer
{
    /**
     * @var Sibala
     */
    private $x;

    /**
     * @var Sibala
     */
    private $y;

    /**
     * @var array
     */
    private $lut = [
        1 => 6,
        4 => 5,
        6 => 4,
        5 => 3,
        3 => 2,
        2 => 1,
    ];

    public function __construct(Sibala $x, Sibala $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function compare()
    {
        if ($this->x->getState() === $this->y->getState() && $this->x->getState() == 2) {
            return $this->lut[$this->x->getMaxNumber()] - $this->lut[$this->y->getMaxNumber()];
        }

        if ($this->x->getState() === $this->y->getState() && $this->x->getState() == 1) {
            $point = $this->x->getPoints() - $this->y->getPoints();
            if ($point == 0) {
                return ($this->x->getMaxNumber() - $this->y->getMaxNumber());
            } else {
                return $point;
            }
        }

        return $this->x->getState() - $this->y->getState();
    }
}
