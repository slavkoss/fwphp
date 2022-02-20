# easy
Another Simple PHP Framework For Education Purpose!

## requirement

- Web Server Apache / Nginx
- PHP 7
- PDO (MySQL, PostgreSQL, etc)

## installation

Restore `easydb.sql` to Your database. 

## configuration

### database connection

Edit it in `app/config.php` file.

### apache web server

Place .htaccess file in to public directory

```
RewriteEngine on

# If a directory or a file exists, use the request directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# Otherwise forward the request to index.php
RewriteRule . index.php
```

### nginx web server

nginx configuration

```
server_name easy.local;
root /var/www/easy/public;
index index.php index.html index.htm;

location / {
      try_files $uri $uri/ /index.php$is_args$args;
}
```

## directory structure

+ app
  + controllers
    - Site.php  -> site controller
    - Article.php  -> article controller
  + views
    + default
      - login.php -> default view login
    + layout
      - main.php  -> layout file
    + site
      - index.php -> view file
    + article
      - index.php -> view file
      - view.php -> view file
  - config.php  -> configuration file
+ core
  - Application.php -> class main application
  - Authentication.php -> class auth middleware
  - Controller.php  -> base controller
  - Database.php  -> class database connection
  - error.php -> error page
  - Helper.php  -> class helpers
  - User.php  -> model user
  - Middleware.php  -> abstract class  
+ public
  + assets -> assets folder
    + js
    + css
  - index.php -> mount point application
+ test -> folder automatic test with codeception
- codeception.yml -> composer file, optional for testing
- composer.json -> composer file, optional for testing
- easydb.sql -> sample dump database
- LICENSE
- preview.png -> screenshoot application
- README.md -> readme file

## another

username : admin password : 123456

## screenshoot

![preview](preview.png)


Build with love by [Hafid Mukhlasin](http://hafidmukhlasin.com)

He is author of [Be Fullstack Developer](http://buku-laravel-vue.com) book (Best Seller!)
