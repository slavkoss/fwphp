<?php
// J:\awww\www\vendor\b12phpfw\Db_allsites_Intf.php
declare(strict_types=1);

//namespace App\Infrastructure;
namespace B12phpfw\core\b12phpfw ;
//use GuzzleHttp\Exception\GuzzleException;

interface Db_allsites_Intf  //like Oracle package = list of mandatory methods
{
  // This Interface is implemented in shared cls Db_ allsites (enterprise bussiness rules).
  // This is not Interf_Tbl_crud = module (application) bussiness rules.
  // because module contans (many, diferent) bussiness methods.

   static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**') ;
   static public function closeDBConn() ;
   static public function getdbi() ;
   static public function setdo_pgntion($new_val) ;



  // 11111 ******************** R functions :

  static public function get_cursor( //object $pp1 //like Oracle cursor //instead rr
      string $dmlrr, array $binds=[], array $other=[]): object ;

  static public function rrnext(object $cursor, array $other = [] ): object ;

  static public function rrcount(string $tbl, array $other=[]): int ;

  static public function rr_last_id(string $tbl, array $other=[]): int ;
  //static public function rrcnt( string $tbl, array $other=[] ): int ;



  // 22222 ******************** CrUD functions :
  
  // on-insert :
  static public function cc( array $cc_params, array $other=[] ): object ; //CREATE TBL ROW    
  //static public function c c(object $pp1, array $other=[]): object ; //was string
   /*
   //static public function pre_cc_uu(
        array $col_names
      , string &$col_nam_str
      , string &$ccflds_placeh
      , string &$uuflds_placeh
      , array &$binds
      , array $col_bind_types
   ): object ;
   */


   static public function uu( $tbl, $flds, $where, $binds = [] ) ;





// 33333 ******************** enterprise bussiness functions (rules, utilities)

   static public function debugPDO(string $dmlxx, array $binds, array $ph_val_arr): string ;





} // e n d  i n t e r f  I n t e r f _T b l_ c r u d

