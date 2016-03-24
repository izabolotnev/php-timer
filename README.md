[![Build Status](https://travis-ci.org/izabolotnev/php-timer.svg?branch=master)](https://travis-ci.org/izabolotnev/php-timer)

# Timer

Utility class for timing things

## Installation

To add this package as a local, per-project dependency to your project, simply add a dependency on `izabolotnev/php-timer` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on Timer:

    {
        "require": {
            "izabolotnev/php-timer": "~2.1"
        }
    }

## Usage

### Basic Timing

```php
use izabolotnev\Timer;

Timer::start();

// ...

$time = Timer::stop();

print Timer::secondsToTimeString($time);
```

or

```php
use izabolotnev\Timer;

Timer::start();

// ...

print Timer::stopAndFormat();
```
The code above yields the output below:

    0 ms.

### Advanced usage

```php
use izabolotnev\Timer;

Timer::addNewTimer('myTimer');
Timer::start();

sleep(2);

Timer::start('myTimer');
echo 'Default: ', Timer::stopAndFormat(), PHP_EOL;

sleep(3);

echo 'Custom: ', Timer::stopAndFormat('myTimer'), PHP_EOL;
```
The code above yields the output below:

    Default: 2 s.
    Custom: 3 s.

