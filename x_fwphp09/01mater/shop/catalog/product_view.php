<?php

    // Parse data
    $category_id      = $product['categoryID'];
    $product_code     = $product['productCode'];
    $product_name     = $product['productName'];
    $description      = $product['description'];
    $list_price       = $product['listPrice'];
    $discount_percent = $product['discountPercent'];

    // Add HMTL tags to the description
    $description_with_tags = add_tags($description);

    // Calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100), 2);
    $unit_price = $list_price - $discount_amount;

    // Format discounts
    $discount_percent_f = number_format($discount_percent, 0);
    $discount_amount_f = number_format($discount_amount, 2);
    $unit_price_f = number_format($unit_price, 2);

    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    //$image_path = $module_relpath . 'images/' . $image_filename;
    $image_path = $img_dirpath . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;

$subtitle = htmlspecialchars($product_name); 
include '../view/header.php'; ?>
<main>
  <div class="main">
    <section class="chapter">

    <!-- display product -->
    <?php include './product_view_content.php'; ?>

    </section>
  </div>

  <?php include '../view/sidebar.php'; ?>
</main>
<?php include '../view/footer.php'; ?>