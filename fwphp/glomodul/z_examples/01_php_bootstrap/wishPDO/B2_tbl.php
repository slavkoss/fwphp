<?php
session_start();
require_once dirname(dirname(dirname(__DIR__ )))."/vendor/taq/pdooci/src/PDO.php";
require_once("includes/db.php");

include_once 'includes/hdr.php';
?>
        <h1>
            Messages of <?= $_GET['user']; ?>
        </h1>
        <?php
        $wishes = WishDB::getInstance()->get_wishes_by_wisher_name(
                   $_GET['user']);

        if (0 === $wishes->count()) {
            ?>
            <div class="error">
                The person <?= $_GET['user'] ?> is not found.
                Please check the spelling and try again.
            </div>
            <?php
        } else {
            ?>
            <table class="std">
                <tr>
                    <th>List Item</th>
                    <th>Due Date</th>
                </tr>
                <?php
                while ($wishes->valid()) {
                    $row = $wishes->current();
                    if (true === is_null($row["ID"])) {
                        $wishes->next();
                        continue;
                    }
                    ?><tr>
                        <td>
                            <?= htmlentities($row['DESCRIPTION']); ?>
                        </td>
                        <td>
                            <?= htmlentities($row['DUE_DATE']); ?>
                        </td>
                    </tr>
                    <?php
                    $wishes->next();
                }
                ?>
            </table>
        <?php } ?>
    </body>
</html>