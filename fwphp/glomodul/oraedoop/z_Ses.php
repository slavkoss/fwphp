<?php
// H:\dev_web\htdocs\utl\oraedoop_ses_pg.php
// ses (auth, rights), pg (hdr, ftr, lmnu)
namespace B12phpfw ;
//namespace oraedoop ; // package ufa
//define('LOGO_URL', 'http://dev/inc/ac_logo_img.php'); // see ch12 Upl./Displ.BLOBs
//session_ start();
//echo "<pre>".basename(__FILE__).' 1: '; var_dump($_SESSION); echo "</pre>";
class Ses {
    public $username    = null;
    public $ufastartrow = 1;
    public $aplpath     = null;
    public $aplurl      = null;    
    public $csrftoken   = null; // see Ch9, "Inserting Data
    //
    public $block_rowsnums = array( 10, 25, 50, 100, 1000 ); // nr.rows in r.set and in html page
    //
    public function auth($username) {
        switch ($username) {
            case 'admin':
            case 'korisnik':
                $this->username = $username;
                return(true);  // OK to login
            default:
                $this->username = null;
                return(false); // Not OK
        }
    }    
    public function rights() {
        switch ($this->username) {
            case 'admin':
            return(1); //all  r i g h t s : to see extra reports, upload new data...
            //case 'korisnik':
            default:
                return(0); // web users r i g h t s
        }        
    }
        /* Three methods to store, fetch and clear the session values 
           to provide a stateful web experience:
        When any of the Session attributes change, the A n y C o  application 
        will call set ses() to record the changed state. Later when another application 
        request starts processing, its script will call the getses2this() method 
        to retrieve the saved attribute values. 
        The ternary "?:" tests will use the session value if there is one, 
        or else use a hardcoded default.
        */
    public function setses_from_this() {
        $_SESSION[ 'username']    = $this->username;
        $_SESSION[ 'ufastartrow'] = (int)$this->ufastartrow;
        $_SESSION[ 'aplurl']      = $this->aplurl;
        $_SESSION[ 'aplpath']     = $this->aplpath;
        $_SESSION[ 'csrftoken']   = $this->csrftoken;    
        //
// 6. data for LOVs of page parameters:
if (! isset($_SESSION[ 'exportformat' ])) $_SESSION[ 'exportformat' ] = 'xml';        

// 7. Initialize DB connection parameters :
if ( (! isset($_SESSION[ 'connection' ]))
     || isset($_REQUEST[ 'disconnect' ]))  $this->clearses(); // p of_b lanksession()

if (isset($_POST[ 'connection' ]))
    if (is_array($_POST[ 'connection' ]))
    {  $this->clearses(); // p of_b lanksession()
       if (isset($_POST[ 'connection' ][ 'username' ]))
          $_SESSION[ 'connection' ][ 'username' ] = 
              substr(trim(
 preg_replace('/[^a-zA-Z0-9$_-]/', '', $_POST[ 'connection' ][ 'username' ])
                 ), 0, 30);
     if (isset($_POST[ 'connection' ][ 'password' ]))
      $_SESSION[ 'connection' ][ 'password' ] = substr(trim($_POST[ 'connection' ][ 'password' ]), 0, 30);
     if (isset($_POST[ 'connection' ][ 'service' ]))
      $_SESSION[ 'connection' ][ 'service' ] = substr(trim(preg_replace('|[^a-zA-Z0-9:.() =/_-]|', '', $_POST[ 'connection' ][ 'service' ])), 0, 2000);
    }  /// end if c o n n ...

// 9. Initialize debug mode
if (! isset($_SESSION[ 'debug' ])) $_SESSION[ 'debug' ] = false;
if (isset($_REQUEST[ 'debug' ])) $_SESSION[ 'debug' ] = ($_REQUEST[ 'debug' ] == 1);

// 10. Initialize / drop DDL cache
if (! isset($_SESSION[ 'cache' ]))   $_SESSION[ 'cache' ] = array();
if (isset($_REQUEST[ 'dropcache' ])) $_SESSION[ 'cache' ] = array();

// 11. Initialize entry mode
if (! isset($_SESSION[ 'entrymode' ])) $_SESSION[ 'entrymode' ] = 'popups';

// 12. Initialize SQL filter fields
if (! isset($_SESSION[ 'sql'     ])) $_SESSION[ 'sql'     ] = '';
if (! isset($_SESSION[ 'table'   ])) $_SESSION[ 'table'   ] = '';
if (! isset($_SESSION[ 'select'  ])) $_SESSION[ 'select'  ] = '*';
if (! isset($_SESSION[ 'where'   ])) $_SESSION[ 'where'   ] = '';
if (! isset($_SESSION[ 'set'     ])) $_SESSION[ 'set'     ] = 1;
// default pg=10 rows :
if (! isset($_SESSION[ 'block_rowsnum' ])) $_SESSION[ 'block_rowsnum' ] = $this->block_rowsnums[ 0 ]; 

if (isset($_REQUEST[ 'select' ])) 
   $_SESSION[ 'select' ] = trim($_REQUEST[ 'select' ]);    
///////////////////////////////    
    } // end set ses
    
