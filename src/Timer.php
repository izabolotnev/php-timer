<?php

namespace izabolotnev;

/**
 * Class Timer
 *
 */
class Timer
{
    const DEFAULT_TIMER = 'default';
    
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
    static protected $startTimes = [
        self::DEFAULT_TIMER => [],
    ];

    /**
     * @param string $timerName
     */
    public static function addNewTimer($timerName)
    {
        self::$startTimes[$timerName] = [];
    }

    /**
     * Starts the timer.
     *
     * @param string $timerName
     */
    public static function start($timerName = self::DEFAULT_TIMER)
    {
        array_push(self::$startTimes[$timerName], microtime(true));
    }

    /**
     * Stops the timer and returns the elapsed time.
     *
     * @param string $timerName
     * @return float
     */
    public static function stop($timerName = self::DEFAULT_TIMER)
    {
        return microtime(true) - array_pop(self::$startTimes[$timerName]);
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
     * @param string $timerName
     * @return string
     */
    public static function stopAndFormat($timerName = self::DEFAULT_TIMER)
    {
        return self::secondsToTimeString(self::stop($timerName));
    }
}
