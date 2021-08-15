<?php
//            c r e  n e w  t h r e a d  (T e m a)
session_start();
require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");

/*
 * other variables
 */
$userNameIsUnique = true;
$passwordIsValid  = true;
$userIsEmpty      = false;
$passwordIsEmpty  = false;
$password2IsEmpty = false;

/*
 * Check that the page was requested from itself via the POST method.
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    /*
     * Check whether the user has filled in the wisher's name
     * in the text field "user"
     */
    if ($_POST['user'] == "") {
        $userIsEmpty = true;
    }

    /** Create database connection */
    $wisherID = WishDB::getInstance()->get_wisher_id_by_name(
                    $_POST['user']);
    if ($wisherID) {
        $userNameIsUnique = false;
    }

    /** VALIDATION : password was entered and confirmed correctly */
    if ($_POST['password'] == "") $passwordIsEmpty = true;
    if ($_POST['password2'] == "") $password2IsEmpty = true;
    if ($_POST['password'] != $_POST['password2']) {
                                 $passwordIsValid = false;
    }

    /*
     * Check whether the boolean values show that the input data was
     * validated successfully.
     * If the data was validated successfully, add it as a new entry
     * in the "wishers" database.
     * After adding the new entry, close the connection and redirect
     * the application to B2_ tbl_ edit.php.
     */
    if (!$userIsEmpty && $userNameIsUnique && !$passwordIsEmpty
            && !$password2IsEmpty && $passwordIsValid) {
        WishDB::getInstance()->create_wisher($_POST['user'], $_POST['password']);
        //session_start();
        $_SESSION['user'] = $_POST['user'];
        header('Location: B2_tbl_edit.php');
        exit;
    }
}

include ('includes/hdr.php');
?>

        <h1>Welcome!</h1>

        <form action="B1_add.php" method="POST" id="createNewWisher">
            <label>Your name:</label>
            <input type="text" name="user"/><br/>
            <?php
            /*
             * Display error messages if "user" field is empty or there
             * is already a user with that name
             */
            if ($userIsEmpty) {
                ?>
                <div class="error">
                    Enter your name, please!
                </div>
                <?php
            }
            if (!$userNameIsUnique) {
                ?>
                <div class="error">
                    The person already exists.
                    Please check the spelling and try again.
                </div>
                <?php
            }
            ?>
            <label>Password:</label>
            <input type="password" name="password"/><br/>
            <?php
            /** Display error messages if the "password" field is empty */
            if ($passwordIsEmpty) {
                ?>
                <div class="error">Enter the password, please</div>
                <?php
            }
            ?>
            <label>Password (Again):</label>
            <input type="password" name="password2"/><br/>
            <?php
            /**
             * Display error messages if the "password2" field is empty
             * or its contents do not match the "password" field
             */
            if ($password2IsEmpty) {
                ?>
                <div class="error">Confirm your password, please</div>

                <?php
            }
            if (!$password2IsEmpty && !$passwordIsValid) {
                ?>
                <div class="error">The passwords do not match!</div>
                <?php
            }
            ?>
            <br />
            <input type="submit" value="Register" />
            <!--input type="submit" name="B1tbl" value="Tablica" /-->

        </form>

    </body>
</html>