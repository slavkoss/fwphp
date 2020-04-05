<?php
require_once('load.php');

// Nonce
$timestamp = time();
$form_action = 'submit_form';
$nonce = create_nonce($form_action, $timestamp);

if ( ! empty( $_POST ) ) { 
    $insert = process($_POST);
} else {
    $insert = NULL ;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <title>HTML Form Tutorial</title>
    </head>
    <body>

        <?php echo do_messages($insert); ?>

        <form action="" method="post">
            <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">
            <input type="hidden" name="form_action" value="<?php echo $form_action; ?>">
            <input type="hidden" name="nonce" value="<?php echo $nonce; ?>">
            <div class="form-field">
                <input type="text" class="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-field">
                <input type="email" class="text" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-field">
                <h3 class="section-title">Frequency</h3>
                <label for="frequency-daily">Daily</label>
                <input type="radio" class="radio" id="frequency-daily" name="frequency" value="daily" checked>
                <label for="frequency-weekly">Weekly</label>
                <input type="radio" class="radio" id="frequency-weekly" name="frequency" value="weekly">
            </div>

            <div class="form-field">
                <h3 class="section-title">Interests</h3>
                <label for="interest-php">PHP</label>
                <input type="checkbox" class="checkbox" id="interest-php" name="interests[php]" value="1">
                <label for="interest-html">HTML</label>
                <input type="checkbox" class="checkbox" id="interest-html" name="interests[html]" value="1">
                <label for="interest-css">CSS</label>
                <input type="checkbox" class="checkbox" id="interest-css" name="interests[css]" value="1">
            </div>

            <div class="form-field">
                <h3 class="section-title">Country</h3>
                <select name="country" class="select" required>
                    <option value="">Select a Country</option>
                    <?php foreach ( $countries as $country ) : ?>
                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-field">
                <h3 class="section-title">Comments</h3>
                <textarea class="textarea" name="comment" placeholder="Enter your comments here"></textarea>
            </div>

            <div class="form-field">
                <button class="button">Submit</button>
            </div>
        </form>
    </body>
</html>