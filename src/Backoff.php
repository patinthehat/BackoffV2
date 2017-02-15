<?php

namespace BackoffV2;

use BackoffV2\Interfaces\BackoffStrategyInterface;
use BackoffV2\Interfaces\JitterStrategyInterface;

class Backoff
{
    protected $attempt = 0;

    protected $maxBackoff;
    protected $backoff;
    protected $jitter;

    public function __construct($maxBackoff, BackoffStrategyInterface $backoff, JitterStrategyInterface $jitter)
    {
        $this->maxBackoff = $maxBackoff;
        $this->backoff = $backoff;
        $this->jitter = $jitter;
        $this->backoff->setMaxBackoff($maxBackoff);
        $this->reset();
    }

    public function getBackoff()
    {
        $this->attempt++;
        $this->backoff->setAttempt($this->attempt);
        $backoff = $this->backoff->getBackoff();
        $jitter = $this->jitter->getJitter($backoff);
        return round($backoff + $jitter, 2);
    }

    public function reset()
    {
        $this->attempt = 0;
        return $this;
    }

    public function getAttempt()
    {
        return $this->attempt;
    }

}
