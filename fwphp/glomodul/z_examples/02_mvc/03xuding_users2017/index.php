<?php

//defined('ROOTDIR') or define('ROOTDIR',$_SERVER['DOCUMENT_ROOT']);
//require_once(ROOTDIR.'/inc/confglo.php');
require_once(__DIR__.'/confglo.php');
require_once __DIR__.'/database.php';
/*
CREATE TABLE IF NOT EXISTS `tema.users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(80) DEFAULT NULL,
  `user_pass` VARCHAR(47) DEFAULT NULL,
  `user_email` VARCHAR(80) DEFAULT NULL,
  `user_telefon` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE (`user_name`)
) ENGINE=MyISAM CHARACTER SET utf8 COLLATE utf8_unicode_ci;

https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
CREATE TABLE  `customers` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 100 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`mobile` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;
*/
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <link href="<?= CSSURL.'/bootstrap.min.css' ?>" 
          rel="stylesheet" type="text/css">
    <script src="<?= CSSURL.'/bootstrap.min.js' ?>"></script>
</head>
 
<body>
  <div class="container">
    <div class="row">
          <h3>TABLE CRUD DirDomainStyle PDO MySQL BOOTSTRAP NON OOPMVC</h3>
    </div>

    <div class="row">
      <!-- step02 -->
      <p>
        <a href="create.php" class="btn btn-success">Create</a>
      </p>
      <!-- e n d  step02 -->
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email Address</th>
              <th>Telefon</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
           //include 'database.php';
           $pdo = Database::connect();
           $sql = 'SELECT * FROM users ORDER BY user_id DESC';
           
           foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              
              echo '<td><a class="btn" 
              href="update.php'.'?id='.$row['user_id'].'">'
              .$row['user_name'].'</a></td>';
              
              echo '<td>'. $row['user_email'] . '</td>';
              echo '<td width=25%>'. $row['user_telefon'] . '</td>';
              
              echo '<td width=15%>'
              
              .'<a class="btn btn-danger"'
              .'href="delete.php'.'?id='.$row['user_id'].'">'
              .'Del</a>'.' &nbsp;&nbsp;'
              
              .'<a class="btn"'
              .'href="read.php'.'?id='.$row['user_id'].'">'
              .'Read</a>'
              
              //. '<a class="btn btn-success" href="update.php'
              //     .'?id='.$row['user_id'].'">Update</a>';
              
              .'</td>';
              
              echo '</tr>';
           }
           Database::disconnect();
          ?>
          </tbody>
        </table>
      </div>
    </div> <!-- /container -->
  </body>
</html>