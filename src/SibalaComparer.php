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
        return $this->isSameState()
            ? $this->getComparer()->compare($this->x, $this->y)
            : $this->compareResultWhenStateIsDifferent();
    }

    private function isSameState(): bool
    {
        return $this->x->state === $this->y->state;
    }

    /**
     * @return NoPointsComparer|NormalPointsComparer|SamePointComparer
     */
    private function getComparer()
    {
        $comparerLookup = [
            Sibala::NO_POINTS => new NoPointsComparer(),
            Sibala::N_POINTS => new NormalPointsComparer(),
            Sibala::SAME_POINTS => new SamePointComparer(),
        ];

        return $comparerLookup[$this->x->state];
    }

    private function compareResultWhenStateIsDifferent()
    {
        return $this->x->state - $this->y->state;
    }
}
