<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//J:\awww\www\fwphp\glomodul\post_category\Home_ctr.php
//J:/awww/www/fwphp/glomodul/post_category/Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
// c a l l e r IS ALLWAYS i n d e x . p h p

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
// *************** FUNCTION 1. N A M E S P A C E S  ***************
namespace B12phpfw\module\post_category ;

use B12phpfw\core\b12phpfw\Config_allsites     as utl ;
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;

//"Home_ ctr is addition to Config_ allsites" - technicaly could be in Config_ allsites (is not for sake of code reusability and clear code)
// May be named App, Router_dispatcher... :
class Home_ctr extends utl //i mplements Db_allsites_Intf
{
  // NO ATTRIBUTES - attr. are in parent c l a s s (e s).
  // $pp1 is M O D U L E PROPERTIES PALLETE like in Oracle Forms

    //Db_allsites_ORA or Db_allsites for MySql or ... :
    //static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER
    
  // *************** FUNCTION 2. S H A R E S  ***************
  public function __construct(object $pp1)
  {

      $pp1->rblk = 10 ;
      $pp1->Home_ctr_obj = $this ;
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    /**
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  ------------------------------------------------------------------------------
    */
    $pp1_module = [ 'MODULE' => 
                     '<b style="color: blue">Module (folder) "post_category"~~~~~</b> '
    ,'sitehome'         => QS.'i/sitehome/' //$pp1->s itehome
    //
    ,'ldd_category'     => QS.'i/del_category/id/'
    //
    // T A B L E S  (M O D E L S)
    ,'home'        => QS.'i/home/'
    ,'categories'  => QS.'i/categories/'
    ,'posts'       => QS.'i/posts/' // - dashboard
    //e n d  R O U T I N G  T A B L E
        ] ;

    //instatiate Config_ allsites = parent of this Home_ctr cls
    parent::__construct($pp1, $pp1_module); 


  } // e n d  f n  __ c o n s t r u c t


           /** 
          ****************************************
          *       DISPATCH  M E T H O D S
          * they call other methods or include script
          * *****************************************
          */
                //$accessor = "get" . ucfirst(strtolower($akc));
  protected function call_module_method( // also other module method !!
    string $akc, object $pp1)  //fnname, params
  {
          // CALLED FROM Config_ allsites __c onstruct
          // so: $this->call_module_method($akc, $pp1) ; 
    //this fn calls method $ a k c in zhis Home_ ctr which has parameters in  $ p p 1
    //$ a k c  is  m o d u l e  method (in Home_ ctr, not global method)
    if ( is_callable(array($this, $akc)) ) { // and method_exists($this, $akc)
      return $this->$akc($pp1) ;
    } else {
      echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
      echo 'Home_ ctr method "<b>'. $akc .'</b>" is not callable.' ;
      echo ' See how is created method name in Config_ allsites code snippet c s 0 2. R O U T I N G."' ;
      return '0' ;
    }

  }



  private function del_category(object $pp1)
  {
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    $tbl = $pp1->urlqry_parts[3] = 'category' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_category::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->categories) ;

  }



  private function errmsg(object $pp1, string $myerrmsg)
  {
      // h d r  is  in  p a g e  which  i n c l u d e s  t h i s  p a g e
      $title = 'MSG ERRPAGE';
      require $pp1->shares_path . '/error.php';
      require $pp1->shares_path . '/ftr.php';
  }




  public function sitehome(object $pp1)
  {
    //As of PHP5, object variable doesn't contain object itself as value. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a COPY OF THE IDENTIFIER, which points to same object.
    $this->Redirect_to('/'); // utl::Redirect_to($pp1->c omments);
  }

  private function home(object $pp1) //DI page prop.palette   
  {
     //Home_view::show($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
     utl::Login_Confirm_SesUsrId();
     require $pp1->module_path . '/../post_category/categories.php';  
  }



  private function categories(object $pp1) //private
  {
     utl::Login_Confirm_SesUsrId();
     require $pp1->module_path . '/../post_category/categories.php';  
  }




} // e n d  c l s  C onfig_ m ini3
