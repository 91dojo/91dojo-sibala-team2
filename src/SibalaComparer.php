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

    /**
     * @return int|mixed
     */
    public function compare()
    {
        if ($this->sameColor()) {
            return $this->lut[$this->x->getMaxNumber()] - $this->lut[$this->y->getMaxNumber()];
        }

        if ($this->bothHasPoint()) {
            $point = $this->x->getPoints() - $this->y->getPoints();
            if ($point == 0) {
                return ($this->x->getMaxNumber() - $this->y->getMaxNumber());
            } else {
                return $point;
            }
        }

        return $this->x->getState() - $this->y->getState();
    }

    /**
     * @return bool
     */
    private function sameColor() : bool
    {
        return ($this->x->getState() === $this->y->getState() && $this->x->getState() == 2);
    }

    /**
     * @return bool
     */
    private function bothHasPoint() : bool
    {
        return ($this->x->getState() === $this->y->getState() && $this->x->getState() == 1);
    }
}
