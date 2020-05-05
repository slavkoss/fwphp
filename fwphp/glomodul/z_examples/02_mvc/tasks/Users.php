<?php
include "UserInterface.php";

class Users implements UserInterface {
    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($username,$email,$password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        if(!empty($this->username) && !empty($this->email) && !empty($this->password)) {
            if(filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);
                //$this->db->prep_qry("INSERT INTO admins (username,email,password) VALUES(?,?,?)");
                $this->db->prep_qry("INSERT INTO admins (username,password) VALUES(?,?)");
                $this->db->bind(1,$this->username);
                //$this->db->bind(2,$this->email);
                $this->db->bind(2,$this->password);
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

//INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
//(1, 'Caleb', 'caleb@mail.com', '$2y$10$ypb5NYO/O/.jha8OjW/H7OlBw6XACogmQC4qfOByCcWOHTNCHL/N6'),
//(2, 'James', 'james@mail.com', '$2y$10$mJh3bcqeD/JojOH.4n1ZrOoDyAc..AVIHq0I5hQJ1qFWdPL9qgX2a');
    public function login($username,$password)
    {
        $this->db->prep_qry("SELECT * FROM admins WHERE username=?");
        $this->db->bind(1,$username);
        $row = $this->db->single();
        $dbpass = $row['password'];
        //if(password_verify($password,$dbpass)) {
        if($password == $dbpass) {
            $_SESSION['userid'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            return true;
        }else{
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
    }
}