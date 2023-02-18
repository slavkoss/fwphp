<?php include 'view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>Called from <?=$caller?></p>
</main>
<?php include 'view/footer.php'; ?>