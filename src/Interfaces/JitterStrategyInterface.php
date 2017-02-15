<?php

namespace BackoffV2\Interfaces;

interface JitterStrategyInterface
{

    public function getJitter($backoffLength);

}
