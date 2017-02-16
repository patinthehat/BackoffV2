<?php

use BackoffV2\Backoff;
use BackoffV2\Backoff\ConstantBackoff;
use BackoffV2\Backoff\ExponentialBackoff;
use BackoffV2\Backoff\LinearBackoff;
use BackoffV2\Jitter\NoJitter;


class BackoffTest extends \PHPUnit_Framework_TestCase
{

    public function testExponentialBackoffAttempts()
    {
        $b = new ExponentialBackoff(1);

        $this->assertEquals($b->getAttempt(), 0);

        $b->increaseAttempt();
        $this->assertEquals($b->getAttempt(), 1);

        $b->increaseAttempt();
        $this->assertEquals($b->getAttempt(), 2);
    }

    public function testExponentialBackoff()
    {
        $b = new ExponentialBackoff(1);
        $b->setMaxBackoff(12);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 3);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 6);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 9);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 12);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 12);
    }

    public function testConstantBackoff()
    {
        $b = new ConstantBackoff(2);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 2);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 2);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 2);
    }

    public function testLinearBackoff()
    {
        $b = new LinearBackoff(1);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 1);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 2);
        $b->increaseAttempt();
        $this->assertEquals($b->getBackoff(), 3);
    }


    public function testBackoffMainWithExponentialBackoffAndNoJitter()
    {
        $b = new Backoff(10, new ExponentialBackoff, new NoJitter);
        $this->assertEquals($b->getBackoff(), 3);
        $this->assertEquals($b->getBackoff(), 6);
        $this->assertEquals($b->getBackoff(), 9);
        $this->assertEquals($b->getBackoff(), 10);
        $this->assertEquals($b->getBackoff(), 10);
    }
}
