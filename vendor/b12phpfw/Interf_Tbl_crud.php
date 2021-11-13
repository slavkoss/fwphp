<?php
// J:\awww\www\vendor\b12phpfw\Interf_Tbl_crud.php
declare(strict_types=1);
/**
*  J:\awww\www\vendor\b12phpfw\Interf_Tbl_crud.php (4 hits)
* 21:  static public f unction get_ cursor(
* 29:  static public f unction r rnext(object $cursor): object ;  //returns $cursor
* 32:  static public f unction c c(object $pp1, array $other=[]): object ; //was string
* 36:  static public f unction r rcnt( string $tbl, array $other=[] ): int ;
* 39:  stat pub fn r rcount(string $qrywhere='', array $binds=[], array $other=[]): int ;
*/

//namespace App\Infrastructure;
namespace B12phpfw\core\b12phpfw ;
//use GuzzleHttp\Exception\GuzzleException;

interface Interf_Tbl_crud
{
  // This is not Interf_Db_ allsites !!
  // *********************************************** R functions :
  static public function get_cursor( //instead rr
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]): object ;

  /*static public f unction r r(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[]): object ;
    //string $sellst, array $binds=[], array $other=[]): object ; */

  //in shared cls because is not module dependant :
  static public function rrnext(object $cursor ): object ;

  //string $sellst, 
  static public function rrcnt( string $tbl, array $other=[] ): int ;

  //string $sellst, 
  static public function rrcount(string $qrywhere='', array $binds=[], array $other=[]): int ;

  // *********************************************** C functions :
  // on-insert. In adapter Tbl_ crud are : $flds, $binds...
  static public function cc(object $pp1, array $other=[]): object ; //was string


  // pre-query - open cursor (execute-query loop is in view script)
  //returns $cursor
  /* static public f unction rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]
  ): object ; */



} // e n d  i n t e r f  I n t e r f _T b l_ c r u d
