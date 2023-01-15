This script is J:\awww\www\fwphp\glomodul\adrs\README.md

http://dev1:8083/fwphp/glomodul/mkd/index.php?edit=J:\awww\www\fwphp\glomodul\adrs\README.md/    
http://dev1:8083/fwphp/glomodul/mkd/index.php?showhtml=J:\awww\www\fwphp\glomodul\adrs\README.md    

## adrs module is based on :

![MINI3 - A naked barebone PHP application]

# MINI3

MINI3 is an extremely simple and easy to understand skeleton PHP application, max reduced.
MINI3 is NOT a professional framework and it does not come with all the stuff real fws have.    
If you just want to   
  - show some pages    
  - do CRUD (few database calls)     
  - little-bit of AJAX    
  - without reading in massive documentations of highly complex professional frameworks    
then MINI3 might be very useful for you.     
MINI3 is easy to install, runs nearly everywhere, doesn't make things more complicated than necessary.    

History of this code (Changelog) shows that modern coding (OOP, namespaces, autoloading class scripts...) is difficult to learn but easy when we learn it :
1. original MINI, made by [JaoNoctus](https://github.com/JaoNoctus)
2. [MINI](https://github.com/panique/mini) (panique original version) 
3. [MINI2](https://github.com/panique/mini2) (panique used Slim router) 
4. MINI3 is an excellent and improved version of the original MINI, made by JaoNoctus.
   Big thanks, man! :)
5. adrs module made by phporacle (Slavko Srakocic, Zagreb) - (I think) simpler
   and changed some basic features.

## MINI3 Features (panique)
- extremely simple, easy to understand
- simple but clean structure
- makes "beautiful" clean URLs
- demo CRUD actions: Create, Read, Update and Delete database entries easily
- demo AJAX call
- tries to follow PSR coding guidelines
- uses PDO for any database requests, comes with an additional PDO debug tool to emulate your SQL statements
- commented code
- uses only native PHP code, so people don't have to learn a framework
- uses own PSR-4 autoloader

## Module adrs features (phporacle)
Same as MINI3, plus :
- coding style "each module in own folder" like Oracle .fmb-s, not three dirs M, V, C for all modules
- OWN MODULE FOLDER (I think much better) and THREE DIRS coding stiles (~ all php frameworks) 
  are VERY DIFFERENT (code flow...).
- smaller number of folders and scripts, we do not need them because of each module in own folder.
- no need for mod_rewrite, thanks to QS='?'
- no constants but pp1 object array (better than Oracle forms Property palette) 
  and uriq object array (URL query elements)
- class hierarchy (inheritance) allows use of $this (which is $db) everywhere.
- routing changed : pretty URL-s are key-value pairs, so no need for "controller/action/param1/param2..." 
  url style, ee order of url pairs is as we wish. 
- routing should work also with Composer autoload clases (set QS='' instead '?'). 
  I tested Composer autoload clases for older adrs version (pretty URL-s were not key-value pairs).
- I tested also routing table solution and I think it is much more complicated.
- dispatching is simmilar to MINI3, can be separate class - method, but for each module in own folder 
  like Oracle .fmb-s one class (Home_ctr) is enough. So dispatching is to Home_ctr methods.    
  Home_ctr methods include (view) scripts. Views may be also classes, but I do not see need for this.

## Requirements

- PHP 5.6 or PHP 7.0
- MySQL
- mod_rewrite activated for MINI3 (see below for tutorials). not for adrs
- basic knowledge of Composer

## Installation (in Vagrant, 100% automatic) on Ubuntu 14.04 LTS
...

## Auto-Installation on Ubuntu 14.04 LTS (in 30 seconds)
...

## Manual Installation on Ubuntu 14.04 LTS and Windows 10

1. Edit the database credentials in `application/config/config.php`
2. Execute the .sql statements in the `_install/`-folder (with PHPMyAdmin for example).
3. Make sure you have mod_rewrite activated on your server / in your environment. Some guidelines:
   [Ubuntu 14.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-14-04-lts/),
   [Ubuntu 12.04 LTS](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-12-04-lts/),
   [EasyPHP on Windows](http://stackoverflow.com/questions/8158770/easyphp-and-htaccess),
   [AMPPS on Windows/Mac OS](http://www.softaculous.com/board/index.php?tid=3634&title=AMPPS_rewrite_enable/disable_option%3F_please%3F),
   [XAMPP for Windows](http://www.leonardaustin.com/blog/technical/enable-mod_rewrite-in-xampp/),
   [MAMP on Mac OS](http://stackoverflow.com/questions/7670561/how-to-get-htaccess-to-work-on-mamp)
4. Install composer and run `composer install` in the project's folder to create the PSR-4 autoloading stuff from Composer automatically.
   If you have no idea what this means: Remember the "good" old times when we were using "include file.php" all over our projects to include and use something ?
   PSR-0/4 is the modern, clean and automatic version of that. Please have a google research if that's important for you.  
   
Feel free to commit your guideline for Ubuntu 16.04 LTS or other linuxes to the list!  

MINI3 runs without any further configuration. You can also put it inside a sub-folder, it will work without any
further configuration.
Maybe useful: A simple tutorial on [How to install LAMPP (Linux, Apache, MySQL, PHP, PHPMyAdmin) on Ubuntu 14.04 LTS](http://www.dev-metal.com/installsetup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-14-04-lts/)
and [the same for Ubuntu 12.04 LTS](http://www.dev-metal.com/setup-basic-lamp-stack-linux-apache-mysql-php-ubuntu-12-04/).




## Server configs for

### nginx

```nginx
server {
    server_name default_server _;   # Listen to any servername
    listen      [::]:80;
    listen      80;

    root /var/www/html/myproject/public;

    location / {
        index index.php;
        try_files /$uri /$uri/ /index.php?url=$uri&$args;
    }

    location ~ \.(php)$ {
        fastcgi_pass   unix:/var/run/php5-fpm.sock;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

A deeper discussion on nginx setups can be found [here](https://github.com/panique/mini/issues/55).

## Security

The script makes use of mod_rewrite and blocks all access to everything outside the /public folder.
Your .git folder/files, operating system temp files, the application-folder and everything else is not accessible (when set up correctly). 
For database requests PDO is used, so no need to think about SQL injection (unless you
are using extremely outdated MySQL versions).






## How to include CLASS SCRIPTS / use PSR-4 - not in adrs

As this project uses proper PSR-4 namespaces, make sure you load/use your CLASS SCRIPTS correctly:
Instead of including classes with old-school code like `include xxx.php`, simply do something like   
`use Mini\Model\Song;`    
on top of your file (modern IDEs even do that automatically).
This would AUTOMATICALLY INCLUDE THE FILE *Song.php* FROM THE FOLDER *Mini/Model* (IT'S CASE-SENSITIVE!).
 
But wait, there's no `Mini/Model/Song.php` in the project, but a `application/Model/Song.php`, right ?
To keep things cleaner, the composer.json sets a *namespace* (see code below), 
which is basically a name or an alias, for a certain folder / area of your application,
in this case the folder `application` IS NOW REACHABLE VIA `Mini` WHEN INCLUDING CLASS SCRIPTS.

```
{
    "psr-4":
    {
        "Mini\\" : "application/"
    }
}
```

This might look stupid at first, but comes in handy later. To sum it up:

To load the file `application/Model/Song.php`, write a `use Mini\Model\Song;` 
on top of your controller file.
Have a look into the SongController to get an idea how everything works!

FYI: As decribed in the install tutorial, you'll need do perform a "composer install" 
when setting up your application for the first time, which will
create a set of files (= the autoloader) inside /vendor folder. 
This is the normal way Composer handle this stuff. If you delete your vendor folder 
the autoloading will not work anymore. If you change something in the composer.json,
always make sure to run composer install or composer update again!

## Goodies

MINI3 comes with a little customized [PDO debugger tool](https://github.com/panique/pdo-debug) 
(find the code in application/libs/helper.php), trying to emulate your PDO-SQL statements. It's extremely easy to use:

```php
$sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
$query = $this->db->prepare($sql);
$parameters = array(':song_id' => $song_id);

echo Helper::debugPDO($sql, $parameters);

$query->execute($parameters);
```

## License

This project is licensed under the MIT License.
This means YOU CAN USE AND MODIFY IT FOR FREE IN PRIVATE OR COMMERCIAL PROJECTS.

## Quick-Start

#### The structure of MINI3 in general

The application's URL-path translates directly to the controllers (=files) and their methods inside
application/controllers.

`example.com/home/exampleOne` will do what the *exampleOne()* method 
      in application/Controller/Home_C.php said.

`example.com/home` will do what the *index()* method in application/Controller/Home_C.php said.

`example.com` will do what the *index()* method in application/Controller/Home_C.php said (default fallback).

`example.com/songs` will do what the *index()* method in application/Controller/Song_C.php said.

`example.com/songs/editsong/17` will do what the *editsong()* method 
    in application/Controller/Song_C.php said and will pass `17` as a parameter to it.

Self-explaining, right ?

#### MINI3 showing a view 

Let's look at the exampleOne()-method in the home-controller (application/Controller/Home_C.php):    
This simply shows the header, footer and the example_one.php page (in views/home/).    
By intention as simple and native as possible.    

```php
public function exampleOne()
{
    // load view
    require APP . 'views/_templates/header.php';
    require APP . 'views/home/example_one.php';
    require APP . 'views/_templates/ftr.php';
}
```  

#### MINI3 Working with data

Let's look into the index()-method in the songs-controller (application/Controller/Song_C.php):    
Similar to exampleOne, but here we also request data. Again, everything is extremely reduced and simple:    $Song->rall() simply
calls the rall()-method in application/Model/Song.php (when $Song = new Song_M()).

```php
namespace B12phpfw\Controller

use Mini\Model\Song;

class Song_C
{
    public function index()
    {
        // Instance new Model (Song)
        $Song = new Song_M();
        // getting all songs and amount of songs
        $songs = $Song->rall();
        $rcount = $Song->getRCount();

        // load view. within the view files we can echo out $songs and $rcount easily
        require APP . 'views/_templates/header.php';
        require APP . 'views/songs/index.php';
        require APP . 'views/_templates/ftr.php';
    }
}
```

For extreme simplicity, data-handling methods are in application/model/ClassName.php. Have a look how rall() in z_Model.php looks like: Pure and
super-simple PDO.

```php
namespace B12phpfw\Model

use Mini\Core\Model;

class Song extends Model
{
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
```

The result, here $songs, can then easily be used directly
inside the view files (in this case application/views/songs/index.php, in a simplified example):

```php
<tbody>
<?php foreach ($songs as $song) { ?>
    <tr>
        <td><?php if (isset($song->artist)) echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php if (isset($song->track)) echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
<?php } ?>
</tbody>
```

## Contribute

Please commit into the develop branch (which holds the in-development version), not into master branch
(which holds the tested and stable version).

## Changelog

**October 2019**
[phporacle] see Module adrs features (phporacle)

**August 2016**

- [panique] fix for weird lowercase/uppercase path problem (also big thanks to @snickbit & @ugurozturk for the fix!)
- [panique] forking joanoctus's excellent PSR4 ersion of MINI to MINI3

**January 2016**

- [joanoctus] implementing PSR-4 autoloader

**February 2015**

- [jeroenseegers] nginx setup configuration

**December 2014**
- [panique] css fixes
- [panique] renamed controller / view to singular
- [panique] added charset to PDO creation (increased security)

**November 2014**
- [panique] auto-install script for Vagrant
- [panique] basic documentation
- [panique] PDO-debugger is now a static helper-method, not a global function anymore
- [panique] folder renaming
- [reg4in] JS AJAX calls runs now properly even when using script in sub-folder
- [panique] removed all "models", using one model file now
- [panique] full project renaming, re-branding

**October 2014**
- [tarcnux/panique] PDO debugging
- [panique] demo ajax call
- [panique] better output escaping
- [panique] renamed /libs to /core
- [tarcnux] basic CRUD (create/read/update/delete) examples have now an U (update)
- [panique] URL is now config-free, application detects URL and sub-folder
- [elysdir] htaccess has some good explanation-comments now
- [bst27] fallback for non-existing controller / method
- [panique] fallback will show error-page now
- [digitaltoast] URL split fix to make php-mvc work flawlessly on nginx
- [AD7six] security improvement: moved index.php to /public, route ALL request to /public

**September 2014**
- [panique] added link to support forum
- [panique] added link to Facebook page

**August 2014**
- [panique] several changes in the README, donate-button changes

**June 2014**
- [digitaltoast] removed X-UA-Compatible meta tag from header (as it's not needed anymore these days)
- [digitaltoast] removed protocol in j Query URL (modern way to load external files, making it independent to protocol change)
- [digitaltoast] downgraded j Query from 2.1 to 1.11 to avoid problems when working with IE7/8 (j Query 2 dropped IE7/8 support)
- [panique] moved jQuery loading to footer (to avoid page render blocking)

**April 2014**
- [panique] updated j Query link to 2.1
- [panique] more than 3 parameters (arguments to be concrete) are possible
- [panique] cleaner way of parameter handling
- [panique] smaller cleanings and improvements
- [panique] Apache 2.4 install information

**January 2014**
- [panique] fixed .htaccess issue when there's a controller named "index" and a base index.php (which collide)

## Other stuff

And by the way, I'm also blogging at [Dev Metal](http://www.dev-metal.com) :)

## Support the project

Rent your next server at [1&1](http://www.kqzyfj.com/click-8225476-12015878-1477926464000) to support this open source project.
