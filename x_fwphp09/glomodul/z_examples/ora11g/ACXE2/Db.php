<?php
//J:\awww\apl\dev1\afwww\glomodul\ACXE2\Db.php
// J:\dev_web\htdocs\test\t_oci8\ACXE2\Db.php
namespace Oracle;

//require('confDb.php');
define('SCHEMA',               'hr');
define('PASSWORD',             'hr');
define('DATABASE',             'sspc2/XE:pooled'); // DB c o n n  i d
define('CHARSET',              'UTF8'); // DB char set for returned data
define('CLIENT_INFO',          'AnyCo Corp.'); //Client Info text for DB tracing

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
      if ($this->stid) oci_free_statement($this->stid);
      if ($this->conn) oci_close($this->conn);
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


    /**
     * p ublic f unction e xecF etchAll($sql, $action, $b indvars = array()) {
     * Run a query and return all rows.
     *
     * @param string $sql A query to run and return all rows
     * @param string $action Action text for End-to-End Application Tracing
     * @param array $bindvars Binds. An array of (bv_name, php_variable, length)
     * @return array An array of rows
     */



/*  
Ora DB doesnt have a LIMIT clause to return a subset of rows so nesting the 
callers query is needed. PHPs array_push() function appends the extra bind 
variables used for the start and end row numbers in the outer query to any bind 
variables for the callers query.
Because the SQL text is concatenated watch out for SQL injection issues. Never pass 
user input into this function.
*/
/**
     * p ublic fn e xecF etchP age($sql, $action, $firstrow = 1, $numrows = 1, $bindvars = array()) {
     * Run a query and return a subset of records.  Used for paging through
     * a resultset.
     *
     * The query is used as an embedded subquery.  Don't permit user
     * generated content in $sql because of the SQL Injection security issue
     *
 * @param string $sql The query to run
     * @param string $action Action text for End-to-End Application Tracing
     * @param integer $firstrow The first row number of the dataset to return
     * @param integer $numrows The number of rows to return
     * @param array $bindvars Binds. An array of (bv_name, php_variable, length)
     * @return array Returns an array of rows
     */


 /**
     * p ublic fn r efcurE xecF etchAll($sql, $action, $r cname,  $o therb indvars = array()) {
     * Run a call to a stored procedure that returns a REF CURSOR data
     * set in a bind variable.  The data set is fetched and returned.
     *
     * Call like Db::refcur execfetchall("begin myproc(:rc, :p); end",
     *                            "Fetch data", ":rc", array(array(":p", $p, -1)))
     * The assumption that there is only one refcursor is an artificial
     * limitation of refcur execfetchall()
     *
     * @param string $sql A SQL string calling a PL/SQL stored procedure
     * @param string $action Action text for End-to-End Application Tracing
     * @param string $rcname the name of the REF CURSOR bind variable
     * @param array  $otherbindvars Binds. Array (bv_name, php_variable, length)
     * @return array Returns an array of tuples
     
REF CURSOR bind parameter in $rcname is bound to a cursor created with oci_new_
cursor(), not to a normal PHP variable. The type OCI_B_CURSOR must specified.

After setting tracing "action" text, PL/SQL statement is run. In this example it 
calls get_equip() which opens and returns cursor for query. 
REF CURSOR in $rc can now be treated like PHP statement identifier as if it 
had been returned from an oci_ parse() call. It is then fetched from. 
The query results are returned in $res to the function caller.
*/



    /**
     * p ublic f unction s etP ref etch($pf) {
     * Set the query prefetch row count to tune performance by reducing the
     * number of round trips to the database.  Zero means there will be no
     * prefetching and will be slowest.  A negative value will use the php.ini
     * default value.  Some queries such as those using LOBS will not have
     * rows prefetched.
     *
     * @param integer $pf The number of rows that queries should prefetch.
====> PHP must be linked with Oracle Database 11gR2 libraries for 
prefetching from REF CURSOR to work. When using earlier versions 
each requested REF CURSOR row required a roundtrip to the database, 
REDUCING SYSTEM PERFORMANCE
1. Zero will be slowest. System default is 100. No benefit if too large.
2. Ora dynamically allocates space - no benefit if too small.
3. PHP code that gets a REF CURSOR, fetches some data from it, and then passes
   cursor back to PL/SQL procedure which fetches remaining data. If prefetching 
   occurred when PHP fetches records from REF CURSOR, but those prefetched rows 
   were not returned to the script via an oci_fetch_* call, those rows would be 
   "lost" and would not be available to the second PL/SQL procedure.
    $db->setPrefetch(200); // Report generated in 0.002 seconds
    //$db->setPrefetch(0); // Report generated in 0.008 seconds    
    */



