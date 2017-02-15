<?php

namespace BackoffV2\Jitter;

use BackoffV2\Interfaces\JitterStrategyInterface;

abstract class JitterStrategy implements JitterStrategyInterface
{

    protected function random_float($min, $max) {
       return ($min+lcg_value()*(abs($max-$min)));
    }

}
