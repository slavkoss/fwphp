<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<main class="nofloat">
    <h1>Featured products</h1>

      <p>
      B12phpfw coding is much better compared to "classic" MVC coding presented here (Murach 2014. year)  which seems to me spaghetti code because : 
      </p>
         
      <p>
         <b>Minuses</b>: Coding in shop folder (PAGES NAVIGATION) in index.php using $pp1, Autoload, Config_allsites and Home_ctr is according B12phpfw coding standards - it is clear why. 
         
         <br>And it is clear why other coding standards (DBI) should be from B12phpfw (ee from Oracle Forms). B12phpfw coding has about dozen coding standards including above mentioned which make big difference, ee make B12phpfw much better compared to "classic" MVC coding.
      </p>
         
      <p>
         <b>Pluses</b>: coding presented here is not to simple, uses PDO and is result of lot of work with good some basic ideas and codings.
      </p>

      <br>

    <p>We have a great selection of musical instruments including
        guitars, basses, and drums. And we're constantly adding more to give
        you the best selection possible!
    </p>
    <table>
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
        $description = $product['description'];
        
        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
        $description_with_tags = add_tags($description);
        $i = strpos($description_with_tags, "</p>");
        $first_paragraph = substr($description_with_tags, 3, $i-3);        
    ?>
        <tr>
            <td class="product_image_column" >
                <img src="images/<?php echo htmlspecialchars($product['productCode']); ?>_s.png"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <a href="catalog?product_id=<?php echo
                           $product['productID']; ?>">
                        <?php echo htmlspecialchars($product['productName']); ?>
                    </a>
                </p>
                <p>
                    <b>Your price:</b>
                    $<?php echo number_format($unit_price, 2); ?>
                </p>
                <p>
                    <?php echo $first_paragraph; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>
<?php include 'view/footer.php'; ?>