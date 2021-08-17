<?php
// J:\awww\www\fwphp\01mater\book\model_fns.php
declare(strict_types=1);
namespace B12phpfw\module\book ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;

switch (true):
case ($model_fns_akc === 'escp_all') :
      //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      $r->id           = (int)utl::escp($r->id) ;
      $r->author       = (int)utl::escp($r->author) ;
      $r->coverMime    = utl::escp($r->coverMime) ;
      $r->coverimgname = utl::escp($r->coverimgname) ;
      $r->title        = utl::escp($r->title) ;
      $r->isbn         = utl::escp($r->isbn) ;
      $r->publisher    = utl::escp($r->publisher) ;
      $r->year         = utl::escp($r->year) ;
      $r->summary      = utl::escp($r->summary) ;
      $r->copies       = utl::escp($r->copies) ;
  break ;
default: break ;
endswitch ;
