<?php
// J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
//,'$caller'=>$caller IS ALLWAYS i n d e x . p h p

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\shop ;
use B12phpfw\core\zinc\Config_allsites ;
//use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_user;  //to Login_ Confirm_ SesUsrId
       //use B12phpfw\module\dbadapter\user\DB_ user ;
//use B12phpfw\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

// May be named App, Router_dispatcher... :
class Home_ctr extends Config_allsites
{
  //NO ATTRIBUTES -attr. are in parent classes

  public function __construct(object $pp1)
  {
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           //,'self::$d bi'=>self::$dbi
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    // R O U T I N G  T A B L E  - module links, (IS OK FOR MODULES IN OWN DIR)
    $pp1_module = [ 
      'PP1_ MODULE' => '~~~~~in view script eg href = $pp1->login~~~~~',
          //, 'cncts'                 => (object)[] //c o n n e c t  (states) a t t r i b u t e s
    //  all module links (menu items) should be here :
    'home'            => QS.'i/home/' , 
    'loginfrm'        => QS.'i/loginfrm/' , 
    'login'           => QS.'i/login/' , 
    'logout'          => QS.'i/logout/r/i|loginfrm|' ,
    'del_row'         => QS.'i/del_row_do/' , //used for all tables !!
    'filter_page'     => QS.'p/' , // i/home/
    //
    'dashboard'       => QS.'i/dashboard/' ,

    'admins'          => QS.'i/admins/' ,
       'read_user'       => QS.'i/read_user/' ,
       'upd_user_loggedin' => QS.'i/upd_user_loggedin/' ,

    'categories'      => QS.'i/categories/' ,

    'posts'           => QS.'i/posts/' ,
       //in view h ome.php after c/ we add categ. name so :
       //<a href="<=filter_ postcateg><=h tmlentities($r->c ategory)>">
       // filter_ postcateg is  m ethod  name in this  c lass
       'filter_postcateg' => QS.'i/filter_postcateg/c/' ,
       'addnewpost'      => QS.'i/addnewpost/' ,
       'read_post'       => QS.'i/read_post/' ,
       'editpost'        => QS.'i/editpost/' ,
       'edmkdpost'       => QS.'i/edmkdpost/' ,
       'readmkdpost'     => QS.'i/readmkdpost/' ,

    'comments'        => QS.'i/comments/' ,
       'upd_comment_stat' => QS.'i/upd_comment_stat/' , //approvecomments
    // V I E W S :
    'kalendar'        => QS.'i/kalendar/' ,
    'about_us'        => QS.'i/about/' ,
    'contact_us'      => QS.'i/contact/' ,
    'features'        => QS.'i/features/'
    //e n d  R O U T I N G  T A B L E
        ] ;

    parent::__construct($pp1, $pp1_module);

    //$pp1 = $this->getp('pp1') ;



  } // e n d  f n  __ c o n s t r u c t


  //           **** D I S P A T C H I N G
          //$accessor = "get" . ucfirst(strtolower($akc));
  public function callf(string $akc, object $pp1)  //fnname, params
  {
    return ( 
      ( //method_exists($this, $akc) and
      is_callable(array($this, $akc)) ) ? $this->$akc($pp1) : '0'
    ) ;
  }



          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          // CALLED FROM Config_ allsites __c onstruct
          //******************************************
  /**
       1. S E S S I O N  M E T H O D S
  */

  private function Login_Confirm_SesUsrId(object $dm) {
    //$dm = $this = domain model = globals for all sites (eg for CRUD...) & for curr.module
    $Db_user = new Tbl_crud_user ; //tbl mtds and attr use globals for all sites !!
    $Db_user->Login_Confirm_SesUsrId();
  }

  private function logout(object $pp1)
  {
    //$this = $dm = domain model = globals for all sites / curr.module (eg for CRUD...)
    $dm = $this ;
    $Db_user = (new Tbl_crud_user)->logout($dm) ;
    //$Db_user = new Tbl_crud_user ; $Db_user->logout($dm);
  }

