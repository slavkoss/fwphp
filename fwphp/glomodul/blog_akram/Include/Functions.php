<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php"); 


function Redirect_to($New_Location) {
    header("Location:".$New_Location);
  exit;
}



function get_cursor($dml, $crud='rr') {
  global $conn ;
  $cursor=$conn->query($dml) ;
                      //$ExecuteApproved=mysql_query($QueryApproved);
  if ($crud=='rr') $cursor->execute();
                      //$RowsApproved=mysql_fetch_array($ExecuteApproved);
                      //$RowsApproved=$QueryApproved->fetch(PDO::FETCH_ASSOC);
  return($cursor) ;
}


function escp($string='') //ESCAPING OUTPUT and input
{
  // filter input - secure_ input
  //prevent XSS attacks by ESCAPING OUTPUT. XSS = cross-site scripting attack
  // - XSS attacks hacker injects malicious client-side code into output of your page
  $data = trim($string);
  $data = stripslashes($data);
  //scalpel - recommended : ONLY encodes a small set of the most problematic chars :
  return htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); //or htmlspecialchars($data);
  // hammer - can cause display problems : encode ANY char that has an HTML entity equivalent
  //return h tmlentities($string, ENT_QUOTES, 'UTF-8');
}


function Login_Attempt($Username,$Password){
  $dml = "SELECT * FROM registration WHERE username='$Username' AND password='$Password'" ;
                             echo '<h3>'. $dml .'</h3>';
  $Query=get_cursor($dml);
  if($admin=$Query->fetch(PDO::FETCH_ASSOC)){
    return $admin;
  }else{
    return null;
  }
}



