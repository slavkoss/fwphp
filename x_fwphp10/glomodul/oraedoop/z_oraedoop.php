<?php
// J:\awww\www\fwphp\glomodul\z_examples\oraedoop\oraedoop.php
// http://dev:8083/utl/z_old/o raedoop.php
// http://dev:8083/utl/z_old/o raed.php
namespace B12phpfw ;
use PDO ;
//$test=0;

// see at end this script 3. Fix magic_quotes_gpc garbage, 
//    4. To allow multiple independent Oracle Editor sessions,  5. Start PHP session

//$this->set_this2ses();  //atr.klase u sesvar - kada postedvar promjeni sesvar
//$this->set_ses2this();  //sesvar -> atr.klase

//echo "<pre>".basename(__FILE__).' var_dump($_SESSION) 1: '; var_dump($_SESSION); echo "</pre>";
// clear ses je u set_this2ses !!
if (!isset($this->pp1->cncts->username) || empty($this->pp1->cncts->username)) {
  // username is not set - browser is redirected to the login page index.php
  //    header('Location: index.php');
  //    exit;
}

// ***********************************************************
// 6. data for LOVs of page parameters :
// ***********************************************************
//$set sizes = array( 10, 25, 50, 100, 1000 ); // nr.rows in r.set and in html page

$exportformats = array(
   'xml'  => array( 'XML', 'text/xml' ),
   'csv'  => array( 'CSV', 'text/comma-separated-values' ),
   'html' => array( 'HTML table', 'text/html' ),
   );
//if (! isset($_SESSION[ 'exportformat' ])) $_SESSION[ 'exportformat' ] = 'xml';

// ***********************************************************
//ccs 13. Initialize export mode
// ***********************************************************
$exportmode = false;
if (isset($_REQUEST[ 'export' ])) $exportmode = true;
// Switch back from export mode
if ($exportmode)
  {
     // SQL input fields changed?
     $check_fields = array( 'sql', 'table', 'select', 'where' );
     foreach ($check_fields as $field)
        if (isset($_REQUEST[ $field ]))
          if ($_REQUEST[ $field ] != $_SESSION[ $field ])
            { $exportmode = false;
              break;
            }
     // History item selected?
     if (isset($_REQUEST[ 'history' ]))
       if ($_REQUEST[ 'history' ] != '')
        $exportmode = false;
  }

// ***********************************************************  
//ccs 14. A c t i o n + record set?
// ***********************************************************
$action = '';

if (isset($_REQUEST[ 'action' ]))
  if (($_REQUEST[ 'action' ] == 'edit') || ($_REQUEST[ 'action' ] == 'delete'))
   $action = $_REQUEST[ 'action' ];
$this->pp1->act_record = false;

if ($action != '')
  if (isset($_REQUEST[ 'record' ]))
   if (is_array($_REQUEST[ 'record' ]))
     if (isset($_REQUEST[ 'record' ][ 'table' ]) && isset($_REQUEST[ 'record' ][ 'rowid' ]))
      $this->pp1->act_record = $_REQUEST[ 'record' ];

if (! is_array($this->pp1->act_record))
  $action = '';

//ccs 15. edit or delete cancelled?
if (isset($_REQUEST[ 'editcancel' ]) || isset($_REQUEST[ 'deletecancel' ]))
  { $action = '';
   $this->pp1->act_record = false;
  }

//ccs 16. set changed?
if (isset($_REQUEST[ 'set' ]))
  if ($_REQUEST[ 'set' ] != $_SESSION[ 'set' ])
   { $val = intval($_REQUEST[ 'set' ]);
     if ($val > 0)
      $_SESSION[ 'set' ] = $val;
   }

// 17. blk_rowsnum changed?
if (isset($_REQUEST[ 'blk_rowsnum' ]))
  if ($_REQUEST[ 'blk_rowsnum' ] != $_SESSION[ 'blk_rowsnum' ])
    if (in_array($_REQUEST[ 'blk_rowsnum' ], $this->blk_rowsnums))
    { $_SESSION[ 'blk_rowsnum' ] = $_REQUEST[ 'blk_rowsnum' ];
      $_SESSION[ 'set'     ] = 1;
    }

// empty column list means *
if ($_SESSION[ 'select' ] == '') $_SESSION[ 'select' ] = '*';

