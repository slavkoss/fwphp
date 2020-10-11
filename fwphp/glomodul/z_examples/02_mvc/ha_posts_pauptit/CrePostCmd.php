<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\CrePostCmd.php
namespace Post\App\Cmd\ha_posts_pauptit;

//use App\Common\Contracts\Cmd\Post\iCmd;

class CrePostCmd implements iCmd
{
  private $title;
  private $contents;

  public function __construct($title, $contents)
  {
      $this->title = $title;
      $this->contents = $contents;
  }

  public function getTitle()
  {
      return $this->title;
  }

  public function getContents()
  {
      return $this->contents;
  }
}