<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\CrePostHndl.php
namespace Post\App\Cmd\ha_posts_pauptit;

use Post\Domain\ha_posts_pauptit\iPostRepo ;
use Post\App\Cmd\ha_posts_pauptit\iCmd ;
use Post\Domain\ha_posts_pauptit\Post ;

class CrePostHndl implements iCmdHndl
{
    private $postRepository;

    // We'll use constructor injection to inject this handlers
    // dependencies. We'll typehint the interface since we do not
    // care where to store it at this point.
    public function __construct(iPostRepo $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    // Since we are not permitted more specific types of the
    // CommandInterface, we'll have to check its type. 
    public function handle(iCmd $command)
    {
        if (!$command instanceof CrePostCmd) {
            throw new Exception("CreatePostHandler can only handle CreatePostCommand");
        }

        $post = new Post;
        $post->id = uniqid();
        $post->title = $command->getTitle();
        $post->contents = $command->getContents();

        $this->postRepository->create($post);
    }
}