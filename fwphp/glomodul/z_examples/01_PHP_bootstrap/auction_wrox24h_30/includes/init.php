<?php
/**
 * J:\awww\www\fwphp\glomodul\z_examples\01_php_bootstrap\auction_wrox24h_30\includes\init.php
 */
session_start(); // starts new or resumes existing session
define('MAGIC_QUOTES_ACTIVE', get_magic_quotes_gpc());
define('SITE_KEY',
  'd0d48339c3b82db413b3be8fbc5d7ea1c1fd3e2792605d3cbfda1HEM54!!');

/**
 * Auto load the class files
 * @param string $fqcn (=$class_name)
 * __autoload() is deprecated, use spl_autoload_register() instead
 */
  //protected function register_autoload()
  //{
  spl_autoload_register(
  function($fqcn) //Full Qualified Class Name eg B12phpfw\fwphp\www4 (B12phpfw=PATHWSROOT)
  {
    //J:\awww\www\fwphp\glomodul\z_examples\01_PHP_bootstrap\auction_wrox24h_30\includes/includes/classes/contact.php
      try {
        $class_file = __DIR__ . '/classes/' . strtolower($fqcn) . '.php';
        if (is_file($class_file)) {
          //require $class_file;
          require_once $class_file;
        } else {
          throw new Exception("Unable to load class $fqcn in file $class_file.");
        }
      } catch (Exception $e) {
        echo 'Exception caught: ',  $e->getMessage(), "\n";
      }

  }); // e n d  f n  c l o s u r e
    //or register autoloadfn :  spl_autoload_register('loadClsScript');

// include required files
require_once 'includes/functions.php';

// Initialize message coming in
$message = '';
if (isset($_SESSION['message'])) {
  $message = htmlentities($_SESSION['message']);
  unset($_SESSION['message']);
}
              //filter_input( int $type, string $variable_name[, int $filter = FILTER_DEFAULT[, mixed $options]] ) : mixed
              //filter_input_array( int $type[, mixed $definition[, bool $add_empty = TRUE]] ) : mixed
              //type  One of INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, or INPUT_ENV. 


              // Process based on the task. Default to display
              $task = filter_input(INPUT_POST,'task', FILTER_SANITIZE_STRING);
              switch ($task)
              {

                case 'login' :               // process login
                $results = userLogin();
                $message .= $results[1];
                if ($results[0] == 'login')
                { // If there is redirect information
                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];        // pass on new messages
                  }
                  header("Location: index.php?content=login");  //redirect to that page
                  exit;
                }
                break;

                case 'logout' :
                $results = userLogout();
                $message .= $results[1];
                if ($results[0] == 'logout') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=logout]");
                  exit;
                }
                break;

                case 'contact.maint' :
                $results = maintContact();
                $message .= $results[1];

                if ($results[0] == 'contactmaint') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=contactmaint&id=$results[2]");
                  exit;
                }
                break;

                case 'contact.delete' :
                $results = deleteContact();
                $message .= $results[1];

                if ($results[0] == 'contactdelete') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=contactdelete&id=$results[2]");
                  exit;
                }
                break;

                case 'menu.maint' :
                $results = maintMenu();
                $message .= $results[1];

                if ($results[0] == 'menumaint') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=menumaint&id=$results[2]");
                  exit;
                }
                break;

                case 'menu.delete' :
                $results = deleteMenu();
                $message .= $results[1];

                if ($results[0] == 'menudelete') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=menudelete&id=$results[2]");
                  exit;
                }
                break;

                case 'category.maint' :
                $results = maintCategory();
                $message .= $results[1];

                if ($results[0] == 'categorymaint') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=categorymaint&cat_id=$results[2]");
                  exit;
                }
                break;

                case 'category.delete' :
                $results = deleteCategory();
                $message .= $results[1];

                if ($results[0] == 'categorydelete') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=categorydelete&cat_id=$results[2]");
                  exit;
                }
                break;

                case 'lot.maint' :
                $results = maintLot();
                $message .= $results[1];

                if ($results[0] == 'lotmaint') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  $cat_id_in = (int) $_GET['cat_id'];
                  header("Location: index.php?content=lotmaint&cat_id=$cat_id_in&lot_id=$results[2]");
                  exit;
                }
                break;

                case 'lot.delete' :
                $results = deleteLot();
                $message .= $results[1];

                if ($results[0] == 'lotdelete') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  $cat_id_in = (int) $_GET['cat_id'];
                  header("Location: index.php?content=lotdelete&cat_id=$cat_id_in&lot_id=$results[2]");
                  exit;
                }
                break;

                case 'article.maint' :
                $results = maintArticle();
                $message .= $results[1];

                if ($results[0] == 'articlemaint') {

                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=articlemaint&id=$results[2]");
                  exit;
                }
                break;

                case 'article.delete' :
                $results = deleteArticle();
                $message .= $results[1];

                if ($results[0] == 'articledelete') {
                  if ($results[1]) {
                    $_SESSION['message'] = $results[1];
                  }
                  header("Location: index.php?content=articledelete&id=$results[2]");
                  exit;
                }
                break;

              }


