<?php
// J:\awww\www\vendor\b12phpfw\Db_allsites.php
declare(strict_types=1);
namespace B12phpfw\core\b12phpfw ; //was B12phpfw\core\zinc ;

use \PDO as PDO ;
use B12phpfw\core\b12phpfw\Config_allsites as utl ;

trait Db_allsites  // may be named AbstractEntity :
{
    private static $instance = null ; //singleton! or protected static $DBH;

    private static $do_pgntion; //used in home.php...

    private static $dbi ; // mysql or oracle or any  d b i  you wish
    private static $db_hostname ;
    private static $db_name ;
    private static $dsn ;
    private static $db_username ;
    private static $db_userpwd ;

    private static $dbobj;   // or $conn
    private $errmsg; //handle our error not used currently, can be useful

  static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**')
  {
    list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
    , self::$db_username, self::$db_userpwd) 
    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!

            //      mysql:host=localhost;dbname=test;port=3306;charset=utf8mb4
            //driver^    ^ colon         ^param=value pair    ^semicolon 
    self::$dsn = self::$dbi.':host='.self::$db_hostname.';dbname='.self::$db_name.';' ;

              if ('0') { ?>
              <span style="font-size:1.2em; color:green;"><b>~~~~~Step 02.4 ROOT<?=str_replace(ROOT,'',__FILE__)?></span></b>, lin=<?=__LINE__?>, param. string $called_from = <?=$called_from?>, returns self::$instance;

              <ol>
              <li>Cls <?=basename(explode('::', __METHOD__)[0])?> contains methods : <?=__METHOD__?>, closeConnection, getDBH,
                 <b>abstract (!!) CRUD methods :</b> countAll, all, findById, findWhere, findBySql, completeQueryString, save, create, update, delete, checkCasting.

              <li><b>DB Trait seems better ? than abstract cls-es inheritance</b> in B12phpfw because Home_ctr may inherit Config_ allsites which NOT extends Db_ allsites, so Home_ctr may work with any DB trait. Solution without DB traits in B12phpfw also works, is simpler (better ?). <b><span style="background:yellow;">B12phpfw has DB adapter for each table CRUD</b></span> eg J:\awww\www\fwphp\glomodul\user\Tbl_ crud.php. B12phpfw "user" dir contains non shareable module (page) code for users table (CRUD code...) (shares are in vendor/b12phpfw dir). Compound modules like Msg - blog in index.php have folders list of all master and detail tables needed.
              </ol>
              <?php
              }
              //see ***1
    try
    {
      if( !isset( self::$instance ) || !(self::$instance instanceof PDO) )
      {
        // FETCH_ASSOC
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
          //,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
          //,PDO::ATTR_EMULATE_PREPARES   => false
        ];
        self::$instance = new PDO(self::$dsn,self::$db_username,self::$db_userpwd,$options);

      }

