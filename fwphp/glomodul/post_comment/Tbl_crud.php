<?php
declare(strict_types=1);
/**
* J:\awww\www\fwphp\glomodul\post_comment\Tbl_crud.php
* Tbl_crud cls is instantiated in index.php after shared_dbadapter_obj which is it's parameter in $pp1
*     This c l a s s is for one module - does know module's CRUD
*          DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !

*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\dbadapter\post_comment ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\module\post_comment\Home_ctr ;

//use B12phpfw\core\b12phpfw\Db_allsites_Intf ;
//use B12phpfw\core\b12phpfw\Db_allsites as utldb ; //(NOT HARD CODED) SHARED DBADAPTER

// Gateway class - separate two DBI layers
class Tbl_crud //implements Db_allsites_Intf //Db_post_comment //extends Db_allsites
{

  static protected $pp1 ; 
  //Db_allsites_ORA or Db_allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER

  static protected $tbl = "comments";

  //self is used to access static or class variables or methods
  //this is used to access non-static or object variables or methods
  public function __construct(object $pp1) {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
  }

  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  self::$utldb::dd( $pp1, $other ) ;
    return '' ;
  }


  static public function get_cursor( object $pp1
    , string $dmlrr
    , string $qrywhere="'1'='1'"
    , array $binds=[]
    , array $other=[]): object
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $cursor =  self::$utldb::get_cursor( //$pp1
          "SELECT $dmlrr FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds
       , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } 



    //Deprecated: Calling static trait method B12phpfw\core\b12phpfw\Db_allsites::rrcount is deprecated,
    //            it should only be called on a class using the t rait
  static public function rrcnt( object $pp1, string $tbl, array $other=[] ): int { 
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    $rcnt = self::$utldb::rrcount($tbl) ;
    return (int)$rcnt ;
    //return (int)utl::escp($rcnt) ;
  } 

  static public function rrcount( object $pp1
     , string $qrywhere='', array $binds=[], array $other=[] ): int
  {
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
 
               if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                             //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                             //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                  //echo '<pre>self::$pp1='; print_r(self::$pp1); echo '</pre>';
                  //echo '<pre>self::$utldb='; print_r(self::$utldb); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }

    $cursor_rowcnt_post_comments =  self::$utldb::get_cursor( //$pp1
         "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]
    ) ;
    $rcnt = self::rrnext( $cursor_rowcnt_post_comments
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;

    //return (int)utl::escp($rcnt) ;
    return (int)$rcnt ;
  } 
            // CODE FLOW :
            #Fatal error: Uncaught Error: Class name must be a valid object or a string in J:\awww\www\fwphp\glomodul\post_comment\Tbl_crud.php:72 Stack trace: 
            #0 J:\awww\www\fwphp\glomodul\blog\Home.php(356): 
               //$rcnt_post_comments = Tbl_crud_post_comment::rrcount( B12phpfw\dbadapter\post_comment\Tbl_crud::rrcount('post_id=:id AND...', Array, Array) 
            #1 J:\awww\www\fwphp\glomodul\blog\Home.php(202): B12phpfw\module\blog\Home::show_post_meta(Object(stdClass), Object(stdClass), 1, 1) 
            #2 J:\awww\www\fwphp\glomodul\blog\Home_ctr.php(225): B12phpfw\module\blog\Home::show(Object(stdClass), Array) 
            #3 J:\awww\www\fwphp\glomodul\blog\Home_ctr.php(127): B12phpfw\module\blog\Home_ctr->home(Object(stdClass)) 
            #4 J:\awww\www\vendor\b12phpfw\Config_allsites.php(296): B12phpfw\module\blog\Home_ctr->call_module_method('home', Object(stdClass)) 
            #5 J:\awww\www\fwphp\glomodul\blog\Home_ctr.php(106): B12phpfw\core\b12phpfw\Config_allsites->__construct(Object(stdClass), Array) 
            #6 J:\awww\www\fwphp\glomodul\blog\index.php(56): B12phpfw\module\blog\Home_ctr->__construct(Object(stdClass)) 
            #7 {main} thrown in J:\awww\www\fwphp\glomodul\post_comment\Tbl_crud.php on line 72

  static public function rr(
    string $dmlrr, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  self::$utldb::get_cursor( //$pp1
         "SELECT $dmlrr FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }


  //in shared cls because is not module dependant :
  static public function rrnext(object $cursor, array $other = []): object
  { 
    $rx = self::$utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }


  // pre-query
  //static public f unction rr_ all($dm, $category_from_url): object  //returns $cursor
  static public function rr_all(
    string $dmlrr, string $qrywhere="'1'='1'", array $binds=[]
       , array $other=[]): object  //returns $cursor
  {
    //////// open cursor (execute-query loop is in view script)
    if ($category_from_url) 
    {
      //3. SQL Query if FILTER BY  C ATEGORY_ FROM_ U R L  is active
      // *******************************************************************
      $cursor = $dm->rr("SELECT * FROM ".self::$tbl." WHERE category = :category_from_url ORDER BY datetime desc"
        ,[ ['placeh'=>':category_from_url', 'valph'=>$category_from_url, 'tip'=>'str'] ]
        , __FILE__ .'() '.', ln '. __LINE__  );
    }
    // default SQL query
    else{
      $cursor = $dm->rr("SELECT * FROM ".self::$tbl."  ORDER BY datetime desc", [], __FILE__ .' '.', ln '. __LINE__) ;
    }

    //$dm::disconnect(); //problem ON LINUX
    return $cursor ;
  }





  static public function get_submitted_cc(): array //return '1'
  {
    // 1. S U B M I T E D  F L D V A L S - P R E / O N  U P D A T E
    $submitted = [
       $_POST["CommenterName"]
      ,$_POST["CommenterEmail"]
      ,$_POST["CommenterThoughts"]
    ] ;
    return $submitted ;
  }

  //  c c(UserInterface $user) {
  static public function cc( object $pp1, array $other=[]): object //return id or 'err_c c'
  {
    $id= $pp1->uriq->id ;
    // 1. S U B M I T E D  F L D V A L S - P R E  I N S E R T
    list( $Name, $Email, $Comment ) = self::get_submitted_cc() ;

    // 2. C C  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($Name)||empty($Email)||empty($Comment)):
        $valid = "All fields must be filled out"; break ;
      case (strlen($Comment)>500): $valid = "Comment length should be less than 500 characters"; break ;
      //default: break;
    }
    if ($valid === '1') {} else {
      $_SESSION["MsgErr"]= $valid ;
      utl::Redirect_to($pp1->read_post."id/{$id}"); //$IdFromURL
      goto fnend ; //exit(0) ;
    } 

    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    // Query to insert comment in DB When everything is fine
    //$CurrentTime = time(); 
                      //$DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    //setlocale(LC_TIME, "en_US");
    $datetime = date('Y-m-d H:i:s', time());
    $flds     = "datetime,name,email,comment,approvedby,status,post_id" ;
    $valsins  = "VALUES(:dateTime,:name,:email,:comment,'Pending','OFF',:id)" ;
    $binds = [
      ['placeh'=>':dateTime', 'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':name',     'valph'=>$Name, 'tip'=>'str']
     ,['placeh'=>':email',    'valph'=>$Email, 'tip'=>'str']
     ,['placeh'=>':comment',  'valph'=>$Comment, 'tip'=>'str']
     ,['placeh'=>':id',       'valph'=>$id, 'tip'=>'int']
    ] ;

    $cursor = self::$utldb::cc( self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__] );

    //var_dump($c ursor_cc_comments);
    //if($cursor){ $_SESSION["MsgSuccess"]="Comment added Successfully";
    //}else { $_SESSION["MsgErr"]="Post Comment adding went wrong (Comment NOT added). Try Again !"; }

    //utl::Redirect_to($pp1->read_post."id/{$id}");




    return((object)['1']);
    fnend:
  }




  //         u p d  c o m m e n t _ s t a t
  static public function upd_comment_stat(object $pp1, array $other=[]): string
  {
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
    //copy of an already created object can be made by cloning it.
    $uriq = $pp1->uriq ;
                              if ('') { echo '<br /><h3>'.__METHOD__ .', line '. __LINE__ .' SAYS:</h3>'
                              .'<br />works if redirect commented U R L  query array ='.'$u riq=' ;
                              if (isset($uriq))
                                { echo '<pre>'; print_r($uriq) ; echo '</pre>'; }
                              else { echo ' u riq arr. not set<br />' ; } 
                              //echo '<br />c l a s s  name of $dm='.get_class($dm);
                              }
                              // outputs :
                              //c l a s s name of $dm=B12phpfw\Home_ctr
                              //c l a s s name of $Db_post_comment=B12phpfw\Db_post_comment

      $flds     = "SET status=:status, approvedby=:admin" ;
      $qrywhere = "WHERE id=:id" ;

      $id   = $uriq->id ;
      $stat = $uriq->stat ;
      $binds = [
        ['placeh'=>':status', 'valph'=>$stat, 'tip'=>'str']
       ,['placeh'=>':admin',  'valph'=>$_SESSION["adminname"], 'tip'=>'str']
       ,['placeh'=>':id',     'valph'=>$id, 'tip'=>'int']
      ] ;

      $cursor = self::$utldb::uu( self::$tbl, $flds, $qrywhere, $binds );

      if ($cursor) {
        if ($stat == 'ON') {$_SESSION["MsgSuccess"]="Comment $id approved ! " ;
        } else {$_SESSION["MsgSuccess"]="Comment $id DisApproved ! " ;}
      }
      else { $_SESSION["MsgErr"]="Update Comment $id Went Wrong (Comment approve failed). Try Again !"; }

                      /*  ?><SCRIPT LANGUAGE="JavaScript">
                         alert( "<?php echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                               .'\\n $dm->pp1[\'comments\']=' 
                               . (isset($dm->pp1->comments)?$dm->pp1->comments:'NOT SET')
                               ; ?>" 
                         ) ;
                         </SCRIPT><?php */ //works if redirect commented
    //$dm->Redirect_to($dm->pp1->comments);
    return '1';
  }



} // e n d  c l s  

