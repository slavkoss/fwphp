<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Add New Post</h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/posts" class="btn btn-light pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    
                </div>
                <p class="card-text">Please enter your username and password</p>
            </div>
        
            <div class="card-body">
                <form method="post" action="<?php echo URLROOT ;?>/Posts/add">
                    <div class="form-group">
                        <label for="title">Title<sub>*</sub></label>
                        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['title'] ;?>">
                        <span class="invalid-feedback"><?php echo $data['title_err'] ;?> </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Body<sub>*</sub></label>
                        <textarea type="text" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['body'] ;?>">
                            
                        </textarea><span class="invalid-feedback"><?php echo $data['title_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary btn-block pull-left" value="Add Post">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>