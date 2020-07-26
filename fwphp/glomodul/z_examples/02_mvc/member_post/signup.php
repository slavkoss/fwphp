<?php

    include "UI_include.php";
    include INC_DIR."/process/p-signup.php";
    include INC_DIR.'header.html';

?>

    <body>
        <div class="form">
            <div class="heading">
                <i class="material-icons">create</i>
                <h4 class="modal-title">Sign Up for An Account</h4>
            </div>
            
            <form action="" method="post" class="form-horizontal">
                <div class="form-group top"><i class="material-icons">face</i>
                    <label class="control-label">Username</label>
                    <div>
                        <input type="text" class="form-control" name="username" <?php $h->keepValues($username, 'textbox'); ?> >
                    </div>        	
                </div>
                <div class="form-group"><i class="material-icons">vpn_key</i>
                    <label class="control-label">Password</label>
                    <div>
                        <input type="password" class="form-control" name="password">
                    </div>        	
                </div>
                <div class="form-group"><i class="material-icons">check</i>
                    <label class="control-label">Confirm Password</label>
                    <div>
                        <input type="password" class="form-control" name="confirm_password">
                    </div>        	
                </div>
                <div class = "formerror"><?php echo $msg; ?></div>
                <div class="form-group">
                    <div>
                        <center><button type="submit" name = "submit" class="btn btn-primary btn-lg">Sign Up</button></center>
                    </div>  
                </div>		      
            </form>
            <div class="bottom-text">Already have an account? <a href="index.php">Login here</a></div>
        </div>
    </body>
</html>                            