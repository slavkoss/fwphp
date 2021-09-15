<?php include 'view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p>An error occurred connecting to the database.</p>
    <p>DB must be installed as described in 2014_Murach's PHP and MySQL 2ndEd.pdf, appendix A.</p>
    <p>DB must be running as described in chapter 1.</p>
    <p>Error message: <?php echo $error_message; ?></p>
</main>
<?php include 'view/footer.php'; ?>