//Db::fetchRow() method to get one row at a time. 
//It is called in a loop after query has been run.
    /**
     * p ublic f unction f etchR ow() {
     * Fetch a row of data.  Call this in a loop after calling Db::execute()
     *
     * @return array An array of data for one row of the query
     *OCI_ASSOC tells PHP to return results in assoc.arr, using col names as arr keys
     *OCI_RETURN_NULLS flag tells PHP to return array entry for null data values. 
     *Value will be an empty string - arr for each row has same num of entries.
     */




 /**
     * p ublic fn a rrayI nsert($sql, $action, $a rrayb indvars, $otherb indvars = a rray()) {
     * Insert an array of values by calling a PL/SQL procedure
     * (Insert an array of equipment values for an employee)
     *
     * Call like Db::arrayinsert("begin myproc(:arn, :p); end",
     *                               "Insert stuff",
*                               array(array(":arn", $dataarray, SQLT_CHR)),
     *                               array(array(":p", $p, -1)))
     *
     * @param string $sql PL/SQL anonymous block
     * @param string $action Action text for End-to-End Application Tracing
     * @param array $arraybindvars Bind variables. An array of tuples
     * @param array $otherbindvars  Bind variables. An array of tuples
     
       number of elements in data array must now be passed in. 
In this app. oci_bind_array_by_name is being used only for inserting 
data from PHP so maximum data length parameter can be passed as -1. 
This tells PHP to use actual value lengths. Single oci_execute() call 
inserts all  data items into DB.


ARRAY BINDING ALSO WORKS FOR FETCHING DATA. PL/SQL procedures using efficient
BULK COLLECT syntax can return data to PHP in one OCI8 oci_execute() call. For 
retrieving data from Oracle the oci_bind_array_by_name() call would need to know 
how many items and what the maximum data size is so PHP can allocate the memory 
correctly.
     */



 /**
     * p ublic fn i nsertB lob($sql, $action, $b lobbindname, $blob, $otherb indvars = array()) {
     * Insert a BLOB
     *
     * $sql = 'INSERT INTO BTAB (BLOBID, BLOBDATA)
     *        VALUES(:MYBLOBID, EMPTY_BLOB()) RETURNING BLOBDATA INTO :BLOBDATA'
     * Db::insertblob($sql, 'do insert for X', myblobid', 
     * $blobdata, array(array(":p", $p, -1)));
     *
     * $sql = 'UPDATE MYBTAB SET blobdata = EMPTY_BLOB()
     *        RETURNING blobdata INTO :blobdata'
     * Db::insertblob($sql, 'do insert for X', 'blobdata', $blobdata);
     *
     * @param string $sql An INSERT or UPDATE statement that returns a LOB locator
     * @param string $action Action text for End-to-End Application Tracing
     * @param string $blobbindname Bind variable name of the BLOB in the statement
     * @param string $blob BLOB data to be inserted
     * @param array $otherbindvars Bind variables. An array of tuples
     
insertBlob() method accepts final option parameter for normal bind variables. 
This is not used when it is called in printcontent() in logo_upload.php.
The BLOB is bound as special type, similar to how a REF CURSOR was bound in the 
Chapter 6, "Showing Equipment Records by Using a REF CURSOR." PHP OCI8 also 
has a OCI_B_CLOB constant which can be used for binding CLOBs. The LOB descriptor is 
an instance of PHP OCI8s OCI-Lob class, which has various methods for uploading
and reading data. When oci_execute() is processed on the SQL INSERT statement the 
OCI_NO_AUTO_COMMIT flag is used. This is because the database transaction must 
remain open until the $dlob->save() method inserts the data. 
Finally, an explicit oci_commit() commits the BLOB.
     */