  // U S E R  R E A D
  private function loginfrm(object $pp1) //private
  {
    //called from link, Config_ allsites based on url (calling link) calls  f n  l o g i n
    //$p p1  = $t his->g etp('p p1') ;
                if ('') {self::jsmsg( [ //b asename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
      require $pp1->wsroot_path . 'zinc/hdr.php';
      require $pp1->module_path . '../user/login_frm.php';  
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function login(object $pp1) //private
  {
    //$dm = $this ; //this = globals for all sites are for CRUD... !!
    //$Db_ user = new Tbl_ crud_ user ;  $Db_ user->login($dm, $pp1, $pp1->dashboard) ;
    (new Tbl_crud_user)->login($this, $pp1, $pp1->dashboard) ;
  }


  //e n d  1. S E S S  I O N  M E T H O D S


  /**
        2. C R U D  M E T H O D S
  */

  /**
      2.1 I N C L U D E D  P A G E  S C R I P T S
  */

  private function home(object $pp1) //DI page prop.palette   
  {
    //As of PHP5, object variable doesn't contain object itself as value. It only contains object identifier. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.

    $uriq = $pp1->uriq ;

      $title = 'SHOP HOME';

      //require $pp1->wsroot_path . 'zinc/hdr.php';
      //require("navbar.php");
      require $pp1->module_path . 'home.php';
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  private function dashboard(object $pp1) //private
  {
    //$this = $dm = domain model = globals for all sites (eg for CRUD...) & for curr.module
    $this->Login_Confirm_SesUsrId($this); 

    $title = 'MSG Dashboard';
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    require $pp1->module_path . 'dashboard.php';  
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }



  //        u s e r s  r e a d
  private function admins(object $pp1) //private
  {
 
    $this->Login_Confirm_SesUsrId($this);
    
    $dm = $this ;  // = domain model = globals for all sites are for CRUD... & for curr.module
    $Db_user = new Tbl_crud_user ; //tbl mtds and attr use globals for all sites !!

    $title = 'Admin Page' ;
    //Warning: Cannot modify header information :
    //require $pp1->wsroot_path . 'zinc/hdr.php';
    //require_once("navbar_admin.php");
    require $pp1->module_path . '../user/admins.php';
    //require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  //  user profile
  private function read_user(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    $usrname_requested = $uriq->username ;

    require $pp1->wsroot_path .'vendor/erusev/parsedown/Parsedown.php' ;
    $Parsedown = new \Parsedown();

    $title = 'Profile' ;
    $css1 = 'styles.css' ;

    require $pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar.php");
    require $pp1->module_path . '../user/read_user.php';
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  //        c a t e g o r i e s  t b l
  private function categories(object $pp1) //private
  {

    $dm = $this ;            //globals for all sites (eg for CRUD...) !!
    $this->Login_Confirm_SesUsrId($dm);

    $title = 'MSG Categories' ;
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    require $pp1->module_path . '../post_category/categories.php';  
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  private function addnewpost(object $pp1) //private
  {

    // http://dev1:8083/fwphp/glomodul/blog/?i/addnewpost/
    $dm = $this ;            //globals for all sites (eg for CRUD...) !!
    $this->Login_Confirm_SesUsrId($dm);

      $title = 'Add Post' ;
      //require $pp1->wsroot_path . 'zinc/hdr.php';
      //require_once("navbar_admin.php");
      require $pp1->module_path . '../post/cre_post_frm.php';  
      //require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        p o s t s  v i e w  t b l
  private function posts(object $pp1) //private
  {

    $dm = $this ;            //globals for all sites (eg for CRUD...) !!

    $uriq = $pp1->uriq ;
    $category_from_url = ( isset($uriq->c) and null !== $pp1->uriq->c ) 
       ? $pp1->uriq->c : '' ;

    $this->Login_Confirm_SesUsrId($dm);

    $title = 'Posts' ;
    require_once("navbar_admin.php");
      require $pp1->wsroot_path . 'zinc/hdr.php';
      require $pp1->module_path . '../post/posts.php';  
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }


  //        p o s t s  f i l t e r e d  v i e w  t b l
  private function filter_postcateg(object $pp1) //private
  {
    if ( isset($pp1->uriq) ) { $uriq = $pp1->uriq ; } else {$uriq = (object)[] ;}
    $category_from_url = ( isset($uriq->c) and null !== $pp1->uriq->c ) 
       ? $pp1->uriq->c : '' ;
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
    //if ( (null !== $pp1->uriq->p) and $pp1->uriq->p == 'posts' ) 
    if ( (isset($pp1->uriq->p)) and $pp1->uriq->p == 'posts' ) 
    {
      $dm = $this ;            //globals for all sites (eg for CRUD...) !!

      $this->Login_Confirm_SesUsrId($dm);

      $title = 'Posts' ;
      require_once("navbar_admin.php");
        require $pp1->wsroot_path . 'zinc/hdr.php';
        require $pp1->module_path . '../post/posts.php';  
        require $pp1->wsroot_path . 'zinc/ftr.php';

    } else  {
        //http://dev1:8083/fwphp/glomodul/blog/?i/filter_postcateg/c/Movies/p/1
        //$ u r i q=stdClass Object( [i] => filter_postcateg  [c] => Movies  [p] => 1 )
        $title = 'MSG HOME';
        require $pp1->wsroot_path . 'zinc/hdr.php'; // MODULE_PATH
        require_once("navbar.php");
        require $pp1->module_path . 'home.php';
        require $pp1->wsroot_path . 'zinc/ftr.php';
    }


  }



  //        r e a d  p o s t
  private function read_post(object $pp1) //private
  {
    /* not working here :
    //parsedown to color code (sintax highlighting https://highlightjs.org/download/) :
    $css2 = '<link rel="stylesheet" href="/vendor/erusev/parsedown/styles/default.css">' ;
    $css3 = '<script src="/vendor/erusev/parsedown/highlight.pack.js"></script>' ; //js :-) 
    $css4 = '<script>hljs.initHighlightingOnLoad();</script>'; */

    $uriq = $pp1->uriq ;
    $IdFromURL = $uriq->id ; 

    $title = 'Full Post Page' ;
    $css1 = 'styles.css' ;
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar.php");
    require $pp1->module_path . '../post/read_post.php';  
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        e d i t  p o s t 
  private function editpost(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    //$SarchQueryParameter = $this->ctr akc par_ arr['id'] ; //$_ GET["id"] :
    $IdFromURL = $uriq->id ;
    $dm = $this ;            //globals for all sites (eg for CRUD...) !!

    $this->Login_Confirm_SesUsrId($dm);

    $title = 'Edit Post' ;
    //if form and form processing are in same script, redirect has problem :
    //require $pp1->wsroot_path . 'zinc/hdr.php';
    //require_once("navbar_admin.php");
    require $pp1->module_path . '../post/upd_post_frm.php';
    //require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        e d i t  p o s t  m a r k d o w n
  private function edmkdpost(object $pp1) //private
  {
    $uriq = $pp1->uriq ;
    //for now c r e / d e l  op.system file in op.system
    //see read_ post.php  href="<=$pp1->ed mkdpost>flename/<=$r->title>/id/<=$r->id>"

    //$this->Redirect_to(" http://dev1:8083/fwphp/glomodul/mkd/?edit=" . "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt"

    //http://dev1:8083/fwphp/glomodul/blog/?i/ed mkdpost/flename/001.%20Menu_CRUD.txt/id/54
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                  echo '<pre>';
                  // http://dev1:8083/fwphp/glomodul/mkd/?edit=  :
                  echo '<b>mkd edit redir='; print_r(dirname($pp1->module_url)."/mkd/?edit="); 
                  echo '</pre><br />'; 
                  }
    //http://dev1:8083/fwphp/glomodul/mkd/?edit=J:/awww/www/fwphp/glomodul/blog/msgmkd/001.%20Menu_CRUD.txt
    $this->Redirect_to(
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


  private function kalendar(object $pp1) //private
  {
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require $pp1->module_path . '../post/read_msg_tbl_kalendar_flex.php';
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }





  //          p o s t  c o m m e n t s
  private function comments(object $pp1) //private
  {

    $this->Login_Confirm_SesUsrId($this);

    $title = 'Comments' ;
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    require $pp1->module_path . '../post_comment/comments.php';  
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  //         u p d  c o m m e n t _ s t a t
  private function upd_comment_stat(object $pp1) //private
  {
    $dm = $this ; // Domain Model is B12phpfw CRUD code skeleton
    $Tbl_crud_post_comment = new Tbl_crud_post_comment ;
    //copy of an already created object can be made by cloning it. 
                              if ('') { echo '<br /><h3>'.__METHOD__ .', line '. __LINE__ .' SAYS:</h3>'
                              .'<br />works if redirect commented U R L  query array ='.'$this->u riq=' ;
                              if (isset($pp1->uriq))
                              { echo '<pre>'; print_r($pp1->uriq) ; echo '</pre>'; }
                              else { echo ' uriq arr. not set<br />' ; } 
                              echo 'c l a s s  name of $this='.get_class($this);
                              echo '<br />c l a s s  name of $dm='.get_class($dm);
                              echo '<br />c l a s s  name of $Tbl_crud_post_comment='. get_class($Tbl_crud_post_comment);
                              }
                              // outputs :
                              //c l a s s name of $this=B12phpfw\Home_ctr
                              //c l a s s name of $dm=B12phpfw\Home_ctr
                              //c l a s s name of $Tbl_crud_post_comment=B12phpfw\Tbl_crud_post_comment

    $Tbl_crud_post_comment->upd_comment_stat($pp1, $dm);
    $this->Redirect_to($pp1->comments);

  }




  private function del_row_do(object $pp1) //used for all  t a b l e s !! //private
  {
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                              if (isset($pp1->uriq) and null !== $pp1->uriq)
                              { echo '<pre>U R L  query array ='.'$pp1->u r i q='; print_r($pp1->uriq) ; echo '</pre>'; } //[i] => del_row_do [t] => category [id] => 21
                              else { echo ' not set' ; } 
                              exit(0) ;
                              }
      $this->dd($pp1->uriq->t, $pp1->uriq->id) ;
      // R e d i r e c t = r e f r e s h  t b l  v i e w :
      switch ($pp1->uriq->t)
      {
        case 'admins' : $this->Redirect_to($pp1->admins) ; break;
        case 'category' : $this->Redirect_to($pp1->categories) ; break;
        case 'posts' : $this->Redirect_to($pp1->posts) ; break;
        case 'comments' : $this->Redirect_to($pp1->comments) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                .'T a b l e '. $pp1->uriq->t .' does not exist' . '</h3>';
          //$this->Redirect_to($pp1->filter_page) ;
          break;
      }

  }



  private function upd_user_loggedin(object $pp1) //private
  {
    //     A D M I N  P R O F I L E  navbar admin -> My Profile
      $dm = $this ;            //globals for all sites (eg for CRUD...) !!
      $this->Login_Confirm_SesUsrId($dm);

      $AdminId = $_SESSION["userid"];

      $title = 'MSG u s r u p d ';
      require $pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar_admin.php");
      require $pp1->module_path . '../user/upd_user_loggedin_frm.php';  
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }




    private function errmsg(object $pp1, string $myerrmsg)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s  p a g e
        //require $pp1->wsroot_path . 'zinc//hdr.php'; //or __DIR__
        $title = 'MSG ERRPAGE';
        require $pp1->module_path . '/error.php';
        require $pp1->wsroot_path . 'zinc//ftr.php';
    }




  // P A G E S  WITHOUT  C R U D

  private function contact(object $pp1)
  {
      require $pp1->wsroot_path . 'zinc/hdr.php';
      require $pp1->module_path . 'v_contact_us.php';
      require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function about(object $pp1)
  {
    //$param1 = ... ;
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require $pp1->module_path . 'v_about_us.php';
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function features(object $pp1)
  {
    require $pp1->wsroot_path . 'zinc/hdr.php';
    require $pp1->module_path . 'v_features.php';
    require $pp1->wsroot_path . 'zinc/ftr.php';
  }

} // e n d  c l s  C onfig_ m ini3




    /**
    * *********************************************************
    * R O U T I N G  T A B L E  (IS OK FOR MODULES IN OWN DIR)
    * We have two masters (usr, category) and two level of details (post s, comment s).
    * *********************************************************
    * QS=?=url adress Query Separator. Without QS we must use Apache mod-rewrite and Composer auto loading classes instead own simple-fast auto loading.

    * After KEY i is VALUE methodname which includes/calls samenamed (or not) 
    * script/method or calls some (global method) or...
    */

                /*
                if ('') {self::jsmsg( [ //b asename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->u riq'=>$this->getp('uriq')
                ] ) ; }


                if ('') {self::jsmsg( [ //b asename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. BEFORE call akc'
                   ,'$this->p p1->dbi_ obj'=>(
                       isset($pp1->dbi_obj) and null !== $pp1->dbi_obj
                     ) ? $pp1->dbi_obj : 'NOT SET'
                   //, '$dsn'=>$dsn
                   ] ) ; }
                 */

      /**
      *           **** D I S P A T C H I N G
      * coud be here, in modules Home_ ctr (see code in Config_ allsites is global for all sites)
      * but better here, in fn  c a l l f  (less and simpler coding, home ctr fns are MUST)
      */
        //fn  c a l l f  is called before this from Config_ allsites
                //$pp1 = $this->getp('pp1') ; //get property
        //$akc = $pp1->uriq->i ; 
               //$this->callf($akc, $pp1) ; //code in Config_ allsites
        //$this->$akc($pp1) ;


  /**
  * p ublic f unction c a l l f (string $fnname, object $pp1)
  * CONVENTION: Must be same fnname (eg posts) in $pp1 index and in $pp1 value :
  *   eg link : 'posts' => QS.'i/posts/' ee 'fnname' => QS.'i/fnname/'
  * CALLED only from Config_allsites __construct so :
        //fn params are in  p p 1 = properties palette = all settings
        $pp1 = $this->getp('pp1') ; //get property
        $akc = $pp1->uriq->i ; 
        $this->callf($akc, $pp1) ; // OR
        //$this->$akc($pp1) ;
  * CALLS Home_ ctr PRIVATE method
  * WHY :
  */


    // m k d  txt to  H T M L  must be require_ once
    //require_once( /srv/disk16/3266814/www/phporacle.eu5.net/vendor/erusev/parsedown/parsedown.php )
    //                     /phporacle.eu5.net/vendor/erusev/parsedown
    //    failed to open stream
    //For Linux MUST BE /phporacle.eu5.net/fwphp/glomodul/blog, as "/" is root
    //$_SERVER['SCRIPT_FILENAME'] = /home/www/phporacle.eu5.net/fwphp/glomodul/z_examples/01_phpinfo.php
    //$_SERVER['DOCUMENT_ROOT'] = /home/www/phporacle.eu5.net
    //$_SERVER['HTTP_HOST'] = phporacle.eu5.net
    //$_SERVER['PHP_SELF'] = /fwphp/glomodul/z_examples/01_phpinfo.php
    //echo PHP_OS; or php_uname() 
    /*
      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
          echo 'This is a server using Windows!';
      } else {
          echo 'This is a server not using Windows!';
      }
          // *nix
          echo DIRECTORY_SEPARATOR; // /
          echo PHP_SHLIB_SUFFIX;    // so
          echo PATH_SEPARATOR;      // :

          // Win*
          echo DIRECTORY_SEPARATOR; // \
          echo PHP_SHLIB_SUFFIX;    // dll
          echo PATH_SEPARATOR;      // ;
    */