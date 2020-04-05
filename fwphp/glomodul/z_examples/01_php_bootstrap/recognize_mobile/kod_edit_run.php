<?php
function kod_edit_run($script_dir_path, $script_name, $web_docroot_url)
{
  /* call it so:
  kod_edit_run(
    $idx       // script_dir_path
  , $idxscript // script_name
  , MDURL);    // web_docroot_url = (Apache) web server URL
  */
  $ds = DIRECTORY_SEPARATOR;

  ?>
  <a href="<?=$web_docroot_url?>zinc/showsource.php?file=<?=$script_dir_path .$ds. $script_name?>&line=1&prev=10000&next=10000"
     target="_blank"
     title="<?=$web_docroot_url?>zinc/showsource.php?file=<?=$script_dir_path .$ds. $script_name?>&line=1&prev=10000&next=10000"
     >&nbsp;kod</a>
  <a href="<?=$web_docroot_url?>zinc/edservertxt.php
           ?file=<?=$script_dir_path . $ds . $script_name?>"
     target="_blank"
     title="?file=<?=$script_dir_path . $ds . $script_name?>"
     >&nbsp;edit</a>
  <a href="../01_phpinfo.php"
     target="_blank">&nbsp;phpinfo</a>
   <?php

}
