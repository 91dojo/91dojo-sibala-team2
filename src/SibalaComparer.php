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
            return $this->getComparer()->compare($this->x, $this->y);
        }
    }

    /**
     * @return NoPointsComparer|NormalPointsComparer|SameColorComparer
     */
    private function getComparer()
    {
        $comparerLookup = [
            Sibala::NO_POINTS => new NoPointsComparer(),
            Sibala::SAME_POINTS => new SameColorComparer(),
            Sibala::N_POINTS => new NormalPointsComparer(),
        ];

        return $comparerLookup[$this->x->getState()];
    }


}
