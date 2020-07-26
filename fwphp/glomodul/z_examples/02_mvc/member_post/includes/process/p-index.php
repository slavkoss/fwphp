<?php

    $h = new Helper();
    $msg = '';
    $username = '';

    if (isset($_POST['submit']))
    {        
        $username = $_POST['username'];                

        if ($h->isEmpty(array($username, $_POST['password'])))
        {
            $msg = 'All fields are required';     
        }
        else
        {
            $member = new BlogMember($username);

            if (!$member->isValidLogin($_POST['password']))
            {
                $msg = "Invalid Username or Password";
            }
            else
            {
                $_SESSION['username'] = $username;
                header("Location: read.php");                
            }
        }
            
    }