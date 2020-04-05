<?php

class Admins
{
  public  $id;
  private $posts = null; // not public !!!
 
  public function __construct($id)
  {
    $this->id = $id;
  }




  public function __get($memberName) // from data source
  {
    // called eg :  $posts = $admin->posts ; //$posts = $admin->get_posts();
    switch ($memberName)
    {
      case 'posts' :
        if ( $this->posts == null ) { $this->posts = $this->load_posts(); } break; //return $this->posts;
      default: 
        echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: ' .'memberName '. $memberName .' does not exist'.'</h3>'; break;
    }

  }

  private function load_posts()
  {
      return [
        new Posts('1', 'post 1'),
        new Posts('2', 'post 2')
      ];
  }

  public function get_post($idx)
  {
    return $this->posts[$idx];    
  } 

  /* public function set_posts()
  {
    if ( $this->posts == null ) {
      $this->posts = $this->load_posts();
    }
    return $this->posts;    
  } */

}