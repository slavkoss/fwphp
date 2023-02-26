<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//J:\awww\www\fwphp\glomodul\post_comment\Home_ctr.php
//J:/awww/www/fwphp/glomodul/post_comment/Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
// c a l l e r IS ALLWAYS i n d e x . p h p

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
// *************** FUNCTION 1. N A M E S P A C E S  ***************
namespace B12phpfw\module\post_comment ;

use B12phpfw\core\b12phpfw\Config_allsites     as utl ;
use B12phpfw\dbadapter\post_comment\Tbl_crud  as Tbl_crud_category ;

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
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;

      //$pp1->rblk = 10 ;
      $pp1->Home_ctr_obj = $this ;
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting


    $_SESSION['gourl'] = $pp1->module_url ;

    // =============================================================
    $pp1->pp1_group02r = '~~~~~ ADRESSES : ROUTING TBL ~~~~~' ;
    // =============================================================
    $pp1->sitehome = $pp1->glomodul_url .'/'. $pp1->dir_menu .'/' ;
    //$pp1->login     = $pp1->glomodul_url .'/'. $pp1->dir_user .'/'. QS .'i/login' ;
    //$pp1->logout    = $pp1->glomodul_url .'/'. $pp1->dir_user .'/'. QS .'i/logout' ;
    //
    //$pp1->about_module = $pp1->module_url. QS .'/about_module' ;
    //$pp1->features     = $pp1->module_url.QS .'/features' ;
    //$pp1->contact_us   = $pp1->module_url.QS .'/contact_us' ;
    //
    $pp1->categories   = $pp1->glomodul_url .'/'. $pp1->dir_categories ;


    //instatiate Config_ allsites = parent of this Home_ctr cls
    parent::__construct($pp1); 


  } // e n d  f n  __ c o n s t r u c t



  protected function del_category(object $pp1)
  {
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    $tbl = $pp1->urlqry_parts[3] = 'category' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_category::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->categories) ;

  }



  protected function errmsg(object $pp1, string $myerrmsg)
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

  protected function home(object $pp1) //DI page prop.palette   
  {
    // Ver. 7 : $pp1 is Injected Dependency 
    //utl::Login_Confirm_SesUsrId();

    $title = 'MSG Comments';
    require $pp1->shares_path . '/hdr.php';
    //Home_view::navbar_top($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]); 

    //if(!empty($_SESSION['username'])){
    if(utl::Login_Confirm_SesUsrId()){
      require $pp1->module_path . '/../post_comment/comments.php';  
      //Home_view::displ_tbl($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    } else{
      utl::Redirect_to($pp1->login) ;
    }

   require $pp1->shares_path . '/ftr.php';


  }



  protected function categories(object $pp1) //protected
  {
     utl::Login_Confirm_SesUsrId();
     require $pp1->module_path . '/../post_comment/categories.php';  
  }




} // e n d  c l s  C onfig_ m ini3
