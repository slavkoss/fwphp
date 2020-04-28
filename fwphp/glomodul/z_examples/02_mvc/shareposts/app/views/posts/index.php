<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
  <div class="row ">
      <div class="col-md-8">
          <h2>Posts from our blog</h2>
      </div>
      <div class="col-md-4">
          <a class="btn btn-primary pull-right" href="<?php echo URLROOT ;?>/posts/add"><i class="fa fa-pencil"></i> Add Post</a>
      </div>
  </div>
  <?php foreach ($data['posts'] as $post) : ?>
        <div class="card mb-3 mt-2">
            <div class="card-body"><h2 class="card-text"><?php echo  $post->title ;?></h2></div>
            <p class="card-body">
                <?php echo  $post->title ;?>
            </p>
            <p class="card-title bg-light p-2 mb-3">
             Created By <?php echo $post->name ;?> on <?php echo  $post->postCreated ;?>
            </p>
            <a href="<?php echo URLROOT ;?>/posts/show/<?php echo $post->postId ;?>" class="btn btn-dark btn-block">More...</a>
        </div>
  <?php endforeach ;?>
<?php require APPROOT . '/views/inc/footer.php'; ?>