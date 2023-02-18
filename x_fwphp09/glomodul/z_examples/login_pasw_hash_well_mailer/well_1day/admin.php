<?php
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\admin.php
    session_start();
    include "UI_include.php";

    //include INC_DIR."/process/p-admin.php";
    // J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\includes\process\p-admin.php
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
            $admin = new Admin($username);

            if (!$admin->isValidLogin($_POST['password']))
            {
                $msg = "Invalid Username or Password --adm";
            }
            else
            {
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = true;
                header("Location: write.php");                
            }
        }
            
    }


    include INC_DIR.'header.html';
?>
    <body>
    <div class="form">    
        <div class="heading">
            <i class="material-icons">admin_panel_settings</i>
            <h4 class="modal-title">Admin Login</h4>
        </div>
        <form action="" method="post" class="form-horizontal">
            <div class="form-group top">
                <label class="control-label">Username</label>
                <div>
                    <input type="text" class="form-control" name="username" <?php $h->keepValues($username, 'textbox'); ?>>
                </div>        	
            </div>
            <div class="form-group">
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

    </div>
    </body>
</html>                                		                            