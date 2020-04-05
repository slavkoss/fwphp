<?php require_once 'i_hdr.php'; ?>
<?php require_once 'i_nav.php'; 
            if ('1') { echo basename(__FILE__).' SAYS : <pre>';
              echo '<br />$user='; print_r($user); 
            echo '</pre>'; }
?>


<div class="container">

    <div class='jumbotron jumbotron-fluid text-center color-set'>
        <div class="container">
            <h1 class='display-3'>
                Profile Managment
            </h1>
            <p class='lead'>
                Here you will be able to upload image and edit information
            </p>

        </div>
    </div>
    <?php
       

                  echo(getMsg('msg_notify'));
   
    
    ?>

    <div class="col-md-6 mx-auto">

        <div class='card'>


            <div class="card-header color-set">

                Your Profile Data
            </div>
            <div class='card-body '>
             

                <div class="row">

                    <div class="col-md-8">
                        <div class='detail-text'>
                            <label for="name"><strong>Name:</strong></label>
                            <span class='text-data'> <?php echo($user->aname); ?></span>
                        </div>

                        <div class='detail-text'>
                            <label for="name"><strong>Email:</strong></label>
                            <span class='text-data'> <?php echo($user->user_email); ?></span>
                        </div>
                        
                         <div class='detail-text'>
                            <label for="name"><strong>Username:</strong></label>
                            <span class='text-data'> <?php echo($user->username); ?></span>
                        </div>
                         <div class='detail-text'>
                            <label for="name"><strong>Website:</strong></label>
                            <span class='text-data'> <?php echo($user->website); ?></span>
                        </div>
                         <div class='detail-text'>
                            <label for="name"><strong>User id:</strong></label>
                            <span class='text-data'> <?php echo($user->id); ?></span>
                        </div>

                     

                        <hr/>
                      <div class='detail-text'>
                            <label for="name"><strong>Created at:</strong></label>
                            <span class='text-data'> <?php 
                               echo $user->datetime ; //cTime($user->registration_date)
                               ?></span>
                        </div>

                    </div>
                    <div class="col-md-4 w-50">
                        <?php if(empty($user->aimage)): ?>
                        <img src="http://via.placeholder.com/150x150">
                        <?php else: ?>
                          <img src="<?= '/zinc/img/'.$user->aimage ?>" class="img-responsive w-100">
                        <?php endif; //MODULE_URL.'/images/'.$user->aimage ?>
                    </div>
                </div>

            </div>
            <div class='card-footer'>
                <a href='' data-toggle="modal" data-target="#myModal"><i class="fa fa-power-off"></i></a>
                <a href="<?php echo(MODULE_URL); ?>/edit_profile.php" class='pull-right'><i class='fa fa-pencil-square-o'></i></a>
            </div>

        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
              
              
                <div class="modal-body text-center pt-4 color-set">
                    <p>Do you really want to deactivate your account?</p>
                </div>
                <div class="modal-footer">
                    <form action="<?= MODULE_URL.'p_deactivate_account.php' ?>" method='post'>
                          <input type="submit" value='Yes' class="btn btn-danger" name="deactivate">
                    </form>
                  
                    <button type="button" class="btn btn-success " data-dismiss="modal" style='cursor:pointer;'>No</button>
                </div>
            </div>

        </div>
    </div>



</div>


<!--footer-->
<?php require_once 'i_ftr.php'; ?>