/**
     * p ublic fn f etchOneL ob($sql, $action, $l obc olname, $bi ndvars = array()) {
     * Runs a query that fetches a LOB column
     * @param string $sql A query that include a LOB column in the select list
     * @param string $action Action text for End-to-End Application Tracing
     * @param string $lobcolname The column name of the LOB in the query
     * @param array $bindvars Bind variables. An array of tuples
     * @return string The LOB data
     
oci_fetch_array() options could have included the OCI_RETURN_LOBS flag to 
indicate the data should be returned as a PHP string. The code here shows the column 
being returned as locator instead. This shows how locator can be operated on, here 
using the load() to read all the data and free() method to free up resources. If you 
had an application with very large data, the locator read() method could be used to 
process the LOB in chunks, which would be a memory efficient way of processing large 
data streams.
Unlike insertBlob() which bound using the OCI_B_BLOB type and was therefore 
specific for BLOBs, the fetchOneLob() can be used for both BLOB and CLOB data.
If app processes multiple images (or chunks of an image) sequentially in loop, 
for example:
  while (($img = $db->fetchOneLob($sql, "Get Logo", "pic")) != null ) {
      dosomething($img);
  }
then you can reduce PHPs peak memory usage by explicitly un-setting $img at
foot of the loop: 
      dosomething($img);
      $unset($img);
This allows memory allocated for current $img to be reused for next image 
data stream. Otherwise original image memory is only freed after PHP constructs 
second image and is ready to assign it to $img. 
This optimization is not needed by this app.
     */






/*
following article describes where client identifiers can be used in Ora DB: 
http://www.oracle.com/technetwork/articles/dsl/php-web-auditing-171451.html 

Setting statement identifier resource $this->stid to null initiates same internal 
cleanup as oci_free_statement() (used in the destructor) and also sets attribute 
to null so later methods can test for validity.

General Example of Running SQL in PHP OCI8
==========================================
Running a statement in PHP OCI8 involves parsing the statement text and running it. 
In procedural style an INSERT would look like:
    $c = oci_pconnect($un, $pw, $db, $cs);
    $sql = "INSERT INTO mytable (c1, c2) VALUES (1, 'abc')";
    $s = oci_ parse($c, $sql);
    oci_ execute($s);
If a statement will be re-run in the database system with different data values, then use 
bind variables:
    $c = oci_pconnect($un, $pw, $db, $cs);
    $sql = "INSERT INTO mytable (c1, c2) VALUES (:c1_bv, :c2_bv)";
    $s = oci_ parse($c, $sql);
    $c1 = 1;
    $c2 = 'abc';
    oci_bind_by_name($s, ":c1_bv", $c1, -1);
    oci_bind_by_name($s, ":c2_bv", $c2, -1);
    oci_ execute($s);

 to fetch all rows at once:
    $c = oci_pconnect($un, $pw, $db, $cs);
    $sql = "SELECT * FROM mytable WHERE c1 = :c1_bv AND c2 = :c2_bv";
    $s = oci_ parse($c, $sql);
    $c1 = 1;
    $c2 = 'abc';
    oci_bind_by_name($s, ":c1_bv", $c1, -1);
    oci_bind_by_name($s, ":c2_bv", $c2, -1);
    oci_ execute($s);
    oci_fetch_all($s, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);
    
    // ********************************
    
Our Db::execute() method allows us to write our INSERT statement as:
    $db = new \Oracle\Db("Test Example", "Chris");
    $sql = "INSERT INTO mytable (c1, c2) VALUES (:c1_bv, :c2_bv)";
    $c1 = 1;
    $c2 = 'abc';
    $db->execute($sql, "Insert Example", array(array(":c1_bv", $c1, -1),
                                               array(":c2_bv", $c2, -1)));
The query example would be:
    $db = new \Oracle\Db("Test Example", "Chris");
    $sql = "SELECT * FROM mytable WHERE c1 = :c1_bv AND c2 = :c2_bv";
    $c1 = 1;
    $c2 = 'abc';
    $res = $db->execFetchAll($sql, "Query Example", 
                             array(array(":c1_bv", $c1, -1),
                                   array(":c2_bv", $c2, -1)));
The Db instance creation uses a fully qualified namespace description.

 To make Db more general purpose you could consider 
changing Db::execute() to do:
        ...
        oci_ execute($this->stid, OCI_NO_AUTO_COMMIT);
        ...
        
In this case you would need to add commit and rollback methods to the Db class that 
call oci_commit() and oci_rollback() respectively. The examples in this manual 
don't require these changes. Note that in PHP any oci_connect() or any oci_
pconnect() call that uses the same connection credentials will reuse the same 
underlying connection to the database. So if an application creates two instances of Db, 
they will share the same transaction state. Rolling back or committing one instance 
will affect transactions in the other. The oci_new_connect() function is different and 
will create its own new connection each time it is called.
*/









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


