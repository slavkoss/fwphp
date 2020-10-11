<?php

namespace App\Post\Application\Command;



use App\Common\Contracts\Command\CommandHandlerInterface;
use App\Common\Contracts\Command\CommandInterface;
use App\Post\Domain\Post;
use App\Post\Domain\PostRepositoryInterface;

class CreatePostHandler implements CommandHandlerInterface {
  private $postRepository;

  // We'll use App\constructor injection to inject this handlers
  // dependencies. We'll typehint the interface since we do not
  // care where to store it at this point.
  public function __construct( PostRepositoryInterface $postRepository ) {
    $this->postRepository = $postRepository;
  }

  // Since we are not permitted more specific types of the
  // CommandInterface, we'll have to check its type.
  public function handle( CommandInterface $command ) {
    if ( ! $command instanceof CreatePostCommand ) {
      throw new \Exception( "CreatePostHandler can only handle CreatePostCommand" );
    }

    $post           = new Post;
    $post->id       = uniqid();
    $post->title    = $command->getTitle();
    $post->contents = $command->getContents();

    $this->postRepository->create( $post );
  }

  public function execute( CommandInterface $command ) {
    // TODO: Implement execute() method.
  }
}