<?php
// http://dev1:8083/fwphp/glomodul/z_examples/MVC_FW/hcstudio_easy/public/article
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\public\i ndex.php
// https://github.com/hscstudio/easy  2019.06.10 
//    by Hafid Mukhlasin http://hafidmukhlasin.com/  author of "Be Fullstack Developer" book (Best Seller!)
//                                                   http://buku-laravel-vue.com/
// username : admin password : 123456

$production = false;
require_once __DIR__ . "/../app/config.php";
$application = new Core\Application($config);
$application->run();

/**
nginx configuration

server_name easy.local;
root /var/www/easy/public;
i ndex i ndex.php i ndex.html i ndex.htm;

location / {
      try_files $uri $uri/ /i ndex.php$is_args$args;
}




Directory structure :
app
  controllers
    Site.php -> site controller
    Article.php -> article controller
views
  default
    login.php -> default view login
  layout
    main.php -> layout file
  site
    i ndex.php -> view file
  article
    articles_tbl.php -> view file  (original was i ndex.php)
    view.php -> view file
config.php -> configuration file
core
  Application.php -> class main application
  Authentication.php -> class auth middleware
  Controller.php -> base controller
  Database.php -> class database connection
  error.php -> error page
  Helper.php -> class helpers
  User.php -> model user
  Middleware.php -> abstract class middleware
public
  assets -> assets folder (not used)
    js
    css
  i ndex.php -> mount point application
test -> folder automatic test with codeception
codeception.yml -> composer file, optional for testing
composer.json -> composer file, optional for testing
easydb.sql -> sample dump database
LICENSE
preview.png -> screenshoot application
README.md -> readme file
*/