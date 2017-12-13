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
                $comparer = new NoPointsComparer();
                return $comparer->compare($this->x, $this->y);
            } elseif ($this->x->state === Sibala::SAME_POINTS) {
                $comparer = new SamePointComparer();
                return $comparer->compare($this->x, $this->y);
            } else {
                $comparer = new NormalPointsComparer();
                return $comparer->compare($this->x, $this->y);
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
}