    public function getses2this() {
$this->username = isset($_SESSION[ 'username']) ? $_SESSION[ 'username'] : null;
$this->ufastartrow = isset($_SESSION[ 'ufastartrow']) ? (int)$_SESSION[ 'ufastartrow'] : 1;
$this->aplurl = isset($_SESSION[ 'aplurl']) ? $_SESSION[ 'aplurl'] : null;
$this->aplpath = isset($_SESSION[ 'aplpath']) ? $_SESSION[ 'aplpath'] : null;
$this->csrftoken = isset($_SESSION[ 'csrftoken']) ? $_SESSION[ 'csrftoken'] : null;
//
    } // end get ses
    
    public function clearses() {
    // Logout the current user
        $_SESSION = array();
        $this->username = null;
        $this->aplurl = null;
        $this->aplpath = null;        
        $this->ufastartrow = 1;
        $this->csrftoken = null;
        //
  $_SESSION[ 'connection' ] = array(
     'username' => '', 'password' => '',  'service'  => '' );
  $_SESSION[ 'cache'   ] = array();
  $_SESSION[ 'debug'   ] = false;
  $_SESSION[ 'sql'     ] = '';
  $_SESSION[ 'table'   ] = '';
  $_SESSION[ 'select'  ] = '*';
  $_SESSION[ 'where'   ] = '';
  $_SESSION[ 'set'     ] = 1;
  $_SESSION[ 'block_rowsnum' ] = $this->block_rowsnums[ 0 ]; // default blok 10 rows
  $_SESSION[ 'history' ] = array();           
    } // end clear ses

    public function setcsrf() {
    //Records a token to check that any submitted form was generated by appl. (not by hacker)   
    // Aid CSRF protection in HTML forms, see section CSRF example on page 9-5 in Chapter 9, "Inserting Data."    
        $this->csrftoken = mt_rand(); // not sufficient for production systems
        $this->setses_from_this();
    }
/////////////////////////
} // end cls  s e s

class pg {
    public function hdr($title) {
        $title = htmlspecialchars($title, ENT_NOQUOTES, 'UTF-8');
        //$APL PATH = '.'; if (isset($_SESSION[ 'APL PATH']))
//echo "<pre>".basename(__FILE__).' class pg: '; var_dump($_SESSION); echo "</pre>";        
          $style = $_SESSION[ 'aplurl'] . "style.css"; //echo ' APLURL='.APLURL.' APLPATH='.APLPATH; 
          //echo ' $_SESSION[\'aplurl\']='.$_SESSION[ 'aplurl'].' $_SESSION[\'aplpath\']='.$_SESSION[ 'aplpath'];
        echo <<<EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
     "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="$style">
  <title>$title xxx $style</title>
</head>
<body>
<div id="header">
EOF;
        if (defined('LOGO_URL')) {
            echo '<img src="' . LOGO_URL . '" alt="Company Icon">&nbsp;';
        }
        echo "$title</div>";
    }

    public function ftr() {
        echo "</body></html>\n";
    }

    public function lmnu($usr, $rights) {
//user name and privileged status of the user will be passed in to customize the 
//menu for each user. These values will come from the Session class.    
        $username = htmlspecialchars($usr, ENT_NOQUOTES, 'UTF-8');
        echo <<<EOF
<div id='menu'>
<div id='user'>Prijava na: $usr </div>
<ul>
<li><a href='ufa_tab.php'>Tablica</a></li>
EOF;
        if ($rights) {
            echo <<<EOF
<li><a href='administracija.php'>UFA administracija</a></li>
<li><a href='ac_logo_upload.php'>Upload Logo</a></li>
EOF;
        }
        echo <<<EOF
<li><a href="index.php">Odjava</a></li>
</ul>
</div>
EOF;
    } 
} // end cls  p g
/////////////////////////////     
?>