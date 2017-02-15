<?php

namespace BackoffV2\Interfaces;

interface BackoffStrategyInterface
{

    public function getBackoff();

    public function getAttempt();
    public function setAttempt($value);
    public function increaseAttempt();
    public function resetAttempt();

    public function getMaxBackoff();
    public function setMaxBackoff($value);


}
