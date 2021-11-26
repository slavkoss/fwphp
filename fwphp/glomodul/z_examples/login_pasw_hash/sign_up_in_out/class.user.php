<?php

use B12phpfw\PHPLoginAuthTut\login_pasw_hash\DBconn ;

require_once('../DBconn.php') ;  //dbconfig.php

class USER
{  

  private $conn;
  
  public function __construct()
  {
    $this->conn = DBconn::getConnection() ;
                      //$database = new Database();
                      //$db = $database->dbConnection();
                      //$this->conn = $db;
    }
  
  public function runQuery($sql)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt;
  }
  
  public function register($uname,$umail,$upass)
  {
    try
    {
      $new_password = password_hash($upass, PASSWORD_DEFAULT);
      
      $stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
                                                   VALUES(:uname, :umail, :upass)");
                          
      $stmt->bindparam(":uname", $uname);
      $stmt->bindparam(":umail", $umail);
      $stmt->bindparam(":upass", $new_password);                      
        
      $stmt->execute();  
      
      return $stmt;  
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }        
  }
  
  
  public function doLogin($uname,$umail,$upass)
  {
    $sql = "SELECT * FROM admins WHERE username=:uname OR email=:umail " ;
        //"SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail " ;
    try
    {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1)
      {
        //if(password_verify($upass, $userRow['password']))
        if($upass = $userRow['password'])
        {
          $_SESSION['user_session'] = $userRow['id'];
          return true;
        }
        else
        {
          return false;
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  
  public function is_loggedin()
  {
    if(isset($_SESSION['user_session']))
    {
      return true;
    }
  }
  
  public function redirect($url)
  {
    header("Location: $url");
  }
  
  public function doLogout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }
}
?>