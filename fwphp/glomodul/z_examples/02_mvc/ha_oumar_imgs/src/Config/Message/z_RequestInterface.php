<?php

namespace App\Config\Message;

/**
 * Interface R equestInterface
 */
interface RequestInterface
{
    /**
     * @param string $param
     *
     * @return string
     */
    public function get(string $param): string;
}
