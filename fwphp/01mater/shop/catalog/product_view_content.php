<?php

?>

<h1><?php //echo htmlspecialchars($product_name); ?></h1>

<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>List Price:</b><?php echo '$' . $list_price; ?></p>
    <br /><p><b>Discount:</b><?php echo $discount_percent_f . '%'; ?></p>
    <br /><p><b>Your Price:</b><?php echo '$' . $unit_price_f; ?>
        (You save <?php echo '$' . $discount_amount_f; ?>)</p>

    <form action="<?php echo $module_relpath . 'cart' ?>" method="get" 
          id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Quantity:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>

    <br /><h2>Description</h2>
    <?php echo $description_with_tags; ?>
</div>
