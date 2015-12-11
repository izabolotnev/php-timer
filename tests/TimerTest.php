<?php
/*
 * This file is part of the Timer package.
 */

use izabolotnev\Timer;

/**
 * Tests for Timer.
 */
class TimerTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Timer::start
     * @covers Timer::stop
     */
    public function testStartStop()
    {
        $this->assertInternalType('float', Timer::stop());
    }

    /**
     * @covers       Timer::secondsToTimeString
     * @dataProvider secondsProvider
     *
     * @param string $string
     * @param float  $seconds
     */
    public function testSecondsToTimeString($string, $seconds)
    {
        $this->assertEquals(
            $string,
            Timer::secondsToTimeString($seconds)
        );
    }

    public function secondsProvider()
    {
        return [
            ['0 ms.', 0],
            ['1 ms.', .001],
            ['10 ms.', .01],
            ['100 ms.', .1],
            ['999 ms.', .999],
            ['1 s.', .9999],
            ['1 s.', 1],
            ['2 s.', 2],
            ['59 s. 900 ms.', 59.9],
            ['59 s. 990 ms.', 59.99],
            ['59 s. 999 ms.', 59.999],
            ['1 m.', 59.9999],
            ['59 s. 1 ms.', 59.001],
            ['59 s. 10 ms.', 59.01],
            ['1 m.', 60],
            ['1 m. 1 s.', 61],
            ['2 m.', 120],
            ['2 m. 1 s.', 121],
            ['59 m. 59 s. 900 ms.', 3599.9],
            ['59 m. 59 s. 990 ms.', 3599.99],
            ['59 m. 59 s. 999 ms.', 3599.999],
            ['1 h.', 3599.9999],
            ['59 m. 59 s. 1 ms.', 3599.001],
            ['59 m. 59 s. 10 ms.', 3599.01],
            ['1 h.', 3600],
            ['1 h. 1 s.', 3601],
            ['1 h. 1 s. 900 ms.', 3601.9],
            ['1 h. 1 s. 990 ms.', 3601.99],
            ['1 h. 1 s. 999 ms.', 3601.999],
            ['1 h. 2 s.', 3601.9999],
            ['1 h. 1 m.', 3659.9999],
            ['1 h. 59 s. 1 ms.', 3659.001],
            ['1 h. 59 s. 10 ms.', 3659.01],
            ['2 h.', 7199.9999],
        ];
    }
}
