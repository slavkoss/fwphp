<?php
/**
*  J:\awww\www\fwphp\glomodul\adrs\Tbl_crud.php
** Tbl_crud cls is instantiated in index.php after shared_dbadapter_obj which is it's parameter in $pp1
*        DB (PERSISTENT STORAGE) ADAPTER C L A S S, PDO DBI is in Db_ allsites clses
*        (PRE) CRUD class - DAO (Data Access Object) or data mapper
*      This c l a s s is for one module - does know module's CRUD and BUSINESS LOGIC
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not f unctionality !
*/

/**
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
*/

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)

declare(strict_types=1);
namespace B12phpfw\dbadapter\adrs ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;


use B12phpfw\module\adrs\Home_ctr ;



// Gateway class - DB adapter - separate two DBI layers
class Tbl_crud 
// implements Db_allsites_Intf - no because here are business methods which can not be standardized !!
{

  static protected $pp1 ; 
  //Db_allsites_ORA or Db_ allsites for MySql or ... :
  static protected $utldb ; // OBJECT VARIABLE OF (NOT HARD CODED) SHARED DBADAPTER
  
  static protected $tbl = "song"; // adrs module works with only one DB table

  //self is used to access static class variables or methods which are not instatiated (not in memory)
  //this is used to access non-static or object variables or methods (which are in memory)
                  //public function __construct(Db_allsites_Intf $utldb) { //also works
                    //self::$utldb = $utldb;
  public function __construct(object $pp1) { 
    self::$pp1 = $pp1 ;
    if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;
  }


  //in shared cls because is not module dependant :
  static public function rrnext(object $cursor): object
  { 
    $rx = self::$utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  }


  static public function rrcnt( //object $pp1 string $sellst(atement) 
       string $tbl, array $other=[]  ): int
  { 
    //Why not t rait : it does not like static methods :
    // Deprecated (Zastarjelo) : Calling static trait method B12phpfw\core\b12phpfw\Db_allsites::rrcount
    // is deprecated, it should only be called on a CLASS USING THE T RAIT
    $rcnt = self::$utldb::rrcount($tbl) ;
    return (int)($rcnt) ;
    //return (int)utl::escp($rcnt) ; //Argument #1 ($string) must be of type string, int given
  }
  



  static public function get_all(array $other=[]): object  //returns $cursor
  {
    $cursor = self::$utldb::get_cursor(
        "Select * from ".self::$tbl." ORDER BY artist" //, $qrywhere= "'1'=='1'"
      , $binds=[], $other) ;
    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  } 


  static public function get_cursor(
      string $sellst
    , string $qrywhere="'1'='1'"
    , array $binds=[]
    , array $other=[]): object
  {
    $cursor =  self::$utldb::get_cursor(
         "SELECT $sellst FROM ". self::$tbl 
         ." WHERE $qrywhere"
       , $binds
       , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } 



  // *******************************************
  //     CrUD :   C (reate),  U(pd),  D(el)
  // *******************************************

  //dd is jsmsgyn dialog in util.js + dd() in Home_ctr dd() method which calls this method
  static public function dd( object &$pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $pp1->urlqry_parts['tbl'] = self::$tbl ;
               //exit(0) ;
    $cursor =  self::$utldb::dd( $pp1, $other ) ;
    return '' ;
  }



  // *********************************************** C c functions :

  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
      utl::escp($_POST["artist"]), utl::escp($_POST["track"]), utl::escp($_POST["link"])
    ] ;
    return $submitted ;
  }


  static public function cc( object $pp1, array $other=[]): object
  {
    $pp1->stack_trace[]=str_replace('\\','/', __METHOD__ ).', lin='.__LINE__ ;
                if ('' and isset($_POST["submit_add"])) {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                  //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  exit(0);
                }
     self::$pp1 = $pp1 ;
     if (isset($pp1->shared_dbadapter_obj)) self::$utldb = $pp1->shared_dbadapter_obj ;

    
    // 1. S U B M I T E D  F L D V A L S - P R E  and  O N  I N S E R T
      $submitted_cc = self::get_submitted_cc() ;
      //$_SESSION["submitted_cc"] = $submitted_cc ;
      list( $artist, $track, $link) = $submitted_cc ;

    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      //||empty($Name)||empty($password)||empty($Confirmpassword))
      case (empty($link)): $err = "Link field must be filled out"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["MsgErr"]= $err ;
      utl::Redirect_to($pp1->module_url.QS.'i/cc/'); 
      goto fnerr ; // Add row
      //better Redirect_ to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
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
    //$last_id1 = self::$utldb::rr_last_id($tbl) ;

      // =============================================
      // Assign cc_ params
      // =============================================
                              //$pp1 = (array)$pp1 ;
                              //$pp1['cc_params'] = [self::$tbl, $flds, $valsins, $binds] ;
                              //$pp1 = (object)$pp1 ;
                        if ('') {
                          echo '<h3>'. __METHOD__ .', line '. __LINE__ .' said'.'</h3>';
                          //echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                          //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                          echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                                     //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                          //exit(0);
                        }
    $cursor = self::$utldb::cc(
         $cc_params = [self::$tbl, $flds, $valsins, $binds]
       , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$cursor = self::$utldb::cc(self::$tbl, $flds, $valsins, $binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);


    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["MsgErr"]= "Something went wrong (cre admin). Try Again !"; }

      //utl::Redirect_to($pp1->module_url.QS.'i/cc/');
      //goto f nerr ;

      return((object)['1']);
      fnerr:
      return((object)['0']);
  }



  // *********************************************** u u  functions :

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
      $_SESSION["MsgErr"]= $valid ;
      //utl::Redirect_to($pp1->posts);
      utl::Redirect_to($pp1->module_url.QS.'i/rrt/');
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

      $cursor = self::$utldb::uu( self::$tbl, $flds, $qrywhere, $binds ); //same for all tbls

      //var_dump($cursor);
      if($cursor){ $_SESSION["SuccessMessage"]="Post Updated Successfully";
      }else { $_SESSION["MsgErr"]= "Post Update went wrong. Try Again !"; }

      return('1');
      fnerr:
      return('0');
  }



  // *******************************************
  //             E N D  C R E A T E,  D,  U
  // *******************************************



} // e n d  c l s  T b l_ c r u d

