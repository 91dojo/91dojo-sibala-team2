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

    public function compare()
    {
        if ($this->x->getState() !== $this->y->getState()) {
            return $this->x->state - $this->y->state;
        } else {

            if ($this->x->getState() === Sibala::NO_POINTS) {
                $comparer = new NoPointsComparer();
                return $comparer->compare($this->x, $this->y);
            } elseif ($this->x->getState() === Sibala::SAME_POINTS) {
                $comparer = new SameColorComparer();
                return $comparer->compare($this->x, $this->y);
            }
            $comparer = new NormalPointsComparer();
            return $comparer->compare($this->x, $this->y);
        }
    }


}
