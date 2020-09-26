<?php
declare(strict_types=1);
/**
           DB (PERSISTENT STORAGE) ADAPTER T R A I T - PDO DBI
      This c l a s s is for all sites - does not know modules CRUD
    Other such scripts should be for csv persistent storage, web services...
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;
use B12phpfw\core\zinc\Config_allsites ;
            //namespace App\Library;  //use App\Library\App;
            //use PDO;

// may be named AbstractEntity :
trait Db_allsites
{
  /**
  * DB Trait seems better (?) than abstract cls-es inheritance in B12phpfw because Home_ctr may inherit Config_allsites which NOT extends Db_allsites, so Home_ctr may work with more DB trait. Solution without DB traits in B12phpfw also works (is NOT simpler, better ?).
  *
  * B12phpfw has DB adapter for nonCompound module is table CRUD, eg J:\awww\www\fwphp\glomodul\user\Tbl_crud.php.
  *B12phpfw "user" dir contains module (page) code for users table (CRUD code... non shareable with other modules , shares are in zinc dir).
  *
  *Compound modules like Msg - blog in index.php have folders list of all master and detail tables needed.
  */
    private static $instance = null ; //singleton! or protected static $DBH;

    private static $do_pgntion; //used in home.php...
            //To do : improve this (refactoring this code)
            //  For now J:\awww\www\zinc\Dbconn_allsites_mysql.php
            //  is copied to J:\awww\www\zinc\Dbconn_allsites.php
    //used in home.php switch (Db_allsites::$dbi)...
    private static $dbi ; // mysql or oracle or any  d b i  you wish

    private static $db_hostname ;
    private static $db_name ;
    private static $dsn ;
    private static $db_username ;
    private static $db_userpwd ;

    private static $dbobj;   // or $conn
    //private $stmt;    //P D O  statement handler, I use it only in dd fn
    private $errmsg;  //handle our error not used currently, can be useful

            /*
            private f unction __construct()
            {
                              //not working but : ctrl+u in ibrowser !!! :
                              //register_shutdown_function('self::_fatal_error_hndl');
                              //register_shutdown_function(array($this, '_fatal_error_hndl'));
            } //e n d  __ c o n s t r u c t
            */
             /*private static f unction _fatal_error_hndl() {
                           //not needed at script end define('PROGRAM_EXECUTION_SUCCESSFUL', true);
                           //if ( ! defined(PROGRAM_EXECUTION_SUCCESSFUL)) {
                  // fatal error has occurred
                  if($error !== NULL && $error['type'] === E_ERROR) {
                     $error = error_get_last();
                     echo '<pre>$error='; echo '$error='; print_r($error); echo '</pre>';
                  }
                           //}
             } */

  //     ~~~~~~~~~~~~~ C R U D f or all  t a b l e s !! ~~~~~~~~~~~~~~~~

  /**
   * openConnection : Start Application DB Conn.
   * @return Object PDO Instance
   */
  static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**')
  {
    list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
    , self::$db_username, self::$db_userpwd) 
    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_once !!

    self::$dsn = self::$dbi.':host='.self::$db_hostname.';dbname='.self::$db_name.';' ;

              if ('0') { ?>
              <span style="font-size:1.2em; color:green;"><b>~~~~~Step 02.4 ROOT<?=str_replace(ROOT,'',__FILE__)?></span></b>, lin=<?=__LINE__?>, param. string $called_from = <?=$called_from?>, returns self::$instance;

              <ol>
              <li>Cls <?=basename(explode('::', __METHOD__)[0])?> contains methods : <?=__METHOD__?>, closeConnection, getDBH,
                 <b>abstract (!!) CRUD methods :</b> countAll, all, findById, findWhere, findBySql, completeQueryString, save, create, update, delete, checkCasting.

              <li><b>DB Trait seems better ? than abstract cls-es inheritance</b> in B12phpfw because Home_ctr may inherit Config_allsites which NOT extends Db_allsites, so Home_ctr may work with any DB trait. Solution without DB traits in B12phpfw also works, is simpler (better ?). <b><span style="background:yellow;">B12phpfw has DB adapter for each table CRUD</b></span> eg J:\awww\www\fwphp\glomodul\user\Tbl_crud.php. B12phpfw "user" dir contains non shareable module (page) code for users table (CRUD code...) (shares are in zinc dir). Compound modules like Msg - blog in index.php have folders list of all master and detail tables needed.
              </ol>
              <?php
              }

    try
    {
      if( !isset( self::$instance ) || !(self::$instance instanceof PDO) )
      {
        //$dsn = 'mysql:host='. self::$hostpc .';dbname='. self::$dbname .';' ;
        $options = [
           \PDO::ATTR_PERSISTENT   => true
          ,\PDO::ATTR_ERRMODE      => \PDO::ERRMODE_EXCEPTION
          ,\PDO::ATTR_ORACLE_NULLS => \PDO::NULL_TO_STRING
        ];
        self::$instance = new \PDO(self::$dsn,self::$db_username,self::$db_userpwd,$options);
                    //self::$instance = new PDO(
                    //  'mysql:host=' . $db_hostname . ';dbname=' . $db_name, db_username, db_userpwd
                    //);
                    //self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        // NO NEED ($pp1 is better ?) Register in Service Container
        //App::register( 'DBH', self::$instance, __METHOD__ );
      }

      return self::$instance;

    }
    catch( PDOException $e )
    {
      die( 'Database Error: ' . $e->getMessage() );
    }
    # Method End
  }


  //  public static function disconnect() { self::$instance = null; }

  /**
   * closeConnection Close App DB Conn
   * @return Null
   */
  static public function closeDBConn()
  {
    if( isset( self::$instance ) )
      self::$instance = null;
    # Method End
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


  /**
   * getDBH : Get Database PDO Instance
   * @return Object P D O Instance OR Null
   */
    //if( !self::$instance )
    //  throw new Exception( 'there are no openned database connection' );
    //return self::$instance;
  #################################################################





  //used f or all  t a b l e s !!  , int $id = NULL
  static public function dd(object $pp1, array $other)
  {
    $tbl = $pp1->uriq->t ;
    $id  = $pp1->uriq->id ;
    if(NULL !== $id)
    {
      self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__); //d d(...
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                              echo '<pre>$tbl='; print_r($tbl) ; echo '</pre>';
                              echo '<pre>$id='; print_r($id) ; echo '</pre>';
                              exit(0) ;
                              }
      $sql = "DELETE FROM $tbl WHERE id=:id"; //FROM a dmins WHERE id='$id'";

      //$cursor is prepared sql dml object eg rows group object f or  r e a d n e x t
      //same as self::prepareSQL($sql);  was $this->stmt
      $stmt = self::$dbobj->prepare($sql); 

      $stmt->bindValue(':id',    $id,    \PDO::PARAM_INT); //PARAM_STR
      $Executed = $stmt->execute(); //self::e xecute();

      if ($Executed) {$_SESSION["SuccessMessage"]="Row id $id Deleted Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Deleting Went Wrong. Try Again !"; }

      //if (isset(Config_allsites::getp('uriq')->r)) { 
      if (isset($pp1->uriq->r)) { 
        self::Redirect_to(QS.'i/'. $pp1->uriq->r) ; 
      }

    }
  }


  static public function rrnext(object $cursor){
     return $cursor->fetch(\PDO::FETCH_OBJ);
  }

  /**
  * Shows how to use other two  r e a d  methods
  * To access table rows we must read this cursor !!
  */
  static public function rrcount($tbl)
  { 
    $cursor_rowcnt = self::rr("SELECT COUNT(*) COUNT_ROWS FROM $tbl") ;
    while ($row = self::rrnext($cursor_rowcnt)): {$r = $row ;} endwhile; //c_, R_, U_, D_
    //self::disconnect();
    return $r->COUNT_ROWS ;
  }


  static public function rr_last_id($tbl) {
    //           Tbl_crud_post::rr   $ s e l l s t       self::$tbl
    $cursor_maxid = self::rr("SELECT max(id) MAXID FROM ". $tbl //." WHERE $qrywhere"
       , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    //return $cursor ;
    $maxid = self::rrnext($cursor_maxid)->MAXID ;
    return $maxid;

    /*$cursor_maxid =  Tbl_crud_post::rr( $s ellst='max(id) MAXID' 
      ,$qrywhere="'1'='1'", $binds=[], $other=['caller'=>__FILE__ .' '.',ln '.__LINE__ ]);
    $maxid = Tbl_crud_post::rrnext($cursor_maxid)->MAXID ;
    return $maxid; */

    //while ($row = self::rrnext($c_r)): {$r = $row ;} endwhile;
    //$this::disconnect();
    //return $r->id;
  }


  /**
  * RETURNS OBJECT VARIABLE OF CURSOR (named SQL), NOT OBJ.VAR. OF TABLE ROW !!
  * To access table rows we must read this cursor !!
  */
  //c=cursor - used f or all  t a b l e s !! was read_row
  static public function rr( $dmlrr, $binds = [], $other = [] )
  {
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '$dmlrr=' . $dmlrr ;
                echo '<br />$binds='; print_r($binds) ;
                echo '<br />$caller=' . $caller ;
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
    //SELECT * FROM posts WHERE '1'='1' ORDER BY datetime desc L IMIT :row_ordno, 5

    // paginated select :
    //if (!$onerow and self::$dbi == 'oracle' and self::$do_pgntion) {
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

    //      B I N D I N G  VALUES TO SQL PARAMETERS   see (**1)
    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              //$this->stmt->bindValue($param, $value, $type);
              $cursor->bindvalue($arr['placeh'], $arr['valph'], \PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], (int)$arr['valph'], \PDO::PARAM_INT);
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }
          //if same ph more times eg title LIKE :search OR category LIKE :search... :
          //not working $dmlrr = str_replace($arr['placeh'], $arr['valph'], $dmlrr) ;
          //   see :search1,2...
      }
    } // ----------------------------------
    //e n d             B I N D I N G

    execute_sql:
                if ('') {echo '<h3>[P D O  DEBUG] '.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '$dmlrr=' . $dmlrr ;
                echo '<br />$binds='; print_r($binds) ;
                echo '<br />'.'self::debugPDO($dmlrr, $ph_val_arr)='. self::debugPDO($dmlrr, $ph_val_arr) ;
                              //.'<br />'.' &nbsp;  &nbsp; $sql_1st_rblk_arr=' . json_encode($sql_1st_rblk_arr)
                              //.'<br />'.' &nbsp;  &nbsp; $sql_partlimit_arr=' . json_encode($sql_partlimit_arr)
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
    //if ($o nerow) { return $cursor->fetch(P DO::FETCH_OBJ);
    //} else       { return $cursor ; }


  } //e n d  r r (




  // binds arr eg 'placeh'=>':artist','valph'=>$varij, 'tip'=>'str' or int
  static public function cc( string $tbl, string $flds, string $valsins
     , array $binds = [], array $other = [] ) //used for all  tabls !!
  {

    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__);

    $sql = "INSERT INTO $tbl($flds) $valsins";
                        if ('') {self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE d b o b j'
                           ,'self::$d bi'=>self::$dbi
                           //,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ;
                        }


    $cursor = self::$dbobj->prepare($sql);

    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              $cursor->bindvalue($arr['placeh'], $arr['valph'], \PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], $arr['valph'], \PDO::PARAM_INT);
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }

      }
    } // ----------------------------------
                  if ('1') { echo '<b>'. __METHOD__ .'</b>' .', line '. __LINE__ .' SAYS :<br />' ;
                    echo '<pre>' ; print_r(str_replace('VALUES(', '<br />VALUES('
                      , self::debugPDO($sql, $ph_val_arr)) );
                    echo '</pre>'; //exit();
                  } 
                //useful f or debugging: you can see SQL behind above construction by using:
                //echo '[ P D O DEBUG ]: ' . self::debugP D O($sql,$ph_val_arr); exit();
    $Executed = $cursor->execute(); //$this->e xecute();
    $last_id = self::rr_last_id($tbl) ;

      if ($Executed) {$_SESSION["SuccessMessage"]="Last row id $last_id Added Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Adding Went Wrong. Try Again !"; }

    //return $cursor ;

  }






  //used f or all  t a b l e s !!
  static public function uu( $tbl, $flds, $where, $binds = [] )
  {
    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__); // u u(...

    $sql = "UPDATE $tbl $flds $where";

    $cursor = self::$dbobj->prepare($sql);

    $ph_val_arr = [] ;
    if (count($binds) > 0) { // ------------
      foreach ($binds as $idx => $arr) //may be f or array_expression
      {
          //$arr is eg ['placeh'=>':AName',  'valph'=>$vv[0], 'tip'=>'str']
          $ph_val_arr[ $arr['placeh'] ] = $arr['valph'] ;
          switch ($arr['tip'])
          {
            case 'str' :
              $cursor->bindvalue($arr['placeh'], $arr['valph'], \PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], $arr['valph'], \PDO::PARAM_INT);
               break;
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }
          //if same ph more times eg title LIKE :search OR category LIKE :search... :
          //not working $sql = str_replace($arr['placeh'], $arr['valph'], $sql) ;
          //   see :search1,2...
      }
    } // ----------------------------------
                if ('') {
                  //useful f or debugging: you can see SQL behind above construction by using:
                  //echo '[ P D O  DEBUG ]: ' . self::debugP DO($sql,$ph_val_arr);
                  /*
                  self::jsmsg( [ //b asename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->u riq'=>$this->u riq
                   ] ) ; */
                   echo '<h3>'. __METHOD__ .' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                   echo '<pre>$_GET ='; print_r($_GET); echo '</pre><br />';
                   echo '<pre>$_POST ='; print_r($_POST); echo '</pre><br />';
                   echo '<pre>$sql ='; print_r($sql); echo '</pre><br />';
                   echo '<pre>$ph_val_arr ='; print_r($ph_val_arr); echo '</pre><br />';
                   echo '<pre>$this->u riq ='; print_r($this->getp('uriq')); echo '</pre><br />'; //not $this->u riq // $this->u riq =stdClass Object( [d] => 39 )
                  exit();
                }


    //$Executedsql =
    $cursor->execute(); //$this->e xecute();

    return $cursor ;


  }


  //e n d   ~~~~~~~~~~~~~ C R U D ~~~~~~~~~~~~~~~~




  static public function debugPDO($raw_sql, $parameters) {
    $keys = array();
    $values = $parameters;
    foreach ($parameters as $key => $value): {
        // check if named parameters (':param') or anonymous parameters ('?') are used
        if (is_string($key)) {
            $keys[] = '/' . $key . '/';
        } else {
            $keys[] = '/[?]/';
        }

        // bring parameter into human-readable format
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
    $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

    return $raw_sql;
  }






} // e n d  c l s  D b_ allsites

/*

*/