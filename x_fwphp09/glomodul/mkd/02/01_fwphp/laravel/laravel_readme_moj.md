<?php
// 3.8.2019, 21.3.2019
http://dev1:8083/zbig/blog_laravel/public/blog // see routes in
        // J:\awww\www\zbig\blog_laravel\routes\web.php
http://dev1:8083/zbig/blog_laravel/public/
              // project dir is blog_laravel
              // if xampp, no need php.exe artisan serve
J:\awww\www\zbig\blog_laravel/public/index.php
J:\awww\www\zbig\blog_laravel/resources/views/welcome.blade.php //or blog or about...
J:\awww\www\zbig\blog_laravel/routes/web.php

J:\awww\www\zbig\blog_laravel/app/user.php         is MODEL
J:\awww\www\zbig\blog_laravel/app/Http/Controllers CONTROLLERS
    Controller.php extends BaseController

J:\awww\www\zbig\blog_laravel\config\database.php

Destination Folder: C:\oraclexe\
Oracle Home: C:\oraclexe\app\oracle\product\11.2.0\server\
Oracle Base:C:\oraclexe\
Port for 'Oracle Database Listener': 1521
Port for 'Oracle Services for Microsoft Transaction Server': 2030
Port for 'Oracle HTTP Listener': 8080


https://pecl.php.net/package/oci8/2.2.0/windows
https://blogs.oracle.com/opal/installing-xampp-for-php-and-oracle-database
http://www.oracle.com/technetwork/database/database-technologies/instant-client/downloads/index.html
https://community.oracle.com/community/groundbreakers/database/developer-tools/php
$c = oci_connect("hr", "welcome", "localhost/XE", "AL32UTF8");

https://github.com/yajra/laravel-oci8
composer require yajra/laravel-oci8:"5.8.*"
config/app.php and find the providers key and add:
Yajra\Oci8\Oci8ServiceProvider::class,
If config file is not published, package will automatically use what is declared 
in your .env file database configuration.
php artisan vendor:publish --tag=oracle
Copied File [\vendor\yajra\laravel-oci8\src\config\oracle.php] To [\config\oracle.php]
Publishing complete.


select table_name from tabs order by table_name;

J:\awww\www\zbig\blog_laravel (master -> origin)
php artisan migrate -h  // without -h executes PHP DDL in database\migrations dir

php artisan migrate
    Migration table created successfully.
    Migrating: 2014_10_12_000000_create_users_table
    Migrated:  2014_10_12_000000_create_users_table (0.04 seconds)
    Migrating: 2014_10_12_100000_create_password_resets_table
    Migrated:  2014_10_12_100000_create_password_resets_table (0.01 seconds)
// created are tbls PASSWORD_RESETS and USERS    and MIGRATIONS (track of every migr.)

php artisan migrate:fresh //drop tbls and create again
php artisan make:migration CreateUsersTable //run 2014_10_12_000000_create_users_table.php

php artisan make:auth 
// Authentication scaffolding generated successfully. Means :
// in J:\awww\www\zbig\blog_laravel\routes\web.php new lines :
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
ee new top links Login and Register (email=moj gmail, psw=moj long)
and after Register in blog page is only Home link.





<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

xampp portable
put J:\xampp\php in user path variable
J:\awww\www\zbig>composer create-project --prefer-dist laravel/laravel todo_laravel
J:\awww\www\zbig>composer create-project --prefer-dist laravel/laravel blog_laravel
Installing laravel/laravel (v5.8.18)
...
Writing lock file
Generating optimized autoload files
> @php artisan key:generate --ansi  // see .env
Application key set successfully.






//////////////////////////////////////////
## About Laravel
//////////////////////////////////////////

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) 
                       and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel [documentation](https://laravel.com/docs) 

If you don`t feel like reading, [Laracasts](https://laracasts.com) - over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. 
