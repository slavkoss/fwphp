<div class="card read-card">
    <div class="card-body">

        <h4 class="card-title"><?php echo $title; ?></h4>
        <hr>
        
        <?php
        if ($is_member and $lastPost < $msgid)
        {
            echo '<span class = "new-post">NEW</span>';
            $update = true;
        }
        ?>
        
        
        <span class="post-time">Posted by <?php echo $username; ?> on <?php echo date('d-M-Y g:i a', $postdate); ?> (Eastern Time)</span>
        <p class="card-text"><?php echo $post; ?></p>            

    </div>
</div> 