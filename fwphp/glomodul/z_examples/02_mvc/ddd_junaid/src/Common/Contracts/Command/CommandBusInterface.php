<?php

namespace App\Common\Contracts\Command;

interface CommandBusInterface {
  public function execute( CommandInterface $command );
}