<?php
// J:\awww\www\fwphp\glomodul\z_examples\oraedoop\Home_mdl.php
namespace B12phpfw ;

class Home_mdl extends Config_allsites
{

  public function __construct($pp1)
  {
    parent::__construct($pp1);
  }

  protected function pof_sqlline_msg($msg, $error = 'info') 
  { 
    // info or err :
    if ($error == 'info') $class = 'sqllineerr'; else $class = 'sqlline';
    
    $html = '<table class="' . $class . '">'
               .'<tr><td>' . htmlspecialchars($msg) . '</td></tr>'
           .'</table>' . "\n";
    return $html;
  }


  protected function pof_gettables($ses)
  { 
    //if (! isset($_SESSION['states']->cache' ][ '_alltables' ])) { 
      //$_SESSION['states']->cache' ][ '_alltables' ] = array();
       // select OWNER, TABLE_NAME, PRIVILEGE, GRANTEE from USER_TAB_PRIVS;
       $sql = sprintf(
        "select ' ' as OWNER, TABLE_NAME from USER_TABLES " .
        "union " .
        "select OWNER, TABLE_NAME "
        ."from USER_TAB_PRIVS "
        ."where PRIVILEGE = 'SELECT' and GRANTEE = '%1\$s' " 
        . "order by OWNER, TABLE_NAME",
            strtoupper($_SESSION['cncts']->username)
        );
       if ($_SESSION['states']->debug) error_log($sql);
                   ////$cursor = $this->pof_ opencursor($sql);
                   //$db = new \oci8\Db("oraedoop", $this->pp1->cncts->username);
                   //$a1 = $db->all($sql, "pof_ gettables") ;   
                  //echo "<pre>".basename(__FILE__).' var_dump($a1) : '; var_dump($a1); echo "</pre>";     
                  //[90 0 do 367]=>array(2) { ["OWNER"]=>string(1) " "
                  //                          ["TABLE_NAME"]=>string(12) "T_KNJIGA_IFA" }
      $cursor = $this->rr('', $this, 'No_tbl_SQLin_flds', 'SQLin_flds', $sql ) ;
    //} //e n d not set cache
    return $cursor; //$_SESSION['states']->cache' ][ '_alltables' ];
  } // end p of_ g ettables

