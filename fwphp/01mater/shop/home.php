<?php
use B12phpfw\module\model\Product ; 
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\guitar_shop\home.php

    //As of PHP5, object variable doesn't contain object itself as value. It only contains object identifier. When an object is sent as parameter (argument), returned or assigned to another variable, those variables are not aliases: they hold a copy of the identifier, which points to same object.
    require($pp1->module_path .'model/database.php'); //not require_once
    $pp1->db = $db ;
    require($pp1->module_path .'util/tags.php');
    //require('model/product_db.php');

    $uriq = $pp1->uriq ;

    $title = 'SHOP HOME';

// Set the featured product IDs in an array (You could also store this list in DB)
$product_ids = array(1, 7, 9); //20, 27, 54
// Get an array of featured products from DB
$products = array();
foreach ($product_ids as $product_id) {
   $pp1->product_id = $product_id ;
   $pp1->caller = 'get_product in ' . __FILE__ .', ln='. __LINE__ ;
   $products[] = Product::get_product($pp1);  // add product object to array
}



$subtitle = 'Featured products'; 

include 'view/header.php'; // FLEX problems if <pre is before this
            /*if ($skin == '01sidebar') echo '<main>'; else include 'view/sidebar.php';
            if ($skin == '01sidebar') echo '<div class="main"><section class="chapter">';
            else echo '<main class="nofloat">'; */
?>
<main>
  <div class="main">
    <section class="chapter">

      <!--h1>Featured products</h1-->

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

      <br><p>We have a great selection of musical instruments including
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