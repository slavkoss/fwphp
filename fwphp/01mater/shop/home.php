<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\guitar_shop\home.php

require_once('model/product_db.php');

// Set the featured product IDs in an array (You could also store this list in DB)
$product_ids = array(1, 7, 9); //20, 27, 54
// Get an array of featured products from DB
$products = array();
foreach ($product_ids as $product_id) {
    $product = get_product($product_id, 'get_product in ' . __FILE__ .', ln='. __LINE__ );
    $products[] = $product;   // add product object to array
}



$subtitle = 'Featured products'; 
include 'view/header.php';
            /*if ($skin == '01sidebar') echo '<main>'; else include 'view/sidebar.php';
            if ($skin == '01sidebar') echo '<div class="main"><section class="chapter">';
            else echo '<main class="nofloat">'; */
?>
<main>
  <div class="main">
    <section class="chapter">

      <!--h1>Featured products</h1-->

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
            <img src="<?php echo $img_dirpath . htmlspecialchars($product['productCode']); ?>_s.png"
                   alt="&nbsp;">
          </td>
          <td>
            <p><a href="catalog?product_id=<?php echo $product['productID']; ?>">
                  <?php echo htmlspecialchars($product['productName']); ?></a></p>
            <br /><p><b>Your price:</b> $<?php echo number_format($unit_price, 2); ?></p>
            <br /><p><?php echo $first_paragraph; ?></p>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
    </section>
  </div>

  <?php include 'view/sidebar.php'; ?>

</main>

<?php include 'view/footer.php'; ?>