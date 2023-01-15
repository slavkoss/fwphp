<?php
// J:\awww\www\vendor\b12phpfw\Interf_Tbl_crud.php
declare(strict_types=1);

//namespace App\Infrastructure;
namespace B12phpfw\core\b12phpfw ;
//use GuzzleHttp\Exception\GuzzleException;

interface Interf_Tbl_crud // like Oracle package
{
  // This is Interf_Db_ allsites !!      This is not Interf_Db_ allsites !!
  // In shared cls because are not module dependant :

  // 11111 ******************************** R functions :

  static public function get_cursor( //instead rr
      string $sellst //, string $qrywhere="'1'='1'"
    , array $binds=[], array $other=[]): object ;

  static public function rrnext(object $cursor, array $other = [] ): object ;

  //static public function rrcnt( string $tbl, array $other=[] ): int ;



  // 22222 ******************************* C functions :
  
  // on-insert. In adapter Tbl_ crud are : $flds, $binds...
  //static public function cc(string $tbl, string $flds, string $valsins, array $binds = [], array $other = []): object ; //was string
  static public function cc(object $pp1, array $other=[]): object ; //was string











   static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**') ;
   static public function closeDBConn() ;
   static public function getdbi() ;
   static public function setdo_pgntion($new_val) ;
   static public function rr_last_id($tbl);
   static public function pre_cc_uu(
       array $col_names, string &$col_nam_str
     , string &$ccflds_placeh, string &$uuflds_placeh
     , array &$binds, array $col_bind_types
   ): object ;
   static public function uu( $tbl, $flds, $where, $binds = [] ) ;
   static public function debugPDO(string $dmlxx, array $binds, array $ph_val_arr): string ;




} // e n d  i n t e r f  I n t e r f _T b l_ c r u d

/**
*  J:\awww\www\vendor\b12phpfw\Interf_Tbl_crud.php (4 hits)
* 21:  static public f unction get_ cursor(
* 29:  static public f unction r rnext(object $cursor): object ;  //returns $cursor
* 36:  static public f unction r rcnt( string $tbl, array $other=[] ): int ;
* 39:  stat pub fn r rcount(string $qrywhere='', array $binds=[], array $other=[]): int ;
* 32:  static public f unction c c(object $pp1, array $other=[]): object ; //was string
*/



  /*static public f unction r r(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[]): object ;
    //string $sellst, array $binds=[], array $other=[]): object ; */

 
  //static public function rrcount_module(string $qrywhere='', array $binds=[], array $other=[]): int ;
  //static public function rrcount(string $qrywhere='', array $binds=[], array $other=[]): int ; //deprecated

  // pre-query - open cursor (execute-query loop is in view script)
  //returns $cursor
  /* static public f unction rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]
  ): object ; */