//ccs 18. entry mode changed?
if (isset($_REQUEST[ 'entrymode' ]))
  if ( ($_REQUEST[ 'entrymode' ] == 'popups') 
        || ($_REQUEST[ 'entrymode' ] == 'manual')
     ) { $_SESSION[ 'sql'    ] = '';

     // Switch from "popups" to "manual"? Prefill SQL statesment...
     if ( ($_SESSION[ 'entrymode' ] == 'popups') 
          && ($_REQUEST[ 'entrymode' ] == 'manual') 
          && ($_SESSION[ 'table' ] != '') 
          && ($_SESSION[ 'select' ] != '')
        ) $_SESSION[ 'sql' ] = 'SELECT ' . $_SESSION[ 'select' ] 
           . ' from ' . $_SESSION[ 'table' ] . ' ' 
           . $_SESSION[ 'where' ];
     $_SESSION[ 'table'  ] = '';
     $_SESSION[ 'select' ] = '*';
     $_SESSION[ 'where'  ] = '';
     $_SESSION[ 'set'    ] = 1;

     $_SESSION[ 'entrymode' ] = $_REQUEST[ 'entrymode' ];
   }

//ccs 19. sql changed? (entrymode=manual)
if (isset($_REQUEST[ 'sql' ]))
  if ($_REQUEST[ 'sql' ] != $_SESSION[ 'sql' ])
     { $_SESSION[ 'sql' ] = trim($_REQUEST[ 'sql' ]);
       $_SESSION[ 'set' ] = 1;
      }

// where changed? (entrymode=popups)
if (isset($_REQUEST[ 'where' ]))
  if ($_REQUEST[ 'where' ] != $_SESSION[ 'where' ])
   { $_SESSION[ 'where' ] = trim($_REQUEST[ 'where' ]);
     $_SESSION[ 'set'   ] = 1;
   }

//ccs 20. table changed? (entrymode=popups)
if (isset($_REQUEST[ 'table' ]))
  if ($_REQUEST[ 'table' ] != $_SESSION[ 'table' ])
   { $newtable = substr(
       trim(preg_replace('/[^a-zA-Z0-9$#_.-]/', '', $_REQUEST[ 'table' ]))
     , 0, 61);

     if ($newtable != $_SESSION[ 'table' ])
      { $_SESSION[ 'table'  ] = $newtable;
        $_SESSION[ 'select' ] = '*';
        $_SESSION[ 'where'  ] = '';
        $_SESSION[ 'set'    ] = 1;
      }

     // We need a way to set both table + where in HREFs
     if (isset($_REQUEST[ 'keepwhere' ]))
      $_SESSION[ 'where' ] = $_REQUEST[ 'keepwhere' ];
   }

// ***********************************************************   
//ccs 21. history item selected?
// ***********************************************************
if (! isset($_SESSION[ 'history' ])) $_SESSION[ 'history' ] = array();

$dont_execute = false;

if (isset($_REQUEST[ 'history' ]))
  if ($_REQUEST[ 'history' ] != '')
   { $tmp = intval($_REQUEST[ 'history' ]);
     if ($tmp >= 0)
      if (isset($_SESSION[ 'history' ][ $tmp ]))
        { $_SESSION[ 'entrymode' ] = $_SESSION[ 'history' ][ $tmp ][ 'entrymode' ];
         $_SESSION[ 'set'       ] = $_SESSION[ 'history' ][ $tmp ][ 'set'     ];
         $_SESSION[ 'blk_rowsnum'   ] = $_SESSION[ 'history' ][ $tmp ][ 'blk_rowsnum' ];

         if ($_SESSION[ 'history' ][ $tmp ][ 'entrymode' ] == 'popups')
           { $_SESSION[ 'table'   ] = $_SESSION[ 'history' ][ $tmp ][ 'table'   ];
            $_SESSION[ 'select'  ] = $_SESSION[ 'history' ][ $tmp ][ 'select'  ];
            $_SESSION[ 'where'   ] = $_SESSION[ 'history' ][ $tmp ][ 'where'   ];
            $_SESSION[ 'sql'     ] = '';
           }
         else
           { $_SESSION[ 'sql'     ] = $_SESSION[ 'history' ][ $tmp ][ 'sql' ];
            $_SESSION[ 'table'   ] = '';
            $_SESSION[ 'select'  ] = '';
            $_SESSION[ 'where'   ] = '';
           }

         // Non-SELECT statesments should only be s hown, not automatically executed
         // when switching to them (to avoid unwanted DELETEs etc.)

         if ($_SESSION[ 'history' ][ $tmp ][ 'type' ] != 'SELECT')
           $dont_execute = true;
        }
   }
   
// ***********************************************************
//ccs 22. Build main SQL statesment
// ***********************************************************
$main_sql = '';

