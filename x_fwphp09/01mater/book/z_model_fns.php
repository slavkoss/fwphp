<?php
// J:\awww\www\fwphp\01mater\book\model_fns.php
declare(strict_types=1);
namespace B12phpfw\module\book ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;

switch (true):
case ($model_fns_akc === 'escp_all') :
      //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      /*
      $r->id           = (int)utl::escp($r->id) ;
      $r->author       = (int)utl::escp($r->author) ;
      $r->coverMime    = utl::escp($r->coverMime) ;
      $r->coverimgname = utl::escp($r->coverimgname) ;
      $r->title        = utl::escp($r->title) ;
      $r->isbn         = utl::escp($r->isbn) ;
      $r->publisher    = utl::escp($r->publisher) ;
      $r->year         = utl::escp($r->year) ;
      $r->summary      = utl::escp($r->summary) ;
      $r->copies       = utl::escp($r->copies) ;
      */
            if ('') { 
            echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
            echo '<pre><b>$r</b>='; var_dump($r); echo '</pre>';
            }
    foreach ((array)$r as $name => &$value) {
                    if ('') {  //if ($module_ arr['dbg']) {
                    echo '<pre><b>$name</b>='; print_r($name); //echo '</pre>';
                    echo ' <b>$value</b>='; print_r($value); echo '</pre>';
                    //exit(0);
                    }
      //if (is_int((int)$value)) $value = (int)utl::escp($value) ; else 
      if (gettype($value) == 'boolean') NULL; else 
          $value = utl::escp($value) ;
    } unset($value); // break the reference with the last element

                    if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                    echo '<pre><b>$r</b>='; print_r($r); echo '</pre>';
                    //exit(0);
                    }

  break ;
default: break ;
endswitch ;



  /* static public function get_submitted(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
        utl::escp($_POST["title"]), utl::escp($_POST["author"]), utl::escp($_POST["isbn"])
      , utl::escp($_POST["publisher"]), utl::escp($_POST["year"]), utl::escp($_POST["summary"])
    ] ;
    return $submitted ;
  } */

    // 1. S U B M I T E D  F L D V A L S
    //self::row_ flds_binds() ; // p r e  i n s
                    /* $submitted = self::get_submitted() ;
                    list( $title, $author, $isbn, $publisher, $year, $summary ) = $submitted ;
                    $_SESSION['s ubmitted'] = $submitted ; */



/*
***** Fatal error thrown when read by nonexistent id *****
Uncaught Error: Call to undefined method stdClass::fetch() in J:\awww\www\b12phpfw\Db_allsites.php:200 
Stack trace: 
#0 J:\awww\www\fwphp\01mater\book\home.php(61): 
       B12phpfw\core\b12phpfw\utl_ module::r rnext(Object(stdClass)) 
#1 J:\awww\www\fwphp\01mater\book\Home_ctr.php(103): require('J:\\awww\\www\\fwp...') ee require $pp1->module_path . 'home.php';
#2 J:\awww\www\fwphp\01mater\book\Home_ctr.php(79): B12phpfw\module\book\Home_ctr->home(Object(stdClass)) 
#3 J:\awww\www\b12phpfw\Config_allsites.php(288): B12phpfw\module\book\Home_ctr->call_module_method('home', Object(stdClass)) 
#4 J:\awww\www\fwphp\01mater\book\Home_ctr.php(59): B12phpfw\core\b12phpfw\Config_allsites->__construct(Object(stdClass), Array) 
#5 J:\awww\www\fwphp\01mater\book\index.php(49): B12phpfw\module\book\Home_ctr->__construct(Object(stdClass)) 
#6 {main} 
thrown in J:\awww\www\b12phpfw\Db_allsites.php on line 200
*/


//**1 b i n d s 


    //$col_ names      = self::col_ names() ;
    //$col_ bind_ types = self::col_ bind_ types() ;
    //$flds    = "title, author, isbn, publisher, year, summary" ; //names in data source
    //$v alsins = "VALUES(:title, :author, :isbn, :publisher, :year, :summary)" ;
    /*$binds = [
      ['placeh'=>':title',   'valph'=>$_POST['title'],  'tip'=>'str']
     ,['placeh'=>':author',  'valph'=>$_POST['author'], 'tip'=>'str']
     ,['placeh'=>':isbn',    'valph'=>$_POST['isbn'],   'tip'=>'str']
     ,['placeh'=>':publisher','valph'=>$_POST['publisher'], 'tip'=>'str']
     ,['placeh'=>':year',    'valph'=>$_POST['year'],   'tip'=>'int']
     ,['placeh'=>':summary', 'valph'=>$_POST['summary'],'tip'=>'str']
    ] ; */


