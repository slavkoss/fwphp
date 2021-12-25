<?php
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\read.php
    session_start();
    include "UI_include.php";

    include INC_DIR.'header.html';
?>
    <body>
    <?php 
    //include INC_DIR."/process/p-read.php";
    // J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\includes\process\p-read.php
    $h = new Helper();
    $update = false;

    $is_member = isset($_SESSION['username']);


    $reader = new BlogReader();
    /*if ($is_member){
        $reader = new BlogMember($_SESSION['username']);
        $lastPost = $reader->getLastViewedPost();
    }else{
        $reader = new BlogReader();
    } */

        $posts = $reader->getPostsFromDB();

    if ($posts == false){
        include "output_code/blankcard.html";
    }else{
        foreach($posts as $result)
        {
            $msgid = $result['id'];
            $title = htmlspecialchars($result['title']);
            $post = strip_tags($result['post'],
            "<strong><em><p><ol><ul><li><a>");
            $username = htmlspecialchars($result['author']);
            $postdate = htmlspecialchars($result['datetime2']);
            include "includes/process/output_code/messagecard.php";
        }
    }

    if ($is_member)
    {
        include "includes/process/output_code/logout.html";
        if ($update)
            $reader->updateLastViewedPost();
    }
    ?>
	</body>
</html>