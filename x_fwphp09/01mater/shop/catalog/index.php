<?php
//see 2014_Murach's PHP and MySQL 2ndEd.pdf
//require_once('../util/m ain.php');
require_once('../model/product_db.php');
require_once('../model/category_db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
if ($category_id !== null) { $action = 'category';} 
elseif ($product_id !== null) { $action = 'product'; }
else { $action = ''; }

switch ($action) {
    case 'category':  // Display specified category
        $category = get_category($category_id);  // Get category data
        $category_name = $category['categoryName'];
        $products = get_products_by_category($category_id);
        include('./category_view.php');  // Display category
        break;
    case 'product':  // Display the specified product
        $product = get_product($pp1);  // $product_id   Get product data
        include('./product_view.php');  // Display product
        break;
    default:
        $error = 'Unknown catalog action: ' . $action;
        include('errors/error.php');
        break;
}
?>