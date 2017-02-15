<?php

namespace BackoffV2\Jitter;

use BackoffV2\Jitter\JitterStrategy;

class FullJitter extends JitterStrategy
{

    public function getJitter($backoffLength)
    {
        //sleep = random_between(0, min(cap, base * 2 ** attempt))
        $jitter = $this->random_float(0.0, $backoffLength * 0.2);
        return round((float)$jitter, 2);
    }
}
