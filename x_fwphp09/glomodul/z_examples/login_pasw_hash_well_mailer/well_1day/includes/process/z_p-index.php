<?php
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\includes\process\p-index.php
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
                $msg = "Invalid Username or Password --p-ind";
            }
            else
            {
                $_SESSION['username'] = $username;
                header("Location: read.php");                
            }
        }
            
    }