      return self::$instance;

    }
    catch( PDOException $e )
    {
      die( 'Database Error: ' . $e->getMessage() );
    }
    # Method End
  }


  static public function closeDBConn()
  {
    if( isset( self::$instance ) )
      self::$instance = null;
    //also eg $sth = null; where $sth = $dbh->query('SELECT * FROM foo')
  }


  static public function getdbi()
  {
    return self::$dbi ;
    # Method End
  }

  static public function setdo_pgntion($new_val)
  {
    self::$do_pgntion = $new_val ;
    return self::$do_pgntion ;
    # Method End
  }


  static public function dd(object $pp1, array $other)
  {
                    if ('') { echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS:</h3>' ;
                    //echo '<pre>$pp1->uriq='; print_r($pp1->uriq) ; echo '</pre>';
                    exit(0) ;
                    }
    $tbl = $pp1->uriq->t ;
    $id  = $pp1->uriq->id ;
    if(NULL !== $id)
    {
      self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__); //d d(...
      $dmldd = "DELETE FROM $tbl WHERE id=:id"; // *************** d d (

      $stmt = self::$dbobj->prepare($dmldd); 

      $stmt->bindValue(':id',    $id,    PDO::PARAM_INT); //PARAM_STR
      $Executed = $stmt->execute(); //self::e xecute();

      if ($Executed) {$_SESSION["MsgSuccess"]="Row id $id Deleted Successfully ! ";
      }else { $_SESSION["MsgErr"]="Deleting Went Wrong. Try Again !"; }

      if (isset($pp1->uriq->r)) { 
        self::Redirect_to(QS.'i/'. $pp1->uriq->r) ; 
      }

    }
  }


  static public function rrnext(object $cursor, $other = []) //: object
  {
                //echo '<pre>$other='; print_r($other); echo '</pre>';
                if ('') { if (!is_object($cursor)) { echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS:</h3>' ; echo '<b>(object)$cursor</b>='; echo '<pre>'; print_r((object)$cursor); echo '</pre>'; } }
    $rx = $cursor->fetch(PDO::FETCH_OBJ);
                if ('') { if (!is_object($rx)) { echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS:</h3>' ; echo '<b>(object)$rx</b>='; echo '<pre>'; print_r((object)$rx); echo '</pre>'; } }

    if (!is_object($rx)) { 
       return ((object)['rexists' => false]); 
    }
    $rx->rexists = true ;
    switch (self::getdbi()) { case 'oracle' : $rx = utl::rlows($rx) ; break; default: break; } //all row fld names lowercase

    return $rx ;
  }

  /**
  * Shows how to use other two  r e a d  methods
  * 
  */
  static public function rrcount($tbl)
  { 
    $cursor_rowcnt = self::get_cursor("SELECT COUNT(*) COUNT_ROWS FROM $tbl") ;
    //while ($row = self::r rnext($cursor_rowcnt)): {$rx = $row ;} endwhile; //c_, R_, U_, D_
    $COUNT_ROWS = self::rrnext( $cursor_rowcnt
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    //self::disconnect();
    return $COUNT_ROWS ; //return $rx->COUNT_ROWS ;
  }


  static public function rr_last_id($tbl) {
    $cursor_maxid = self::get_cursor("SELECT max(id) MAXID FROM ". $tbl //." WHERE $qrywhere"
       , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //return $cursor ;
    $maxid = self::rrnext( $cursor_maxid
      , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->MAXID ;
    return $maxid;

  }


  static public function get_cursor( $dmlrr, $binds = [], $other = [] ): object // ********* r r (
  {
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '<br />$caller='; print_r($other) ; ;
                echo '$dmlrr=' . $dmlrr ;
                echo '<br />$binds='; print_r($binds) ;
                echo '</pre>';
                }
    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__);
                    //if ($where == "SQLin_flds") {$dmlrr = $flds;}
                    //else {$dmlrr = "SELECT $flds FROM $tbl WHERE $where";}
    $sql_partlimit_arr = explode('LIMIT', $dmlrr) ;
    $sql_1st_rblk_arr = [] ; // non paginated (limited) SQL
    if (isset($sql_partlimit_arr[1])) {
      $sql_1st_rblk_arr = explode(',', $sql_partlimit_arr[1]) ;
    }

    if (self::$dbi == 'oracle' and self::$do_pgntion) {
        self::$do_pgntion = '';
        $dmlrr = str_replace('LIMIT :first_rinblock, :rblk','', $dmlrr) ;
        switch (self::$dbi)
        {
          case 'oracle' :
            $dmlrr = '
              SELECT *
              FROM (SELECT A.*, ROWNUM AS RNUM
                      FROM (' . $dmlrr . ') A
                      WHERE ROWNUM <= :last_rinblock
              )
              WHERE RNUM >= :first_rinblock
                  ';
            break;
            //$first_rinblock = $firstrow, -1 ;
            //$last_rinblock  = $firstrow + $numrows - 1 ;
          default:
            break;
        }
    }

    $cursor = self::$dbobj->prepare($dmlrr); //not $this->stmt =...

    //      B I N D I N G  VALUES TO SQL PARAMETERS 
    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              //$this->stmt->bindValue($param, $value, $type);
              $cursor->bindvalue($arr['placeh'], $arr['valph'], PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], (int)$arr['valph'], PDO::PARAM_INT);
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }

      }
    } // ----------------------------------
    //e n d             B I N D I N G

    execute_sql:
                if ('') { echo '<b>'. __METHOD__ .'</b>, line '. __LINE__ .' SAYS :<br />';
                $tmp = self::debugPDO($dmlrr, $binds, $ph_val_arr) ; }
                //exit() is in d ebugPDO
                if ('') {echo '<h3>[P D O  DEBUG] '.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                  //echo '<br />'.' &nbsp;  &nbsp; $sql_1st_rblk_arr=' . json_encode($sql_1st_rblk_arr) .'<br />'.' &nbsp;  &nbsp; $sql_partlimit_arr=' . json_encode($sql_partlimit_arr)
                echo //'<br />'.'$o nerow=' . $o nerow
                '<br />'.'self::$d bi=' . self::$dbi ;
                  echo '<br />$sql_1st_rblk_arr='; print_r($sql_1st_rblk_arr) ;
                  echo '<br />$sql_partlimit_arr='; print_r($sql_partlimit_arr) ;
                echo '</pre>';
                //exit(); //somethimes we need break execution
                }
    //$Executedsql =
    $cursor->execute();

    return $cursor ;

  } //e n d  get_ cursor






    /**
     *       PRE cc or uu (in Oracle Forms this code is hidden)
     *            DIFFERENCES c r e (cc)  -  u p d (uu)
     * 1. id is not here (cc does not need it)
     * 2. for cc : $ccflds_ placeh, for uu : $uuflds_ placeh
     */
  static public function pre_cc_uu(
       array $col_names, string &$col_nam_str
     , string &$ccflds_placeh, string &$uuflds_placeh
     , array &$binds, array $col_bind_types
  ): object //void 
  { 
    $row = [];

    $ii=0; foreach ($col_names as $cname) //array
    { 
      $col_tmp = $_POST[$cname] ?? '' ;
      $col_value = utl::escp($col_tmp) ;
      $row[$cname] = $col_value ; //for view script fields
      if ($ii==0) { 
         $col_nam_str   = $cname ;     //string eg title, author...
         $ccflds_placeh = ":$cname" ;         //for VALUES(,  eg :title, :author...
         $uuflds_placeh = "$cname = :$cname" ;//for SET, title=:title,author=:author...
         $binds[]       = // placeholder_name , value, type :
         ['placeh'=>':'. $cname,'valph'=>$col_value,'tip'=>$col_bind_types[0]];
      } else { 
         $col_nam_str   .= ", $cname" ; 
         $ccflds_placeh .= ", :$cname" ; 
         $uuflds_placeh .= ", $cname = :$cname" ;
         $binds[]        = 
         ['placeh'=>':'. $cname,'valph'=>$col_value,'tip'=>$col_bind_types[$ii]];
      }
      $ii++ ;
    } unset($cname); // break the reference with the last element
                 //echo '<pre>$row='; print_r($row) ; echo '</pre>';
    return((object)$row) ;
  } //e n d  f n  D O
  
    /**
     * OBJECT RELATIONAL MAPPING (ORM) is the technique of accessing a relational DB 
     * using an object-oriented programming LANGUAGE. 
     * ORM is a way to manage DB data by "mapping" DB tables rows to classes and c. instances.
     * ACTIVE RECORD (AR) is one of such ORMs.
     *
     * The big difference between AR style and the DATA MAPPER (DM) style is :
     * DM completely separates your domain (bussiness logic) 
     * from persistence layer (data source eg DB, csv...). 
     *
     * The big benefit of DM pattern is, your domain objects (DO) code don't need to know anything
     * about how DO are stored in data source.
     */


  //used for all  tabls !!
  static public function cc(
    string $tbl, string $flds, string $valsins, array $binds = [], array $other = [] ) 
  {
              //if ('1') { echo '<h4>'. __METHOD__ .', line '. __LINE__ .' SAYS :11111'.'</h4>';}
    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__);

    $last_id1 = self::rr_last_id($tbl) ;
              //if ('') { echo '<h2>'. __METHOD__ .'</h2>, line '. __LINE__ .' SAYS :<br />';} 
    $dmlcc = "INSERT INTO $tbl($flds) $valsins"; // *************** c c (
                        if ('') {self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE d b o b j'
                           ,'self::$ d b i'=>self::$dbi
                           //,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ;
                        }

    $cursor = self::$dbobj->prepare($dmlcc);

    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              $cursor->bindvalue($arr['placeh'], $arr['valph'], PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], $arr['valph'], PDO::PARAM_INT);
               break;
            case 'frm_' : // ignore non DB data
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }

      }
    } // ----------------------------------




                if ('') { echo '<h4>'. __METHOD__ .', line '. __LINE__ .' SAYS :11111'.'</h4>';
                  $tmp = self::debugPDO($dmlcc, $binds, $ph_val_arr) ; 
                  exit() ; //is not in d ebugPDO
                } 
    $Executed = $cursor->execute(); //$this->e xecute();

    $last_id2 = self::rr_last_id($tbl) ;

    if ($last_id2 > $last_id1) // if ($Executed) 
    { $_SESSION["MsgSuccess"]="Last row id $last_id2 Added Successfully ! ";
    } else { $_SESSION["MsgErr"]="Adding Went Wrong. Try Again !"; }

    //return $cursor ;

  } //e n d  c c (






  //used f or all  t a b l e s !!
  static public function uu( $tbl, $flds, $where, $binds = [] )
  {
    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__); // u u(...

    $dmluu = "UPDATE $tbl $flds $where"; // *************** u u (

    $cursor = self::$dbobj->prepare($dmluu);

    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          //$arr is eg ['placeh'=>':AName',  'valph'=>$vv[0], 'tip'=>'str']
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              $cursor->bindvalue($arr['placeh'], $arr['valph'], PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], $arr['valph'], PDO::PARAM_INT);
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }

      }
    } // ----------------------------------
                if ('') { echo '<b>'. __METHOD__ .'</b>, line '. __LINE__ .' SAYS :<br />';
                $tmp = self::debugPDO($dmluu, $binds, $ph_val_arr) ; }
                if ('') {
                  /*
                  self::jsmsg( [ //b asename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_ allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->u riq'=>$this->u riq
                   ] ) ; */
                   echo '<h3>'. __METHOD__ .' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                   echo '<pre>$_GET ='; print_r($_GET); echo '</pre><br />';
                   echo '<pre>$_POST ='; print_r($_POST); echo '</pre><br />';
                  //exit();
                }

    $cursor->execute(); //$this->e xecute();

    return $cursor ;


  } //e n d  u u (


  //e n d   ~~~~~~~~~~~~~ C R U D ~~~~~~~~~~~~~~~~




  static public function debugPDO(string $dmlxx, array $binds, array $ph_val_arr): string
  {
    $keys   = array();
    $values = $ph_val_arr; // parameters
    foreach ($ph_val_arr as $key => $value): {
        // 1. check if named p arameters (':param') or anonymous p arameters ('?') are used
        if (is_string($key)) {
            $keys[] = '/' . $key . '/';
        } else {
            $keys[] = '/[?]/';
        }

        // 2. bring parameter into human-readable format
        if (is_string($value)) {
            $values[$key] = "'" . $value . "'";
        } elseif (is_array($value)) {
            $values[$key] = implode(',', $value);
        } elseif (is_null($value)) {
            $values[$key] = 'NULL';
        }
    } endforeach ;
                       /*
                        echo "<pre>"; echo "[DEBUG] Keys:"; print_r($keys);
                        echo "\n[DEBUG] Values: "; print_r($values); echo "</pre>";
                       */
    $dmlxx_binded = preg_replace($keys, $values, $dmlxx, 1, $count);

    echo '<pre>$dmlxx ='; echo($dmlxx); echo '</pre><br />';

    echo '<pre>$binds='; print_r($binds) ;

    echo '<pre>$ph_val_arr ='; print_r($ph_val_arr); echo '</pre>';

    echo '<pre>$dmlxx_binded =';
        echo( str_replace( 'VALUES(', '<br />VALUES(', $dmlxx_binded ) ) ;
   echo '</pre>';

    //exit() ; 
    return $dmlxx_binded;
  }




} // e n d  c l s  D b_ allsites

/* // ***1 :
 * https://www.php.net/manual/en/pdo.connections.php
 *PERSISTENT CONNECTIONS are not closed at the end of the script, but are cached and re-used when another script requests a connection using the same credentials. Persistent connection cache allows you to avoid the overhead of establishing a new connection every time a script needs to talk to DB, resulting in faster web app.

 *The value of the PDO::ATTR_PERSISTENT option is converted to bool (enable/disable persistent connections), unless it is a non-numeric string, in which case it allows to use MULTIPLE PERSISTENT CONNECTION POOLS. This is useful if different connections use incompatible settings, for instance, different values of PDO::MYSQL_ATTR_USE_BUFFERED_QUERY.

 * https://phpdelusions.net/pdo

*/