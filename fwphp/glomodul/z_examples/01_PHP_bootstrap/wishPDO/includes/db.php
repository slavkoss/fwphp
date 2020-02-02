<?php
use PDOOCI\PDO as PDO;
//$pdo = new PDOOCI\PDO("mydatabase", "user", "password");

require_once dirname(dirname(dirname(dirname(dirname(__DIR__ )))))
             ."/vendor/taq/pdooci/src/PDO.php";
// dirname(dirname(dirname(dirname(dirname(__DIR__ )))))
// or  __DIR__ .'/../../../../..'
//    $_SERVER['DOCUMENT_ROOT'] is not known for inet hosting

class WishDB
{
    // db c onnection c onfig vars
    const USER = 'hr'; //"phpuser";
    const PASS = 'hr'; //"phpuserpw";
    
    // $DB_DSN='oci:host='.$DBAT.';charset='.$DB_CHARSET;
    //const ORACLE_DSN = "oci:dbname=localhost/XE";
    const ORACLE_DSN = "oci:dbname=localhost/XE:pooled;charset=UTF8";
        // EE8MSWIN1250 or AL32UTF8 or UTF8
//const MYSQL_DSN =
//"mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=wishlist";

    // Holds class instance itself :
    private static $instance = null;
    // Holds instances of PDO base class :
    private $con = null;

    // Get class instance itself - SINGLETON  GET_OR_N E W_DB
    // @return WishDB
    public static function getInstance()
    {
      echo '<h3>'. __METHOD__ .'<h3>' ;
        if (!self::$instance instanceof self) {
            echo '<h3>'.'WAS NOT CONNECTED'.'<h3>' ;
            self::$instance = new self;
        }
        //echo '<h3>'.'CONNECTED'.'<h3>' ;
        return self::$instance;
    }

     // Class c onstructor method - C O N N.
     // @throws RuntimeException if cannot establish c onnection with db
    private function __construct()
    {
            echo '<h3>'. __METHOD__ .'<h3>' ;
        // To avoid showing database c onnection details PDO c onstructor
        // is wrapped in try/catch block and n e w Exception is thrown
        try {
            $this->con = new PDO(
              self::ORACLE_DSN,
              self::USER,
              self::PASS,
              array(
                  //PDO::ATTR_PERSISTENT => true,
                  //PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'",
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                            )
            );
            echo '<h3>'.'NOW CONNECTED'.'<h3>' ;
        } catch (Exception $e) {
            echo '<h3>'.'*****NOT CONNECTED*****'.'<h3>' ;
            throw new RuntimeException(
              "Failed to initiate c onnection to database. Shutting down!",
                    1010
            );
            exit;
        }
    }

    //clone and wakeup methods prevents external instantiation of copies of
    //Singleton class, thus eliminating possibility of duplicate objects

    // Clones object  *  @throws RuntimeException always
    public function __clone()
    {
        throw new RuntimeException(
                "Clone of singelton object is not allowed.", 101
        );
    }
    // Rec onstructs any resources that the object may have.
    // @throws RuntimeException always
    public function __wakeup()
    {
        throw new RuntimeException('Deserializing is not allowed.', 101);
    }

    
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //           Model -  C R U D  M A S T E R
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~    
    /**
     *
     * @param string $name
     * @param string $password
     * @return boolean
     */
    public function verify_wisher_credentials($name, $password)
    {
        $query = "";
        $stid = null;
        $row = array();

        $query = "
            SELECT 1
            from wishers
            where name = :name_bv
            and	password = :pwd_bv
       ";
        $stid = $this->con->prepare($query);
        $stid->bindParam(":name_bv", $name, PDO::PARAM_STR);
        $stid->bindParam(":pwd_bv", $password, PDO::PARAM_STR);
        $stid->execute();

        //Because name is a unique value I only expect one row
        $row = $stid->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }



     /**
     * Gets users
     *
     * @param none
     * @return ArrayIterator
     * or could @return PDOStatement
     */
    public function get_wishers()
    {
        $query = "";
        $stid = null;
        $row = array();

        $query = "
            SELECT *
            FROM wishers
            ";
        $stid = $this->con->prepare($query);
        $stid->execute();

        //return $stid;
        $result = new ArrayIterator();
        while ($row = $stid->fetch(PDO::FETCH_ASSOC)) {
            $result->append($row);
        }
        $result->rewind();

        return $result;
    }
    
    
    
