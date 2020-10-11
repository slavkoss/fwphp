<?php

namespace Common;

use Common\Exception\InvalidIdException;

interface IdGen_intf
{
    /**
     * @throws InvalidIdException
     */
    public function generate(): Id;
}
