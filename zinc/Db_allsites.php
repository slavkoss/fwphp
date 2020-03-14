<?php
/**
* J:\awww\www\zinc\Db_allsites.php - abstract CRUD class
* may be named abstract class AbstractDataMapper.php
*   - encapsulates AS MUCH MAPPING LOGIC AS POSSIBLE
*   - couple of generic row object finders (get cursor, not record sets)
*   - read row objects is in Tblname_crud domain objects so I do not do so :
*     logic required for pulling in data from a specified table which is then used
*     for reconstituting domain objects in a valid state. Because reconstitutions
*     should be delegated down the hierarchy to refined implementations, 
*     newrow_obj() (createEntity()) method has been DECLARED ABSTRACT.
*/
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;
use PDO;

//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Db_allsites extends Dbconn_allsites
{
    // can be named AbstractEntity
    private $stmt;    //PDO statement handler, I use it only in dd fn
    
    //$this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); 
    private $dbobj;   // or $conn 
    
    private $errmsg;  //handle our error not used in first versions, can be useful


  private function __construct()
  {
  } //e n d  __ c o n s t r u c t

  //     ~~~~~~~~~~~~~ C R U D f or all  t a b l e s !! ~~~~~~~~~~~~~~~~

  // binds arr eg 'placeh'=>':artist','valph'=>$varij, 'tip'=>'str' or int
  public function cc( $db, $tbl, $flds, $what, $binds = [] ) //used for all  tabls !!
  {
    $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); 
    $sql = "INSERT INTO $tbl($flds) $what";
    //$cursor is prepared sql dml object eg rows group object f or  r e a d n e x t
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE d b o b j'
                           ,'self::$d bi'=>self::$dbi
                           //,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ; 
                        }


    $cursor = $this->dbobj->prepare($sql);

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
            default:
               $cursor->bindvalue($arr['placeh'], $arr['valph']) ;
               break;
          }
          //if same ph more times eg title LIKE :search OR category LIKE :search... :
          //not working $sql = str_replace($arr['placeh'], $arr['valph'], $sql) ;
          //   see :search1,2...
      }
    } // ----------------------------------
                  if ('') { echo '<pre>' ;
                      print_r(self::debugPDO($sql,$ph_val_arr));
                      echo '--SAYS '.basename( __FILE__ ) .', line '. __LINE__  ;
                    echo '</pre>'; } //exit();
                //useful f or debugging: you can see SQL behind above construction by using:
                //echo '[ PDO DEBUG ]: ' . self::debugPDO($sql,$ph_val_arr); exit();
    $cursor->execute(); //$this->e xecute();
    return $cursor ;

  }



  public function rrnext($cursor){
     return $cursor->fetch(PDO::FETCH_OBJ);
  }

  /**
  * Shows how to use other two  r e a d  methods
  * To access table rows we must read this cursor !!
  */
  public function rrcount($tbl){ //read1_ or_get_c('1',$this,'posts')->COUNT_ROWS
    $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); 
    $c_r = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM $tbl") ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
    //$this::disconnect();
    return $r->COUNT_ROWS ;
  }


  public function rr_last_id($tbl) {
    $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); 
    $c_r = $this->rr("SELECT max(id) id FROM $tbl" 
        , [], __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; 
    //$this::disconnect();
    return $r->id;
  }


  /**
  * RETURNS OBJECT VARIABLE OF CURSOR (named SQL), NOT OBJ.VAR. OF TABLE ROW !!
  * To access table rows we must read this cursor !!
  */
  //c=cursor - used f or all  t a b l e s !! was read_row
  public function rr( $sql, $binds = [], $caller = '' )
  {
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '$sql=' . $sql ;
                echo '<br />$binds='; print_r($binds) ;
                echo '<br />$caller=' . $caller ;
                echo '</pre>';
                }

    $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__);

    //if ($where == "SQLin_flds") {$sql = $flds;}
    //else {$sql = "SELECT $flds FROM $tbl WHERE $where";}

    $sql_partlimit_arr = explode('LIMIT', $sql) ;
    $sql_1st_rblk_arr = [] ; // non paginated (limited) SQL
    if (isset($sql_partlimit_arr[1])) {
      $sql_1st_rblk_arr = explode(',', $sql_partlimit_arr[1]) ;
    }
    //SELECT * FROM posts WHERE '1'='1' ORDER BY datetime desc L IMIT :row_ordno, 5 

    // paginated select :
    //if (!$onerow and self::$dbi == 'oracle' and self::$do_pgntion) {
    if (self::$dbi == 'oracle' and self::$do_pgntion) {
        self::$do_pgntion = '';
        $sql = str_replace('LIMIT :first_rinblock, :rblk','', $sql) ;
        switch (self::$dbi)
        {
          case 'oracle' :
            $sql = '
              SELECT *
              FROM (SELECT A.*, ROWNUM AS RNUM
                      FROM (' . $sql . ') A
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

    $cursor = $this->dbobj->prepare($sql); //not $this->stmt = :
              //not $cursor = $this->prepare($sql); //not $this->stmt = :

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
              $cursor->bindvalue($arr['placeh'], $arr['valph'], PDO::PARAM_STR) ;
              break;
            case 'int' :
               $cursor->bindValue($arr['placeh'], (int)$arr['valph'], PDO::PARAM_INT);
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
    //e n d             B I N D I N G

    execute_sql:
                if ('') {echo '<h3>[PDO DEBUG] '.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '$sql=' . $sql ;
                echo '<br />$binds='; print_r($binds) ;
                echo '<br />'.'self::debugPDO($sql, $ph_val_arr)='. self::debugPDO($sql, $ph_val_arr) ;
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
    //Warning: Creating default object from empty value in J:\awww\www\zinc\Db_allsites.php on line 199
        /* $_SESSION['states']->history[] = self::debugPDO($sql,$ph_val_arr);
        if (count($_SESSION['states']->history) > 25) {
          array_shift($_SESSION['states']->history); //array_pop=remove last & return it
        }
        $_SESSION['states']->sql = self::debugPDO($sql,$ph_val_arr); */

    return $cursor ;
    //if ($o nerow) { return $cursor->fetch(PDO::FETCH_OBJ);
    //} else       { return $cursor ; }


  }


  //used f or all  t a b l e s !!
  public function uu( $db, $tbl, $flds, $where, $binds = [] )
  {
    //eg 'placeh'=>':artist', 'valph'=>$varij, 'tip'=>'str' or int
    //$this->set_dbobj(basename(__FILE__), __LINE__, __METHOD__) ; // u u(...
    $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); // u u(...
    //$sql = "S ELECT COUNT(*) COUNT_ROWS FROM comments WHERE post_id='$PostId' AND status='ON'";
    $sql = "UPDATE $tbl $flds $where";

    $cursor = $this->dbobj->prepare($sql);

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
          //if same ph more times eg title LIKE :search OR category LIKE :search... :
          //not working $sql = str_replace($arr['placeh'], $arr['valph'], $sql) ;
          //   see :search1,2...
      }
    } // ----------------------------------
                if ('') { 
                  //useful f or debugging: you can see SQL behind above construction by using:
                  //echo '[ PDO DEBUG ]: ' . self::debugPDO($sql,$ph_val_arr);
                  /*
                  self::jsmsg( [ //basename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->u riq'=>$this->u riq
                   ] ) ; */
                   echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
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


  public function dd(string $tbl, int $id = NULL) //used f or all  t a b l e s !!
  {
    if(NULL !== $id)
    {
      $this->dbobj=Dbconn_allsites::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); //d d(...
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: ' ;
                              echo '<pre>$tbl='; print_r($tbl) ; echo '</pre>';
                              echo '<pre>$id='; print_r($id) ; echo '</pre>';
                              exit(0) ;
                              } 
      $sql = "DELETE FROM $tbl WHERE id=:id"; //FROM a dmins WHERE id='$id'";
      $this->stmt = $this->dbobj->prepare($sql); //same as $this->prepareSQL($sql);
      //$this->stmt->bindValue(':tbl',   $tbl,   PDO::PARAM_STR);
      $this->stmt->bindValue(':id',    $id,    PDO::PARAM_INT);
      $Executed = $this->stmt->execute(); //$this->e xecute();

      if ($Executed) {$_SESSION["SuccessMessage"]="Row id $id Deleted Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Deleting Went Wrong. Try Again !"; }

      if (isset($this->getp('uriq')->r)) { $this->Redirect_to(QS.'i/'.$this->getp('uriq')->r) ; }

    }
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
    //self::$d bi_obj = $this->p p1->d bi_obj ;
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s004. BEFORE $dsn = ...'
                           ,'self::$d bi_obj'=>self::$d bi_obj
                           //,'$caller'=>$caller IS ALLWAYS get_ or_ new_ dball
                           ,'$this->p p1->d bi_obj'=>isset($this->p p1->d bi_obj)?:'NOT SET'
                           //, '$dsn'=>$dsn
                           ] ) ; }
    //if ( (is_object($this->dbobj) and !$instantiate) ) { null; } else 
    {
      //switch ($conn_ par_ obj->dbi)
      switch (self::$d bi_obj->dbi)
      {
        case 'oracle' : 
          //$dsn = 'oci:dbname='.$conn_ par_ obj->host;
          $dsn = 'oci:dbname=' . self::$d bi_obj->host;
          break;
        default: 
          //self::dbi_obj={ db_new_instance : db_new_instance , dbi : mysql , host : localhost , dbnm : z_blogcms , user : root , pass :  
          //$dsn ="mysql:host=" . $this->host . "; dbname=" . $this->dbnm;
          $dsn =  'mysql:host=' . self::$d bi_obj->host.';'
                 .' dbname='.self::$d bi_obj->dbnm.';'
          ;
          break;
      }
    }
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s004. BEFORE new PDO'
                           , '$dsn'=>$dsn
                           ] ) ; }
    //PDO (CRUD DBI) part of memory ocupied for this cls :
    $this->dbobj = new PDO(
         $dsn 
       , self::$d bi_obj->user
       , self::$d bi_obj->pass
       , [  PDO::ATTR_PERSISTENT    => true
           ,PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
           ,PDO::ATTR_ORACLE_NULLS  => PDO::NULL_TO_STRING
           //,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
       ]
    ); 
    */


    /*
    private static f unction get_or_new_dball($caller)
    {
      if(!self::$instance) {
        //        INSTANTIATION IS ONLY HERE :
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s003. BEFORE new Db_allsites'
                           ,'self::dbi_obj'=>self::$d bi_obj
                           ,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ; }
        self::$instance = new Db_allsites(); //, $dsn
      } //e n d  ! s e l f : : $ i n s t a n c e
      return self::$instance;
    } //e n d  get_ or_ new_ dball($c onn_ par_ obj)
     */
    /*
    private f unction s et_dbobj($fle, $lne, $mtd_or_fle) {
                        if ('') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'s005. BEFORE set dbobj'
                           ,'self::dbi_obj'=>self::$d bi_obj
                           ,'$caller'=>$caller
                           ,'Called from'=>$caller, '$this->dbobj'=>$this->dbobj
                           //, '$dsn'=>$dsn
                           ] ) ; }
      self::$d bi_obj = $this->p p1->d bi_obj; //c o n n  parameters
      //Memory ocupied for this cls :
      $instance    = self::get_or_new_dball($mtd_or_fle .', line='. $lne); 
      $this->dbobj = $instance->dbobj ;
    }
    */

