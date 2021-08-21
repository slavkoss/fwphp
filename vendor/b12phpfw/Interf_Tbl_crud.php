<?php
declare(strict_types=1);
/**
*  J:\awww\www\b12phpfw\Interf_Tbl_crud.php (4 hits)
* 9:   static public f unction r r(
* 12:  static public f unction r rnext(object $cursor): object ;  //returns $cursor
* 16:  static public f unction r r_all(
* 23:  static public f unction c c(object $pp1, array $other): string ;
*/

//namespace App\Infrastructure;
namespace B12phpfw\core\b12phpfw ;
//use GuzzleHttp\Exception\GuzzleException;

interface Interf_Tbl_crud
{
  // This is not Interf_Db_allsites !!

  // on-insert. In adapter Tbl_ crud are : $flds, $binds...
  static public function cc(object $pp1, array $other=[]): object ; //was string

  static public function get_cursor(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[]): object ;

  //in shared cls because is not module dependant :
  static public function rrnext(object $cursor ): object ;


  static public function rrcnt( //string $sellst, 
    string $tbl, array $other=[]
  ): int ;

  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] 
  ): int ;

  // pre-query - open cursor (execute-query loop is in view script)
  //returns $cursor
  /* static public function rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]
  ): object ; */


} // e n d  i n t e r f  I n t e r f _T b l_ c r u d
