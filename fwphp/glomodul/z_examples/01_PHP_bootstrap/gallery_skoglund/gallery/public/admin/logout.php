<?php require_once("../../includes/initialize.php"); ?>
<?php
    $session->logout();
    redirect_to("login.php");
?>
