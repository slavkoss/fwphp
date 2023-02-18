# https://github.com/thecodeholic/php-mvc-framework  PHP MVC framework  20210705
Minimalistic custom framework created for educational purposes.
> The project was created along with Youtube Video Series "[Build PHP MVC Framework](https://www.youtube.com/playlist?list=PLLQuc_7jk__Uk_QnJMPndbdKECcTEwTA1)". 

## NOT READY FOR PRODUCTION

----
## Installation

1. Download the archive or clone the project using git
2. Create database schema
3. Create `.env` file from `.env.example` file and adjust DB parameters (including schema name)
4. Run `composer install`
5. Run migrations by executing `php migrations.php` from the project root directory
6.            Go to the `public` folder 
7.            Start php server by running command `php -S 127.0.0.1:8080` 
8.            Open in browser http://127.0.0.1:8080



Features of the framework:
 - PHP 7.4, can be installed using composer
 - Custom Routing
 - Composer
 - Controllers
 - Views/Layouts
 - Models 

 - Migrations <----
 - Form widget classes <---- to easy render, validate forms

 - Processing of request data
 - Validations
 - Registration/Login with psw encription

 - Simple Active Record <---- map cls to DB tbl
 - Session Flash messages <----
 - Middlewares <---- restrict access to specific authorized actions
 - Application events <----
 - Framework reusable/installable core <----
