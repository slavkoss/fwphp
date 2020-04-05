<?php include '../view/header.php'; ?>
<main>
  <div class="main">
    <section class="chapter">

      <h1><?php echo htmlspecialchars($category_name); ?></h1>

      <?php if (count($products) == 0) : ?>
          <p>There are no products in this category.</p>

      <?php else: ?>
          <?php foreach ($products as $product) : ?>
          <p>
              <a href="<?php echo '?product_id=' . $product['productID']; ?>">
                  <?php echo htmlspecialchars($product['productName']) ; ?>
              </a>
          </p>
          <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </div>

  <?php include '../view/sidebar.php'; ?>
</main>
<?php include '../view/footer.php'; ?>