<?php
// J:\awww\www\fwphp\glomodul\z_examples\01_MVC_learn\03mini3fw\Home_ctr.php
// DEFAULT CTR (ONLY ONE IN MODULE), HAS 3 METHODS WHICH  I N C  PAGE VIEW SCRIPT
namespace B12phpfw ;
//use PDO;

class Home_ctr extends Config_allsites
{
  public function __construct($pp1) 
  {
                        //,'$caller'=>$caller IS ALLWAYS i n d e x . p h p
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. BEFORE Config_allsites construct '
                           ,'self::dbi_obj'=>self::$dbi_obj
                           ,'$this->pp1->dbi_obj'=>isset($this->pp1->dbi_obj)?:'NOT SET'
                           ] ) ; }
    parent::__construct($pp1); //add global confs to $pp1 (also d b !!)
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s002. BEFORE call akc'
                           ,'self::dbi_obj'=>self::$dbi_obj
                           ,'$this->uriq'=>isset($this->uriq)?:'NOT SET'
                           ] ) ; }
    $akc = $this->uriq->i ; //=home
    $this->$akc() ; //include(str_replace('|','/', $db->uriq->i.'.php'));
  } // e n d  f n  __ c o n s t r u c t



  /**
         C R U D  M E T H O D S
  */

    private function c()
    {
      //$_POST= [artist] =>  [track] =>  [link] =>  [submit_add_song] => Add row
      $flds     = "artist, track, link" ;
      $what = "VALUES (:artist, :track, :link)" ; //:IdFromURL
      $binds = [
        ['placeh'=>':artist',  'valph'=>$_POST['artist'], 'tip'=>'str'] //$PostArtist
       ,['placeh'=>':track',   'valph'=>$_POST['track'], 'tip'=>'str']
       ,['placeh'=>':link','valph'=>$_POST['link'], 'tip'=>'str']
       //,['placeh'=>':id',   'valph'=>$_POST['id'], 'tip'=>'int']
      ] ;
      $cursor = $this->cc($this,'song',$flds,$what,$binds);

      if ($cursor) {$_SESSION["SuccessMessage"]="Row Deleted Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Deleting Went Wrong. Try Again !"; }
      
      $this->Redirect_to($this->pp1->module_url.QS.'i/cr/') ; //'i/rt/'

    }


    /**
     * AJAX-ACTION: ajax Get Stats
     * TODO documentation
     */
    private function ajaxcountr()  //p ublic f unction ajaxGetStats()
    {
                        //$Song = new Song();
                        //$amount_of_songs = $Song->getAmountOfSongs();
                        //supersimple API would be possible by echoing JSON here
                        //echo $amount_of_songs;
                    if ('') {self::jsmsg('s001ajax. '. __METHOD__, __LINE__
                    , ['$this->uriq'=>$this->uriq, '$instance'=>$instance
                    , '$this->dbobj'=>$this->dbobj ] ) ; }
      echo $this->rrcount('song'); // not $this->dbobj->R_tb... !!!
    }



    private function u()
    {
                    if ('') {self::jsmsg('U BEFORE dbobj '. __METHOD__, __LINE__
                    , ['$this->pp1->dbi_obj'=>$this->pp1->dbi_obj //, 
                    ] ) ; }
      $flds     = "SET artist = :artist, track = :track, link = :link" ;
      $qrywhere = "WHERE id=:id" ; //:IdFromURL
      $binds = [
        ['placeh'=>':artist',  'valph'=>$_POST['artist'], 'tip'=>'str'] //$PostArtist
       ,['placeh'=>':track',   'valph'=>$_POST['track'], 'tip'=>'str']
       ,['placeh'=>':link','valph'=>$_POST['link'], 'tip'=>'str']
       ,['placeh'=>':id',   'valph'=>$_POST['id'], 'tip'=>'int']
      ] ;
      $cursor = $this->uu($this,'song',$flds,$qrywhere,$binds);

      if ($cursor) {$_SESSION["SuccessMessage"]="Row Updated Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Updating Went Wrong. Try Again !"; }

      $this->Redirect_to($this->pp1->module_url.QS.'i/rt/') ; // to  t b l

    }

    private function d()
    {
      // http://dev1:8083/fwphp/glomodul/adrs/?i/d/rt/song/id/37
      //$this->uriq=stdClass Object  [i] => d  [t] => song  [id] => 37
                    if ('') {self::jsmsg('D BEFORE dbobj '. __METHOD__, __LINE__
                    , ['$this->pp1->dbi_obj'=>$this->pp1->dbi_obj //, 
                    ] ) ; }
      $this->dd() ;
      $this->Redirect_to($this->pp1->module_url.QS.'i/rt/') ; //to read_ tbl
    }




  /**
      I N C  P A G E  S C R I P T S
  */

  // C R U D
  private function cr()
  {
    //http://dev1:8083/fwphp/glomodul/adrs
      require $this->pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $this->pp1->module_path . 'cre_row_frm.php';
      require $this->pp1->module_path . 'ftr.php';
  }

  private function rt()
  {
      // D I S P L A Y  T A B L E (was AND R O W C R E FRM)
      require $this->pp1->module_path . 'hdr.php';
      require $this->pp1->module_path . 'read_tbl.php';  
      require $this->pp1->module_path . 'ftr.php';
  }


  private function ur()
  {
           //       R O W U P D  FRM
    //echo 'Method '.__METHOD__ .' SAYS: I &nbsp; i n c l u d e &nbsp; p h p &nbsp;

    //http://dev1:8083/fwphp/glomodul/adrs?i/ur/t/song/id/22  see switch default: above !!
    require $this->pp1->module_path . 'hdr.php';
    require $this->pp1->module_path . 'upd_row_frm.php';  
    require $this->pp1->module_path . 'ftr.php';
  }



  // P A G E S

    public function errmsg($myerrmsg)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s
                   //require $this->pp1->module_path . 'hdr.php'; //or __DIR__
        require $this->pp1->module_path . 'error.php';
        require $this->pp1->module_path . 'ftr.php';
    }

  private function home()
  {
    //http://dev1:8083/fwphp/glomodul/adrs
      require $this->pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $this->pp1->module_path . 'home.php';
      require $this->pp1->module_path . 'ftr.php';
  }

  private function ex1()
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex1/
      require $this->pp1->module_path . 'hdr.php';
      require $this->pp1->module_path . 'example_one.php';
      require $this->pp1->module_path . 'ftr.php';
  }

  private function ex2()
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex2/p1/param1/p2/param2/
    $param1 = $this->uriq->p1 ;
    $param2 = $this->uriq->p2 ;
    require $this->pp1->module_path . 'hdr.php';
    require $this->pp1->module_path . 'example_two.php';
    require $this->pp1->module_path . 'ftr.php';
  }

} // e n d  c l s  C onfig_ m ini3


