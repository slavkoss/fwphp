<?php
//$page_obj->view_script = basename(__FILE__);
ob_start(); 
?>
<!-- page content -->
<section>
  <p>At OOP Consulting, we offer a number of services. Perhaps the productivity of your employees would improve if we re-engineered your business. Maybe all your business needs is a fresh mission statement, or a new batch of buzzwords.</p>
  <p>Text above is in <?=__FILE__?></p>
</section>
<?php
$page_obj->content = ob_get_contents();  ob_end_clean();
