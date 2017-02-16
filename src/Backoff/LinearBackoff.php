<?php

namespace BackoffV2\Backoff;

use BackoffV2\Backoff\BackoffStrategy;

class LinearBackoff extends BackoffStrategy
{
    protected $step = 1;
    protected $backoff;

    public function __construct($step = 1)
    {
        if (is_numeric($step))
            $this->step = $step;

        $this->backoff = 0.0;
    }

    public function getBackoff()
    {
        $this->backoff = $this->attempt * $this->step;
        return round($this->backoff, 2);
    }

}
