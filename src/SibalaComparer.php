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
        if ($this->x->state !== $this->y->state) {
            return $this->x->state - $this->y->state;
        } else {
            if ($this->x->state === Sibala::NO_POINTS) {
                return 0;
            } elseif ($this->x->state === Sibala::SAME_POINTS) {
                return $this->lut[$this->x->getMaxNumber()] - $this->lut[$this->y->getMaxNumber()];
            } else {
                if ($this->x->points === $this->y->points) {
                    return $this->x->maxNumber - $this->y->maxNumber;
                }
                return $this->x->points - $this->y->points;
            }
        }
    }
}
