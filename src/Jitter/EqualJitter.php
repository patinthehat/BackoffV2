<?php

namespace BackoffV2\Jitter;

use BackoffV2\Jitter\JitterStrategy;

class EqualJitter extends JitterStrategy
{

    public function getJitter($backoffLength)
    {
        $jitter = $this->random_float(0.0, $backoffLength * 0.2);
        $jitter = ($jitter / 2.0) + $this->random_float(0.0, $jitter / 2.0);
        return round($jitter, 2);
    }

}
