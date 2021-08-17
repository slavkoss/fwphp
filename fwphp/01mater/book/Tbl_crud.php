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

  static public function is_submited(): void {
    $_SESSION['submit_cc'] = $_POST['submit_cc'] ?? '' ;
    $_SESSION['submit_uu'] = $_POST['submit_uu'] ?? '' ;
  }
  
  static public $col_names = 
  ['title','author','isbn','publisher','year','summary']; static protected $col_bind_types = 
  ['str' , 'str',    'str', 'str',     'str', 'str']; //int


  static public $row = []; //eg utl::escp($_POST["title"]) to $title, $author...
  static protected $flds        = ''; //eg title, author...
  static protected $flds_placeh = ''; //eg :title, :author...
  static protected $binds       = [];

  static public function row_flds_binds(): void 
  { 
    // p r e  i n s  o r  u p d     see **1 b i n d s  at end this script
    /**
     * OBJECT RELATIONAL MAPPING (ORM) is the technique of accessing a relational DB 
     * using an object-oriented programming LANGUAGE. 
     * ORM is a way to manage DB data by "mapping" DB tables rows to classes and c. instances.
     * ACTIVE RECORD (AR) is one of such ORMs.
     *
     * The big difference between AR style and the DATA MAPPER (DM) style is :
     * DM completely separates your domain (bussiness logic) 
     * from persistence layer (data source eg DB, csv...). 
     *
     * The big benefit of DM pattern is, your domain objects (DO) code don't need to know anything
     * about how DO are stored in data source.
     */
    $ii=0; foreach (self::$col_names as $cname) { //or ($arr as &$value)
      //$$cname = utl::escp($_POST[$cname]) ;
      $col_tmp = $_POST[$cname] ?? '' ;
      $col_value = utl::escp($col_tmp) ;
      // => $col_value makes $r=stdClass Object ([0] => Array([title] => ) [01 =>...
      self::$row[$cname] = $col_value ;  //self::$row[] = [$cname => $col_value] ;
      if ($ii==0) { 
         self::$flds        = $cname ; 
         self::$flds_placeh = ':'. $cname ; // placeholder, value, type :
         self::$binds[]     =
         ['placeh'=>':'. $cname,'valph'=>$col_value,'tip'=>self::$col_bind_types[0]];
      } else { 
         self::$flds        .= ', '. $cname ; 
         self::$flds_placeh .= ', '. ':'. $cname ; // placeholder, value, type :
         self::$binds[]      =
         ['placeh'=>':'. $cname,'valph'=>$col_value,'tip'=>self::$col_bind_types[$ii]];
      }
      $ii++ ;
    } unset($cname); // break the reference with the last element
                 //echo '<pre>self::$row='; print_r(self::$row) ; echo '</pre>';
  }



  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    $cursor_rowcnt_post_comments =  utldb::rr(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor_rowcnt_post_comments
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    return (int)$rcnt ;
  } 

  static public function rr(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::rr("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  
  static public function rr_suppliers(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::rr("SELECT $sellst FROM ". 'authors' ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  } 

  /*
  static public function rr_supplier_byid( int $id, array $other=[] ): object
  {
    $cursor =  utldb::rr("SELECT * FROM ".'authors'." WHERE id=:id"
     , $binds=[ ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int'] ]
     , $other=['caller2' => __FILE__ .' '.', ln '. __LINE__ , 'caller1' => $other['caller'] ]
    ) ;
    $rx = utldb::rrnext($cursor) ;
    if (is_object($rx)) return $rx ; else return ((object)$rx);
  } */



// not used :


  // pre-query
  static public function rr_all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
      // default SQL query
      $cursor =  utldb::rr("SELECT $sellst FROM ". self::$tbl
      ." WHERE $qrywhere ORDER BY title"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  }


  // public function rr_last_id(object $dm) {
  //  return utl::rr_last_id(self::$tbl) ;
  //} 





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
  * public function cc
  * returns id or 'err_c c' 
  */
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): string
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }
    // 1. S U B M I T E D  F L D V A L S
    self::row_flds_binds() ; // p r e  i n s


    //                  2. C C  V A L I D A T I O N
    $err = [] ;
    $r = (object)self::$row ;
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
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }


    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    //$last_id1 = utldb::rr_last_id($tbl) ;
    $cursor = utldb::cc(self::$tbl, self::$flds, 'VALUES('. self::$flds_placeh .')'
       , self::$binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      utl::Redirect_to($pp1->module_url.QS.'i/cc_frm/');
      return('1');

      fnerr:
      return('0');
  }






  // O N - U P D A T E (P R E - U P D A T E)
  //return id or 'err_c c'
  static public function uu( // *************** u u (
     object $pp1, array $other=[]): string
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  //echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
    self::row_flds_binds() ; // p r e  i n s

    // 2.             U U  V A L I D A T I O N
    $err = [] ;
    $r = (object)self::$row ;
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
      utl::Redirect_to($pp1->uu_frm); goto fnerr ; // Add row
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }



    // 3. U P D A T E  D B T B L R O W
    $cursor = utldb::cc(self::$tbl, self::$flds, 'VALUES('. self::$flds_placeh .')'
       , self::$binds, $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);

      utl::Redirect_to($pp1->module_url.QS.'i/uu_frm/');
      return('1');

      fnerr:
      return('0');
  }



  // *******************************************
  //             E N D  C R E A T E,  D,  U
  // *******************************************
} // e n d  c l s  T b l_ c r u d



  /* static public function get_submitted(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
        utl::escp($_POST["title"]), utl::escp($_POST["author"]), utl::escp($_POST["isbn"])
      , utl::escp($_POST["publisher"]), utl::escp($_POST["year"]), utl::escp($_POST["summary"])
    ] ;
    return $submitted ;
  } */



