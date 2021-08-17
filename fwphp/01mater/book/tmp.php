<?php
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): string
  {
                if ('1') {
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