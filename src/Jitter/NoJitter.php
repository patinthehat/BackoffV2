<?php

namespace BackoffV2\Jitter;

use BackoffV2\Jitter\JitterStrategy;

class NoJitter extends JitterStrategy
{

    public function getJitter($backoffLength)
    {
        return 0.0;
    }

}
