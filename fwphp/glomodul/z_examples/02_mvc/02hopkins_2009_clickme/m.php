<?php
namespace B12phpfw\clickmeModule ;

//use B12phpfw\L1hopkins_2009_clickme\nothing;

class m
{
  public $data;

  public function __construct(){
    $this->data = (object)
    [
        'lnk_txt'  => 'Click here '

      , 'txtdata' => __FILE__ .' SAYS :<br /> Callum Hopkins said :  "C updates M / V pulls data (DI) from M". v comunicates with m, can also with c. Ee v is Dependent of Injected m (possible v DofI c).
      
      <br /><b>DATA FLOW STEP 1 (in m): m SAYS: Click here - v pulls this $m->data using DI m to itself</b>
      <br />URL of this page (relative to web server doc root) is : ' . $_SERVER['REQUEST_URI']

    ] ;
  }
}