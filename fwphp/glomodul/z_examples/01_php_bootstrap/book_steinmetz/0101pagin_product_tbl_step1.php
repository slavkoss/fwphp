<?php

/**
 * http://dev1:8083/04knjige/03steinmetz/ch01/product_tbl_step1.php?rrgo=4
 * J:\awww\apl\dev1\04knjige\03steinmetz\ch01\product_tbl_step1.php
*/
// should be outside web server doc, tree !!! - in global location
// - see other code examples how to do it (HOME -> download)
//$outtbl = new outTblGlo; // not here
$gofldids = "['box0','box1','box2','box3','box4']";
$numgofldids_inrow = 1;
$title  = 'Best paginator - OOP list of product_info tbl';
$title2 = 'PGNTOR';
$pggo = basename(__FILE__); $rrpg = 3; $rrtbl = 5;
$dsn='sqlite:'.'../tema.sqlite3';
      //works: $dsn='sqlite:'.realpath('../tema.sqlite3');
//echo '$dsn=***'.$dsn.'***';
$db = new PDO($dsn,'usr_ignored','psw_ignored');
$db->setAttribute(
       PDO::ATTR_ERRMODE
      ,PDO::ERRMODE_EXCEPTION
      //not working : ,PDO::FETCH_ASSOC
);
// Without PDO::FETCH_ASSOC : error two times every $value becouse of :
//            Array
//            (
//                [PRODUCT_NAME] => Cowboy Boots
//                [0] => Cowboy Boots
//            )
?>



<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <title><?php echo $title2; ?></title>
</head>  

<link href="../styles00.css" rel="stylesheet" type="text/css">
<script src="../key_pressed.js"></script>

</head><body>
<p>


  <?php
// ************************** E N D  O U T S I D E



// ****************** ONLY THIS CODE IS NEEDED IN THIS SCRIPT !!!
//     ~~~ M A N G E R (c o n t r o l l e r) ~~~
//             PROCESSING - routing info
// OLD (which user clicked)  $pgrr1 = first row in record block (set) 
//     (=tbl offset) - IN user event :
$pgrr1 = (isset($_REQUEST['rrgo']) ? $_REQUEST['rrgo'] : 1);
// NEW $pgrr1 is $pgrr1 += $rrpg  -  p a g i n a t o r :
// returns pgn links string which contains ALL links !!!
// so contains also NEW $pgrr1 = $rrgo - it is whatever we click here :
$pgnlnks = outTblGlo::paginator( // much better than 
      $pggo // script name of  P A G E  TO  G O
    , 'not used can be array of other parameters'
    , $rrtbl
    , $pgrr1 // ORD.NO (IN WHOLE TBL) OF FIRST BLOCK ROW TO GO
    , $rrpg);

//     ~~~ I N = T B L source (m o d e l) ~~~
$sql = "SELECT product_name FROM product_info 
order by product_name LIMIT ?, ?";
$st = $db->prepare($sql);
$st->execute(array(($pgrr1 - 1), $rrpg)); 

//        ~~~ O U T  T B L  (v i e w) ~~~
echo "<h2>$title</h2>";
// Sklar, Trachtenberg 2014 PHP Cookbook, 3Ed :
print $pgnlnks; 

print '<form method="post" name="frmtbl" action="">';
$outtbl = new outTblGlo;
//$outtbl->phpjsset_pgnvar($curpg,$pgrr1,$rrpg,$rrtbl,$showform,$idval,$gofldids,$numgofldids_inrow);
$outtbl->phpjsset_pgnvar('',$pgrr1,$rrpg,$rrtbl,'','',$gofldids,$numgofldids_inrow);
$rrbr = 0;
while($row = $st->fetch(PDO::FETCH_ASSOC)) {
    $outtbl->print_row($row,$rrbr,array()); 
    $rrbr++;  //echo $rrbr.'*******************';
}
print '</form>';

unset($outtbl);

