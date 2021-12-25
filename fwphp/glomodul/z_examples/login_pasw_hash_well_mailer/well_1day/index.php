<?php
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\includes\process\p-index.php

    session_start();
    include "UI_include.php"; // define("INC_DIR"...  include INC_DIR.'loadclasses.php';



//include INC_DIR."/process/p-index.php";
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
            $msg = "Invalid Username or Password --ind";
        }
        else
        {
            $_SESSION['username'] = $username;
            header("Location: read.php");                
        }
    }
        
}



include INC_DIR.'header.html';
?>
    <body>
    <div class="form">   

        <div class = "new">
        <?php
            if (isset($_GET['new']))
                echo 'ACCOUNT CREATED SUCCESSFULLY';
        ?>
        </div>
        <div class="heading">
            <!--i class="material-icons">account_box</i-->
            <h4 class="modal-title">Login to Your Account</h4>
        </div>

        <form action="" method="post" class="form-horizontal">
            <div class="form-group top"><!--i class="material-icons">face</i-->
                <label class="control-label">Username</label>
                <div>
                    <input type="text" class="form-control" name="username" <?php $h->keepValues($username, 'textbox'); ?> >
                </div>        	
            </div>
            <div class="form-group"><!--i class="material-icons">vpn_key</i-->
                <label class="control-label">Password</label>
                <div>
                    <input type="password" class="form-control" name="password">
                </div>        	
            </div>
            <div class = "formerror"><?php echo $msg; ?></div>                
            <div class="form-group">
                <div>
                    <center><button type="submit" name = "submit" class="btn btn-primary btn-lg">Log In</button></center>
                </div>  
            </div>		              
        </form>			
        <div class="bottom-text">
           Don't have an account? <a href="signup.php">Sign up</a>
        </div>

        <div class="form-group">
           See BlogMember.php, public function isValidLogin($pPassword)
           <p>p-index.php</p>
           <p></p>
           <p></p>
        </div>

    </div>
    </body>
</html>                                		                            