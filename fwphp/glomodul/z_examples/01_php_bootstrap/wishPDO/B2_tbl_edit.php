<?php
// J:\wamp64\www\fwphp\glomodul\help_sw\wishPDO\B2_tbl_edit.php
session_start();
require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");

//echo '<h3>'.'$logonSuccess='.($logonSuccess ? 'true':'false').'<h3>' ;
echo '<br />'.'<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
/*
if (!array_key_exists("user", $_SESSION)) {
    header('Location: index.php');
    exit;
}
*/
include_once 'includes/hdr.php';
?>

        <table style="border: black thin solid">
            <tr><th>ED Item</th><th>Due Date</th></tr>
        </table>

        <h1>User (tema, todo list, thread, wish group): 
            <?= $_SESSION['user']; ?> 
        </h1>

        <table class="std">
            <tr>
                <th>Item</th>
                <th>Due Date</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <?php
            $wishes = WishDB::getInstance()->get_wishes_by_wisher_name($_SESSION["user"]);
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
                              action="B2_edit.php" method="GET">
                            <input type="hidden"
                                   name="wishID"
                                   value="<?= $wishID; ?>" />
                            <input type="submit" name="editWish" value="Edit" />
                        </form>
                    </td>
                    <td>
                        <form name="deleteWish"
                              action="B2_erase.php" method="POST">
                            <input type="hidden"
                                   name="wishID"
                                   value="<?= $wishID; ?>" />
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
        
        <table><tr><td>
        <form name="addNewWish" action="B2_edit.php">
            <input type="submit" value="Add Wish"/>
        </form></td><td>
        <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page (WISHER - master selection)"/>
        </form></td></tr></table>
    </body>
</html>