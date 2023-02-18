<!DOCTYPE HTML>
<?php
require_once("Includes/db.php");
session_start();
if (!array_key_exists("user", $_SESSION)) {
    header('Location: index.php');
    exit;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wish List Module</title>
        <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <table style="border: black thin solid">
            <tr><th>Item</th><th>and Due Date</th></tr>
        </table>
        <h1>Msgs group "<?php echo $_SESSION['user']; ?>"
        </h1>
        <table class="std">
            <tr>
                <th>Item</th>
                <th>Due Date</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <?php
            $wishes = WishDB::getInstance()->
                    get_wishes_by_wisher_name($_SESSION["user"]);
            while ($wishes->valid()):
                $row = $wishes->current();
                $date = new DateTime($row['DUE_DATE'], new DateTimeZone("UTC"));
                if (true === is_null($row["ID"])) {
                    $wishes->next();
                    continue;
                }
                ?>
                <tr>
                    <td>&nbsp;
                        <?php
                        echo htmlentities($row['DESCRIPTION']);
                        ?>
                    </td>
                    <td>&nbsp;
                        <?php
                        echo (is_null($row['DUE_DATE']) ?
                                "" : $date->format("Y, M jS"));
                        $wishID = $row['ID'];
                        ?>
                    </td>
                    <td>
                        <form name="editWish"
                              action="editWish.php" method="GET">
                            <input type="hidden"
                                   name="wishID"
                                   value="<?php echo $wishID; ?>" />
                            <input type="submit" name="editWish" value="Edit" />
                        </form>
                    </td>
                    <td>
                        <form name="deleteWish"
                              action="deleteWish.php" method="POST">
                            <input type="hidden"
                                   name="wishID"
                                   value="<?php echo $wishID; ?>" />
                            <input type="submit"
                                   name="deleteWish"
                                   value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php
                $wishes->next();
            endwhile;
            ?>
        </table>

        <form name="addNewWish" action="editWish.php">

            <input type="submit" value="Add Wish"/>
        </form>
        <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page"/>
        </form>
    </body>
</html>