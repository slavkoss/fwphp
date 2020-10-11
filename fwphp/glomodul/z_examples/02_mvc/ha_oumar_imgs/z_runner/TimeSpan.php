<?php

//TimeSpan value object
//deals with the logic of being a Thing
class TimeSpan
{
    /** @var \DateTimeImmutable **/
    private $from;

    /** @var \DateTimeImmutable **/
    private $until;

    private function __construct(
       \DateTimeImmutable $from, \DateTimeImmutable $until
    )
    {
        if ( $from >= $until ) {
            throw new \InvalidArgumentException('Invalid time span.');
        }
        $this->from = $from;
        $this->until = $until;
    }

    // Some other useful stuff goes in here...
}