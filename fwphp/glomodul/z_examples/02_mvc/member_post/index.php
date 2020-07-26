<?php
/**
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\member_post\index.php
* http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/member_post/
*         a12345/Aa123456
* UPDATE members SET is_admin = 1 WHERE username = 'a12345'; 
* see L:\2_knjige\2020_Learn PHP in One Day and Learn It Well.pdf
USE project;
CREATE TABLE IF NOT EXISTS members (
  username VARCHAR(100) PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
  is_admin BOOLEAN DEFAULT false,
  last_viewed int DEFAULT 0
);
CREATE TABLE IF NOT EXISTS posts2(
  id INT AUTO_INCREMENT PRIMARY KEY,
  post_date TIMESTAMP DEFAULT NOW() NOT NULL,
  username VARCHAR(100) NOT NULL,
  title VARCHAR(255) NOT NULL,
  post TEXT NOT NULL,
  audience INT NOT NULL,
  CONSTRAINT FOREIGN KEY (username) REFERENCES
  members(username) ON DELETE CASCADE
);

*/
    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-index.php";
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
            <i class="material-icons">account_box</i>
            <h4 class="modal-title">Login to Your Account</h4>
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
            <div class = "formerror"><?php echo $msg; ?></div>                
            <div class="form-group">
                <div>
                    <center><button type="submit" name = "submit" class="btn btn-primary btn-lg">Log In</button></center>
                </div>  
            </div>		              
        </form>			
        <div class="bottom-text">Don't have an account? <a href="signup.php">Sign up</a></div>
    </div>
    </body>
</html>                                		                            