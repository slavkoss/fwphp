<html>
    <head>
        <title>PDO OCI Test Page</title>
    </head>

    <body>
        <?php
        $pdo = new PDO(
                        'oci:dbname=localhost/XE',
                        'jim',
                        'mypassword'
        );
        $sql = "
            SELECT DEPARTMENT_NAME, MANAGER_ID, LOCATION_ID, STREET_ADDRESS,
            POSTAL_CODE, CITY, STATE_PROVINCE
            FROM departments NATURAL JOIN locations
            ORDER by DEPARTMENT_NAME
            ";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll();
        ?>
        <table>
            <?php
            foreach ($result as $row) {
                ?><tr><?php
                foreach ($row as $item) {
                    ?><td><?php
                    echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
                    ?></td><?php
                }
                ?></tr><?php
            }
            ?>
        </table>
    </body>
</html>
