<?php
//J:\awww\www\fwphp\glomodul\z_examples\tasks\z_tasks_interface\User.php
//namespace B12phpfw ;
include "UserInterface.php"; //"../abstract/UserInterface.php"

class User implements UserInterface {
    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    /**
    //11111 C R E  U S R *********************
    $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    // $_POST["password"] ---> Is The User`s Input
    // $hashed_password ---> Is The Hashed Password You Can STORE IN YOUR DATABASE
    */
    public function register($username,$email,$password)
    {
        $this->username = $username;
        $this->email    = $email;
        $this->password = $password;

        if(!empty($this->username) && !empty($this->email) && !empty($this->password)) {
            if(filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);
                $this->db->query("INSERT INTO users (username,email,password) VALUES(?,?,?)");
                $this->db->bind(1,$this->username);
                $this->db->bind(2,$this->email);
                $this->db->bind(3,$this->password);
                if($this->db->execute()) {
                    return true;
                } else{
                    return false;
                }
            }else{
                return false;
            }
        } else{
            return false;
        }
    }

    /**
    22222 R E A D  U S R ***************

    password_verify( string $password, string $hash) : bool
    Verifies that the given hash matches the given password. 

    Note that password_hash() returns algorithm, cost and salt as part of returned hash. Therefore, all information that's needed to verify the hash is included in it.
    This allows the verify function to verify the hash without needing separate storage for the salt or algorithm information. 

    This function is safe against timing attacks.

    --------------------------------------------------------
     --- When A User Wants To Sign In ---
     1 ---> Get Input From User Which Is The User`s Password
     2 ---> Fetch The Hashed Password From Your Database
     3 ---> Compare The User`s Input And The Hashed Password 
     --------------------------------------------------------
         if(password_verify($_POST["password"],$hashed_password))
         echo "Welcome"; else echo "Wrong Password";

    // $_POST["password"] ---> Is The User`s Input
    // $hashed_password ---> Is The Hashed Password FETCHED FROM YOUR DATABASE
    */
    public function login($username,$password)
    {
        $this->db->query("SELECT * FROM users WHERE user_name=?");
        $this->db->bind(1,$username);
        $row    = $this->db->single();
        $dbpass = $row['user_pass'];

        if(password_verify($password,$dbpass)) {
            echo "<h3>Logged in user is $username</h3>" ;
            return true;
        }else{
            echo "<h3>password_verify NOT SUCCESSFUL</h3>" ;
            return false;
        }
    }



    //33333   D E L  S E S S I O N  U S R
    public function logout()
    {
        // TODO: Implement logout() method.
    }
}