function Login(){
  if(isset($_SESSION["User_Id"])){
    return true;
  }
}
function Confirm_Login(){
  if(!Login()){
    $_SESSION["ErrorMessage"]="Login Required ! ";
    Redirect_to("Login.php");
  }  
}




      /**
      *  RENAME  R O W  C O L U M N S  TO LOWERCASE FOR ORACLE
      */
    function rlows(array $r) //all row fld names lowercase
    {
                          if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' said:</h3>';
                          echo '<pre>';
                          echo '<br />$r='; print_r($r) ; 
                          //echo '<br />$key='; print_r($key) ; 
                          //echo '<br />$val='; print_r($val) ; 
                          echo '<br />'.'DBI=' . DBI ;
                          echo '</pre>';
                          }
      $rlows = $r ; 
      if (DBI==='oracle') {
        
        foreach ($r as $key => $val) {
          switch (true) {
                                  //case $key == 'DATETIM' : //datetime is reserved word in Oracle DB
                                  //  $rlows['datetim'] = $val ;
                                  //  break;
                                  //case is_numeric($val) :
                                  //  $rlows[$key] = $val ;
                                  //  break;
            default:
              $rlows[strtolower($key)] = $val;
              break;
          }
        }
                              if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' said:</h3>';
                              echo '<pre>';
                              echo '<br />(object)$rlows='; print_r((object)$rlows) ; 
                              echo '</pre>';
                              }
      }
      return $rlows;
    }


  function jsmsg($msg) 
  {
      ?><SCRIPT LANGUAGE="JavaScript">
          alert( "<?php

            foreach($msg as $k=>$v): {
              echo "\\n $k=" . 
              str_replace("{","\\n{", str_replace("}","\\n}"
                      , str_replace(",","\\n   ,",
              str_replace('\\','/',   str_replace('&quot;',' '
                ,htmlspecialchars(json_encode((array)$v), ENT_QUOTES,'UTF-8')
              )) ."\\n"
                            )
                       ))

              ;

            } endforeach ;

              ?>" ) ;
      </SCRIPT><?php
  }


  function jsmsgyn($p_todo, $p_url) 
  {
    ?><SCRIPT LANGUAGE="JavaScript">
    var ret;
    var yes = confirm(<?=$p_todo?>);
    if (yes == true) { 
       ret = '1';
       if (p_url) { location.href=<?=$p_url?>; }
    } else { ret = '0'; }
    //The button you pressed is displayed in the result window.
    //document.getElementById(demo).innerHTML = ret;
    //return ret ;
    </SCRIPT><?php
  }



/**
*             P A G I N A T O R
*          Creates navigation bar
*/
//$pgordno_from_url     // requested  p a g e  no
// nr.records in table
// nr.records in table block to display
//public static function get_pgnnav($urlqry_parts, $r tbl = 0, $m td_to_inc_view='i/home/', $r blk=5) 
function get_pgnnav($pgordno_from_url, $rtbl = 0, $mtd_to_inc_view='index.php', $rblk=5) 
{
                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$urlqry_ parts ='; print_r($pgordno_from_url) ;
                      echo '</pre>';
                      exit(0) ;
                    }
  $qs = '?'; //QS
  $total_pages = ceil($rtbl / $rblk);


  //     ~ 1. P A G I N A T I O N  V A R I A B L E S ~
  /*
  $_SESSION['filter_tbl']['pgordno_from_url']  = $pgordno_from_url ;
                      //if (isset($urlqry_parts[3])) { //was $urlqry_parts->p ;
                      //  $_ SESSION['filter_tbl']['pgordno_from_url']  = $urlqry_parts[3] ;
                      //} else {$_ SESSION['filter_tbl']['pgordno_from_url']  = 1 ;}

  $pgordno_from_url = $_SESSION['filter_tbl']['pgordno_from_url'] ;
  */
      //$show_all_r = isset($u riq->pgn) and $u riq->pgn == 'ALL' ? '1' : '' ;
      //if($show_all_r){ $first_rinblock = 0; } else
        if($pgordno_from_url < 2){ $first_rinblock = 1; } 
        else{$first_rinblock = ($pgordno_from_url * $rblk) - $rblk + 1; }

      //if($show_all_r){ $l ast_ r inb lock  = $rtbl ; } else
         $last_rinblock  = $first_rinblock + $rblk - 1 ;
         if ($last_rinblock > $rtbl) $last_rinblock  = $rtbl ;



   //     ~ 2. N A V B A R  P G N  L I N K S  ~
   // eg  $req_uri  is /zbig/04knjige/...paginator_n avbar_no_rows.php?p/15/i/home
   //     $_SERVER["PHP_SELF"] is $req_uri without ?p/15/i/home

  // Link to first page                               11111
  $urlqry_pgn = $mtd_to_inc_view . $qs .'p=1' ;
                            //$urlqry_ pgn = $q s . $mtd_to_inc_view . 'p/1' ;
  $navbar = '<nav><ul class="pagination pull-left pagination-lg">'
      ."<li> <a class='button' href='$urlqry_pgn'>&lt;&lt;</a></li>";
                      //$nav bar = "<div>" ." <a class='button' href='$urlqry_pgn'>&lt;&lt;</a>";
      
  // Link to prev page                             -11111
  $urlqry_pgn = $mtd_to_inc_view . $qs .'p='
                            //$urlqry_ pgn = $qs . $mtd_to_inc_view . 'p/'
      . (($pgordno_from_url > 1) ? $pgordno_from_url - 1 : $pgordno_from_url) ;
  $navbar .= "<li> <a class='button' href=$urlqry_pgn >&nbsp;&lt;&nbsp;</a></li>";

  // Link to pages between first and  l a s t  page
  for ($pg=1; $pg<=$total_pages; $pg++) {   // 11111...l a s t

        $fmt_tmp1=''; $fmt_tmp2='';
        // currpg is italic
        if ($pg==$pgordno_from_url) {$fmt_tmp1='<b><i>*'; $fmt_tmp2='</i></b>';}

        $urlqry_pgn = $mtd_to_inc_view . $qs .'p='. $pg ;
                                   //$urlqry_ pgn = $qs . $mtd_to_inc_view . 'p/'. $pg ;
        $navbar .= "<li> <a class='button' href=$urlqry_pgn >" ; 
        $navbar .= $fmt_tmp1.str_pad((string)($pg), 3, '0', STR_PAD_LEFT).$fmt_tmp2 ;
        $navbar .=  '</a></li>';

  }


  // Link to next page                          +11111
  $urlqry_pgn = $mtd_to_inc_view . $qs .'p='
                                //$urlqry_ pgn = $qs . $mtd_to_inc_view . 'p/'
      . (($pgordno_from_url < $total_pages) ? $pgordno_from_url + 1 : $pgordno_from_url) ;
  $navbar .= "<li> <a class='button' href=$urlqry_pgn >&nbsp;&gt;&nbsp;</a></li>";

         
  // Link to  l a s t  page                        .l a s t
  $urlqry_pgn = $mtd_to_inc_view . $qs .'p='. $total_pages ;
                         //$urlqry_ pgn = $qs . $mtd_to_inc_view . 'p/'. $total_pages ;
  $navbar .= "<li> <a class='button' href='$urlqry_pgn'>&gt;&gt;</a></li>"
      .' &nbsp;&nbsp; Total count '.$rtbl .', '.$rblk.' on page'
  ;
  //$navbar .= " <a class='button' 
  //              href='{$qs}p/{$total_pages}{$mtd_to_inc_view}'>&gt;&gt;</a>"
  //     .' &nbsp;&nbsp; Total count '.$rtbl .', '.$rblk.' on page'
  //;

  $navbar .= '</ul></nav>' ;
                              //$navbar .= '</div>' ;


  $ret_arr = [
           'navbar'=>$navbar  //'<h2>'.'aaaaaaaa'.'</h2>';
         , 'pgordno_from_url'=>$pgordno_from_url
         , 'first_rinblock'=>$first_rinblock
         , 'last_rinblock'=>$last_rinblock
  ]; 

                    if ('') //if ($autoload_arr['dbg']) 
                    { echo '<h2>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                      echo '<pre>' ; 
                        echo '$ret_arr ='; print_r($ret_arr) ;
                      echo '</pre>';
                      exit(0) ;
                    }
      return $ret_arr ; 

} // e n d  f n  g e t _ p g n n a v b a r
