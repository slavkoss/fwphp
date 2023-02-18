<?php    
// J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\well_1day\includes\process\p-read.php
    $h = new Helper();
    $update = false;

    $is_member = isset($_SESSION['username']);


    if ($is_member){
        $reader = new BlogMember($_SESSION['username']);
        $lastPost = $reader->getLastViewedPost();
    }else{
        $reader = new BlogReader();
    }

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
            $username = htmlspecialchars($result['username']);
            $postdate = htmlspecialchars($result['post_date']);
            include "output_code/messagecard.php";
        }
    }

    if ($is_member)
    {
        include "output_code/logout.html";
        if ($update)
            $reader->updateLastViewedPost();
    }
