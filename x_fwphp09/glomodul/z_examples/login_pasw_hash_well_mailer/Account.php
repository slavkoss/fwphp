<?php
/*
 *   
*/
namespace B12phpfw\PHPLoginAuthTut\login_pasw_hash ;

use \PDO as PDO ;
use \Exception as Exception ;

class Account
{
  /* Class properties (variables) */

  protected static $con;

  /* The ID of the logged in account (or NULL if there is no logged in account) */
  private $id;
  
  /* The name of the logged in account (or NULL if there is no logged in account) */
  private $name;
  
  /* TRUE if the user is authenticated, FALSE otherwise */
  private $authenticated;
  
  
  /* Public class methods (functions) */
  
  /* 1. Constructor, Destructor */
  public function __construct()
  {
    //require('ini.php') ;  // bootstrap script is on module level
    if(!defined('__CONFIG__')) {  exit('You do not have a config file'); }

    self::$con = DBconn::getConnection() ;
    /* Initialize the $id and $name variables to NULL */
    $this->id = NULL;
    $this->name = NULL;
    $this->authenticated = FALSE;
  }
  
  public function __destruct()
  {
    
  }
  
  /* 2. "Getter" fns */

  public function getId(): ?int
  {
    return $this->id;
  }
  
  public function getName(): ?string
  {
    return $this->name;
  }
  
  public function isAuthenticated(): bool
  {
    return $this->authenticated;
  }
  
  /* Add new account to system and return its ID */
  public function addAccount(string $name, string $passwd): int
  {
    /* Trim the strings to remove extra spaces */
    $name = trim($name);
    $passwd = trim($passwd);
    
    if (!$this->isNameValid($name)) { throw new Exception('Invalid user name'); }
    if (!$this->isPasswdValid($passwd)) { throw new Exception('Invalid password'); }
    if (!is_null($this->getIdFromName($name))) {
      throw new Exception('User name '. $name .' not available');
    }
    
    /* Finally, add the new account */
    /* Insert query template */
    //$query='INSERT INTO myschema.accounts (account_name,account_passwd) VALUES (:name,:passwd)';
    $query = 'INSERT INTO admins (username, password) VALUES (:name, :passwd)';
    $hash = password_hash($passwd, PASSWORD_DEFAULT);
    $values = array(':name' => $name, ':passwd' => $hash);
    /* Execute the query */
    try {
      $res = self::$con->prepare($query);
      $res->execute($values);
    } catch (PDOException $e) {
       /* If there is a PDO exception, throw a standard exception */
       throw new Exception( __METHOD__ . ' DB I N S query error' );
    }
    
    /* Return the new ID */
    return self::$con->lastInsertId();
  }
  
  /* Delete an account (selected by its ID) */
  public function deleteAccount(int $id)
  {
    /* Check if usr ID is valid */
    if (!$this->isIdValid($id))
    {
      throw new Exception('Invalid account ID');
    }
    /* Query template */
    $query = 'DELETE FROM admins WHERE (id = :id)';
    /* Values array for PDO */
    $values = array(':id' => $id);
    /* Execute the query */
    try {
      $res = self::$con->prepare($query);
      $res->execute($values);
    } catch (PDOException $e) {
       throw new Exception('Database query error');
    }
    
                    /* Delete the S essions related to the account */
                    /* 
                    $query = 'DELETE FROM myschema.account_sessns WHERE (account_id = :id)'; // delete Account(int $id)
                    $values = array(':id' => $id);  // Values array for PDO
                    // Execute the query :
                    try
                    {
                      $res = self::$con->prepare($query);
                      $res->execute($values);
                    }
                    catch (PDOException $e)
                    {
                       throw new Exception('Database query error');
                    } 
                    */
  }
  
  /* Edit an account (selected by its ID). 
     The name, the password and the status (enabled/disabled) can be changed */
  public function editAccount(int $id, string $name, string $passwd, bool $enabled)
  {
    $name = trim($name);
    $passwd = trim($passwd);
    
    if (!$this->isIdValid($id)) { throw new Exception('Invalid account ID'); }
    if (!$this->isNameValid($name)) { throw new Exception('Invalid user name'); }
    if (!$this->isPasswdValid($passwd)) { throw new Exception('Invalid password'); }
    
    /* Check if an account having the same name already exists (except for this one). */
    $idFromName = $this->getIdFromName($name);
    
    /* if (!is_null($idFromName) && ($idFromName != $id))  {
      throw new Exception('User name already used');
    } */
    
    /* Finally, edit the account     Edit query template */
    $query = 'UPDATE admins SET username = :name, password = :passwd  WHERE id = :id';
                                             //  , account_enabled = :enabled
    $hash = password_hash($passwd, PASSWORD_DEFAULT);
    /* Int value for the $enabled variable (0 = false, 1 = true) */
    $intEnabled = $enabled ? 1 : 0;
    /* Values array for PDO */
    $values = array(':name' => $name, ':passwd' => $hash
       //, ':enabled' => $intEnabled
       , ':id' => $id);
    
    /* Execute the query */
    try
    {
      $res = self::$con->prepare($query);
      $res->execute($values);
    }
    catch (PDOException $e)
    {
       /* If there is a PDO exception, throw a standard exception */
       throw new Exception('Database query error');
    }
  }


