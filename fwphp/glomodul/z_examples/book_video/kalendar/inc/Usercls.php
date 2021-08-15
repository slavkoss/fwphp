<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\inc\usercls.php
//declare(strict_types=1); // php 7
/**
 * Ro w CRUD - Manages administrative actions
 * PHP version 7
 */
class Usercls extends Dbkoncls
{

    /**
     * Determines the length of the salt to use in h a s h e d passwords
     *
     * @var int the length of the password salt to use
     */
    //private $_saltLength = 7;

    /**
     * Stores or creates a DB object and sets the salt length
     *
     * @param object $db a database object
     * @param int $saltLength length for the password h a s h
     */
    public function __construct($saltLength=NULL)
    {
        parent::__construct();
        /*
         * If an int was passed, set the length of the salt
         */
        //if ( is_int($saltLength) ) { $this->_saltLength = $saltLength; }
    }

    /**
     * Checks login credentials for a valid user
     *
     * @return mixed TRUE on success, message on error
     */
    public function processLoginForm()
    {
               if('1') {
                echo '<b>'. __METHOD__ .'</b> line '.__LINE__.' (in '. __FILE__ .') SAYS : ';
                 echo '<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
                 echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                 echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
               }
               //exit(0);
        /*
         * Fails if the proper action was not submitted
         */
        if ( $_POST['action'] !== 'loginusr' )
        {
            return "<h2>Invalid action supplied for processLoginForm.</h2>";
        }

        /*
         * Escapes the user input for security
         */
        $uname = htmlentities($_POST['uname'], ENT_QUOTES);
        $pword = htmlentities($_POST['pword'], ENT_QUOTES);

        /*
         * Retrieves the matching info from the DB if it exists
         */
        $sql = "SELECT user_id, user_name, user_email, user_pass
                FROM users
                WHERE user_name = :uname
                "; //LIMIT 1
        try
        {
            $gdje = 'Before prepare';
            $stmt = $this->db->prepare($sql); $gdje = 'Before bind';
                             if('0') {
                              echo '<b>'.Basename(__FILE__) .'</b> (in '.dirname(__FILE__).') SAYS : ';
                               echo '<pre>$sql='; print_r($sql); echo '</pre>';
                               echo '<pre>$uname='; print_r($uname); echo '</pre>';
                             }
            $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
            $gdje = 'Before bind';
            $stmt->execute(); $gdje = 'Before shift fetch all';
            //$user = array_shift($stmt->fetchAll()); 
            
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                      if('') { echo '<pre>'.'$uname='.$uname.', $users='; print_r($users); echo '</pre>';}
            $user = $users[0]; //or $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            $gdje = 'Before clos cursor';
            $stmt->closeCursor();
        }
        catch ( Exception $e )
        {
            die ( $gdje.' greška : '.$e->getMessage() );
        }
        // Fails if username doesn't match a DB entry
        if (!isset($user)) {return "Nevaljan korisnik i lozinka.";}
        // Get h a s h of user-supplied password
                        //disables header() - e r r " headers already sent"
                        if('') { echo '<pre>$user='; print_r($user); echo '</pre>';}
        //$hash = $this->_getSaltedHash($p word, $user['user_pass']);

        /*
         * Checks if the hashed password matches the stored h a s h
         */
        //if ( $user['user_pass']==$hash )
        if ( $user['user_pass']==$pword )
        {
            /*
             * Stores user info in the session as an array
             */
            $_SESSION['user'] = array(
                    'id' => $user['user_id'],
                    'name' => $user['user_name'],
                    'email' => $user['user_email']
                );

            return TRUE;
        }

        /*
         * Fails if the passwords don't match
         */
        else
        {
            return "Your username or password is invalid.";
        }
    }

    /**
     * Logs out the user
     *
     * @return mixed TRUE on success or messsage on failure
     */
    public function processLogout()
    {
        /*
         * Button Fails if the proper action was not submitted
         * but for testing http://dev1:8083/fwphp/glomodul/kalendar/?odjava works
         */
        if ( isset($_POST['action']) and $_POST['action'] != 'logout' )
        {
            return "Invalid action posted for process Logout.";
        }

        /*
         * Removes the user array from the current session
         */
        session_destroy();
        return TRUE;
    }

    /**
     * Generates a salted h a s h of a supplied string
     *
     * @param string $string to be h a s h e d
     * @param string $salt extract the h a s h from here
     * @return string the salted h a s h
     *
     * 1. Generate a salt if no salt is passed
     * 2. Extract the salt from the string if one is passed
     * 3. Add the salt to the h a s h and return it
     */
    /* private function _getSaltedHash($string, $salt=NULL)
    {
        //* 1. Generate a salt if no salt is passed
        if ( $salt==NULL )
        {
            $salt = substr(md5((string)time()), 0, $this->_saltLength);
        }

        //* 2. Extract the salt from the string if one is passed
        else
        {
            $salt = substr($salt, 0, $this->_saltLength);
        }

        //* 3. Add the salt to the h a s h and return it
        return $salt . sha1($salt . $string);
    } */
/**
 *  J:\awww\www\fwphp\glomodul4\user_post_kalendar_fmb\kalendar\inc\u serc ls.php (4 hits)
 * Line 24:     public f unction __construct($db=NULL, $saltLength=NULL)
 * Line 42:     public f unction processLoginForm()
 * Line 129:     public f unction processLogout()
 * Line 153:     private f unction _getSaltedHash($string, $salt=NULL)
 */
}

?>