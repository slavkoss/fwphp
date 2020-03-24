<?php

// deals with the logic of creating a thing
class TimeSpanFactory 
{
    /** @var TimeSpanConfiguration **/
    private $maxTimeSpan;

    public function __construct(TimeSpanConfiguration $timeSpanConfiguration) 
    {
        // For the sake of simplicity we just give the factory the configuration directly.
        $this->timeSpanConfiguration = $timeSpanConfiguration;
    }

    public function createTimeSpan(\DateTimeImmutable $from, \DateTimeImmutable $until): TimeSpan
    {
        // We just ask the configuration if the given from-until time span is valid.
        // That way we don't need any getters on the configuration. Neat.
        if ( !$this->timeSpanConfiguration->isValidTimeSpanFromUntil($form, $until) ) {
            throw new \DomainException('This time span is too long!');
        }

        return $this->constructTimeSpan($from, $until);
    }

    private function constructTimeSpan(\DateTimeImmutable $from, \DateTimeImmutable $until): TimeSpan
    {
        $class = new ReflectionClass(TimeSpan::class);
        $constructor = $class->getConstructor();
        $constructor->setAccessible(true);
        $timeSpan = $class->newInstanceWithoutConstructor();
        $constructor->invoke($timeSpan, $from, $until);

        return $timeSpan;
    }

}

// Usage:
$factory = new TimeSpanFactory(new TimeSpanConfiguration(new \DateInterval('PT2D')));

$timeSpan = $factory->constructTimeSpan(
  new \DateTimeImmutable('2019-02-17 17:00:00'), new \DateTimeImmutable('2019-02-17 18:00:00'));

// Fails due too to long time span
$timeSpan = $factory->constructTimeSpan(
  new \DateTimeImmutable('2019-02-17 17:00:00'), new \DateTimeImmutable('2019-02-17 23:00:00'));

// Also failes, but due to private constructor ;)
$timeSpan = new TimeSpan(
   new \DateTimeImmutable('2019-02-17 17:00:00'), new \DateTimeImmutable('2019-02-17 23:00:00'));

