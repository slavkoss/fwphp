<?php
//J:\awww\apl\dev1\afwww\glomodul\ACXE2\Db.php
// J:\dev_web\htdocs\test\t_oci8\ACXE2\Db.php
namespace Oracle;
//require('confDb.php');
define('SCHEMA',               'hr');
define('PASSWORD',             'hr');
// DB c o n n  i d
define('DATABASE',             'sspc1/XE:pooled');
// DB char set for returned data
define('CHARSET',              'UTF8');
//Client Info text for DB tracing
define('CLIENT_INFO',          'AnyCo Corp.');
 
class Db {
    protected $conn = null;
    protected $stid = null;
    protected $prefetch = 100;
    
    function __construct($module, $cid) {
        $this->conn = @oci_pconnect(SCHEMA, PASSWORD, DATABASE, CHARSET);
        if (!$this->conn) {
            $m = oci_error();
            throw new \Exception('lin. '.__LINE__.', '.basename(__FILE__)
               .' Cannot connect to database: ' . $m['message']);
        }
       oci_set_client_info($this->conn, CLIENT_INFO);
       oci_set_module_name($this->conn, $module);
       oci_set_client_identifier($this->conn, $cid);
    }
 
    function __destruct() {
        if ($this->stid)
            oci_free_statement($this->stid);
        if ($this->conn)
            oci_close($this->conn);
    }

 

// Run a SQL or PL/SQL statement
    public function execute($sql, $action, $bindvars = array()) {
        $this->stid = oci_parse($this->conn, $sql);
        if (!$this->stid) {
           $m = oci_error($this->conn); // param. je c o n
           throw new \Exception('lin. '.__LINE__.', '.basename(__FILE__)
               .' Cannot parse: ' . $m['message']);
        }
        if ($this->prefetch >= 0) {
            oci_set_prefetch($this->stid, $this->prefetch); // no benefit in too large value
        }
        foreach ($bindvars as $bv) {
            // oci_bind_by_name(resource, bv_name, php_variable, length)
            oci_bind_by_name($this->stid, $bv[0], $bv[1], $bv[2]);
        }
        oci_set_action($this->conn, $action);
        // Will auto commit. Param. je  s t i d  Moze i bez $ r r = :
        $rr = oci_execute($this->stid);
        if (!$rr) {
           $m = oci_error($this->stid);
           throw new \Exception('lin. '.__LINE__.', '.basename(__FILE__)
               .' Cannot execute: ' . $m['message']);
        }
    }
 
    public function execFetchAll($sql, $action, $bindvars = array()) {
        $this->execute($sql, $action, $bindvars);
      oci_fetch_all($this->stid, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
        $this->stid = null;  // free the statement resource
        return($res);
    }
  
    public function execFetchPage($sql, $action, $firstrow = 1, $numrows = 1,
    $bindvars = array()) {
        //
        $query = 'SELECT *
            FROM (SELECT a.*, ROWNUM AS rnum
                  FROM (' . $sql . ') a
                  WHERE ROWNUM <= :sq_last)
            WHERE :sq_first <= RNUM';
 
        // Set up bind variables.
        array_push($bindvars, array(':sq_first', $firstrow, -1));
        array_push($bindvars, array(':sq_last', $firstrow + $numrows - 1, -1));
        $res = $this->execFetchAll($query, $action, $bindvars);
        return($res);
    }
   

 public function refcurExecFetchAll($sql, $action, $rcname, 
    $otherbindvars = array()) {
        $this->stid = oci_parse($this->conn, $sql);
        $rc = oci_new_cursor($this->conn);
        oci_bind_by_name($this->stid, $rcname, $rc, -1, OCI_B_CURSOR);
        foreach ($otherbindvars as $bv) {
            // oci_bind_by_name(resource, bv_name, php_variable, length)
            oci_bind_by_name($this->stid, $bv[0], $bv[1], $bv[2]);
        }
        oci_set_action($this->conn, $action);
        oci_execute($this->stid);

        if ($this->prefetch >= 0) {
           //  prefetch size is set on the REF CURSOR, not the top level statement:
           oci_set_prefetch($rc, $this->prefetch); // no benefit in too large value
        }
        oci_execute($rc); // run the ref cursor as if it were a statement id
        oci_fetch_all($rc, $res);
        return($res);
 }

    public function setPrefetch($pf) {
        $this->prefetch = $pf;
    }
 
    public function fetchRow() {
        $row = oci_fetch_array($this->stid, OCI_ASSOC + OCI_RETURN_NULLS);
        return($row);
    }
    
    /*
    public function arrayInsert($sql, $action, $arraybindvars, 
    $otherbindvars = array()) {
        $this->stid = oci_parse($this->conn, $sql);
        foreach ($arraybindvars as $a) {
            // oci_bind_array_by_name(resource, bv_name, 
            // php_array, php_array_length, max_item_length, datatype)
            oci_bind_array_by_name($this->stid, $a[0], $a[1], 
            count($a[1]), -1, $a[2]);
        }
        foreach ($otherbindvars as $bv) {
            // oci_bind_by_name(resource, bv_name, php_variable, length)
            oci_bind_by_name($this->stid, $bv[0], $bv[1], $bv[2]);
        }
        oci_set_action($this->conn, $action);
        oci_execute($this->stid);              // will auto commit
        $this->stid = null;
    }
    */
    /*
    public function insertBlob($sql, $action, $blobbindname, $blob, 
    $otherbindvars = array()) {
        $this->stid = oci_parse($this->conn, $sql);
        $dlob = oci_new_descriptor($this->conn, OCI_D_LOB);
        oci_bind_by_name($this->stid, $blobbindname, $dlob, -1, OCI_B_BLOB);
        foreach ($otherbindvars as $bv) {
            // oci_bind_by_name(resource, bv_name, php_variable, length)
            oci_bind_by_name($this->stid, $bv[0], $bv[1], $bv[2]);
        }
        oci_set_action($this->conn, $action);
        oci_execute($this->stid, OCI_NO_AUTO_COMMIT);
        if ($dlob->save($blob)) {
            oci_commit($this->conn);
        }
    }
    */
    /*
    public function fetchOneLob($sql, $action, $lobcolname, $bindvars = array()) {
        $col = strtoupper($lobcolname);
        $this->stid = oci_parse($this->conn, $sql);
        foreach ($bindvars as $bv) {
            // oci_bind_by_name(resource, bv_name, php_variable, length)
            oci_bind_by_name($this->stid, $bv[0], $bv[1], $bv[2]);
        }
        oci_set_action($this->conn, $action);
        oci_execute($this->stid);
        $row = oci_fetch_array($this->stid, OCI_RETURN_NULLS);
        $lob = null;
        if (is_object($row[$col])) {
            $lob = $row[$col]->load();
            $row[$col]->free();
        }
        $this->stid = null;
        return($lob);
    }
    */
    
   
} // e n d  c l a s s  D b


