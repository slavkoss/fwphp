<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iCmdBus.php
namespace Post\App\Cmd\ha_posts_pauptit;

interface iCmdBus
{
    public function execute(iCmd $command);
}