// ****************** E N D  ONLY THIS CODE IS NEEDED IN THIS SCRIPT !!!

class outTblGlo {
  // g l o b a l c l a s s to print t a b l e
  // should be outside web server doc, tree !!! - in global location
  // - see my other code examples how to do it (HOME -> download)
  public function __construct() {
	  $this->state = 0;
	  print "<table>";
  }
  public function __destruct() {
	  print "</table>";
  }
  public function print_row($row, $rrbr, $rp = array()) {
  // $rp = local row properties
	  if ($this->state & 1) { 
	    $row_color = "row2"; 
	  } else { 
	    $row_color = "row1"; 
	  }

    print "<tr>";
	  foreach ($row as $value) {
	    //print "<td>$value</td>";
?>
       <td class="<?php echo $row_color; ?>">
          <input type="text" name="box" 
              value="<?php echo $value; ?>" 
              id=box<?php echo $rrbr; ?>
              onkeydown="return myKeyAct(this, event);"
              autofocus
          />
          <input type="hidden" name="cmd" value="not used" />
      </td>

<?php
	  }
    print "</tr>";
    $this->state++;
  }
  
  public function phpjsset_pgnvar($curpg,$pgrr1,$rrpg,$rrtbl,$showform,$idval,$gofldids, $numgofldids_inrow)
  { 
    // called from crud.php
    //$utl->phpjsset_pgnvar($curpg,$pgrr1,$rrpg,$rrtbl);
      echo <<< EOTXT
      <SCRIPT LANGUAGE="JavaScript">
      <!-- Begin
        var curpg = '$curpg' ; // basename apl.page
        var pgrr1 = $pgrr1 ; // first ord.nr. of b l o c k r o w
        var rrpg  = $rrpg ;  // r o w s  prr  p a g e
        var rrtbl = $rrtbl ; // r o w s  in  t b l
        //var showform = '$showform' ; // '0' or '1'
        //var idval = '$idval' ; 
        //var fldids = ['box0','box1','box2','box3','box4'] ; 
        var fldids = $gofldids ; 
        var numfldids_inrow = $numgofldids_inrow ; 
      // End -->
      </SCRIPT>
EOTXT;
  }
    private static function cre_pgnlnk( // protected
        $pggo,$dsplnk_inactive,$lnklbl,$pgrr1='')
    {
        // D I S P L A Y  P A G I N A T O R  L I N K S :
        // ii-th group x-y ee "$startrbr-$endrbr"
        if ($dsplnk_inactive) {
            //print //'<span class="inactive">'.
            $lnk = '<strong>'.$lnklbl.'</strong>'; // '</span>'
        } else {
            // print 
           $lnk = "<a href='"
             . htmlentities($pggo,ENT_QUOTES) //or $_SERVER['PHP_SELF']
             . "?rrgo=$pgrr1'>$lnklbl</a>" ;
        }
        return($lnk);
    }
    public static function paginator(
         $pggo   // script name of  P A G E  TO  G O
       , $akc    // not used can be array of other parameters
       , $rrtbl  // no of rows in tbl
       , $pgrr1  // ORD.NO (IN WHOLE TBL) OF FIRST BLOCK ROW TO GO
       , $rrpg   // no of rows in block
    )
    {
        /**
         * C R E A T E  P G N  L I N K S  S T R I N G :
         * ----------------- 1 --------------------
         *       f i r s t  l i n k  P g U p
         * ----------------------------------------
         * This fn is util for : 
         *     p a g i n a t o r  properties
         *     view properties
        */
        $lnks = '';
        $separator = ' | '; $lnks .= $separator; //print $separator;
        $lnks .= self::cre_pgnlnk( 
           $pggo                  // script name of  p a g e  to  g o
          ,$pgrr1 == 1            // $dsplnk_inactive
          ,'PgUp'                 // $lnklbl
          ,max(1, $pgrr1 - $rrpg) // $pgrr1=''
        );

        /** -------------------------- 2 -------------------------------
         * 10 or all grouping l i n k s  (ee ii-th x-y) except last one
         * -------------------------------------------------------------
         */
        $n_th_xy = 0; // ii-th group x-y ee "$startrbr-$endrbr"
        for ( $startrbr = 1, $endrbr = $rrpg;      // initial expression
              $endrbr < $rrtbl;                   // condition
              $startrbr += $rrpg, $endrbr += $rrpg // after expression
            ) 
        {   // eg 1-10, 11-20, 21-30...
            $n_th_xy++;
            // new row of links (or no more "$startrbr-$endrbr" links)
            if ($n_th_xy % 10 == 0) echo '<br />';
            $lnks .= $separator; //print $separator;
            $lnks .= self::cre_pgnlnk(
                $pggo               // script name of  p a g e  to  g o
              , $pgrr1 == $startrbr  // $dsplnk_inactive
              , "$startrbr-$endrbr"   // $lnklbl
              , $startrbr            // $pgrr1=''
            );
        }
        /** 
         *  -------------- 3 ----------------
         *      l a s t  l i n k  P g D n
         *  ---------------------------------
         *       - at this point : 
         * $startrbr points to element at beginning of last grouping
         * last grouping of eg 11 elements with 5 per page 
         *    should say "11", not "11-11"
         *    ee text should contain range (x-y) if there's more than
         *    one element on last page, not if is only 1 element.
         */
        $endrbr = ($rrtbl > $startrbr) ? "-$rrtbl" : '';
        $lnks .= $separator; //print $separator;
        $lnks .= self::cre_pgnlnk(
            $pggo              // script name of  p a g e  to  g o
          , $pgrr1 == $startrbr // $dsplnk_inactive
          , "$startrbr$endrbr"   // $lnklbl
          , $startrbr           // $pgrr1=''
        );
        // 
        $lnks .= $separator; //print $separator;
        $lnks .= self::cre_pgnlnk(
            $pggo              // script name of  p a g e  to  g o
          , $pgrr1 == $startrbr // $dsplnk_inactive
          , 'PgDn'             // $lnklbl
          , $pgrr1 + $rrpg     // $pgrr1=''
        );

        $lnks .= $separator; //print $separator;
        return($lnks);
    }
    
} // e n d  c l a s s

