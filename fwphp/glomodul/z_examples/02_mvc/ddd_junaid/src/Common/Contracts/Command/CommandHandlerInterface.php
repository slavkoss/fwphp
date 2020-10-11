<?php

namespace App\Common\Contracts\Command;

interface CommandHandlerInterface {
  public function execute( CommandInterface $command );
}