<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_MVC\traversymvc\learn\interface_tasks\Database.php
//same as J:\awww\www\zinc\Db_allsites.php, except __construct is public

//namespace B12phpfw ;
//use PDO;

//include 'Dbconn_params.php';

class Database extends Dbconn_params
{
    private $stmt;                   //statement handler
    private $errmsg;                 //handle our error
    //private static $instance ; //= null;
    private $dbobj;                  // or $conn

  public function __construct()
  {
  } //e n d  __ c o n s t r u c t

  //     ~~~~~~~~~~~~~ C R U D f or all  t a b l e s !! ~~~~~~~~~~~~~~~~

  public function cc( //used f or all  t a b l e s !!
      $db, $tbl, $flds, $what
    , $binds = [] //eg 'placeh'=>':artist', 'valph'=>$varij, 'tip'=>'str' or int
  )
  {
    $this->dbobj=Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); // c c(
    $sql = "INSERT INTO $tbl($flds) $what";
    //$cursor is prepared sql dml object eg rows group object f or  r e a d n e x t
                        if ('1') {self::jsmsg( [ //basename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'BEFORE d b o b j'
                           ,'self::$d bi'=>self::$dbi
                           //,'$caller'=>$caller
                           //, '$dsn'=>$dsn
                           ] ) ; }


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
                  if ('1') { echo '<pre>' ;
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
    $this->dbobj=Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); // r r n ext(...
    $c_r = $this->rr("SELECT COUNT(*) COUNT_ROWS FROM $tbl") ;
    while ($row = $this->rrnext($c_r)): {$r = $row ;} endwhile; //c_, R_, U_, D_
    return $r->COUNT_ROWS ;
  }

  /**
  * RETURNS OBJECT VARIABLE OF CURSOR (named SQL), NOT OBJ.VAR. OF TABLE ROW !!
  * To access table rows we must read this cursor !!
  */
  public function rr( //c=cursor - used f or all  t a b l e s !! was read_row
      $sql 
    , $binds = []
    , $caller = '' 
  )
  {
                if ('') {echo '<h3>'.__METHOD__.' ln='.__LINE__.' SAYS:</h3>';
                echo '<pre>';
                echo '$sql=' . $sql ;
                echo '<br />$binds='; print_r($binds) ;
                echo '<br />$caller=' . $caller ;
                echo '</pre>';
                }

    $this->dbobj=Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__);

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
    $cursor->execute(); //$this->e xecute();
        $_SESSION['states']->history[] = self::debugPDO($sql,$ph_val_arr);
        if (count($_SESSION['states']->history) > 25) {
          array_shift($_SESSION['states']->history); //array_pop=remove last & return it
        }
        $_SESSION['states']->sql = self::debugPDO($sql,$ph_val_arr);

    return $cursor ;
    //if ($o nerow) { return $cursor->fetch(PDO::FETCH_OBJ);
    //} else       { return $cursor ; }


  }


  public function uu( //used f or all  t a b l e s !!
      $db, $tbl, $flds, $where
    , $binds = [] //eg 'placeh'=>':artist', 'valph'=>$varij, 'tip'=>'str' or int
  )
  {
    //$this->set_dbobj(basename(__FILE__), __LINE__, __METHOD__) ; // u u(...
    $this->dbobj=Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); // u u(...
    //$sql = "S ELECT COUNT(*) COUNT_ROWS FROM comments WHERE post_id='$PostId' AND status='ON'";
    $sql = "UPDATE $tbl $flds $where";

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
              //useful f or debugging: you can see SQL behind above construction by using:
              //echo '[ PDO DEBUG ]: ' . self::debugPDO($sql,$ph_val_arr); exit();

    //$Executedsql =
    $cursor->execute(); //$this->e xecute();

    return $cursor ;


  }


  public function dd($id_name = 'id', $tbl = '', $id = '') //used f or all  t a b l e s !!
  {
    if(!$tbl) $tbl = isset($this->uriq->t)  ? $this->uriq->t : '' ;
    if(!$id)  $id  = isset($this->uriq->id) ? $this->uriq->id : '' ;
    
    if($tbl and $id)
    {
      //$this->set_dbobj(basename(__FILE__), __LINE__, __METHOD__) ; //d d(...
      $this->dbobj=Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); //d d(...
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>';
                  //echo '<b>$this->uriq</b>='; print_r($this->uriq);
                  echo '</pre><br />';
                  }
      $sql = "DELETE FROM $tbl WHERE $id_name=:id"; //FROM admins WHERE id='$id'";

      $this->stmt = $this->dbobj->prepare($sql);  //same as $this->prepareSQL($sql);
      $this->stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $Executed = $this->stmt->execute(); //$this->e xecute();
      if ($Executed) {$_SESSION["SuccessMessage"]="Row Deleted Successfully ! ";
      }else { $_SESSION["ErrorMessage"]="Deleting Went Wrong. Try Again !"; }

      if (isset($this->uriq->r)) { $this->Redirect_to(QS.'i/'.$this->uriq->r) ; }

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


    public static function jsmsg($msg) {
      ?><SCRIPT LANGUAGE="JavaScript">
          alert( "<?php

            foreach($msg as $k=>$v): {
              echo "\\n $k=" . 
              str_replace("{","\\n{", str_replace("}","\\n}"
                      , str_replace(",","\\n   ,",
              str_replace('\\','/',   str_replace('&quot;',' '
                ,htmlspecialchars(json_encode((array)$v), ENT_QUOTES,'UTF-8')
              )) ."\\n"
                            )
                       ))

              ;

            } endforeach ;

              ?>" ) ;
      </SCRIPT><?php
    }
                     //works str_replace("NNN",'\\n', "aaaaaaaaaaaNNNbbbbbbbb")
                     //str_replace("\\n",'NNN',json_encode((array)$v,JSON_PRETTY_PRINT))
                     //nl2br(json_encode((array)$v,JSON_PRETTY_PRINT))
                     //str_replace("<br />",'\\n',json_encode((array)$v,JSON_PRETTY_PRINT))




} // e n d  c l s  D b_ allsites







/*
class Database extends Dbconn_params
{
    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        $config = new Dbconn_params();
        $dsn = 'mysql:host=' . $config->host . ';dbname=' . $config->name;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //create a new instance of pdo
        try {
            $this->dbh = new PDO($dsn,$config->user, $config->password,$options);
        } catch(PDOException $ex) {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }

    //prepare sql statement
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //b i n d  v a l u e s
    public function bind($param, $value, $type=null) {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    //execute query
    public function execute(){
        return $this->stmt->execute();
    }

    //result Set
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //single record
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
*/