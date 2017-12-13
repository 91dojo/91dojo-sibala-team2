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
        return $this->isSameState()
            ? $this->getComparer()->compare($this->x, $this->y)
            : $this->compareResultWhenStateIsDifferent();
    }

    /**
     * @return bool
     */
    private function isSameState(): bool
    {
        return $this->x->state === $this->y->state;
    }

    /**
     * @return NoPointsComparer|NormalPointsComparer|SamePointComparer
     */
    private function getComparer()
    {
        if ($this->x->state === Sibala::NO_POINTS) {
            $comparer = new NoPointsComparer();
        } elseif ($this->x->state === Sibala::SAME_POINTS) {
            $comparer = new SamePointComparer();
        } else {
            $comparer = new NormalPointsComparer();
        }
        return $comparer;
    }

    /**
     * @return mixed
     */
    private function compareResultWhenStateIsDifferent()
    {
        return $this->x->state - $this->y->state;
    }
}
