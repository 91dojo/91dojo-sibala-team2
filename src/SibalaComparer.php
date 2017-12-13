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
        if ($this->isSameState()) {
            if ($this->x->state === Sibala::NO_POINTS) {
                return $this->compareResultWhenNoPoints();
            } elseif ($this->x->state === Sibala::SAME_POINTS) {
                return $this->compareResultWhenSamePoints();
            } else {
                return $this->compareResultWhenNormalPoints();
            }
        } else {
            return $this->x->state - $this->y->state;
        }
    }

    /**
     * @return bool
     */
    private function isSameState(): bool
    {
        return $this->x->state === $this->y->state;
    }

    /**
     * @return int
     */
    private function compareResultWhenNoPoints(): int
    {
        return 0;
    }

    private function compareResultWhenSamePoints()
    {
        return $this->lut[$this->x->maxNumber] - $this->lut[$this->y->maxNumber];
    }

    /**
     * @return mixed
     */
    private function compareResultWhenNormalPoints()
    {
        if ($this->x->points === $this->y->points) {
            return $this->x->maxNumber - $this->y->maxNumber;
        }
        return $this->x->points - $this->y->points;
    }
}
