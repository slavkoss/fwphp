<?php
//2018.05.04
include_once 'vendor/autoload.php';

$commandBus     = new App\Common\Infrastructure\CommandBus\SynchronousCommandBus();
$postRepository = new App\Post\Infrastructure\Persistence\PostRepository();
$commandHandler = new App\Post\Application\Command\CreatePostHandler( $postRepository );
$commandBus->register( App\Post\Application\Command\CreatePostCommand::class, $commandHandler );
$command = new App\Post\Application\Command\CreatePostCommand( 'Title', 'Content' );
try {
  $commandBus->execute( $command );
} catch ( Exception $e ) {
  echo $e->getMessage();
}