/*
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .'Coding step cs03. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '<b>$_POST</b>='; print_r($_POST); 
                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<br /><b>$this->pp1</b>='; print_r($this->pp1);
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 
                  echo '<br /><b>uri_arr is exploded string REQUEST_URI '.$_SERVER['REQUEST_URI'].' (on QS=?)</b>'
                  .'<br />0 is $module_relpath,'
                  .'<br />1 is $uri_qrystring = key-value pairs ee = url parameters after QS.'
                  .'  <br />$this->pp1->uri_arr='; print_r($this->pp1->uri_arr);
                  echo '<br /><b>exploded $uri_qrystring (on /) is'
                  .'<br />$this->pp1->uri_qrystring_arr</b>=';
                      print_r($this->pp1->uri_qrystring_arr);
                  //echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                  echo '<br /><b>$this->uriq</b>='; print_r($this->uriq);
                  echo '</pre>'; 
                  }
*/


    /*switch (true) 
    { 
      case isset($this->uriq->c) : //and $this->uriq->c == 'home' and count( (array)$this->uriq )  == 1
        //       call clsakcmethod  $a k c  in cls  $c t r :
        //http://dev1:8083/fwphp/glomodul/adrs?c/tbl/m/l/ - see top toolbar href
        $nsctr = $this->pp1->vendor_namesp_prefix . '\\' . ucfirst($this->uriq->c) . '_ctr' ;
        $akc = $this->uriq->m ;
        $obj = new $nsctr($this, $this->pp1) ; //$this is $db in index.php !!
        $obj->$akc() ; 
        break;
        
      default: 
        // i means call ctrakcmethod of this cls  (H o m e) which includes view script or does tblrowCRUD. Eg http://dev1:8083/fwphp/glomodul/adrs/?i/d/t/song/id/4 = d e l or http://dev1:8083/fwphp/glomodul/adrs/?i/ur/t/song/id/4 = u p d
        $akc = $this->uriq->i ; //=home
        $this->$akc() ;
        break;
              //include(str_replace('|','/', $db->uriq->i.'.php'));  break;
    } */

      /* case $this->uriq->i == 'home' and count( (array)$this->uriq )  == 1 :
        //NO CTR,  NO AKC, NO AKCPARAMS IN URL
        $akc = 'index' ;// $db->uriq->a ;
        $this->$akc($this->pp1) ; 
               //$$ctr->{$akc}() ; // $$ctr contains "nameofobjvar", so $$ctr=$obj
        break; */

        //$ctr = $vendor_namesp_prefix.'\\Home_ctr_mini3' ; // must be mamespaced 
                     //$ctr = 'Home_ctr_mini3'; // must be mamespaced 
               //$akc = $this->action ;     // Call clsakcmethod

        //$obj = new $ctr ; // nsctrcls
        //$obj->$akc($this->pp1) ; // $this->relpath_requested_arr , $this->akcpar1idx