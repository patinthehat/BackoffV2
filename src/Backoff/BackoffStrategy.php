<?php

namespace BackoffV2\Backoff;

use BackoffV2\Interfaces\BackoffStrategyInterface;

abstract class BackoffStrategy implements BackoffStrategyInterface
{
    protected $maxBackoff = 1;
    protected $attempt = 0;

    public function resetAttempt()
    {
        $this->attempt = 0;
    }

    public function getMaxBackoff()
    {
        return $this->maxBackoff;
    }

    public function setMaxBackoff($value)
    {
        $this->maxBackoff = (float) $value;
        return $this;
    }

    public function getAttempt()
    {
        return $this->attempt;
    }

    public function setAttempt($value)
    {
        $this->attempt = (int) $value;
        return $this;
    }

    public function increaseAttempt()
    {
        $this->attempt++;
        return $this;
    }
}
