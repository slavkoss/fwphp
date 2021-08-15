<?php
//J:\awww\www\fwphp\glomodul\z_examples\php_patterns\Home_ctr.php
//see J:\awww\www\fwphp\glomodul\z_examples\php_patterns\singleton_B12phpfw.php

namespace B12phpfw\module\php_patterns ;

use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\core\zinc\Db_allsites;
//use B12phpfw\core\zinc\Dbconn_allsites;

class Home_ctr extends Config_allsites
{
  public function __construct(object $pp1)
  {
    $pp1_module = [] ;
    if (!defined('QS')) define('QS', '?');  //to avoid web server url rewritting
    parent::__construct($pp1, $pp1_module); //$db = new Config_allsites() ;
  } // e n d  f n  __ c o n s t r u c t

  //           **** D I S P A T C H I N G
          //$accessor = "get" . ucfirst(strtolower($akc));
  protected function callf(string $akc, object $pp1)  //fnname, params
  {
    //this fn calls method $ a k c in Home_ ctr which has parameters in  $ p p 1
    //$ a k c  is  m o d u l e  method (in Home_ ctr, not global method)
    return ( 
      ( //method_exists($this, $akc) and
      is_callable(array($this, $akc)) ) ? $this->$akc($pp1) : '0'
    ) ;
  }

  //public function read_post(object $pp1)
  private function read_post(object $pp1)
  {
    //3. process request from ibrowser & send response to ibrowser :
    //1=autol STEP_2=conf 3=view/rout/disp 4=preCRUD 5=onCRUD
    //STEP_3=rout/disp is in parent::__construct : fw core calls method in Home_ctr cls

    echo '<h3>'.basename(__FILE__) //. __METHOD__ 
       . ', line '. __LINE__ .' SAYS: Before $db = new Home_ctr($pp1) ; '.'</h3>' ;
    echo '$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1';
              // $cursor is: object(PDOStatement)#9 (1) {
              //  ["queryString"]=>
              //  string(37) "SELECT COUNT(*) COUNT_ROWS FROM posts"
              //} 

    //RESULT IS THE SAME CONNECTION FOR BOTH INSTANCES :
    //ee is_null(self::$instance) is printed ONLY ONCE DURING PAGE LIFE - SINGLETON !!! :
        //B12phpfw\core\zinc\Dbconn_allsites::get_or_new_dball ln=32 SAYS:
        //is_null(self::$instance)
    //$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1
    $cursor = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM posts", [], __FILE__ .', ln '. __LINE__ ) ;

    //$db = new Home_ctr($pp1) ; //Home_ ctr "inherits" index.php ee inherits $p p1
    //SELECT * FROM admins ORDER BY username
    $cursor = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM posts", [], __FILE__ .', ln '. __LINE__ ) ;
              //$this::disconnect(); //NOT problem ON LINUX
              //return $cursor ;
    while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile; //c_, R_, U_, D_



    echo '<pre>$cursor = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM posts"...) is: '; var_dump($cursor); echo '</pre>';
    echo '$this->rrnext($cursor))='; print_r($r);

  }


}