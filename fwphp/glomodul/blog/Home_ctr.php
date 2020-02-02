<?php
// J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
// DEFAULT CTR ONLY ONE FOR MODULE-IN-OWN-DIR IS ENOUGH, but may be more.
//,'$caller'=>$caller IS ALLWAYS i n d e x . p h p

namespace B12phpfw ;
//use B12phpfw\Home_ctr_mini3 ;

// May be named App, Router_dispatcher... :
class Home_ctr extends Config_allsites
{
  //NO ATTRIBUTES -attr. are in parent classes

  public function __construct($pp1)
  {
    parent::__construct($pp1); //ROUTING ee $this->uriq object and adds elements to $pp1
      //extends Db_allsites ee cc,rr,uu,dd methods = D B I abstr.layer for PDO D B I abs.l.
      //extends Dbconn_allsites singleton DB obj
                if ('') {self::jsmsg( [ //basename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->uriq'=>$this->uriq
                ] ) ; }

    // *********************************************************
    // R O U T I N G  T A B L E  (IS OK FOR MODULES IN OWN DIR) 
    //We have two masters (usr, category) and two level of details (posts, comments).
    // *********************************************************
    // After i/ is method in this Hom e_ ctr which includes/calls samenamed (or not) script/method or calls some (global method) or...
    // QS=?=url adress Query Separator. Without QS we must use Apache mod-rewrite and Composer auto loading classes instead own simple-fast auto loading.

    //  all module links (menu items) should be here :
    $this->pp1->loginfrm        = QS.'i/loginfrm/' ; 
    $this->pp1->login           = QS.'i/login/' ; 
    $this->pp1->logout          = QS.'i/logout/r/i|loginfrm|' ; //logout_me
    $this->pp1->del_row         = QS.'i/del_row_do/' ; //used for all tables !!
    $this->pp1->filter_page     = QS.'p/' ; // i/home/
    //
    $this->pp1->dashboard       = QS.'i/dashboard/' ;

    $this->pp1->admins          = QS.'i/admins/' ;
       $this->pp1->read_user       = QS.'i/read_user/' ;
       $this->pp1->upd_user_loggedin = QS.'i/upd_user_loggedin/' ;

    $this->pp1->categories      = QS.'i/categories/' ;

    $this->pp1->posts           = QS.'i/posts/' ;
       //in view h ome.php after c/ we add categ. name so :
       //<a href="<=$this->pp1->filter_ postcateg><=h tmlentities($r->c ategory)>">
       // filter_ postcateg is  m ethod  name in this  c lass
       $this->pp1->filter_postcateg = QS.'i/filter_postcateg/c/' ;
       $this->pp1->addnewpost      = QS.'i/addnewpost/' ;
       $this->pp1->read_post       = QS.'i/read_post/' ;
       $this->pp1->editpost        = QS.'i/editpost/' ;
       $this->pp1->edmkdpost       = QS.'i/edmkdpost/' ;
       $this->pp1->readmkdpost     = QS.'i/readmkdpost/' ;

    $this->pp1->comments        = QS.'i/comments/' ;
       $this->pp1->approvecomments = QS.'i/upd_comment_stat/' ;
    // V I E W S :
    $this->pp1->kalendar        = QS.'i/kalendar/' ;
    $this->pp1->about_us        = QS.'i/about/' ;
    $this->pp1->contact_us      = QS.'i/contact/' ;
    $this->pp1->features        = QS.'i/features/' ;
    //e n d  R O U T I N G  T A B L E
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. BEFORE call akc'
                           ,'$this->pp1->dbi_obj'=>isset($this->pp1->dbi_obj)?$this->pp1->dbi_obj:'NOT SET'
                           //, '$dsn'=>$dsn
                           ] ) ; }

    /** ************** coding step cs04. *******************
    *   4. DISPATCHER:  includes or calls or http jumps (only to other module)
    ***************************************************** */
        // i = ctrakcmethod of this cls  (H o m e) which includes view script or calls method (does tblrowCRUD...)
        $akc = $this->uriq->i ; //uriq = url query string, default = home
        $this->$akc() ;
              //include(str_replace('|','/', $this->uriq->i.'.php'));  break;

  } // e n d  f n  __ c o n s t r u c t




          //******************************************
          //       DISPATCH  M E T H O D S
          // they call other methods or include script
          //******************************************

  private function home()
  {
      //$_SESSION['filter_posts']['pgordno_from_url'] = 1 ;
      //$_SESSION['filter_posts']['category_from_url'] = '' ;
      //$_SESSION['filter_posts']['search_from_submit'] = '' ;

      $title = 'MSG HOME';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar.php");
      require $this->pp1->module_path . 'home.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }




  /**
         C R U D  M E T H O D S
  */

  private function del_row_do() //used for all  t a b l e s !!
  {
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                              .'<br />U R L  query array ='.'$this->uriq=' ;
                              if (isset($this->uriq))
                                { echo '<pre>'; print_r($this->uriq) ; echo '</pre>'; }
                              else { echo ' not set' ; } }
      $this->dd() ;
      // R e d i r e c t = r e f r e s h  t b l  v i e w :
      switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($this->pp1->admins) ; break;
        case 'category' : $this->Redirect_to($this->pp1->categories) ; break;
        case 'posts' : $this->Redirect_to($this->pp1->posts) ; break;
        case 'comments' : $this->Redirect_to($this->pp1->comments) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '
                .'T a b l e '. $this->uriq->t .' does not exist' . '</h3>';
          //$this->Redirect_to($this->pp1->filter_page) ;
          break;
      }

  }





  /**
      I N C  P A G E  S C R I P T S
  */

  //        u s e r  r e a d
  private function loginfrm()
  {
                if ('') {self::jsmsg( [ //basename(__FILE__).
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>''
                   ,'aaa'=>'bbb'
                ] ) ; }
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require $this->pp1->module_path . '../user/login_frm.php';  
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function login()
  {
      $db = $this ;            //this globals for all sites are for CRUD... !!
      $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
    $Db_user->login($db) ;
  }



  public function Login_Confirm($db)
  {
      //$db = $this ;            //this globals for all sites are for CRUD... !!
      $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
      $Db_user->Login_Confirm();
  }


  public function logout()
  {
      $db = $this ;            //this globals for all sites are for CRUD... !!
      $Db_user = new Db_user ; //tbl mtds and attr use globals for all sites !!
      $Db_user->logout($db);
  }
  //e n d  S E S S  I O N  M E T H O D S




  // S E S S I O N
  //public function logout_me() {$this->logout() ; $this->Redirect_to($this->pp1->loginfrm);}


  // C R U D
    private function dashboard()
    {
      $db = $this ;            //globals for all sites (eg for CRUD...) !!
      //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
      $this->Login_Confirm($db);

      $title = 'MSG Dashboard';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar_admin.php");
      require $this->pp1->module_path . 'dashboard.php';  
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
    }


  private function upd_user_loggedin()
  {
      $db = $this ;            //globals for all sites (eg for CRUD...) !!
      //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
      $this->Login_Confirm($db);

      $title = 'MSG u s r u p d ';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require_once("navbar_admin.php");
      require $this->pp1->module_path . '../user/upd_user_loggedin_frm.php';  
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }




    public function errmsg($myerrmsg)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s  p a g e
        //require $this->pp1->wsroot_path . 'zinc//hdr.php'; //or __DIR__
        $title = 'MSG ERRPAGE';
        require $this->pp1->module_path . '/error.php';
        require $this->pp1->wsroot_path . 'zinc//ftr.php';
    }

  //        p o s t s  f i l t e r e d  v i e w  t b l
  private function filter_postcateg()
  {
    //p=posts or home
    if ( isset($this->uriq->p) and $this->uriq->p == 'posts' ) 
    {
      //$pg_to_include       =  "{$this->pp1->module_path}../post/{$this->uriq->p}.php" ;
      $db = $this ;            //globals for all sites (eg for CRUD...) !!
      //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
      $this->Login_Confirm($db);

      $title = 'Posts' ;
      require_once("navbar_admin.php");
        require $this->pp1->wsroot_path . 'zinc/hdr.php';
        require $this->pp1->module_path . '../post/posts.php';  
        require $this->pp1->wsroot_path . 'zinc/ftr.php';

    } else  {
        $title = 'MSG HOME';
        require $this->pp1->wsroot_path . 'zinc/hdr.php'; // MODULE_PATH
        require_once("navbar.php");
        require $this->pp1->module_path . 'home.php';
        require $this->pp1->wsroot_path . 'zinc/ftr.php';
    }


  }




  //        u s e r s  r e a d
  private function admins()
  {
    $this->Login_Confirm($this);

    $title = 'Admin Page' ;
    //Warning: Cannot modify header information :
    //require $this->pp1->wsroot_path . 'zinc/hdr.php';
    //require_once("navbar_admin.php");
    require $this->pp1->module_path . '../user/admins.php';
    //require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //                 user
  private function read_user()
  {
    $title = 'Profile' ;
    $css1 = 'styles.css' ;
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar.php");
    require $this->pp1->module_path . '../user/read_user.php';
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }


  //        c a t e g o r i e s  t b l
  private function categories()
  {
    $db = $this ;            //globals for all sites (eg for CRUD...) !!
    //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
    $this->Login_Confirm($db);

    $title = 'MSG Categories' ;
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    require $this->pp1->module_path . '../post_category/categories.php';  
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }


  private function addnewpost()
  {
    // http://dev1:8083/fwphp/glomodul/blog/?i/addnewpost/
    $db = $this ;            //globals for all sites (eg for CRUD...) !!
    //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
    $this->Login_Confirm($db);

      $title = 'Add Post' ;
      //require $this->pp1->wsroot_path . 'zinc/hdr.php';
      //require_once("navbar_admin.php");
      require $this->pp1->module_path . '../post/cre_post_frm.php';  
      //require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        p o s t s  v i e w  t b l
  private function posts()
  {
    $db = $this ;            //globals for all sites (eg for CRUD...) !!
    //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
    $this->Login_Confirm($db);

    $title = 'Posts' ;
    require_once("navbar_admin.php");
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require $this->pp1->module_path . '../post/posts.php';  
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        r e a d  p o s t  
  private function read_post()
  {

    /* not working here :
    //parsedown to color code (sintax highlighting https://highlightjs.org/download/) :
    $css2 = '<link rel="stylesheet" href="/vendor/erusev/parsedown/styles/default.css">' ;
    $css3 = '<script src="/vendor/erusev/parsedown/highlight.pack.js"></script>' ; //js :-) 
    $css4 = '<script>hljs.initHighlightingOnLoad();</script>'; */
    $title = 'Full Post Page' ;
    $css1 = 'styles.css' ;
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar.php");
    require $this->pp1->module_path . '../post/read_post.php';  
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        e d i t  p o s t 
  private function editpost()
  {
      $db = $this ;            //globals for all sites (eg for CRUD...) !!
      //$D b_user = n ew Db_user ; //table m.and attr. use globals for all sites !!
      $this->Login_Confirm($db);

      $title = 'Edit Post' ;
    //if form and form processing are in same script, redirect has problem :
    //require $this->pp1->wsroot_path . 'zinc/hdr.php';
    //require_once("navbar_admin.php");
    require $this->pp1->module_path . '../post/upd_post_frm.php';
    //require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //        e d i t  p o s t  m a r k d o w n
  private function edmkdpost()
  {
    //for now c r e / d e l  op.system file in op.system
    //see read_ post.php  href="<=$this->pp1->ed mkdpost>flename/<=$r->title>/id/<=$r->id>"

    //$this->Redirect_to(" http://dev1:8083/fwphp/glomodul/mkd/?edit=" . "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt"

    //http://dev1:8083/fwphp/glomodul/blog/?i/ed mkdpost/flename/001.%20Menu_CRUD.txt/id/54
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                  echo '<pre>';
                  // http://dev1:8083/fwphp/glomodul/mkd/?edit=  :
                  echo '<b>mkd edit redir='; print_r(dirname($this->pp1->module_url)."/mkd/?edit="); 
                  echo '</pre><br />'; 
                  }
    //http://dev1:8083/fwphp/glomodul/mkd/?edit=J:/awww/www/fwphp/glomodul/blog/msgmkd/001.%20Menu_CRUD.txt
    $this->Redirect_to(
         dirname($this->pp1->module_url)."/mkd/?edit="
                           //"http://dev1:8083/fwphp/glomodul/mkd/?edit="
         . "{$this->pp1->module_path}msgmkd/{$this->uriq->flename}"
                           // . "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt"
    );
  }
  //        d i s p l a y  p o s t  m a r k d o w n
  private function readmkdpost($fle_to_displ_name, $only_help='')
  {
    //see read_ post.php  $this->r eadmkdpost($r->title); //means  i n c l u d e  here html
    //$fle_to_displ_name = "J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu_CRUD.txt" ;
    $fle_to_displ_path = "{$this->pp1->module_path}msgmkd/$fle_to_displ_name" ;
    $helptxt_path = "{$this->pp1->module_path}msgmkd/000_markdown_posts_help.txt" ;
                    //require $mkdflename ; //e r r o r with  ``` or with...who knows
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
    //WORKING ON WINDOWS, WORKING ON LINUX :
    require_once $this->pp1->wsroot_path . 'vendor/erusev/parsedown/Parsedown.php';
       //require_once '/vendor/erusev/parsedown/parsedown.php';
       //require_once '/phporacle.eu5.net/vendor/erusev/parsedown/parsedown.php';

    $pdown = new \Parsedown; // Parsedown cls has no namespace

    if ($only_help) {
        echo $pdown->text(
          str_replace(
            '{{help_file_path}}'
            , str_replace('/',DS,$this->pp1->module_path) . "000_markdown_posts_help.txt"
            , str_replace(
              '{{file_to_edit_path}}'
              , str_replace('/',DS,$this->pp1->module_path) . "msgmkd 001. Menu_CRUD.txt"
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
          , str_replace('/',DS,$this->pp1->module_path) . "000_markdown_posts_help.txt"
          , str_replace(
            '{{file_to_edit_path}}'
            , str_replace('/',DS,$this->pp1->module_path) . "msgmkd 001. Menu_CRUD.txt"
            , file_get_contents($helptxt_path)
          )
        )
      ) ;

    }
                    //echo file_get_contents($fle_to_displ_name) ; //e r r o r no formating
                    //do not use self::escp(...) !!
    fnend:
  }


  private function kalendar()
  {
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require $this->pp1->module_path . '../post/read_msg_tbl_kalendar_flex.php';
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }





  //          p o s t  c o m m e n t s
  private function comments()
  {
    //$db = $this ;
    $this->Login_Confirm($this);

    $title = 'Comments' ;
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require_once("navbar_admin.php");
    require $this->pp1->module_path . '../post_comment/comments.php';  
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  //         u p d  c o m m e n t _ s t a t
  private function upd_comment_stat()
  {
    $db = $this ;
    $Db_post_comment = new Db_post_comment ;
    //copy of an already created object can be made by cloning it. 
                              if ('') { echo '<br /><h3>'.__METHOD__ .', line '. __LINE__ .' SAYS:</h3>'
                              .'<br />works if redirect commented U R L  query array ='.'$this->uriq=' ;
                              if (isset($this->uriq))
                                { echo '<pre>'; print_r($this->uriq) ; echo '</pre>'; }
                              else { echo ' uriq arr. not set<br />' ; } 
                              echo 'c l a s s  name of $this='.get_class($this);
                              echo '<br />c l a s s  name of $db='.get_class($db);
                              echo '<br />c l a s s  name of $Db_post_comment='.get_class($Db_post_comment);
                              }
                              // outputs :
                              //c l a s s name of $this=B12phpfw\Home_ctr
                              //c l a s s name of $db=B12phpfw\Home_ctr
                              //c l a s s name of $Db_post_comment=B12phpfw\Db_post_comment

    $Db_post_comment->upd_comment_stat($db);

  }






  // P A G E S  WITHOUT  C R U D

  private function contact()
  {
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
      require $this->pp1->module_path . 'v_contact_us.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function about()
  {
    //$param1 = $this->uriq->p1 ;
    //$param2 = $this->uriq->p2 ;
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require $this->pp1->module_path . 'v_about_us.php';
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  private function features()
  {
    require $this->pp1->wsroot_path . 'zinc/hdr.php';
    require $this->pp1->module_path . 'v_features.php';
    require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

} // e n d  c l s  C onfig_ m ini3
