<?php
/**
*  J:\awww\www\fwphp\glomodul\adrs\Tbl_crud.php
*        DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*        (PRE) CRUD class - DAO (Data Access Object) or data mapper
*      This c l a s s is for one module - does know module's CRUD
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/

/**
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)

declare(strict_types=1);

namespace B12phpfw\dbadapter\adrs ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;

use B12phpfw\core\b12phpfw\Interf_Tbl_crud  ;
use B12phpfw\core\b12phpfw\Db_allsites     as utldb ;

use B12phpfw\module\adrs\Home_ctr ;
//use B12phpfw\dbadapter\adrs\Tbl_crud   as utl_adrs ;

// Gateway class - DB adapter - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post_category extends utldb
{
  static protected $tbl = "song";

  // *********************************************** R functions :
  static public function get_cursor( //instead rr
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]): object
  {
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ".self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  //in shared cls because is not module dependant :
  //static public function rrnext(object $cursor ): object { return utldb::rrnext($cursor) ; }
  static public function rrnext(object $cursor): object
  { 
    $rx = utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }

  /*static public function r r(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::r r("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } */

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    //$rcnt = utldb::rrcount($tbl) ;
    //return (int)utl::escp($rcnt) ;
  }


  static public function get_all(array $other=[]): object  //returns $cursor
  {
    $cursor = utldb::get_cursor(
      "Select * from ".self::$tbl." ORDER BY artist", $binds=[], $other) ;
    //utldb::get_cursor($sellst='*', $qrywhere= "'1'='1'", $binds=[], $other) ;

    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  } 

  // pre-query
  /* static public f unction rr_ all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
      // default SQL query
      $cursor =  utldb::get_cursor(
       "SELECT $sellst FROM ". self::$tbl
      ." WHERE $qrywhere ORDER BY title"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  } */


  /* public function rr_last_id(object $dm) {
    return utl::rr_last_id(self::$tbl) ;
  } */





  // *******************************************
  //                   C R E A T E,  D,  U
  // *******************************************

  //dd is jsmsgyn dialog in util.js + dd() in Home_ctr dd() method which calls this method
  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  utldb::dd( $pp1, $other ) ;
    return '' ;
  }



  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
      utl::escp($_POST["artist"]), utl::escp($_POST["track"]), utl::escp($_POST["link"])
    ] ;
    return $submitted ;
  }

  // *********************************************** C functions :
  /*
  * O N - I N S E R T  (P R E - I N S E R T)
  * 
  * called from submit code in view script cre_ row_ frm.php
  *     not via H o m e _ c t r  (also possible if you wish) !
  *
  * public f unction cc
  * returns id or 'err_c c' 
  */
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): object
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }

    // 1. S U B M I T E D  F L D V A L S
      $submitted_cc = self::get_submitted_cc() ;
      list( $artist, $track, $link) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;

    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($link)): //||empty($Name)||empty($password)||empty($Confirmpassword))
        $err = "Link field must be filled out"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->module_url.QS.'i/cc/'); goto fnerr ; // Add row
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }


    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds    = "artist, track, link" ; //names in data source
    $valsins = "VALUES(:artist, :track, :link)" ;
    $binds = [
      ['placeh'=>':artist',   'valph'=>$_POST['artist'], 'tip'=>'str']
     ,['placeh'=>':track',    'valph'=>$_POST['track'],  'tip'=>'str']
     ,['placeh'=>':link',     'valph'=>$_POST['link'],   'tip'=>'str']
    ] ;
    //$last_id1 = utldb::rr_last_id($tbl) ;
    $cursor = utldb::cc(self::$tbl, $flds, $valsins, $binds
                 , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      utl::Redirect_to($pp1->module_url.QS.'i/cc/');
      return((object)['1']);
      fnerr:
      return((object)['0']);
  }



  static public function get_submitted_uu(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
      utl::escp($_POST["artist"]), utl::escp($_POST["track"]), utl::escp($_POST["link"])
      , $_POST["id"]
    ] ;
    return $submitted ;
  }

  // O N - U P D A T E (P R E - U P D A T E)
  //return id or 'err_c c'
  static public function uu( object $pp1, array $other=[]): string // *************** u u (
  {
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
      $get_submitted_uu = self::get_submitted_uu() ;
      list( $artist, $track, $link, $id) = $get_submitted_uu ;
      //$_SESSION["get_submitted_uu"] = $get_submitted_uu ;

    // 2. U U  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($link)): $valid = "Link Cant be empty"; break ;
      //default: break;
    }
    if ($valid === '1') {} else {
      $_SESSION["ErrorMessage"]= $valid ;
      //utl::Redirect_to($pp1->posts);
      utl::Redirect_to($pp1->module_url.QS.'i/rt/');
      goto fnerr ; //exit(0) ;
    }


    // 3. U P D A T E  D B T B L R O W
      // Query to Update Post in DB When everything is fine
      // NOT USED : post='$PostText' I replaced it with mkd file
      $flds     = "SET artist=:artist, track=:track, link=:link" ;
      $qrywhere = "WHERE id=:id" ;
      $binds = [
        ['placeh'=>':artist',  'valph'=>$artist, 'tip'=>'str']
       ,['placeh'=>':track',   'valph'=>$track,  'tip'=>'str']
       ,['placeh'=>':link',    'valph'=>$link,   'tip'=>'str']
       ,['placeh'=>':id',  'valph'=>$id, 'tip'=>'int']
      ] ;

      $cursor = utldb::uu( self::$tbl, $flds, $qrywhere, $binds ); //same for all tbls

      //var_dump($cursor);
      if($cursor){ $_SESSION["SuccessMessage"]="Post Updated Successfully";
      }else { $_SESSION["ErrorMessage"]= "Post Update went wrong. Try Again !"; }

      return('1');
      fnerr:
      return('0');
  }



  // *******************************************
  //             E N D  C R E A T E,  D,  U
  // *******************************************



} // e n d  c l s  T b l_ c r u d