  /* Logout the current user */
  public function logout()
  {
    /* If there is no logged in user, do nothing */
    if (is_null($this->id))
    {
      return;
    }
    
    /* Reset the account-related properties */
    $this->id = NULL;
    $this->name = NULL;
    $this->authenticated = FALSE;
    
                  /* If there is an open S ession, remove it from the account_s essions table
                    ◦ PHP_S ESSION_DISABLED if s essions are disabled. 
                    ◦ PHP_S ESSION_NONE if s essions are enabled, but none exists. 
                    ◦ PHP_S ESSION_ACTIVE if s essions are enabled, and one exists.
                  */
                  /* if (session_status() == PHP_SESSION_ACTIVE)
                  {
                    // Delete query
                    $query = 'DELETE FROM myschema.account_sessns WHERE (session_id = :sid)'; // log out()
                    
                    // Values array for PDO. s ession_id() returns s ession id for current s ession or empty string ("") if there is no current s ession (no current s ession id exists). On failure, false is returned. 

                    $values = array(':sid' => session_id());
                    
                    // Execute the query
                    try
                    {
                      $res = self::$con->prepare($query);
                      $res->execute($values);
                    }
                    catch (PDOException $e)
                    {
                       // If there is a PDO exception, throw a standard exception
                       throw new Exception('Database query error - ');
                    }
                  } */
  }

  /* Login (R e a d) with username and password */
  public function login(string $name, string $passwd): bool
  {
    /* Trim the strings to remove extra spaces */
    $name = trim($name);
    $passwd = trim($passwd);
    
    /* Check if the user name is valid. If not, return FALSE meaning the authentication failed */
    if (!$this->isNameValid($name)) { return FALSE; }
    if (!$this->isPasswdValid($passwd)) { return FALSE; }
    
    /* Look for the account in the db. Note: the account must be enabled (account_enabled = 1) */
    $query = 'SELECT * FROM admins WHERE (username = :name)'; //AND (account_enabled = 1)
    $values = array(':name' => $name); /* Values array for PDO */
    /* Execute the query */
    try
    {
      $res = self::$con->prepare($query);
      $res->execute($values);
    }
    catch (PDOException $e) { throw new Exception('Database query error'); }
    
    $row = $res->fetch(PDO::FETCH_ASSOC);
    /* If there is a result, we must check if the password matches using password_ verify() */
    if (is_array($row))
    {
      if (password_verify($passwd, $row['password']))
      {
        /* Authentication succeeded. Set the class properties (id and name) */
        $this->id = intval($row['id'], 10);
        $this->name = $name;
        $this->authenticated = TRUE;
        
        /* Register the current S essions on the database */
        //$this->registerLoginSess();
        
        /* Finally, Return TRUE */
        return TRUE;
      }
    }
    
    /* If we are here, it means the authentication failed: return FALSE */
    return FALSE;
  }







  /* A sanitization check for the account username */
  public function isNameValid(string $name): bool
  {
    $valid = TRUE;   /* Initialize the return variable */
    
    $len = mb_strlen($name); /* Example check: the length must be between 8 and 16 chars */
    if (($len < 8) || ($len > 16))
    {
      $valid = FALSE;
    }
    
    /* You can add more checks here */

    return $valid;
  }
  
  /* A sanitization check for the account password */
  public function isPasswdValid(string $passwd): bool
  {
    /* Initialize the return variable */
    $valid = TRUE;
    
    /* Example check: the length must be between 8 and 16 chars */
    $len = mb_strlen($passwd);
    
    if (($len < 8) || ($len > 16))
    {
      $valid = FALSE;
    }
    
    /* You can add more checks here */
    
    return $valid;
  }
  
