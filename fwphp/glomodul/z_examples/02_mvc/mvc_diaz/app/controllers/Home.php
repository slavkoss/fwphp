<?php


class Home extends Controller{

  public function index($title = ''){

    //fn in module ctr requires once Post.php
    $post = $this->model('Post'); 
    $post->title = '<br />'. __METHOD__ .' assigned t h i s &nbsp;s t r i n g  (named $post->title)' ;

    $data = ['title'=>$post->title] ;
    
    //fn in module ctr
    $this->view('home.php', $data);
  }

  public function register(){
      echo "Hey I'm registering a user";
  }

}
