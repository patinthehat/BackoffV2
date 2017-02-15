<?php

namespace BackoffV2\Backoff;

use BackoffV2\Backoff\BackoffStrategy;

class ConstantBackoff extends BackoffStrategy
{
    public $backoff = 1;

    public function __construct($backoff = 1)
    {
        if (is_numeric($backoff))
            $this->backoff = $backoff;
    }

    public function getBackoff()
    {
        return round($this->backoff, 2);
    }

}
