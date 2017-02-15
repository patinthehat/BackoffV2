<?php

namespace BackoffV2\Jitter;

use BackoffV2\Jitter\JitterStrategy;

class DecorrelatedJitter extends JitterStrategy
{

    public function getJitter($backoffLength)
    {
        $jitter = $this->random_float(0.0, $backoffLength * 0.5);
        return round($jitter, 2);
    }

}