  /* A sanitization check for the account ID */
  public function isIdValid(int $id): bool
  {
    /* Initialize the return variable */
    $valid = TRUE;
    
    /* Example check: the ID must be between 1 and 1000000 */
    
    if (($id < 1) || ($id > 1000000))
    {
      $valid = FALSE;
    }
    
    /* You can add more checks here */
    
    return $valid;
  }



  /* Returns the account id having $name as name, or NULL if it's not found */
  public function getIdFromName(string $name): ?int
  {
    /* Since this method is public, we check $name again here */
    if (!$this->isNameValid($name))
    {
      throw new Exception('Invalid user name');
    }
    
    /* Initialize the return value. If no account is found, return NULL */
    $id = NULL;
    
    /* Search the ID on the database */
    //$query = 'SELECT account_id FROM myschema.accounts WHERE (account_name = :name)';
    $query = 'SELECT id FROM admins WHERE (username = :name)';
    $values = array(':name' => $name);
    
    try
    {
      $res = self::$con->prepare($query);
      $res->execute($values);
    }
    catch (PDOException $e)
    {
       /* If there is a PDO exception, throw a standard exception */
       throw new Exception('Database query error');
    }
    
    $row = $res->fetch(PDO::FETCH_ASSOC);
    
    /* There is a result: get it's ID */
    if (is_array($row))
    {
      $id = intval($row['id'], 10);
    }
    
    return $id;
  }


                    /* public function sessLogin(): bool   // Login using S essions
                    {
                      // Check that the S ession has been started
                      if (session_status() == PHP_SESSION_ACTIVE)
                      {
                        //  Query template to look for the current s ession ID on the account_ sessns table.
                        //  The query also make sure the S ession is not older than 7 days
                        $query = 
                        'SELECT * FROM myschema.account_sessns, myschema.accounts ' // sess Log in()
                        .'WHERE (account_sessns.session_id = :sid) '
                        . 'AND (account_sessns.login_time >= (NOW() - INTERVAL 7 DAY)) AND (account_sessns.account_id = accounts.account_id) ' . 'AND (accounts.account_enabled = 1)'; 
                        
                        // Values array for PDO
                        $values = array(':sid' => session_id());
                        
                        // Execute the query 
                        try
                        {
                          $res = self::$con->prepare($query);
                          $res->execute($values);
                        }
                        catch (PDOException $e)
                        {
                           throw new Exception('Database query error');
                        }
                        
                        $row = $res->fetch(PDO::FETCH_ASSOC);
                        
                        if (is_array($row))
                        {
                          // Authentication succeeded. Set the class properties (id and name) and return TRUE
                          $this->id = intval($row['account_id'], 10);
                          $this->name = $row['account_name'];
                          $this->authenticated = TRUE;
                          
                          return TRUE;
                        }
                      }
                      
                      // If we are here, the authentication failed 
                      return FALSE;
                    } */
  

  
                    /* Close all account S essions except for the current one (aka: "logout from other devices") */
                    /* public function closeOtherSessns()
                    {
                      // If there is no logged in user, do nothing
                      if (is_null($this->id))
                      {
                        return;
                      }
                      
                      // Check that a S ession has been started
                      if (session_status() == PHP_SESSION_ACTIVE)
                      {
                        // Delete all account S essions with s ession_id different from the current one
                        $query = 'DELETE FROM myschema.account_sessns WHERE (session_id != :sid) AND (account_id = :account_id)'; // close Other Sessns()
                        
                        // Values array for PDO
                        $values = array(':sid' => session_id(), ':account_id' => $this->id);
                        
                        // Execute the query 
                        try
                        {
                          $res = self::$con->prepare($query);
                          $res->execute($values);
                        }
                        catch (PDOException $e)
                        {
                           throw new Exception('Database query error');
                        }
                      }
                    } */
  
 
  
  /* Private class methods */
  
  /* Saves the current S ession ID with the account ID */
                    /* private function registerLoginSess()
                    {
                      // Check that a S ession has been started
                      if (session_status() == PHP_SESSION_ACTIVE)
                      {
                        //   Use a REPLACE statement to:
                        //  - insert a new row with the s ession id, if it doesn't exist, or...
                        //  - update the row having the s ession id, if it does exist.
                        $query = 'REPLACE INTO myschema.account_sessns (session_id, account_id, login_time) VALUES (:sid, :accountId, NOW())'; // register Log in Sess()

                        $values = array(':sid' => session_id(), ':accountId' => $this->id);
                        // Execute the query 
                        try
                        {
                          $res = self::$con->prepare($query);
                          $res->execute($values);
                        }
                        catch (PDOException $e)
                        {
                           throw new Exception('Database query error');
                        }
                      }
                    } */
}
