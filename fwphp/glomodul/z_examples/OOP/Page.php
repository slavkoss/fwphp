<?php
class Page
{
  // class Page's attributes
  public $content;
  public $view_displayed;
  public $req_uri;
  public $req_uri2;
  
  public $title = "OOP";
  public $keywords = "OOP Consulting, Three Letter Abbreviation, 
                      best friends are search engines";
  public $buttons = array(
    "Home"      => "?btn=Home", //index.php and button name
    "Contact"   => "contact.php", 
    //"Services"=>"ServicesPage.php", //should be :
    "Services"  => "index.php?p=ServicesPage", //single module entry point
    "Site Map"  => "map.php",
    "Reflection Page" => "index.php?s=reflection.php&cls=Page"
    //"Reflection Page" => "reflection.php?cls=Page"
                    );

  public function __construct(){
    define( 'STARTUP_TIME', microtime( true ) );
    //TRUE to get total memory allocated froms ystem, including unused pages.
    //If not set or FALSE only the used memory is reported.
    define( 'STARTUP_MEMORY', memory_get_usage( true ) ); //currently allocated to PHP script
    
    $this->req_uri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
  }
  
  
  public function DisplayTitle()
  {
    echo "<title>".$this->title."</title>";
  }

  public function DisplayKeywords()
  {
    echo "<meta name='keywords' content='".$this->keywords."'/>";
  }

  public function DisplayStyles()
  { 
    //J:\awww\www\vendor\b12phpfw\themes\z_simplest.css
    //<link href="styles.css" type="text/css" rel="stylesheet">
    //<link href="/vendor/b12phpfw/themes/z_simplest.css" type="text/css" rel="stylesheet">
    ?>   
    <link href="/vendor/b12phpfw/themes/mini3.css" type="text/css" rel="stylesheet">
    <?php
  }

  public function DisplayHeader()
  { 
    ?>   
    <!-- page <header> height="20" width="20"  -->
    <div class="pghdr">
      <h1><img src="logo.gif" alt="OOP logo" /> 
      OOP Consulting Pty Ltd</h1>
    </div>
    <?php
  }


  
  public function DisplayButton($name, $url) //, $c urpage
  {
    if (strpos($this->req_uri,'&btn='.$name)===false) { //is not cur page so SHOW LINK
                                     //if ('1') { //is not cur page 
      ?>
        <a href="<?=$url.'&btn='.$name?>"><!--img src="arrow_up.gif" alt="" height="20" width="20" /-->
        <span class="menutext"><?=$name?></span></a> <!--/div-->
      <?php
    } else { // is cur page so DO NOT SHOW LINK
        ?> 
      <img src="arrow_right.gif"><!--div class="menuitem"-->
      <span class="menutext"><?=$name?></span><!--/div-->
      <?php
    }  
  }

                    /* public function IsURLCurrentPage($url)
                    {
                      if(strpos($_SERVER['PHP_SELF'],$url)===false) { return false; }
                      else { return true; }
                    } */
  public function DisplayMenu($buttons)
  {
    //<div id="hMenu">
    echo '<!-- T O P  NOT DROPDOWN BUT INHERITED  M E N U -->
    <div class="navigation">
    <ul>
    <li id="frst">
    ';
    $ii = 0; foreach ($buttons as $name => $url) { // max 7 top buttons
      $ii++; 
                     if ('0') {
                     echo '<pre>'.__FILE__ .', lin='. __LINE__ .' SAYS: '.'<br />HAYSTACK $this->req_uri='.$this->req_uri. '<br />NEEDLE IS BUTTON NAME '.'&btn='.$name .', FIRST TOP BUTTONS ROW HAS DOT !!' . '<br />$url='.$url; echo '</pre>'; //$_SERVER['PHP_SELF'] must be allways index.php  (it is module single entry point) !!
                     }
      $this->DisplayButton($name, $url);
    }
    
    echo "</li>
    </ul>
    </div>"; // </nav>\n
                                // each() function is deprecated :
                                //while (list($name, $url) = each($buttons)) {$this->DisplayButton($name, $url, !$this->IsURLCurrentPage($url)); }
  }


  
  public function DisplayFooter()
  { ?> <!-- page <footer> -->
    <div class="pgftr">
      &copy; OOP Consulting Pty Ltd.<br />
        Please see our <a href="legal.php">legal information page</a>.
        2001-... ™phporacle - All rights reserved &nbsp; &nbsp;<a href="http://phporacle.altervista.org" title="phporacle blog">Comments</a> 
            &nbsp; &nbsp;<a href="/faqs.html">FAQs</a> 
        <?php
            $decimale = 6;
            $time_end = explode(" ", microtime());
            $time_end = $time_end[0] + $time_end[1];
            $time = round($time_end - STARTUP_TIME, $decimale) * 1000;
            
            $mem1 = round(STARTUP_MEMORY/(1024*1024), $decimale);
            $mem2 = round(memory_get_usage(true)/(1024*1024), $decimale);
            $mem  = $mem2 - $mem1;
            
            echo '<br />Page rendered in '.$time.' mili seconds'
                 .', using '.round($mem,3).' MB '.'(='.$mem2.' - '.$mem1.')' 
                 //.', Nr DB queries ' . $data['o']['NrDBqueries'] //$main_ctr->NrDBqueries
            ;
            ?>

    </div>

    <?php 
  }
    
    
    
  // class Page's operations
  public function __set($name, $value)
  {
    $this->$name = $value;
  }

  public function Display($view)
  {
    echo "<html>\n<head>\n";
    $this -> DisplayTitle();
    $this -> DisplayKeywords();
    $this -> DisplayStyles(); //comment this for testing !!
    
    echo "</head>\n<body>\n";
    
    $this -> DisplayHeader();
    echo "<div class='content'>\n";
       $this -> DisplayMenu($this->buttons, $view);
       echo $this->content;
    echo "</div>\n";
    $this -> DisplayFooter();
    
    echo "</body>\n</html>\n";

  }
    
} 
?>

