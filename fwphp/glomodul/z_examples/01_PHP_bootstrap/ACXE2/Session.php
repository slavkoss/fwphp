<?php
//J:\awww\apl\dev1\afwww\glomodul\ACXE2\Session.php
//  H:\dev_web\htdocs\t_oci8\ACXE2\ses_pg. inc. php

namespace Equipment;

// zakomentirati ako necemo prikaz loga u  h d r <-- URL of company logo
//define('LOGO_URL', 'http://dev:8083/t_oci8/ACXE2/logo_img_cre.php');

class Session {
    public $username = null;
    public $empstartrow = 1;
    public $csrftoken = null;

    public function authenticateUser($username) {
        switch ($username) {
            case 'admin':
            case 'simon':
                $this->username = $username;
                return(true);  // OK to log in
            default:
                $this->username = null;
                return(false); // Not OK
        }
    }
 
    public function isPrivilegedUser() {
        if ($this->username === 'admin')
            return(true);
        else
            return(false);
    }
    
    
    public function setSession() {
        $_SESSION['username']    = $this->username;
        $_SESSION['empstartrow'] = (int)$this->empstartrow;
        $_SESSION['csrftoken']   = $this->csrftoken;
    }
 
    public function getSession() {
        $this->username = isset($_SESSION['username']) ?
             $_SESSION['username'] : null;
        $this->empstartrow = isset($_SESSION['empstartrow']) ?
             (int)$_SESSION['empstartrow'] : 1;
        $this->csrftoken = isset($_SESSION['csrftoken']) ?
             $_SESSION['csrftoken'] : null;
    }
 
   // Logout current user
    public function clearSession() {
        $_SESSION = array();
        $this->username = null;
        $this->empstartrow = 1;
        $this->csrftoken = null;
    }

    public function setCsrfToken() {
        $this->csrftoken = mt_rand();
        $this->setSession();
    }
      
}  // e n d  c l a s s  S e s s i o n
