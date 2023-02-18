<?php
/**
 * Add this line to your composer.json file: ( https://github.com/PHPMailer/PHPMailer )
 *   "phpmailer/phpmailer": "^6.5" or run composer require phpmailer/phpmailer
 *    If you want to use Gmail XOAUTH2 authentication class, you will also need to add
 *    dependency on the league/oauth2-client package in your composer.json.
 * or composer require symfony/mailer or composer require symfony/google-mailer
 *               https://symfony.com/doc/current/mailer.html
 *               https://swiftmailer.symfony.com/docs/introduction.html
 */
$missing = [];
$errors = [];
if (isset($_POST['register'])) {
    require_once 'process.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Art Conference: Register</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Roux Academy Art Conference</h1>
        <p>Join over 500 hundred of the most creative and brilliant minds of art colleges all around the world for
            lectures by world-renowned art scholars and artists.</p>
    </header>
    <main>
        <h2>Register</h2>
        <p>To attend the Roux Academy Contemporary Art Conference, please complete the information below.</p>
        <p>Items marked with <span class="required">*</span> must be filled in.</p>

        <?php if ($errors || $missing) : ?>
            <p class="warning">Please fix the item(s) indicated</p>
        <?php endif; ?>

        <form id="registrationform" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>About You</legend>
                <ul>
                    <li>
                        <label for="name">Name <span class="required">*</span></label>
                        <input type="text" name="name" id="name"
                            <?php if ($errors || $missing) {
                                echo 'value="' . htmlentities($_POST['name']) . '"';
                            } ?>
                        >
                        <?php if ($missing && in_array('name', $missing)) : ?>
                            <span class="warning">Please enter your name</span>
                        <?php endif; ?>
                    </li>
                    <li>
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" name="email" id="email" autocomplete="off"
                            <?php if (!isset($errors['email']) && ($errors || $missing)) {
                                echo 'value="' . htmlentities($_POST['email']) . '"';
                            } ?>
                        >
                        <?php if ($missing && in_array('email', $missing)) : ?>
                            <span class="warning">Please enter your email address</span>
                        <?php elseif (isset($errors['email'])) : ?>
                            <span class="warning"><?= $errors['email']; ?></span>
                        <?php endif; ?>
                    </li>
                    <li>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                        <label for="photo">Photo (head &amp; shoulders) <span class="required">*</span></label>
                        <input type="file" name="photo" id="photo">
                        <?php if (isset($errors['photo'])) : ?>
                            <br>
                            <span class="warning"><?= $errors['photo']; ?></span>
                        <?php elseif ($errors || $missing) : ?>
                            <br>
                            <span class="warning">Please reselect your photo</span>
                        <?php endif; ?>
                    </li>
                </ul>
                <p>The photo will be used for your conference badge. Maximum size 1 MB.
                    Acceptable formats: JPEG, PNG, GIF.</p>
            </fieldset>
            <fieldset>
                <legend>Conference Arrangements</legend>
                <ul>
                    <li>
                        <p class="grouphead">Ticket Type</p>
                        <ul>
                            <li class="singleline">
                                <input type="radio" name="ticket_type" id="ticket_type_01"
                                       value="One-day ticket (Monday)"
                                    <?php if (isset($_POST['ticket_type']) &&
                                        $_POST['ticket_type'] == 'One-day ticket (Monday)') {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="ticket_type_01">One-day (Monday)</label>
                            </li>
                            <li class="singleline">
                                <input type="radio" name="ticket_type" id="ticket_type_02"
                                       value="One-day ticket (Tuesday)"
                                    <?php if (isset($_POST['ticket_type']) &&
                                        $_POST['ticket_type'] == 'One-day ticket (Tuesday)') {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="ticket_type_02">One-day (Tuesday)</label>
                            </li>
                            <li class="singleline">
                                <input type="radio" name="ticket_type" id="ticket_type_03"
                                       value="Both days (Monday & Tuesday)"
                                    <?php if (!$_POST || (isset($_POST['ticket_type'])
                                            && $_POST['ticket_type'] == 'Both days (Monday & Tuesday)')) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="ticket_type_03">Both days (Monday &amp; Tuesday)</label>
                            </li>
                            <li class="singleline">
                                <input type="radio" name="ticket_type" id="ticket_type_04"
                                       value="Both days plus workshop"
                                    <?php if (isset($_POST['ticket_type']) &&
                                        $_POST['ticket_type'] == 'Both days plus workshop') {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="ticket_type_04">Both days plus workshop on Wednesday</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label for="dietary_needs">Dietary needs</label>
                        <select name="dietary_needs" id="dietary_needs">
                            <option value="none"
                                <?php if (!$_POST || (isset($_POST['dietary_needs']) &&
                                        $_POST['dietary_needs'] == 'none')) {
                                    echo 'selected';
                                } ?>
                            >No special requirements
                            </option>
                            <option
                                <?php if (isset($_POST['dietary_needs']) &&
                                    $_POST['dietary_needs'] == 'Vegetarian') {
                                    echo 'selected';
                                } ?>
                            >Vegetarian
                            </option>
                            <option
                                <?php if (isset($_POST['dietary_needs']) &&
                                    $_POST['dietary_needs'] == 'Vegan') {
                                    echo 'selected';
                                } ?>
                            >Vegan
                            </option>
                            <option
                                <?php if (isset($_POST['dietary_needs']) &&
                                    $_POST['dietary_needs'] == 'Halal') {
                                    echo 'selected';
                                } ?>
                            >Halal
                            </option>
                            <option
                                <?php if (isset($_POST['dietary_needs']) &&
                                    $_POST['dietary_needs'] == 'Kosher') {
                                    echo 'selected';
                                } ?>
                            >Kosher
                            </option>
                        </select>
                    </li>
                    <li>
                        <p class="grouphead">Please indicate your main areas of interest</p>
                        <ul>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_01"
                                       value="sculpture"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('sculpture', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_01">Sculpture</label>
                            </li>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_02"
                                       value="painting"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('painting', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_02">Painting</label>
                            </li>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_03"
                                       value="ceramics"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('ceramics', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_03">Ceramics</label>
                            </li>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_04"
                                       value="fabrics"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('fabrics', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_04">Fabrics</label>
                            </li>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_05"
                                       value="graphic art"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('graphic art', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_05">Graphic art</label>
                            </li>
                            <li class="singleline">
                                <input type="checkbox" name="interests[]" id="interests_06"
                                       value="photography"
                                    <?php if (isset($_POST['interests']) &&
                                        in_array('photography', $_POST['interests'])) {
                                        echo 'checked';
                                    } ?>
                                >
                                <label for="interests_06">Photography</label>
                            </li>
                        </ul>
                    </li>
                    <li class="singleline">
                        <input type="checkbox" id="accept_terms" name="accept_terms" value="yes"
                            <?php if (isset($_POST['accept_terms']) && $_POST['accept_terms'] == 'yes') {
                                echo 'checked';
                            } ?>
                        >
                        <label for="accept_terms">I accept the registration terms and conditions <span
                                class="required">*</span>
                            <?php if ($missing && in_array('accept_terms', $missing)) : ?>
                                <span class="warning">You must check this box</span>
                            <?php endif; ?>
                        </label>
                    </li>
                </ul>
                <input type="submit" name="register" value="Register">
            </fieldset>
        </form>
    </main>
    <footer>
        <ul>
            <li><a href="#">About the Roux Academy</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Visit our website</a></li>
        </ul>
    </footer>
</div>
</body>
</html>