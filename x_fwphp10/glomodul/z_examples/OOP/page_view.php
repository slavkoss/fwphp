<?php
//$page_obj->view_script = basename(__FILE__);
ob_start(); ?>
<!-- page content 
<section>
-->
<div class="container">
 <h2>Welcome to the home of OOP Consulting.</h2>
 <p>Please take some time to get to know us.</p>
 <p>We specialize in serving your business needs and hope to hear from you soon.</p>
 <p>Above text is in <?=__FILE__?></p>
</div>
<?php
$page_obj->content = ob_get_contents();  ob_end_clean();