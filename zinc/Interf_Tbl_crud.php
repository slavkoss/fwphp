<?php
declare(strict_types=1);
/**
*  J:\awww\www\zinc\Interf_Tbl_crud.php (4 hits)
* 9:   static public f unction rr(
* 12:  static public f unction r rnext(object $cursor): object ;  //returns $cursor
* 16:  static public f unction rr_all(
* 23:  static public f unction cc(object $pp1, array $other): string ;
*/

//namespace App\Infrastructure;
namespace B12phpfw\core\zinc ;
//use GuzzleHttp\Exception\GuzzleException;

interface Interf_Tbl_crud
{
  static public function rr(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[]): object ;

  //in shared cls because is not module dependant :
  //static public function rrnext(object $cursor): object ;  //returns $cursor

  static public function rrcnt( //string $sellst, 
    string $tbl, array $other=[]
  ): int ;

  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] 
  ): int ;

  // pre-query - open cursor (execute-query loop is in view script)
  //returns $cursor
  static public function rr_all(
    string $sellst, string $qrywhere="'1'='1'", array $binds=[], array $other=[]
  ): object ;

  // on-insert
  //public f unction c c(object $dm, array $vv): string ; //return id or 'err_cc'
  // in adapter Tbl_ crud are : string $flds, string $qrywhat, array $binds
  static public function cc(object $pp1, array $other): string ;


} // e n d  i n t e r f  I n t e r f _T b l_ c r u d

/*Fatal error: Declaration of B12phpfw\dbadapter\post\Tbl_crud::rr(
     $sellst, $qrywhere, $binds, $caller)
  must be compatible with B12phpfw\core\zinc\Interf_Tbl_crud::rr(
     string $sellst, string $qrywhere, array $binds, string $caller): object
  in J:\awww\www\fwphp\glomodul\post\Tbl_crud.php on line 19
*/
