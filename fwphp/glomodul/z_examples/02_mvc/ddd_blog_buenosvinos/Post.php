<?php
class Post
{
  private $title;
  private $content;

  /**
   * self refers to the same class in which the new keyword is actually written.
   * static, in PHP 5.3's late static bindings, refers to whatever class in the hierarchy you called the method on.
   *        static:: will be COMPUTED USING RUNTIME INFO.
   * class Foo { public $name = static::class; }
   * $Foo = new Foo; echo $Foo->name; // Fatal error
   *        Using self::
   * class Foo { public $name = self::class; }
   * $Foo = new Foo; echo $Foo->name; // Foo
  */
  public static function writeNewFrom($title, $content)
  {
    return new static($title, $content);
  }

  private function __construct($title, $content)
  {
    $this->setTitle($title);
    $this->setContent($content);
  }

  private function setTitle($title)
  {
    $this->assertNotEmpty('title', $title);
    $this->title = $title;
  }
  private function setContent($content)
  {
    $this->assertNotEmpty('content', $content);
    $this->content = $content;
  }



  private function assertNotEmpty($n, $v)
  {
    if (empty($v)) {
      throw new InvalidArgumentException("Empty $n");
    }
  }



}