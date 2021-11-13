<?php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
// J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
// c a l l e r IS ALLWAYS i n d e x . p h p

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
// *************** FUNCTION 1. N A M E S P A C E S  ***************
namespace B12phpfw\module\blog ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;;
//use B12phpfw\core\b12phpfw\Db_allsites as utldb ;
//use B12phpfw\core\b12phpfw\Interf_Tbl_crud ;
use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\post\Tbl_crud           as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud   as Tbl_crud_post_comment ;

use B12phpfw\module\blog\Home as Home_view;
use B12phpfw\module\blog\Dashboard as Dashboard_view;
//use PDO;

//extends  = ISA relation type ("Is A something") = not "Home_ ctr is contained in Config_ allsites" but :
//"Home_ ctr is addition to Config_ allsites" - technicaly could be in Config_ allsites (is not for sake of code reusability and clear code)
// May be named App, Router_dispatcher... :
class Home_ctr extends utl //implements Interf_Tbl_crud
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

    /**
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  ------------------------------------------------------------------------------
    */
    $pp1_module = [ 
      'LINK ALIAS => HOME METHOD TO CALL' => '~~~~~in view script eg href = $pp1->login calls QS."i/login/"~~~~~'
      // LINKALIAS          URLurlqrystring                CALLED METHOD
      // IN VIEW SCRIPT     IN Home_ ctr                   IN Home_ ctr
      //, 'ldd_category'    => QS.'i/del_category/id/'     del_category, l in ldd means link
      //      (method parameter /idvalue we assign in view script after ldd_category)
    ,'home_blog'        => QS.'i/home/'
    ,'ldd_category'     => QS.'i/del_category/id/'
    ,'ldd_admins'       => QS.'i/del_admins/id/'
    ,'ldd_posts'        => QS.'i/del_posts/id/'
    ,'ldd_comments'     => QS.'i/del_comments/id/'
                //utl::Redirect_to(QS.str_replace('|','/',$db->uriq->r)) ;
         //,'del_row'         => QS.'i/del_ row_do/id/' //used for all tables !!
    ,'filter_page'     => 'p/' //QS.'p/'   // i/home_blog/

    //
    // T A B L E S  (M O D E L S)
    ,'dashboard'       => QS.'i/dashboard/'
    //
    ,'home_usr'        => QS.'i/admins/'
    ,'admins'          => QS.'i/admins/'
    //
    ,'loginfrm'        => QS.'i/loginfrm/'
    ,'login'           => QS.'i/login/'
    ,'logout'          => QS.'i/logout/r/i|loginfrm|'
    //
       ,'read_user'       => QS.'i/read_user/id/'
       // admin_profile :
       //,'upd_user_loggedin' => QS.'i/upd_user_loggedin/id/'
       ,'upd_user_loggedin'   => QS.'i/upd_user_loggedin/r/i|upd_user_loggedin|id|' //eg id=30
       //'ed_usr' => QS.'i/ed_ usr/id/', //$pp1->ed_ usr.$id in view script

    ,'categories'      => QS.'i/categories/'

    ,'posts'           => QS.'i/posts/'
       //in view h ome.php after c/ we add categ. name so :
       //<a href="<=filter_ postcateg><=h escp($r->c ategory)>">
       // filter_ postcateg is  m ethod  name in this  c lass
       ,'filter_postcateg' => QS.'i/filter_postcateg/c/'
       ,'addnewpost'      => QS.'i/addnewpost/'
       ,'read_post'       => QS.'i/read_post/'
       ,'editpost'        => QS.'i/editpost/'
       ,'edmkdpost'       => QS.'i/edmkdpost/'
       ,'readmkdpost'     => QS.'i/readmkdpost/'

    ,'comments'        => QS.'i/comments/'
       ,'upd_comment_stat' => QS.'i/upd_comment_stat/' //approvecomments
    //
    // V I E W S :
    ,'kalendar'        => QS.'i/kalendar/'
    ,'about_us'        => QS.'i/about/'
    ,'contact_us'      => QS.'i/contact/'
    ,'features'        => QS.'i/features/'
    //e n d  R O U T I N G  T A B L E
        ] ;

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



  private function del_category(object $pp1)
  {
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'category' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_category::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->categories) ;

  }

  private function del_admins(object $pp1)
  {
    // D e l  &  R e d i r e c t = r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'admins' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_admin::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->admins) ;

  }

  private function del_posts(object $pp1)
  {
    // D e l  &  R e d i r e c t = r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'posts' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_post::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->posts) ;

  }

  private function del_comments(object $pp1)
  {
    // D e l  &  R e d i r e c t = r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'comments' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    Tbl_crud_post_comment::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->comments) ; 

  }



  private function errmsg(object $pp1, string $myerrmsg)
  {
      // h d r  is  in  p a g e  which  i n c l u d e s  t h i s  p a g e
      $title = 'MSG ERRPAGE';
      require $pp1->shares_path . 'error.php';
      require $pp1->shares_path . 'ftr.php';
  }




  /**
  * *************** FUNCTION 3.  S E S S I O N  M E T H O D S ***************
  */

  private function Login_Confirm_SesUsrId() {
    Tbl_crud_admin::Login_Confirm_SesUsrId();
  }

  private function logout(object $pp1)
  {
    //$dm = $this = domain model = globals for all sites
    $Db_user = Tbl_crud_admin::logout($pp1) ;
  }

  //e n d  1. S E S S  I O N  M E T H O D S


  /**
  * *************** FUNCTION 4. C R U D  M E T H O D S ***************
  */

  /**
      2.1 I N C L U D E D  P A G E  S C R I P T S
  */

  // *************** FUNCTION COMPAUND MODULE BLOG ***************
  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a COPY OF THE IDENTIFIER, which points to same object.

    $pp1->rblk = 25;
    //$ c ss1 = $shares_url .'themes/bootstrap/styles_blog.css'
    //$css2 = $pp1->shares_url . 'exp_collapse.css';

    $title = 'MSG HOME';
    require $pp1->shares_path . 'hdr.php';

      require("navbar.php");
      Home_view::show($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
      //require $pp1->module_path . 'home.php';
      //utl::Redirect_to($pp1->comments);

    require $pp1->shares_path . 'ftr.php';
  }


  private function dashboard(object $pp1) //private
  {
    $this->Login_Confirm_SesUsrId();

    $title = 'MSG Dashboard';
    require $pp1->shares_path . 'hdr.php';
      require_once("navbar_admin.php");
      Dashboard_view::show($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
      //require $pp1->module_path . 'dashboard.php';  
    require $pp1->shares_path . 'ftr.php';
  }




  private function kalendar(object $pp1) //private
  {
    require $pp1->shares_path . 'hdr.php';
    //require $pp1->module_path . '../post/read_msg_tbl_kalendar_flex.php';
    require $pp1->app_dir_path .'post/read_msg_tbl_kalendar_flex.php';
    require $pp1->shares_path . 'ftr.php';
  }





  // *************** FUNCTION 5. I N C L U D E  P A G E S  WITHOUT  C R U D ***************

  private function contact(object $pp1)
  {
      require $pp1->shares_path . 'hdr.php';
      require $pp1->module_path . 'v_contact_us.php';
      require $pp1->shares_path . 'ftr.php';
  }

  private function about(object $pp1)
  {
    //$param1 = ... ;
    require $pp1->shares_path . 'hdr.php';
    require $pp1->module_path . 'v_about_us.php';
    require $pp1->shares_path . 'ftr.php';
  }

  private function features(object $pp1)
  {
    require $pp1->shares_path . 'hdr.php';
    require $pp1->module_path . 'v_features.php';
    require $pp1->shares_path . 'ftr.php';
  }



  // *************** FUNCTION SIMPLE MODULE TBL1  A D M I N S ***************

  // U S E R  R E A D

  //        u s e r s  r e a d
  private function admins(object $pp1) //private
  {
    $this->Login_Confirm_SesUsrId();
    $title = 'Admin Page' ;
    // http skip is ok for other module :
    ?><!--script type="text/javascript">window.open('<=dirname($pp1->module_url) .'/user'?>');</script--><?php
            //utl::Redirect_to( dirname($pp1->module_url) .'/user' );
                  //Warning: Cannot modify header information :
                  //require $pp1->shares_path . 'hdr.php';
                  //require_once("navbar_admin.php");
    require $pp1->module_path . '../user/admins.php';
    require $pp1->shares_path . 'ftr.php';
  }

  //  user profile
  private function read_user(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    $usrname_requested = 'xxxxxxxx' ; //$uriq->username ;

    //require $pp1->wsroot_path .'vendor/erusev/parsedown/Parsedown.php' ;
    //$Parsedown = new \Parsedown();

    $title = 'Profile' ;
    //$css1 = 'styles.css' ;

    require $pp1->shares_path . 'hdr.php';
    require_once("navbar.php");
    require dirname($pp1->module_path) . '/user/read.php'; //was read_user.php
    require $pp1->shares_path . 'ftr.php';
  }


  private function loginfrm(object $pp1) //private
  {
    //called from link, Config_ allsites based on url (calling link) calls  f n  l o g i n
    //$p p1  = $t his->g etp('p p1') ;
                if ('') {self::jsmsg( [ //b asename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
      require $pp1->shares_path . 'hdr.php';
      require $pp1->module_path . '../user/login_frm.php';  
      require $pp1->shares_path . 'ftr.php';
  }

  private function login(object $pp1) {
    Tbl_crud_admin::login($pp1, $pp1->dashboard) ;
  }


  private function upd_user_loggedin(object $pp1) //private
  {
    //     A D M I N  P R O F I L E  navbar admin -> My Profile
      //$dm = $this ;            //globals for all sites (eg for CRUD...) !!
      $this->Login_Confirm_SesUsrId();

      //in view script $AdminId = $_SESSION["userid"];

      $title = 'MSG u s r u p d ';

      require $pp1->module_path . '../user/upd_user_loggedin_frm.php';  
      //require $pp1->shares_path . 'ftr.php';
  }




  // *************** FUNCTION SIMPLE MODULE TBL2  C A T E G O R Y ***************
  //        c a t e g o r i e s  t b l
  private function categories(object $pp1) //private
  {

    //$dm = $this ; //globals for all sites (eg for CRUD...) !!
    $this->Login_Confirm_SesUsrId(); //$dm

    $title = 'MSG Categories' ;
    require $pp1->shares_path . 'hdr.php';
    require_once("navbar_admin.php");
    require $pp1->module_path . '../post_category/categories.php';  
    require $pp1->shares_path . 'ftr.php';
  }




  // *************** FUNCTION SIMPLE MODULE TBL3  P O S T S ***************
  private function addnewpost(object $pp1) //private
  {

    // http://dev1:8083/fwphp/glomodul/blog/?i/addnewpost/
    //$dm = $this ;            //globals for all sites (eg for CRUD...) !!
    $this->Login_Confirm_SesUsrId();

      $title = 'Add Post' ;
      //require $pp1->shares_path . 'hdr.php';
      //require_once("navbar_admin.php");
      require $pp1->module_path . '../post/cre_post_frm.php';  
      //require $pp1->shares_path . 'ftr.php';
  }

  //        p o s t s  v i e w  t b l
  private function posts(object $pp1) //private
  {
    //$dm = $this ;            //globals for all sites (eg for CRUD...) !!

    if ( isset($pp1->uriq) ) { $uriq = $pp1->uriq ; } else {$uriq = (object)[] ;}

    $category_from_url = (isset($uriq->c) and null !== $pp1->uriq->c) ? $pp1->uriq->c : '' ;

    $this->Login_Confirm_SesUsrId();

    $title = 'Posts' ;
    require_once("navbar_admin.php");
      require $pp1->shares_path . 'hdr.php';
      require $pp1->module_path . '../post/posts.php';  
      require $pp1->shares_path . 'ftr.php';
  }


  //        p o s t s  f i l t e r e d  v i e w  t b l
  private function filter_postcateg(object $pp1) //private
  {
    if ( isset($pp1->uriq) ) { $uriq = $pp1->uriq ; } else {$uriq = (object)[] ;}
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '<br />$ u r i q='; print_r($uriq) ;
                      //echo 'ses fltr pg ='; print_r($_SESSION['filter_posts']) ;
                      //echo 'For pagination (not for c o u n t !!) $qrywhere='; print_r($qrywhere) ;
                      //echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    //exit(0) ;
                    echo '</pre>'; }

    //p=posts or home

    //      CATEG. NAME is in view h ome.php after c/ :
    $category_from_url = (isset($uriq->c) and null !== $pp1->uriq->c) ? $pp1->uriq->c : '' ;

    if ( (isset($pp1->uriq->p)) and $pp1->uriq->p == 'posts' ) 
    {
      //$dm = $this ;            //globals for all sites (eg for CRUD...) !!

      $this->Login_Confirm_SesUsrId();

      $title = 'Posts' ;
      require_once("navbar_admin.php");
      require $pp1->shares_path . 'hdr.php';
         require $pp1->module_path . '../post/posts.php';  
      require $pp1->shares_path . 'ftr.php';

    } else  {
        //http://dev1:8083/fwphp/glomodul/blog/?i/filter_postcateg/c/Movies/p/1
        //$ u r i q=stdClass Object( [i] => filter_postcateg  [c] => Movies  [p] => 1 )
        $title = 'MSG HOME';
        require $pp1->shares_path . 'hdr.php'; // MODULE_PATH
        require_once("navbar.php");
           require $pp1->module_path . 'home.php';
        require $pp1->shares_path . 'ftr.php';
    }


  }



  //        r e a d  p o s t
  private function read_post(object $pp1)
  {
    /* not working here :
    //parsedown to color code (sintax highlighting https://highlightjs.org/download/) :
    $css2 = '<link rel="stylesheet" href="/vendor/erusev/parsedown/styles/default.css">' ;
    $css3 = '<script src="/vendor/erusev/parsedown/highlight.pack.js"></script>' ; //js :-) 
    $css4 = '<script>hljs.initHighlightingOnLoad();</script>'; */

    $uriq = $pp1->uriq ;
    $IdFromURL = (int)$uriq->id ; 

    $title = 'Full Post Page' ;
    //$css1  = 'styles.css' ;

    $category_from_url = (isset($uriq->c) and null !== $pp1->uriq->c) ? $pp1->uriq->c : '' ;
    if (isset( $_SESSION['filter_posts']['search_from_submit']))
       $search_from_submit = $_SESSION['filter_posts']['search_from_submit'] ; 
    else $search_from_submit = '' ; 
    if (isset( $_SESSION['filter_posts']['pgordno_from_url']))
       $pgordno_from_url = $_SESSION['filter_posts']['pgordno_from_url'] ; 
    else $pgordno_from_url = '' ; 


    require_once $pp1->shares_path . 'hdr.php';

      require_once("navbar.php");
      require $pp1->module_path . '../post/read_post.php';  

    require_once $pp1->shares_path . 'ftr.php';
  }

  //        e d i t  p o s t 
  private function editpost(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    //$SarchQueryParameter = $this->ctr akc par_ arr['id'] ; //$_ GET["id"] :
    $IdFromURL = $uriq->id ;
    //$dm = $this ;            //globals for all sites (eg for CRUD...) !!

    $this->Login_Confirm_SesUsrId();

    $title = 'Edit Post' ;
    //if form and form processing are in same script, redirect has problem :
    //require $pp1->shares_path . 'hdr.php';
    //require_once("navbar_admin.php");
    require $pp1->module_path . '../post/upd_post_frm.php';
    //require $pp1->shares_path . 'ftr.php';
  }

  //        e d i t  p o s t  m a r k d o w n
  private function edmkdpost(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    //for now c r e / d e l  op.system file in op.system
    //see read_ post.php  href="<=$pp1->ed mkdpost>flename/<=$r->title>/id/<=$r->id>"

    //utl::Redirect_to(" http://dev1:8083/fwphp/glomodul/mkd/?edit=" . "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt"

    //http://dev1:8083/fwphp/glomodul/blog/?i/ed mkdpost/flename/001.%20Menu_CRUD.txt/id/54
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                  echo '<pre>';
                  // http://dev1:8083/fwphp/glomodul/mkd/?edit=  :
                  echo '<b>mkd edit redir='; print_r(dirname($pp1->module_url)."/mkd/?edit="); 
                  echo '</pre><br />'; 
                  }
    //http://dev1:8083/fwphp/glomodul/mkd/?edit=J:/awww/www/fwphp/glomodul/blog/msgmkd/001.%20Menu_CRUD.txt
    utl::Redirect_to(
         dirname($pp1->module_url)."/mkd/?edit="
                           //"http://dev1:8083/fwphp/glomodul/mkd/?edit="
         . "{$pp1->module_path}msgmkd/{$uriq->flename}"
                           // . "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt"
    );
  }
  //        d i s p l a y  p o s t  m a r k d o w n

  private function readmkdpost(object $pp1, string $fle_to_displ_name, string $only_help='') //private
  {

    //see read_ post.php  $this->r eadmkdpost($r->title); //means  i n c l u d e  here html
    //$fle_to_displ_name = "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt" ;
    $fle_to_displ_path = "{$pp1->module_path}msgmkd/$fle_to_displ_name" ;
    $helptxt_path = "{$pp1->module_path}msgmkd/000_markdown_posts_help.txt" ;
                    //require $mkdflename ; //e r r o r with  ``` or with...who knows

    //WORKING ON WINDOWS, WORKING ON LINUX :
    require_once $pp1->wsroot_path . 'vendor/erusev/parsedown/Parsedown.php';
       //require_once '/vendor/erusev/parsedown/parsedown.php';
       //require_once '/phporacle.eu5.net/vendor/erusev/parsedown/parsedown.php';

    $pdown = new \Parsedown; // Parsedown cls has no namespace

    if ($only_help) {
        echo $pdown->text(
          str_replace(
            '{{help_file_path}}'
            , str_replace('/',DS,$pp1->module_path) . "000_markdown_posts_help.txt"
            , str_replace(
              '{{file_to_edit_path}}'
              , str_replace('/',DS,$pp1->module_path) . "msgmkd 001. Menu_CRUD.txt"
              , file_get_contents($helptxt_path)
            )
          )
        ) ;
        goto fnend ;
    }

    if (file_exists($fle_to_displ_path)) {
       echo $pdown->text(file_get_contents($fle_to_displ_path)) ;
    } else {  

      echo $pdown->text(
        str_replace(
          '{{help_file_path}}'
          , str_replace('/',DS,$pp1->module_path) . "000_markdown_posts_help.txt"
          , str_replace(
            '{{file_to_edit_path}}'
            , str_replace('/',DS,$pp1->module_path) . "msgmkd 001. Menu_CRUD.txt"
            , file_get_contents($helptxt_path)
          )
        )
      ) ;

    }
                    //echo file_get_contents($fle_to_displ_name) ; //e r r o r no formating
                    //do not use self::escp(...) !!
    fnend:
  }





  // *************** FUNCTION SIMPLE MODULE TBL4  C O M M E N T S ***************
  //          p o s t  c o m m e n t s
  private function comments(object $pp1) //private
  {

    $this->Login_Confirm_SesUsrId();

    $title = 'Comments' ;
    require $pp1->shares_path . 'hdr.php';
    require_once("navbar_admin.php");
    require $pp1->module_path . '../post_comment/comments.php';  
    require $pp1->shares_path . 'ftr.php';
  }

  //         u p d  c o m m e n t _ s t a t
  private function upd_comment_stat(object $pp1) //private
  {
    //$dm = $this ; // Domain Model is B12phpfw CRUD code skeleton
    //$Tbl_crud_post_comment = new Tbl_crud_post_comment ;
    //copy of an already created object can be made by cloning it. 
                              if ('') { echo '<br /><h3>'.__METHOD__ .', line '. __LINE__ .' SAYS:</h3>'
                              .'<br />works if redirect commented U R L  query array ='.'$this->u riq=' ;
                              if (isset($pp1->uriq))
                              { echo '<pre>'; print_r($pp1->uriq) ; echo '</pre>'; }
                              else { echo ' uriq arr. not set<br />' ; } 
                              echo 'c l a s s  name of $this='.get_class($this);
                              echo '<br />c l a s s  name of $this='.get_class($this);
                              echo '<br />c l a s s  name of $Tbl_crud_post_comment='. get_class($Tbl_crud_post_comment);
                              }
                              // outputs :
                              //c l a s s name of $this=B12phpfw\Home_ctr
                              //c l a s s name of $this=B12phpfw\Home_ctr
                              //c l a s s name of $Tbl_crud_post_comment=B12phpfw\Tbl_crud_post_comment

    Tbl_crud_post_comment::upd_comment_stat($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]);
    utl::Redirect_to($pp1->comments);

  }






} // e n d  c l s  C onfig_ m ini3


  /*
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
           .', line '. __LINE__ .' SAYS'=>'Not allowed here !'
           ,'INFO '=>'ERASING IS NOT IN COMPOUND MODULE (eg blog) !, but in single modules eg post category'
           //,'After .. '=>'..., ...'
        ] ) ;
        //utl::Redirect_to($pp1->p osts) ;
        // to $this->Redirect_to( dirname($pp1->module_url) .'/glomodul/mkd/' ) ;
        //utl::Redirect_to(QS.str_replace('|','/',$db->uriq->r)) ;
    */


    /*
    // D e l  &  R e d i r e c t = r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t ;
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;
    switch ($tbl)
    {
      case 'comments' : // $pp1->uriq->id
        Tbl_crud_post_comment::dd($pp1, $other);
        utl::Redirect_to($pp1->comments) ; break;
      case 'posts' :
        Tbl_crud_post::dd($pp1, $other);
        utl::Redirect_to($pp1->p osts) ; break;

      case 'admins' :
        Tbl_crud_admin::dd($pp1, $other);
        utl::Redirect_to($pp1->admins) ; break;
      case 'category' :
        Tbl_crud_category::dd($pp1, $other);
        utl::Redirect_to($pp1->categories) ; break;
      default: 
        echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
            .'T a b l e '. $pp1 .' does not exist' . '</h3>';
        //utl::Redirect_to($pp1->filter_page) ;
        break;
    }
  }
    */

    /**
    * *********************************************************
    * R O U T I N G  T A B L E  (IS OK FOR MODULES IN OWN DIR)
    * We have two masters (usr, category) and two level of details (post s, comment s).
    * *********************************************************
    * QS=?=url adress Query Separator. Without QS we must use Apache mod-rewrite and Composer auto loading classes instead own simple-fast auto loading.

    * After KEY i is VALUE methodname which includes/calls samenamed (or not) 
    * script/method or calls some (global method) or...
    */

