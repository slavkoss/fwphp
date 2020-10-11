<?php
// 2016.07.11
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\index.php  or test.php

namespace Post\ha_posts_pauptit;

use B12phpfw\core\zinc\Autoload ;

use Post\Infrastr\ha_posts_pauptit\SynchrCmdBus ;
use Post\Infrastr\ha_posts_pauptit\PostRepo ;

use Post\App\Cmd\ha_posts_pauptit\CrePostHndl ;
use Post\App\Cmd\ha_posts_pauptit\CrePostCmd ;

$module_towsroot = '../../../../../' ;  //to web server doc root or our doc root by ISP
$app_dir_path = str_replace('\\','/', dirname(__DIR__) ) ; //to app dir eg "glomodul" dir and app

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
  //1.1
  , 'module_towsroot'=>$module_towsroot
  //1.2
  , 'module_version'=>'1.0.0.0 ha post', 'vendor_namesp_prefix'=>'' //B12phpfw
  //1.3 Dirs where are CLASS SCRIPTS TO INCLUDE AUTOMATICALLY (A u t o l o a d)
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=$module_path=thismodule_cls_dir_path
      /////dir of global clses for all sites :
      , str_replace('\\','/', realpath($module_towsroot.'zinc')) .'/'
  ]
] ;

//2. global cls loads classes scripts automatically
require($pp1->module_towsroot.'zinc/Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 



/**
*  1. creating a SynchronousCommandBus
*  2. register our Command and Handler
*  3. try to execute Command
*   
*  It should run and output **"Post with id ### was created."**.

https://barryvanveen.nl/blog/49-what-is-a-command-bus-and-why-should-you-use-it
A command is an object (DTO, Data transfer object) that signals an intent, like RegisterUser.
The command is passed to the command bus.
Command bus will pass command to handler. Command : handler have 1:1 correspondence. 
The handler will perform the required actions, like registering the user.

https://matthiasnoback.nl/2015/01/a-wave-of-command-buses/
The command might be created anywhere and by any client; as long as you hand it over to the command bus, it will be handled properly.
Your controller doesn't contain the actual sign up logic anymore.
*/

//         1. creating a SynchronousCommandBus
//In Infrastr layer we implement iCmdBus, or "port", from Infrastr layer to our App layer.
//For direct feedback (through throwing of exceptions) whether our Command is successful :
$cmdBus = new SynchrCmdBus(); //fns register and execute
    // public function register($commandName, iCmdHndl $handler)
    // public function execute(iCmd $command)

$postRepo = new PostRepo;               //fn cre : $this->posts[] = param. $post;
$cmdHndl  = new CrePostHndl($postRepo); //$this->postRepository = $postRepository;

//         2. register our Command and Handler
$cmdBus->register(CrePostCmd::class, $cmdHndl); //$this->handlers[$commandName] = $handler;

// $this->title = $title; $this->contents = $contents; :
$cmd = new CrePostCmd(
    "This is the post title", 
    "And this is the content"
);

//         3. try to execute Command
try {
  $cmdBus->execute($cmd); // does this :
     //$commandName = get_class($command);
     //return $this->handlers[$commandName]->handle($command);
} catch ( Exception $e ) {
  echo $e->getMessage();
}