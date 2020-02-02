<?php
namespace B12phpfw\clickmeModule ;

//use B12phpfw\L1hopkins_2009_clickme\nothing;

class c
{
  /*
   c code STEP 2. Clickme example added functionality to the controller, thereby adding INTERACTIVITY to the app. 
  */
  private $m;

  public function __construct(m $m){
    $this->m = $m;
  }

  public function clicked() {
    $this->m->data = (object)
    [   'lnk_txt' => 'CLICK ME AGAIN '
      , 'txtdata' => '- DATA FLOW STEP 2: ctr fn c.clicked() has updated mdl $data based on url get parameter "action" (which is ctrakcmethod name) and SAYS :<br />  CLICK ME AGAIN. <br />URL for this page is :  http://dev1:8083/aplw/tests/L1hopkins_2009_clickme/?action=clicked'
    ] ;
  }
 
  
  /*
   // Uncoment code below (comment code above)
   // to se module output WITHOUT USER INTERACTIONS
   c code STEP 1. Hello World example No any Controller-specific functionality if we don\'t have any USER INTERACTIONS defined with our app - VIEW HOLDS ALL OF THE FUNCTIONALITY as the example is purely for display purposes:
   
  //private $m; //NOT NEEDED IF NO USER INTERACTIONS

  public function __construct($m) {
      //NOT NEEDED IF NO USER INTERACTIONS :
      //$this->m = $m; //Dependency Injection
  }
  */
}