/*
***** Fatal error thrown when read by nonexistent id *****
Uncaught Error: Call to undefined method stdClass::fetch() in J:\awww\www\b12phpfw\Db_allsites.php:200 
Stack trace: 
#0 J:\awww\www\fwphp\01mater\book\home.php(61): B12phpfw\core\b12phpfw\utldb::rrnext(Object(stdClass)) 
#1 J:\awww\www\fwphp\01mater\book\Home_ctr.php(103): require('J:\\awww\\www\\fwp...') ee require $pp1->module_path . 'home.php';
#2 J:\awww\www\fwphp\01mater\book\Home_ctr.php(79): B12phpfw\module\book\Home_ctr->home(Object(stdClass)) 
#3 J:\awww\www\b12phpfw\Config_allsites.php(288): B12phpfw\module\book\Home_ctr->call_module_method('home', Object(stdClass)) 
#4 J:\awww\www\fwphp\01mater\book\Home_ctr.php(59): B12phpfw\core\b12phpfw\Config_allsites->__construct(Object(stdClass), Array) 
#5 J:\awww\www\fwphp\01mater\book\index.php(49): B12phpfw\module\book\Home_ctr->__construct(Object(stdClass)) 
#6 {main} 
thrown in J:\awww\www\b12phpfw\Db_allsites.php on line 200
*/


//**1 b i n d s 


    //$col_ names      = self::col_ names() ;
    //$col_ bind_ types = self::col_ bind_ types() ;
    //$flds    = "title, author, isbn, publisher, year, summary" ; //names in data source
    //$v alsins = "VALUES(:title, :author, :isbn, :publisher, :year, :summary)" ;
    /*$binds = [
      ['placeh'=>':title',   'valph'=>$_POST['title'],  'tip'=>'str']
     ,['placeh'=>':author',  'valph'=>$_POST['author'], 'tip'=>'str']
     ,['placeh'=>':isbn',    'valph'=>$_POST['isbn'],   'tip'=>'str']
     ,['placeh'=>':publisher','valph'=>$_POST['publisher'], 'tip'=>'str']
     ,['placeh'=>':year',    'valph'=>$_POST['year'],   'tip'=>'int']
     ,['placeh'=>':summary', 'valph'=>$_POST['summary'],'tip'=>'str']
    ] ; */


    // 1. S U B M I T E D  F L D V A L S
    //self::row_flds_binds() ; // p r e  i n s
                    /* $submitted = self::get_submitted() ;
                    list( $title, $author, $isbn, $publisher, $year, $summary ) = $submitted ;
                    $_SESSION["submitted"] = $submitted ; */