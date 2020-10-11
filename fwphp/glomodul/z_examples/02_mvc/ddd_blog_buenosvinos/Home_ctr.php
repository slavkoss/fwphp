<?php
declare(strict_types=1);
namespace B12phpfw\module\ddd_blog_buenosvinos ;

use B12phpfw\core\zinc\Config_allsites ;

//use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId
//use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\ddd_blog_buenosvinos\Tbl_crud         as Tbl_crud_post ;
//use B12phpfw\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;


class Home_ctr extends Config_allsites //implements Interf_Tbl_crud
{
  // NO ATTRIBUTES - attr. are in parent c l a s s (e s).
  // $pp1 is M O D U L E PROPERTIES PALLETE like in Oracle Forms

  // *************** FUNCTION 2. S H A R E S  ***************
  public function __construct(object $pp1)
  {
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting


    $pp1_module = 
    [ 
      'LINK ALIAS => HOME METHOD TO CALL' => '~~~~~in view script eg href = $pp1->login calls QS."i/login/"~~~~~'
    //ALL VIEWS LINKS OF MODULE SHOULD BE HERE (view script knows last part) :
    //$pp1->urlqrystringpart1_name => part1 of urlqrystring (last part is in view script!)
    ,'home_post'        => QS.'i/home/'
    ,'ldd'               => QS.'i/del_row_do/id/' //used for all tables !!

    //,'filter_page'     => 'p/' //QS.'p/'   // i/home_blog/

    //
    // T A B L E S  (M O D E L S)
    ,'posts'           => QS.'i/posts/'
       ,'addnewpost'      => QS.'i/addnewpost/'
       ,'read_post'       => QS.'i/read_post/'
    //
    // V I E W S :
    //,'about_us'        => QS.'i/about/'
    ] ; //e n d  R O U T I N G  T A B L E

    parent::__construct($pp1, $pp1_module);


  } // e n d  f n  __ c o n s t r u c t


          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          // CALLED FROM Config_ allsites __c onstruct
          // so: $this->callf($akc, $pp1) ;
          //******************************************
                //$accessor = "get" . ucfirst(strtolower($akc));
  protected function call_module_method( // also other module method !!
    string $akc, object $pp1)  //fnname, params
  {
    //this fn calls method $ a k c in Home_ ctr which has parameters in  $ p p 1
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

  //used for all  t a b l e s !! 
  private function del_row_do(object $pp1) // *************** SHARED  d d (
  {
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                              if (isset($pp1->uriq) and null !== $pp1->uriq)
                              { echo '<pre>U R L  query array ='.'$pp1->u r i q='; print_r($pp1->uriq) ; echo '</pre>'; } //[i] => del_ row_do [t] => category [id] => 21
                              else { echo ' not set' ; } 
                              exit(0) ;
                              }

        self::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'ERASING IS NOT IN COMPOUND MODULE !'
           ,'INFO '=>'ERASING IS NOT IN COMPOUND MODULE (eg blog) !, but in single modules eg post category'
           //,'After .. '=>'..., ...'
        ] ) ;

  }




  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.

    $title = 'MSG HOME';

    $cursor_post = Tbl_crud_post::rr_all( $sellst='*', $qrywhere="'1'='1'", $binds=[]
      , $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ 
               //, 'category_from_url'=>$category_from_url
        ]
    ) ;

        $Sr = 0;
        while ($r = Tbl_crud_post::rrnext($cursor_post) and isset($r->id)): 
        {
          $Sr++;
          echo $Sr.' ';
                $tmp = self::escp($r->title) ;
                if(strlen($tmp)>20) {$tmp= substr($tmp,0,18).'..';}
              ?><a href="<?=$pp1->read_post?>id/<?=$r->id?>"
                   title="Show post <?=$tmp?>"
                ><span"><?=$tmp?></span
                ></a>
          <br /><?php
        } endwhile; 


  }




  // *************** FUNCTION SIMPLE MODULE TBL3  P O S T S ***************
  private function addnewpost(object $pp1) //private
  {
    //$this->Login_Confirm_SesUsrId();

      $title = 'Add Post' ;
      //require $pp1->wsroot_path . 'zinc/hdr.php';
      //require_once("navbar_admin.php");
      require $pp1->module_path . '../post/cre_post_frm.php';  
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  //        r e a d  p o s t
  private function read_post(object $pp1)
  {
    $IdFromURL = (int)$pp1->uriq->id ;

    $rr = Tbl_crud_post::rr_byid( $IdFromURL, $other=[ 'caller' => __FILE__ .' '.', ln '. __LINE__ ] );
    
    echo '$rr->title='.$rr->title ;
    echo '<pre>'; echo '$rr='; print_r($rr) ; echo '</pre>';

    /*         // or :
    $cursor_posts = Tbl_crud_post::rr($sellst='*', $qrywhere= "id=:IdFromURL"
      , $binds=[
         ['placeh'=>':IdFromURL', 'valph'=>$IdFromURL, 'tip'=>'int']
        ]
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
    ) ;
    
    while ( $rr = Tbl_crud_post::rrnext($cursor_posts) and isset($rr->id) ):
      echo '$rr->title='.$rr->title ;
    } endwhile; 
    
    */
  }



}
