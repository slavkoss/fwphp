<?php
/**
 * Created by PhpStorm.  * User: jq * Date: 5/4/18 * Time: 4:14 PM
 */

namespace App\Common\Infrastructure\CommandBus;


use App\Common\Contracts\Command\CommandBusInterface;
use App\Common\Contracts\Command\CommandHandlerInterface;
use App\Common\Contracts\Command\CommandInterface;

class SynchronousCommandBus implements CommandBusInterface {

  private $handlers = [];

  public function execute( CommandInterface $command ) {
    $commandName = get_class( $command );
    if ( ! array_key_exists( $commandName, $this->handlers ) ) {
      throw new \Exception( "{$commandName} is not supported by SynchronousCommandBus" );
    }

    return $this->handlers[ $commandName ]->handle( $command );
  }

  public function register( $commandName, CommandHandlerInterface $commandHandler ) {
    $this->handlers[ $commandName ] = $commandHandler;

    return $this;
  }

}