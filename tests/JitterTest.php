<?php

use BackoffV2\Jitter\FullJitter;
use BackoffV2\Jitter\EqualJitter;
use BackoffV2\Jitter\DecorrelatedJitter;
use BackoffV2\Jitter\NoJitter;

class JitterTest extends \PHPUnit_Framework_TestCase
{

    public function assertIsBetween($value, $min, $max)
    {
        $isBetween = $value <= $max && $value >= $min;
        $this->assertTrue($isBetween);
    }

    public function testNoJitter()
    {
        $j = new NoJitter;
        $jitter = $j->getJitter(0);
        $this->assertEquals(0, $jitter);
        $jitter = $j->getJitter(1);
        $this->assertEquals(0, $jitter);
        $jitter = $j->getJitter(-1);
        $this->assertEquals(0, $jitter);
    }


    public function testFullJitter()
    {
        $j = new FullJitter;
        $jitter = $j->getJitter(1);
        $this->assertIsBetween($jitter, 0, 1);
        $jitter = $j->getJitter(100);
        $this->assertIsBetween($jitter, 0, 100);
        $jitter = $j->getJitter(0);
        $this->assertEquals(0, $jitter);
    }

    public function testEqualJitter()
    {
        $j = new EqualJitter;
        $jitter = $j->getJitter(1);
        $this->assertIsBetween($jitter, 0, 1);
        $jitter = $j->getJitter(100);
        $this->assertIsBetween($jitter, 0, 100);
        $jitter = $j->getJitter(0);
        $this->assertEquals(0, $jitter);
    }

    public function testDecorrelatedJitter()
    {
        $j = new DecorrelatedJitter;
        $jitter = $j->getJitter(1);
        $this->assertIsBetween($jitter, 0, 1);
        $jitter = $j->getJitter(100);
        $this->assertIsBetween($jitter, 0, 100);
        $jitter = $j->getJitter(0);
        $this->assertEquals(0, $jitter);
    }

}
