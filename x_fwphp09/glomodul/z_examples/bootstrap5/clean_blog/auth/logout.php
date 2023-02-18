<?php

 session_start();
 session_unset();
 session_destroy();
 header("location: $moduleurl/index.php"); // http://localhost/clean-blog/