     /**
     * Gets user identifier of the user having given name
     *
     * @param string $name
     * @return integer
     */
    public function get_wisher_id_by_name($name)
    {
        $query = "";
        $stid = null;
        $row = array();

        $query = "
            SELECT id ID
            FROM wishers
            WHERE name = :user_bv
            ";
        $stid = $this->con->prepare($query);
        $stid->bindParam(":user_bv", $name, PDO::PARAM_STR);
        $stid->execute();

        //Because name is a unique value I only expect one row
        $row = $stid->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return (int) $row['ID'];
        } else {
            return 0;
        }
    }

    /**
     * Stores user record
     *
     * @param string $name
     * @param string $password
     */
    public function create_wisher($name, $password)
    {
        $query = "";
        $stid = null;

        $query = "
            INSERT INTO wishers (name, password)
            VALUES (:name_bv, :pwd_bv)
            ";

        $stid = $this->con->prepare($query);
        $stid->bindParam(":name_bv", $name, PDO::PARAM_STR);
        $stid->bindParam(":pwd_bv", $password, PDO::PARAM_STR);
        $stid->execute();
    }


    /**
     * C onverts date string to timestamp
     *
     * @param string $date
     * @return string
     */
    function format_date_for_sql($date)
    {
        if ($date == "") {
            return null;
        } else {
            $dateTime = new DateTime($date, new DateTimeZone("UTC"));
            return $dateTime->format("Y-n-j H:i:s e");
        }
    }
    
    
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //           Model -  C R U D  D E T A I L
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    
    /**
     * Gets user's wishes for the user having given name
     *
     * @param string $name
     * @return ArrayIterator
     */
    public function get_wishes_by_wisher_name($name)
    {
        $query = "";
        $stid = null;
        $row = array();
        $result = null;

        $query = "
            SELECT w.id ID, w.description DESCRIPTION,
            format_due_date(w.due_date) DUE_DATE, wr.id WRID
            FROM wishes w RIGHT OUTER JOIN wishers wr
            ON wr.id = w.wisher_id
            WHERE wr.name = :user_bv
            ";

        $stid = $this->con->prepare($query);
        $stid->bindParam(":user_bv", $name, PDO::PARAM_STR);
        $stid->execute();

        $result = new ArrayIterator();
        while ($row = $stid->fetch(PDO::FETCH_ASSOC)) {
            $result->append($row);
            //$result[] = $row;
        }
        $result->rewind();
        echo '<br />'.'<pre>$result='; print_r($result); echo '</pre>';
        return $result;
    }
    
    /**
     * Gets wish record with given #id
     *
     * @param integer $wishID
     * @return array
     */
    public function get_wish_by_wish_id($wishID)
    {
        $query = "";
        $stid = null;
        $row = array();

        $query = "
            SELECT id ID, description DESCRIPTION,
            format_due_date(due_date) DUE_DATE
            FROM wishes
            WHERE id = :wish_id_bv
            ";
        $stid = $this->con->prepare($query);
        $stid->bindValue(":wish_id_bv", (int) $wishID, PDO::PARAM_INT);
        $stid->execute();

        //Because name is a unique value I only expect one row
        $row = $stid->fetch(PDO::FETCH_ASSOC);

        $stid = null;

        return $row;
    }


    /**
     * Gets PDOstatement having executed query
     *
     * @param integer $wisherID
     * @return PDOStatement
     */
    public function get_wishes_by_wisher_id($wisherID)
    {
        $query = "";
        $stid = null;

        $query = "
            SELECT id ID, description DESCRIPTION,
            format_due_date(due_date) DUE_DATE
            FROM wishes
            WHERE wisher_id =  :id_bv
            ";
        $stid = $this->con->prepare($query);
        $stid->bindParam(":id_bv", $wisherID, PDO::PARAM_INT);
        $stid->execute();

        return $stid;
    }


    /**
     * Stores wish record
     *
     * @param integer $wisherID
     * @param string $description
     * @param string $duedate
     */
    function insert_wish($wisherID, $description, $duedate)
    {
        $query = "";
        $stid = null;

        $date = $this->format_date_for_sql($duedate);

        $query = "
            INSERT INTO wishes (wisher_id, description, due_date)
            VALUES (
                :wisher_id_bv,
                :desc_bv,
                set_due_date(:due_date_bv)
                )
            ";

        $stid = $this->con->prepare($query);
        $stid->bindParam(":wisher_id_bv", $wisherID, PDO::PARAM_INT);
        $stid->bindParam(':desc_bv', $description, PDO::PARAM_STR);
        $stid->bindParam(':due_date_bv', $date, PDO::PARAM_STR);
        $stid->execute();
    }

    
    public function update_wish($wishID, $description, $duedate)
    {
        $query = "";
        $stid = null;

        $date = $this->format_date_for_sql($duedate);
        //var_dump($date, $wishID);
//ob_start(); include('zwamp_hdr.php'); $pghdr = ob_get_contents(); ob_end_clean();
//ob_start(); var_dump($date, $wishID); $pghdr = ob_get_contents(); ob_end_clean();

        $query = "
            UPDATE wishes
            SET description = :desc_bv,
            due_date = set_due_date(:due_date_bv)
            WHERE id = :wish_id_bv
            ";
        $stid = $this->con->prepare($query);
        $stid->bindParam(":wish_id_bv", $wishID, PDO::PARAM_INT);
        $stid->bindParam(':desc_bv', $description, PDO::PARAM_STR);
        $stid->bindParam(':due_date_bv', $date, PDO::PARAM_STR);
        $result = $stid->execute();
    }


    public function delete_wish($wishID)
    {
        $query = "";
        $stid = null;

        $query = "
            DELETE FROM wishes
            WHERE id = :wish_id_bv
            ";

        $stid = $this->con->prepare($query);
        $stid->bindValue(":wish_id_bv", (int) $wishID, PDO::PARAM_INT);
        $stid->execute();
    }

    public function delete_wisher($wisherID)
    {
        $query = "";
        $stid = null;

        $query = "
            DELETE FROM wishers
            WHERE id = :wisher_id_bv
            ";

        $stid = $this->con->prepare($query);
        $stid->bindValue(":wisher_id_bv", (int) $wisherID, PDO::PARAM_INT);
        $stid->execute();
    }
    
}

?>
