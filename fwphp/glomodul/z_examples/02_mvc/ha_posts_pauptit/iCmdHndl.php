<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iCmdHndl.php
namespace Post\App\Cmd\ha_posts_pauptit;

interface iCmdHndl
{
    public function handle(iCmd $command);
}