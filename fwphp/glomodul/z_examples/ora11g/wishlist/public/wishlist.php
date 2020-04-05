<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Wish List Module</title>
        <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
    </head>
    <body>
        <h1>
            Wish List of <?php echo $_GET['user']; ?> (master with psw) 
        </h1>
        <?php
        require_once("Includes/db.php");
        $wishes = WishDB::getInstance()->get_wishes_by_wisher_name($_GET['user']);

        if (0 === $wishes->count()) {
            ?>
            <div class="error">
                The person <?php echo $_GET['user'] ?> is not found.
                Please check the spelling and try again.
            </div>
            <?php
        } else {
            ?>
            <table class="std">
                <tr>
                    <th>Item</th>
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
                            <?php echo htmlentities($row['DESCRIPTION']); ?>
                        </td>
                        <td>
                            <?php echo htmlentities($row['DUE_DATE']); ?>
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