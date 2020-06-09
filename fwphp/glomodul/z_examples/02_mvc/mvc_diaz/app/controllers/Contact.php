<?php


class Contact {

  public function index(){
      //echo "Contacting webaster ";
      echo __METHOD__ .' echo-ed t h i s &nbsp;s t r i n g' ;
  }


  public function message($prms){
    //echo "Messaging the user";
    echo '<h3>'. __METHOD__ 
      .' called so: $ctrobj->$mtd($prms), echo-ed t h i s &nbsp;s t r i n g &nbsp; '
      . '</h3>';
    echo '<pre>$prms='; print_r($prms); echo '</pre>'; //exit(0);
    echo '<br />$prms[0]='.$prms[0] ;
    echo '<br />$prms[1]='.$prms[1] ;
  }
}
