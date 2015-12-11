<?php

namespace izabolotnev;

/**
 * Class Timer
 *
 */
class Timer
{
    /**
     * @var array
     */
    static protected $times = [
        'h.'  => 3600000,
        'm.'  => 60000,
        's.'  => 1000,
        'ms.' => 1,
    ];

    /**
     * @var array
     */
    static protected $startTimes = [];

    /**
     * Starts the timer.
     */
    public static function start()
    {
        array_push(self::$startTimes, microtime(true));
    }

    /**
     * Stops the timer and returns the elapsed time.
     *
     * @return float
     */
    public static function stop()
    {
        return microtime(true) - array_pop(self::$startTimes);
    }

    /**
     * Formats the elapsed time as a string.
     *
     * @param  float $time
     * @return string
     */
    public static function secondsToTimeString($time)
    {
        $result = [];

        $remainder = round($time * 1000);

        foreach (self::$times as $unit => $value) {
            if ($remainder >= $value) {
                $result[]  = sprintf('%d %s', $remainder / $value, $unit);
                $remainder = $remainder % $value;
            }
        }

        return implode(' ', $result) ?: $remainder . ' ms.';
    }

    /**
     * @return string
     */
    public static function stopAndFormat()
    {
        return self::secondsToTimeString(self::stop());
    }
}
