<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ddd_blog_buenosvinos\PostService.php
class PostService
{
  private $postRepository;

  public function __construct(PostRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }

  public function createPost($title, $content)
  {
    $post = Post::writeNewFrom($title, $content);
    $this->postRepository->add($post);
    return $post;
  }
}