// ************************** E N D  O U T S I D E





// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//              PROCEDURAL REPORT 
//      OOP report above is much better !!!
// Steinmetz, Ward, 2008 Wicked Cool PHP Real World Scripts 
// With  o t h e r  p a g i n a t o r  not so good as 
// above code from Sklar, Trachtenberg 2014
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
echo '<br /><hr />';
echo "<h2>Procedural list of product_info tbl</h2>";

$rrpg = 3; $rrtbl = 5;
$s = cre_pgnavbar(intval($pgrr1), $rrpg, $rrtbl);
print $s;


$sql = "SELECT product_name FROM product_info order by product_name";
$st = $db->prepare($sql);
$st->execute(array()); //$st->execute(array($parent_id));

echo "<table>";
$i = 0;
while($row = $st->fetch(PDO::FETCH_ASSOC)) {
//while($row = $st->fetch()) {
    // print results 
    $row_class = table_row_format($i); 
    echo "<tr class=\"$row_class\"><td>$row[PRODUCT_NAME]</td></tr>";
}
echo "</table>";

function table_row_format(&$row_counter) {
    // Returns row class for a row
    if ($row_counter & 1) { 
	$row_color = "row2"; 
    } else { 
	$row_color = "row1"; 
    }
    $row_counter++;
    return $row_color; 
}