  protected function pof_getviews($ses)
  { 
    //if (! isset($_SESSION['states']->cache' ][ '_allviews' ]))
    //   { _SESSION[ 'cache' ][ '_allviews' ] = array(); }
    $sql = 'select VIEW_NAME TABLE_NAME from USER_VIEWS order by VIEW_NAME';
                       //if ($_SESSION['states']->debug' ]) error_log($sql);
                       //$db = new \oci8\Db("oraedoop", $this->pp1->cncts->username);     
                       //$a1 = $db->all($sql, "pof_ getviews");   
    //$binds[]=['placeh'=>':row_ordno', 'valph'=>$row_ordno, 'tip'=>'int'];
                  if ('') //if ($autoload_arr['dbg']) 
                  { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                    echo '<pre>' ; 
                      echo '$qrywhere='; print_r($qrywhere) ;
                      //echo 'ses fltr pg ='; print_r($_SESSION['states']->filter_posts']) ;
                      //echo '<br />$binds='; print_r($binds) ;
                    //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                    echo '</pre>'; }
    $cursor = $this->rr('', $this, 'No_tbl_SQLin_flds', 'SQLin_flds', $sql ) ;
    return $cursor; //return $_SESSION['states']->cache' ][ '_allviews' ];
  }


  protected function pof_getpk($table)
  { if (! isset($_SESSION['states']->cache[ $table ])) $_SESSION['states']->cache[ $table ] = array();

    if (! isset($_SESSION['states']->cache[ $table ][ 'pk' ]))
     { $_SESSION['states']->cache[ $table ][ 'pk' ] = ''; //

       $sql = "select COLUMN_NAME from USER_CONS_COLUMNS col, USER_CONSTRAINTS con where con.TABLE_NAME=:TABLE_NAME and con.CONSTRAINT_TYPE='P' and col.CONSTRAINT_NAME=con.CONSTRAINT_NAME";
       $bind = array( 'TABLE_NAME' => $table );
       if ($_SESSION[ 'debug' ]) error_log($sql);

       //$cursor = $this->pof_opencursor($sql, $bind);
       if ($cursor = $db->all($sql, "pof_getpk", $bind)) $ok = true;  
       if ($cursor)
        { if (ocifetchinto($cursor, $row, OCI_NUM))
           $_SESSION['states']->cache[ $table ][ 'pk' ] = $row[ 0 ]; 
          //$this->pof_closecursor($cursor);
        }
     }

    return $_SESSION['states']->cache[ $table ][ 'pk' ];
  }


  protected function pof_getcoldefs($table)
  { if (! isset($_SESSION['states']->cache[ $table ])) $_SESSION['states']->cache[ $table ] = array();

    if (! isset($_SESSION['states']->cache[ $table ][ 'coldefs' ]))
     { $_SESSION['states']->cache[ $table ][ 'coldefs' ] = array();

       $sql = "select COLUMN_NAME, NULLABLE, DATA_DEFAULT from USER_TAB_COLUMNS where TABLE_NAME=:TABLE_NAME";
       $bind = array( 'TABLE_NAME' => $table );
       if ($_SESSION['states']->debug) error_log($sql);

       //$cursor = $this->pof_opencursor($sql, $bind);
       if ($cursor = $db->all($sql, "pof_getcoldefs", $bind)) $ok = true;  
       if ($cursor)
        { while (true)
           { if (! ocifetchinto($cursor, $row, OCI_ASSOC))
              break;

             $_SESSION['states']->cache[ $table ][ 'coldefs' ][ $row[ 'COLUMN_NAME' ] ] = array(
              'nullable' => true,
              'default'  => ''
              );

             if (isset($row[ 'NULLABLE' ]))
              if ($row[ 'NULLABLE' ] == 'N')
                $_SESSION['states']->cache[ $table ][ 'coldefs' ][ $row[ 'COLUMN_NAME' ] ][ 'nullable' ] = false;

             if (isset($row[ 'DATA_DEFAULT' ]))
              $_SESSION['states']->cache[ $table ][ 'coldefs' ][ $row[ 'COLUMN_NAME' ] ][ 'default' ] = trim(strtr($row[ 'DATA_DEFAULT' ], '()', '  '));
           }

          //$this->pof_closecursor($cursor);
        }
     }

    return $_SESSION['states']->cache[ $table ][ 'coldefs' ];
  }


  protected function pof_getforeignkeys($table)
  { if (! isset($_SESSION['states']->cache[ $table ])) $_SESSION['states']->cache[ $table ] = array();

    if (! isset($_SESSION['states']->cache[ $table ][ 'constraints' ]))
     { $_SESSION['states']->cache[ $table ][ 'constraints' ] = array( 'from' => array(), 'to' => array() );

       // Find own + remote foreign key constraint names
       // XXX foreign tables might belong to a different user! take R_OWNER into account!

       $sql =
        "select CONSTRAINT_NAME, R_CONSTRAINT_NAME from USER_CONSTRAINTS where TABLE_NAME=:TABLE_NAME and CONSTRAINT_TYPE='R' and STATUS='ENABLED' " .
        "union " .
        "select CONSTRAINT_NAME, R_CONSTRAINT_NAME from USER_CONSTRAINTS where R_CONSTRAINT_NAME in " .
        "(select CONSTRAINT_NAME from USER_CONSTRAINTS where TABLE_NAME=:TABLE_NAME) ".
        "and CONSTRAINT_TYPE='R' and STATUS='ENABLED'";
       $bind = array( 'TABLE_NAME' => $table );
       if ($_SESSION['states']->debug) error_log($sql);

       //$cursor = $this->pof_opencursor($sql, $bind);
       if ($cursor = $db->all($sql, "pof_getforeignkeys 1", $bind)) $ok = true;  
       $names = array();
       $constraints = array();

       if ($cursor)
        { while (true)
           { if (! ocifetchinto($cursor, $row, OCI_ASSOC))
              break;

             $names[ ] = $row[ 'CONSTRAINT_NAME'   ];

             if (isset($row[ 'R_CONSTRAINT_NAME' ]))
              if ($row[ 'R_CONSTRAINT_NAME' ] != '')
                $names[ ] = $row[ 'R_CONSTRAINT_NAME' ];
           }

          //$this->pof_closecursor($cursor);
        }

       if (count($names) > 0)
        { $sql = "select CONSTRAINT_NAME, TABLE_NAME, R_CONSTRAINT_NAME from USER_CONSTRAINTS where CONSTRAINT_NAME in ('" . implode("','", $names) . "')";
          if ($_SESSION['states']->debug) error_log($sql);

          //$cursor = $this->pof_opencursor($sql);
          if ($cursor = $db->all($sql, "pof_getforeignkeys 2")) $ok = true;  
          if ($cursor)
           { while (true)
              { if (! ocifetchinto($cursor, $row, OCI_ASSOC))
                 break;

                $constraints[ $row[ 'CONSTRAINT_NAME' ] ] = $row;
              }

             //$this->pof_closecursor($cursor);
           }

          $sql = "select CONSTRAINT_NAME, COLUMN_NAME from USER_CONS_COLUMNS where CONSTRAINT_NAME in ('" . implode("','", $names) . "')";
          if ($_SESSION['states']->debug) error_log($sql);

          //$cursor = $this->pof_opencursor($sql);
          if ($cursor = $db->all($sql, "pof_getforeignkeys 3")) $ok = true;  
          if ($cursor)
           { while (true)
              { if (! ocifetchinto($cursor, $row, OCI_ASSOC))
                 break;

                $constraints[ $row[ 'CONSTRAINT_NAME' ] ][ 'COLUMN_NAME'  ] = $row[ 'COLUMN_NAME' ];
              }

             //$this->pof_closecursor($cursor);
           }
        }

       if (count($constraints) > 0)
        { foreach ($constraints as $key => $item)
           { if (! isset($item[ 'R_CONSTRAINT_NAME' ]))
              continue;

             if ($item[ 'TABLE_NAME' ] == $table)
              $_SESSION['states']->cache[ $table ][ 'constraints' ][ 'to' ][ $item[ 'COLUMN_NAME' ] ] = array(
                 'table'  => $constraints[ $item[ 'R_CONSTRAINT_NAME' ] ][ 'TABLE_NAME'  ],
                 'column' => $constraints[ $item[ 'R_CONSTRAINT_NAME' ] ][ 'COLUMN_NAME' ]
                 );
             else
              { $col = $constraints[ $item[ 'R_CONSTRAINT_NAME' ] ][ 'COLUMN_NAME' ];

                if (! isset($_SESSION['states']->cache[ $table ][ 'constraints' ][ 'from' ][ $col ]))
                 $_SESSION['states']->cache[ $table ][ 'constraints' ][ 'from' ][ $col ] = array();

                $_SESSION['states']->cache[ $table ][ 'constraints' ][ 'from' ][ $col ][ ] = array(
                 'table'  => $item[ 'TABLE_NAME'  ],
                 'column' => $item[ 'COLUMN_NAME' ]
                 );
              }
           }
        }
     }

    return $_SESSION['states']->cache[ $table ][ 'constraints' ]; //
  }



  /*
  protected function pof_connect() { 
    global $conn;
    $conn = ocilogon(
        $_SESSION['cncts']->username
       ,$_SESSION['cncts']->password
       ,$_SESSION['cncts']->service);
    $err = ocierror();
    if (is_array($err))
     echo htmlspecialchars('Logon failed: ' . $err[ 'message' ]) . '<br />' . "\n";
  //   

  }
  */

  /*
  protected function getempname($db, $empid) {
      $sql = "SELECT first_name || ' ' || last_name AS emp_name
          FROM employees
          WHERE employee_id = :id";
      $res = $db->all($sql, "Get EName", array(array(":id", $empid, -1)));
  //  exercise for the reader is to handle the case when the query doesn't return any rows.    
      $empname = $res[0]['EMP_NAME'];
      return($empname);
  }

  protected function pof_opencursor($sql, $bind = false)
  // ociparse,  ocibindbyname,  ociexecute,  return $cursor;
  { global $conn;

    $cursor = ociparse($conn, $sql);

    if (! $cursor)
     { $err = ocierror($conn);
       if (is_array($err))
        echo $this->pof_sqlline_msg('Parse failed: ' . $err[ 'message' ], true);
     }
    else
     { // This might improve performance?
       ocisetprefetch($cursor, $_SESSION['states']->blk_rowsnum' ]);

       if (is_array($bind))
        foreach ($bind as $fieldname => $value)
          ocibindbyname($cursor, ':' . $fieldname, $bind[ $fieldname ], -1);

       $ok = ociexecute($cursor);

       if (! $ok)
        { $err = ocierror($cursor);

          if (is_array($err))
          // select COUNTRIES.*, rowidtochar(ROWID) as ROWID_ from COUNTRIES;
           echo $this->pof_sqlline_msg('o ciexecute($cursor) err: ' . $err[ 'message' ], true);

          //$this->pof_closecursor($cursor);

          $cursor = false;
        }
     }

    return $cursor;
  }
  */
  /*
  protected function pof_closecursor($cursor)
  { if ($cursor)
     ocifreestatesment($cursor);
  }
  */


                     /*  if ($a1)
                        { $ii = 0; while ($ii < count($a1) )
                           { $row = $a1[$ii];
                             //$_SESSION['states']->cache' ][ '_allviews' ][ ] = $row[ 'VIEW_NAME' ];
                             $ii++;            
                           }
                          $a1 = array(); 
                        }
                     } */

       /*if ($a1)
        { $ii = 0; while ($ii < count($a1) )
           { $row = $a1[$ii]; //if (! $row = $a1[$ii] ) break;
             if (trim($row[ 'OWNER' ]) == '')
                  $_SESSION['states']->cache' ][ '_alltables' ][ ] = $row[ 'TABLE_NAME' ];
             else $_SESSION['states']->cache' ][ '_alltables' ][ ] = $row[ 'OWNER' ] 
                                       . '.' . $row[ 'TABLE_NAME' ];
             $ii++; 
           }
          $a1 = array(); 
        } */

//*********************************
//E N D - f n s
//*********************************
}
