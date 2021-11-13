<?php
// J:\awww\www\vendor\b12phpfw\Db_allsites.php
declare(strict_types=1);
namespace B12phpfw\core\b12phpfw ; //was B12phpfw\core\zinc ;
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

      $stmt->bindValue(':id',    $id,    \PDO::PARAM_INT); //PARAM_STR
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
    $rx = $cursor->fetch(\PDO::FETCH_OBJ);
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
              $cursor->bindvalue($arr['placeh'], $arr['valph'], \PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], (int)$arr['valph'], \PDO::PARAM_INT);
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




  static public function cc( string $tbl, string $flds, string $valsins
     , array $binds = [], array $other = [] ) //used for all  tabls !!
  {

    self::$dbobj=self::get_or_new_dball(__METHOD__,__LINE__,__METHOD__);

    $last_id1 = self::rr_last_id($tbl) ;
                if ('') { echo '<h2>'. __METHOD__ .'</h2>, line '. __LINE__ .' SAYS :<br />';
                } 
    $dmlcc = "INSERT INTO $tbl($flds) $valsins"; // *************** c c (
                        if ('') {self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE d b o b j'
                           ,'self::$d bi'=>self::$dbi
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
                if ('') { echo '<b>'. __METHOD__ .'</b>, line '. __LINE__ .' SAYS :<br />';
                  $tmp = self::debugPDO($dmlcc, $binds, $ph_val_arr) ; } 
                //exit() is in d ebugPDO
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

    exit() ; 
    return $dmlxx_binded;
  }




} // e n d  c l s  D b_ allsites

/*

*/