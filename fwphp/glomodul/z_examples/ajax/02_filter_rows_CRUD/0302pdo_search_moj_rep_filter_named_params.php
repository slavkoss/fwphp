<?php
//see http://dev1:8083/fwphp/glomodul/help_sw/test/user1/search/search.php

//<!-- M O D E L  C O D E -->
if (isset($_GET['search'])) {
    try {
        //require_once 'includes/pdo_connect.php'; //'../../includes/pdo_connect.php'
        $dsn = 'sqlite:oophp.db';

        $db = new PDO($dsn, 'oophp', '');

        //cars.make_id = makes.make_id(+) not working
        $sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE :make AND yearmade >= :yearmade AND price <= :price
                ORDER BY price';

        $stmt = $db->prepare($sql);

        $stmt->bindValue(':make', '%' . $_GET['make'] . '%');
        $stmt->bindParam(':yearmade', $_GET['yearmade'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $_GET['price'], PDO::PARAM_INT);

        $stmt->execute(); // fetch is in  V I E W  C O D E
        $errorInfo = $stmt->errorInfo();

        if (isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>




<!-- V I E W  C O D E -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDOsearch</title>
    <!--link rel="stylesheet" href="../../styles/styles.css"-->
    <style type="text/css">
      body {
          background-color: #fff;
          color: #1b1b1b;
          font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
          margin: 2% 5% 0;
      }
      p {
          font-size: 1.25em;
      }
      select, input {
          font-size: 0.875em;
      }
      table {
          max-width: 1000px;
          border-collapse: collapse;
          border: 1px solid #c9c9c9;
          margin: 0 auto 20px 50px;
      }
      th {
          background-color: #ddd;
          color: #555;
          padding: 0.5em 1em;
          text-align: left;
      }
      td {
          vertical-align: top;
          padding: 0.25em 1em;
      }
      tr {
          border-bottom: 1px solid #c9c9c9;
      }
      tr:nth-child(even) {
          background-color: #e7edf6;
      }
      fieldset {
          border: none;
          margin-left: 50px;
          padding: 1px 0;
      }
      fieldset p {
          margin: 0.5em 0 0.5em 30px;
      }
      legend {
          font-variant: small-caps;
          font-size: 1.2em;
      }
      h2 {
          margin: 0.5em 0;
      }
      h2 + p {
          margin: 0 0 0 40px;
      }
    </style>

</head>



<body>
<h1>PDO SQLite oophp.db Prepared Statement: Named Parameters</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} ?>


<!-- V I E W  F O R M -->
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <fieldset>

        <legend>Filter Cars - Type few characters of "Make" column and press ENTER key or button</legend>

      <p>
        <label for="make">Make: </label>
          <input type="text" name="make" id="make" autofocus placeholder="Utipkajte ili ENTER tipka">

        <label for="yearmade">Year (minimum): </label>
          <select name="yearmade" id="yearmade">
            <?php for ($y = 1995; $y <= 2010; $y+=5) {
                echo "<option>$y</option>";
            } ?>
          </select>

        <label for="price">Price (maximum): </label>
          <select name="price" id="price">
            <?php for ($p = 5000; $p <= 30000; $p+=5000) {
                echo "<option value='$p'";
                if ($p == 30000) {
                    echo ' selected';
                }
                echo '>$' . number_format($p) . '</option>';
            } ?>
          </select>

        <input type="submit" name="search" value="Search Make column">
      </p>

    </fieldset>

</form>



<?php
if (isset($_GET['search']))
{
    $row = $stmt->fetch();
    if ($row)
    { ?>
      <!-- V I E W  T A B L E -->
        <table>
          <tr>
              <th>Make</th>
              <th>Year</th>
              <th>Mileage</th>
              <th>Price</th>
              <th>Description</th>
          </tr>
          <?php do { ?>
          <tr>
              <td><?php echo $row['make']; ?></td>
              <td><?php echo $row['yearmade']; ?></td>
              <td><?php echo number_format($row['mileage']); ?></td>
              <td>$<?php echo number_format($row['price'], 2); ?></td>
              <td><?php echo $row['description']; ?></td>
          </tr>


          <?php } while ($row = $stmt->fetch()); ?>


        </table>
      <?php }
      else {
        echo '<p>No results found.</p>';
      }
} ?>


</body>
</html>