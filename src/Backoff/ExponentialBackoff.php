<?php

namespace BackoffV2\Backoff;

use BackoffV2\Backoff\BackoffStrategy;

class ExponentialBackoff extends BackoffStrategy
{
    public $base = 1;

    public function __construct($base = 1)
    {
        if (is_numeric($base))
            $this->base = $base;
    }

    public function getBackoff()
    {
        //sleep = min(cap, base * 2 ** attempt)
        $backoff = min([$this->getMaxBackoff(), ($this->base ^ 2) * (float)$this->getAttempt()]);
        return round($backoff, 2);
    }

}
