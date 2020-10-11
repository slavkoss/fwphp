<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\SynchrCmdBus.php
namespace Post\Infrastr\ha_posts_pauptit;

//use App\Common\Contracts\Command\CommandBusInterface;
//use App\Common\Contracts\Command\CommandHandlerInterface;
//use App\Common\Contracts\Command\CommandInterface;

use Post\App\Cmd\ha_posts_pauptit\iCmdBus ;
use Post\App\Cmd\ha_posts_pauptit\iCmd ;
use Post\App\Cmd\ha_posts_pauptit\iCmdHndl ;

class SynchrCmdBus implements iCmdBus
{
  /** @var CommandHandlerInterface[] */
  private $handlers = [];

  public function execute(iCmd $command)
  {
    $commandName = get_class($command); //class name of given object

    // Check if Command that's given is actually registered to be handled here.
    if (!array_key_exists($commandName, $this->handlers)) {
        throw new Exception("{$commandName} is not supported by the SynchronousCommandBus.");
    }

    return $this->handlers[$commandName]->handle($command);
  }

  // Now all we need is a function to register handlers
  public function register($commandName, iCmdHndl $handler) //$command
  {
    $this->handlers[$commandName] = $handler;
    return $this;
  }
}