function cre_pgnavbar($start_number = 0, $items_per_page = 50, $count) {  
   // Creates a navigation bar
   $current_page = $_SERVER["PHP_SELF"];

    if (($start_number < 0) || (! is_numeric($start_number))) {
	$start_number = 0;
    }

    $navbar = "";
    $prev_navbar = "";
    $next_navbar = "";

    if ($count > $items_per_page) {
	$nav_count = 0;
	$page_count  = 1;
	$nav_passed = false;
		
	while ($nav_count < $count) {
	    // are we at the current page position?
	    if (($start_number <= $nav_count) && ($nav_passed != true)) {
		$navbar .= "<b><a href=\"$current_page?rrgo=$nav_count\"> [$page_count] </a></b>";
		$nav_passed = true;
		// do we need a "prev" button?
		if ($start_number != 0) {
		    $prevnumber = $nav_count - $items_per_page;
		    if ($prevnumber < 1) {
			$prevnumber = 0;
		    }
		    $prev_navbar = "<a href=\"$current_page?rrgo=$prevnumber\"> &lt;&lt;Prev - </a>";
		}
				
		$nextnumber = $items_per_page + $nav_count;
				
		// do we need a "next" button?
		if ($nextnumber < $count) {
		    $next_navbar = "<a href=\" $current_page?rrgo=$nextnumber\"> - Next&gt;&gt; </a><br>";
		}
	    } else {
		// print normally
		$navbar .= "<a href=\"$current_page?rrgo=$nav_count\"> [$page_count] </a>";
	    } 
		
	    $nav_count += $items_per_page;
	    $page_count++;
        } 
	
        $navbar = $prev_navbar . $navbar . $next_navbar;
        return $navbar; 
    }
}


?>
</p>
<p>&nbsp;</p>
<pre>
// sqlite :  PRIMARY KEY AUTOINCREMENT
CREATE TABLE PRODUCT_INFO (
  PRODUCT_NAME VARCHAR (50) default NULL,
  PRODUCT_ID   INT (10) default NULL,
  CATEGORY VARCHAR (20) default NULL,
  PRICE double default NULL,
  PRIMARY KEY  (PRODUCT_ID)
);

// mysql :  PRIMARY KEY AUTOINCREMENT
CREATE TABLE `PRODUCT_INFO` (
  `PRODUCT_NAME` varchar(50) default NULL,
  `PRODUCT_ID` int(10) default NULL,
  `CATEGORY` enum('shoes','gloves','hats') default NULL,
  `PRICE` double default NULL,
  PRIMARY KEY  (`PRODUCT_ID`)
);
// sqlite & mysql
INSERT INTO `PRODUCT_INFO` VALUES ('Cowboy Boots',12,'shoes',19.99);
INSERT INTO `PRODUCT_INFO` VALUES ('Slippers',17,'shoes',9.99);
INSERT INTO `product_info` VALUES ('Snowboarding Boots',15,'shoes',89.99);
INSERT INTO `product_info` VALUES ('Flip-Flops',19,'shoes',2.99);
INSERT INTO `product_info` VALUES ('Baseball',20,'hats',12.79);

Fonts used in Wicked Cool PHP are New Baskerville, Futura, and Dogma.
Not needed if in styles00.css :
<style>
tr.row1 {
    background-color: lightgray;
}

tr.row2 {
    background-color: white;
}
</style>

copy J:\awww\apl\zinc\skin\def\cssfmt\style00.css  J:\awww\apl\dev1\04knjige\03steinmetz\style00.css
copy J:\awww\apl\zinc\skin\def\cssfmt\styles00.css J:\awww\apl\dev1\04knjige\03steinmetz\styles00.css
copy J:\awww\apl\zinc\key_pressed.js               J:\awww\apl\dev1\04knjige\03steinmetz\key_pressed.js

copy J:\awww\apl\dev1\04knjige\03steinmetz\style00.css    J:\awww\apl\zinc\skin\def\cssfmt\style00.css
copy J:\awww\apl\dev1\04knjige\03steinmetz\styles00.css   J:\awww\apl\zinc\skin\def\cssfmt\styles00.css
copy J:\awww\apl\dev1\04knjige\03steinmetz\key_pressed.js J:\awww\apl\zinc\key_pressed.js
</pre>
</body></html>
