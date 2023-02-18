<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-write.php";
    include INC_DIR.'header.html';

?>

    <body>        
        <script>
            $(function(){
            setTimeout(function() {
                $('#error').fadeOut();
            }, 3000); 

            });
        </script>    
		<div id="container">
            <h1>New Post</h1>
            <form method="post" action="">                 
                <div id = "inputtitle">
                    <input id = "txttitle" type="text" name="title" placeholder="Enter Title" autofocus <?php if ($msg != 'Message saved successfully') $h->keepValues($title, 'textbox'); ?>>                    
                </div>
                <div id="message">
                    <textarea name = "post"><?php if ($msg != 'Message saved successfully') $h->keepValues($post, 'textarea'); ?></textarea>
                    <script>CKEDITOR.replace('post', {height: 500});
                    </script>                    
                </div>
                <div id = "error" class="error"><?php echo $msg; ?></div>
                <div id="submit-section">        
                    <input id = "postsubmit" class="btn btn-primary" type="submit" name="submit" value="Send" />                    
                    <select id = "postoptions" class = "custom-select" name = "audience">
                        <option value = ''>Available to: </option>
                        <option value = '1' <?php if ($msg != 'Message saved successfully') $h->keepValues($audience, 'select', '1'); ?> >Public</option>
                        <option value = '2' <?php if ($msg != 'Message saved successfully') $h->keepValues($audience, 'select', '2'); ?>>Members Only</option>           
                    </select>                                        
                </div>                
            </form>                
		</div>
        <div id = 'postlogout'>
            <a href = "logout.php?admin=1">Click here to logout</a> | 
            <a href = "read.php" target="_blank">Click here to read posts</a>            
        </div>        

	</body>
</html>