<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\traversymvc_step4\blog\home.php
// was J:\xampp\htdocs\zy_oopmvc_udemy\app\views\pages\index.php

require dirname($pp1->module_path) . '/header.php'; ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">

      <h1 class="display-3"><?php echo 'Welcome To SharePosts' //$data['title']; ?></h1>
      <p class="lead"><?php //echo $data['description']; ?>

      <ol>
      <li>Step 4 after Trav. PHP fw is this blog module :
          critic of TraversyMVC PHP fw (users, posts) in step 1
      <li>Step 3 after Trav. PHP fw is my z_oopmvc_after_Traversy_step3.zip
      <li>Step 2 is <a href="https://github.com/sistematico/oop-php-mvc">oop-php-mvc</a>
          on Apr 25, 2019 after TraversyMVC PHP framework is 
          z_Simple_MVCfw_sistematico_after_Traversy_step2.zip
          <br />
      <li>Step 1 <a href="https://www.udemy.com/object-oriented-php-mvc">TraversyMVC</a> is 
          z_shareposts_traversymvc_step1.zip
      </ol>


      </p>

    </div>
  </div>

<?php
$file = __FILE__ ; // = call_from_path

require dirname($pp1->module_path) . '/footer.php';

echo '<br /><br /><hr />'; include_once($pp1->wsroot_path .'/zinc/showsource.php');
