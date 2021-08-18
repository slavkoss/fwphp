<?php
/**
 * J:\awww\www\fwphp\01mater\book\Tbl_crud.php
 *        DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
 *        (PRE) CRUD class - D A O (Data Access Object) or data mapper
 * (PRE) CRUD means pre-Query, pre-insert and on-insert...
 * This c l a s s is for one module eg waybill or invoice
 * Other such scripts should be for csv persistent storage, web services...
 *
 * DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
 * MVC is code separation not functionality !
 */


declare(strict_types=1);

//vendor_namesp_prefix \ processing (behavior) \ clsdir (POSITIONAL part of ns, CAREFULLY!)
namespace B12phpfw\dbadapter\book ;

use B12phpfw\core\b12phpfw\Config_allsites as utl ;
use B12phpfw\core\b12phpfw\Interf_Tbl_crud ;
use B12phpfw\core\b12phpfw\Db_allsites as utldb ;

use B12phpfw\module\book\Home_ctr ;
//use B12phpfw\dbadapter\book\Tbl_crud   as utl_module ;

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post_category extends Db_allsites
{

  static protected $tbl = 'books';
                         //static public function col_ names() : array { ... or :

  static public $col_names = 
  ['title','author','isbn','publisher','year','summary']; 
  static public $col_bind_types = 
  ['str' , 'str',    'str', 'str',     'str', 'str']; //int

  static public    $row = []; //eg utl::escp($_POST["title"]) to $title, $author...
  static public    $flds          = '';
  static public    $ccflds_placeh = '';
  static public    $uuflds_placeh = '';
  static public    $binds         = [];


  static public function get_cursor( // returns  cursor, not rr_byid !
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rrnext(object $cursor ): object
  { 
    return utldb::rrnext($cursor) ;
  }

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    $cursor =  utldb::get_cursor(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  } 


  static public function rr_byid( int $id, array $other=[] ): object
  { 
    $cursor =  utldb::get_cursor("SELECT * FROM ". self::$tbl." WHERE id=:id"
     , $binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
     , $other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $r = utldb::rrnext($cursor) ;
    if (is_object($r)) {
      // here esc_row !
    return $r ;
    }
    else return ((object)$r);
  }
  
  static public function rr_suppliers(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::get_cursor("SELECT $sellst FROM ". 'authors' ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } 





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


  /*
  * O N - I N S E R T  (P R E - I N S E R T)
  * 
  * called from submit code in view script cre_ row_ frm.php
  *     not via H o m e _ c t r  (also possible if you wish) !
  *
  * public function c c
  * returns id or 'e r r_c c' 
  */
  static public function cc( // *************** c c (
     object $pp1, array $other=[]) : object //was string  void
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }
    //        1. S U B M I T E D  F L D V A L S - P R E  I N S E R T
    $r = utl::row_flds_binds(
       self::$col_names, self::$flds, self::$ccflds_placeh, self::$uuflds_placeh
     , self::$binds, self::$col_bind_types
    ) ; //obj. for view fields 

    //        2. C C  V A L I D A T I O N - P R E  I N S
    $err = [] ;
    //                non-empty
    switch (true) {
      //case (!array_key_exists($_POST['author'], $authors))  -  FK 
      case (!$r->author):          $err[] = 'Please select author for the book'; //break ;
      case (empty($r->title)):     $err[] = "Please enter Title"; //break ;
      case (empty($r->publisher)): $err[] = "Please enter Publisher"; //break ;
      case (empty($r->summary)):   $err[] = "Please enter Summary field"; //break ;
    //                length 
      //if(!preg_match('~^\d{4}$~', $_POST['year'])) {
      //See about integers : gettype in J:\awww\www\fwphp\code_snippets.php
      //or is_int($year) == false
      case ( mb_strlen($r->year) != 4 ): 
         $err[] = "Year should be 4 digits, now is ". count($r->year); //break ;
      //if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
      case ( mb_strlen($r->isbn) > 20 ): 
         $err[] = "ISBN should be max 20 characters, now is ". count($r->isbn); //break ;


      default: break;
    }
    
    //if ($err > '') {
    if(count($err) > 0) {
      $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->cc_frm); goto fnerr ; // Add row
      exit(0) ;
    }


    //      3. C R E A T E  D B T B L R O W - O N  I N S E R T
    //$last_id1 = utldb::rr_last_id($tbl) ;
    //Same for all tbls, does : $dmlcc = "INSERT INTO $tbl($flds) $valsins";
    $cursor = utldb::cc(self::$tbl, self::$flds, 'VALUES('. self::$ccflds_placeh .')'
       , self::$binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      //utl::Redirect_to($pp1->module_url.QS.'i/cc_frm/');
      utl::Redirect_to($pp1->cc_frm);
      return($r); // it is r_ posted !!

      fnerr:
      return(NULL);
  } //e n d  f n  c c






  // O N - U P D A T E (P R E - U P D A T E)
  //return id or 'err_c c'
  static public function uu( // *************** u u (
     object $pp1, array $other=[]): string
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  exit(0); // without this redirect renders another page !!!
                }

    //      1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    //obj. for view fields  $ r = (object)self::$r ow ;
    $pp1->uriq->submit_uu = $_POST['submit_uu'] ?? '' ;
    $r = $pp1->uriq->posted_r = utl::row_flds_binds(
       self::$col_names, self::$flds, self::$ccflds_placeh, self::$uuflds_placeh
     , self::$binds, self::$col_bind_types
    ) ; 
    //SEE ABOUT INTEGERS : gettype in J:\awww\www\fwphp\code_snippets.php
    $id = (int)$_POST['id'] ?? '' ;
    self::$binds[] = ['placeh'=>':'.'id','valph'=>$id,'tip'=>'int'];


    //         2. U U  V A L I D A T I O N - P R E  U P D A T E
    $err = [] ;
    //     NON-EMPTY (switch without break is not working when first not true)
               //case (!array_key_exists($_POST['author'], $authors))  -  FK 
    if (!$r->author)      $err[] = '<b>Please select author for the book</b>';
    if (empty($id))       $err[] = '<b>id for update is empty</b>'; 
    if (empty($r->title)) $err[] = '<b>Please enter Title</b>';
    if (empty($r->publisher)) $err[] = '<b>Please enter Publisher</b>';
    if (empty($r->summary)) $err[] = '<b>Please enter Summary field</b>';
    //     LENGTH 
    //if(!preg_match('~^\d{4}$~', $_POST['year'])) {   //or is_int($year) == false
    if ( mb_strlen($r->year) != 4 ) 
         $err[] = "<b>Year should be 4 digits, now is ". count($r->year) .'</b>'; 
    //if(!preg_match('~^\d{10}$~', $_POST['isbn'])) {
    if ( mb_strlen($r->isbn) > 20 )
         $err[] = "<b>ISBN should be max 20 characters, now is ". count($r->isbn) .'</b>'; 

                        if ('') {
                        echo '<h3>'.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                        echo '<pre>'; echo '<b>$_POST</b>='; print_r($_POST);
                        echo '<pre>$id='; var_dump($id) ; echo '</pre>';
                        echo '<pre>$r='; var_dump($r) ; echo '</pre>';
                        echo '<pre>$err='; print_r($err) ; echo '</pre>';
                        echo '<pre><b>$pp1</b>='; print_r($pp1);
                     //echo '<pre>'; echo '<b>$is_submited_frm</b>='; print_r($is_submited_frm);
                        //echo '<pre>$r_posted='; print_r($r_posted) ; echo '</pre>';
                        exit(0); // without this redirect renders another page !!!
                        }


    //if ($err > '') {
    if(count($err) > 0) {
      $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->uu_frm); goto fnerr ; // Add row
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }



    //       3. U P D A T E  D B T B L R O W - O N  U P D A T E
    //$cursor = utldb::cc(self::$tbl, self::$flds, 'VALUES('. self::$ccflds_placeh .')'
    //   , self::$binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

    //$qrywhere = 'WHERE i d=:i d' ;
    //Same for all tbls, does : $dmluu = "UPDATE $tbl $flds $where"; :
    $cursor = utldb::uu( self::$tbl, 'SET '. self::$uuflds_placeh, 'WHERE id=:id' //$qrywhere
         , self::$binds, $other ); 

    //var_dump($cursor);
    if($cursor){ $_SESSION['SuccessMessage']='Updated Successfully';
    }else { $_SESSION['ErrorMessage']= 'Update went wrong. Try Again !'; }

      utl::Redirect_to($pp1->home_url); 
      return($r); // it is r_ posted !!

      fnerr:
      return(NULL);
  } //e n d  f n  u u


// not used :

  // public function rr_last_id(object $dm) {
  //  return utl::rr_last_id(self::$tbl) ;
  //} 



  // *******************************************
  //             E N D  C R E A T E,  D,  U
  // *******************************************
} // e n d  c l s  T b l_ c r u d