if ( ( ($_SESSION[ 'table' ] != '') 
       || ($_SESSION[ 'sql' ] != '')
     ) && (! $dont_execute)
) 
{   if ($_SESSION[ 'entrymode' ] == 'popups')
     { //Always select ROWID - we're using this for "A ctions" support instead of the primary key

      $main_sql = 'select ';

      // Prevent "ORA-00936: missing expression":
      //   "select *, ROWID" is incorrect, we have to use "select tablename.*, ROWID" instead

      if (trim($_SESSION[ 'select' ]) == '*')
        $main_sql .= $_SESSION[ 'table' ] . '.';

      $rowidsql = ', rowidtochar(ROWID) as ROWID_';

      $main_sql .= trim($_SESSION[ 'select' ] . $rowidsql . ' from ' . $_SESSION[ 'table' ] . ' ' . $_SESSION[ 'where' ]);
     }
   else
     $main_sql = $_SESSION[ 'sql' ];
  } // end if

// ***********************************************************  
// Initialize cncts
// ***********************************************************
//php -v
//H:\php>php -r "define('TEST','foo',true); var_dump(TEST); define('TEST','bar'); var_dump(TEST);"
       //string(3) "foo"   string(3) "bar"
define('CHARSET', 'UTF-8');
/*
//$conn = false;
if ( 
     ($_SESSION['cncts'][ 'username' ] != '')
     && ($_SESSION['cncts'][ 'password' ] != '')
) { $this->pp1->cncts->username = $_SESSION['cncts'][ 'username' ]; }
                        //$this->pof_connect();  //if (defined('CHARSET')) {
                        // define('NUMRECORDSPERPAGE', 10);
                        //define('SCHEMA', 'MERCEDES');
                        //define('PASSWORD', 'M1');
                        //define('DATABASE', 'dev/XE:pooled');
                        //define('CLIENT_INFO', 'Testna firma (c o n f.php)');
//$db = new \oci8\db("oraedoop", $this->pp1->cncts->username);
$db = new Db_allsites('doinstantiate'
  ,['dbi'=>'oracle','host'=>'s spc2/XE:pooled;charset=UTF8','dbnm'=>'N OT USED','user'=>'hr', 'pass'=>'hr']
);
*/

include 'export.php';

// f n s  are in Home_ctr

// Charset header
//header('Content-Type: text/html; charset=' . CHARSET); //???

//******************************************
// 25. HTML - css
//******************************************

//include 'hdr.php';

/*
if (!isset($this->pp1->cncts->username) or empty($this->pp1->cncts->username)) { //(!$db->conn) //($conn == false)
  // PAGE 1 : 26.  l o g i n . f o r m  - p rijava na bazu
  include 'login_ frm.php';
}
else {
  // PAGE 2: ako je prijavljen na bazu: Automatically populated SQL (popup mode)
  include 'login_ frm_proc.php';
} // end page 2: ako nije ($conn == false) Automatically populated SQL (popup mode)
*/

//$this->pof_ d isconnect();
//include 'ftr.php';






// 1. Don't write PHP warnings into HTML. Watch your PHP error_log file!
//ini_set('display_errors', 0);

            /* // 3. Fix magic_quotes_gpc garbage
            if (get_magic_quotes_gpc())
              { function stripslashes_deep($value)
                 { return (is_array($value)
                          ? array_map('stripslashes_deep', $value)
                          : stripslashes($value));
                 }
               $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
              } */
// ***********************************************************
// 4. To allow multiple independent Oracle Editor sessions,
// ***********************************************************
/*
//    propagate session ID in the URL instead of a cookie.
ini_set('session.use_cookies', '0');
// We'll add the session ID to URLs ourselves - disable trans_sid
ini_set('url_rewriter.tags', '');
        // Initialize session ID
        $sid = '';
        if (isset($_REQUEST[ 'sid' ]))
          $sid = substr(trim(
               preg_replace('/[^a-f0-9]/', '', $_REQUEST[ 'sid' ])
          ), 0, 13);
        if ($sid == '') $sid = uniqid('');
*/ 
// ***********************************************************       
//ccs 5. Start PHP session
// ***********************************************************
/*        
session_id($sid);
session_name('oraedoop');
session_start();
*/

//require_once('db.php'); 
//require_once('oraedoop_ses_pg.php'); // ses (auth, rights), pg (hdr, ftr, lmnu) 

// ----------------------------------------
// cls ses (auth, rights), cls pg (hdr, ftr, lmnu) 
// ----------------------------------------

//$ses = new ses;

//$this->clearses(); //  any existing session data is discarded
//    This allows the file to serve as a l ogout page. 
//    Any time index.php is loaded, the web user will be logged out of the appl.
// 
