<?php
// J:\awww\apl\dev1\papl1\tema\wishPDO\B1_tbl_edit.php
session_start();
require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");

//if (!array_key_exists("user", $_SESSION)) {
//    header('Location: index.php');
//    exit;
//}
include_once 'includes/hdr.php';
?>

        <table style="border: black thin solid">
            <tr>
            <th>NAME</th><th>PASSWORD</th><th>ID</th>
            </tr>
        </table>

        <h1>User (tema, todo list, thread, wish group): 
        </h1>

        <table class="std">
            <tr>
                <th>NAME</th>
                <th>PASSWORD</th>
                <th>ID</th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <?php
            $wishers = WishDB::getInstance()->
                    get_wishers();
            while ($wishers->valid()):
                $row = $wishers->current();

                if (true === is_null($row["ID"])) {
                    $wishers->next();
                    continue;
                }
                ?>
                <tr>
                    <td>&nbsp;
                      <?= htmlentities($row['NAME']); ?>
                    </td>
                    <td>&nbsp;
                        <?= htmlentities($row['PASSWORD']); ?>
                    </td>
                    <td>&nbsp;
                      <?php echo htmlentities($row['ID']);
                          $wisherID = $row['ID'];                      
                      ?>
                    </td>
                    <td>
                        <form name="editWisher"
                              action="B2_edit.php" method="GET">
                            <input type="hidden"
                                   name="wisherID"
                                   value="<?= $wisherID; ?>" />
                            <input type="submit" name="editWisher" value="Edit" />
                        </form>
                    </td>
                    <td>
                        <form name="deleteWisher"
                              action="B1_erase.php" method="POST">
                            <input type="hidden"
                                   name="wisherID"
                                   value="<?= $wisherID; ?>" />
                            <input type="submit"
                                   name="deleteWisher"
                                   value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php
                $wishers->next();
            endwhile;
            ?>
        </table>
        
        <table><tr><td>
        <form name="addNewWisher" action="B1_add.php">
            <input type="submit" value="Add Wisher"/>
        </form></td><td>
        <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page (WISHER - master selection)"/>
        </form>
        
        
    </body>
</html>