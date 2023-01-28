<!DOCTYPE HTML>
<?php
/*
 * Start session
 */
session_start();
if (!array_key_exists("user", $_SESSION)) {
    header('Location: index.php');
    exit;
}
/*
 * Include database class
 */
require("Includes/db.php");

/*
 * Retrieve the ID of the wisher who is trying to add a wish
 */
$wisherID = WishDB::getInstance()->get_wisher_id_by_name($_SESSION['user']);
/*
 * Initialize $wishDescriptionIsEmpty
 */
$wishDescriptionIsEmpty = false;

/*
 * Checks that the Request method is POST, which means that the data
 * was submitted from the form for entering the wish data on the editWish.php
 * page itself
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    /*
     * Checks whether the $_POST array contains an element with the "back" key
     */
    if (array_key_exists("back", $_POST)) {
        /*
         * The Back to the List key was pressed.
         * Code redirects the user to the editWishList.php
         */
        header('Location: editWishList.php');
        exit;
    }
    /*
     * Checks whether the element with the "wish" key in the $_POST
     * array is empty, which means that no description was entered.
     */ else if ($_POST['wish'] == "") {
        $wishDescriptionIsEmpty = true;
    }
    /*
     * The "wish" key in the $_POST array is NOT empty,
     * so a description is entered.
     * Adds the wish description and the due date to the database
     * via WishDB.insert_wish
     */ else if ($_POST['wishID'] == "") {
        WishDB::getInstance()->insert_wish((int) $wisherID, $_POST['wish'],
                $_POST['dueDate']);
        header('Location: editWishList.php');
        exit;
    } else if ($_POST['wishID'] != "") {
        WishDB::getInstance()->update_wish((int) $_POST['wishID'],
                $_POST['wish'], $_POST['dueDate']);
        header('Location: editWishList.php');
        exit;
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wish List Module</title>
        <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $wish = array("id" => $_POST['wishID'],
                "description" => $_POST['wish'],
                "due_date" => $_POST['dueDate']);
        } else {
            if (array_key_exists("wishID", $_GET)) {
                $row = WishDB::getInstance()->
                        get_wish_by_wish_id($_GET['wishID']);
                $date = new DateTime($row['DUE_DATE'], new DateTimeZone("UTC"));
                $wish = array(
                    "id" => $row['ID'],
                    "description" => $row['DESCRIPTION'],
                    "due_date" => $date->format(DateTime::ISO8601)
                );
            } else {
                $wish = array("id" => "", "description" => "", "due_date" => "");
            }
        }
        ?>
        <form name="editWish" action="editWish.php" method="POST">
            <input type="hidden" name="wishID" value="<?php echo $wish['id']; ?>" />

            <label>Describe your wish:</label>
            <input type="text" name="wish"
                   value="<?php echo $wish['description']; ?>" /><br/>
                   <?php
                   if ($wishDescriptionIsEmpty) {
                       ?>
                <div class="error">Please enter description</div>
                <?php
            }
            ?>
            <label>When do you want to get it? </label>
            <input type="text" name="dueDate"
                   value="<?php echo $wish['due_date']; ?>"/>
            <br/>
            <br/>
            <input type="submit" name="saveWish" value="Save Changes"/>
            <input type="submit" name="back" value="Back to the List"/>
        </form>
    </body>
</html>