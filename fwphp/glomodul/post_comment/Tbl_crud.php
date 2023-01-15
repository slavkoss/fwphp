<?php
declare(strict_types=1);
/**
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
use B12phpfw\module\blog\Home_ctr ;

use B12phpfw\core\b12phpfw\Interf_Tbl_crud ;

use B12phpfw\core\b12phpfw\Db_allsites as utldb ;

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post_comment //extends Db_allsites
{

  static protected $tbl = "comments";


  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  utldb::dd( $pp1, $other ) ;
    return '' ;
  }

  static public function get_cursor( //instead rr
    string $sellst, string $qrywhere='', array $binds=[], array $other=[]): object 
  {
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rr(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    $cursor_rowcnt_post_comments =  utldb::get_cursor(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor_rowcnt_post_comments
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  } 


  //in shared cls because is not module dependant :
  static public function rrnext(object $cursor, array $other = []): object
  { 
    $rx = utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }


  // pre-query
  //static public f unction rr_ all($dm, $category_from_url): object  //returns $cursor
  static public function rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[]
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



  /*static public function rr_count_aproved($post_id, $on_off): int
  {
    if ($on_off == 'ON')      {$where = "post_id=:post_id AND status='$on_off'" ;}
    elseif ($on_off == 'OFF') {$where = "post_id=:post_id AND (status='$on_off' or status < '0')" ;}
    $dml = "SELECT count(*) COUNT_ROWS FROM comments WHERE $where" ;
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '<br />$dml='; print_r($dml) ;
                      echo '<br />:post_id='; print_r($post_id) ;
                    exit(0) ;
                    echo '</pre>'; }
    $cursor = utldb::get_cursor($dml
      , $binds=[ ['placeh'=>':post_id', 'valph'=>$post_id, 'tip'=>'int'] ]
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );

    while ($row = utldb::rrnext($cursor)): {$rcnt = $row ;} endwhile;
    $row_count = $rcnt->COUNT_ROWS ;

    //$dm::disconnect(); //problem ON LINUX
    return (int)$row_count ; 
  } */



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
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "datetime,name,email,comment,approvedby,status,post_id" ;
    $valsins  = "VALUES(:dateTime,:name,:email,:comment,'Pending','OFF',:id)" ;
    $binds = [
      ['placeh'=>':dateTime', 'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':name',     'valph'=>$Name, 'tip'=>'str']
     ,['placeh'=>':email',    'valph'=>$Email, 'tip'=>'str']
     ,['placeh'=>':comment',  'valph'=>$Comment, 'tip'=>'str']
     ,['placeh'=>':id',       'valph'=>$id, 'tip'=>'int']
    ] ;

    $cursor = utldb::cc( self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__] );

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

      $cursor = utldb::uu( self::$tbl, $flds, $qrywhere, $binds );

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

