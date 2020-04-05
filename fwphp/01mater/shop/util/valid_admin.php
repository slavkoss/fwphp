<?php
    // make sure the user is logged in as a valid administrator
    if (!isset($_SESSION['admin'])) {
        header('Location: ' . $module_relpath . 'admin/account/' );
    }
?>
