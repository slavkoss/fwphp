# Pair example
a skeleton project to use [Pair PHP Framework](https://github.com/Viames/Pair) easily

## Quick start

### Installation

Choose a name for your **new project and create a new folder where to install Pair_example**:

```bash
$ mkdir project_name
$ cd project_name
```
Now you can create a new project [manually](#manual-installation) or by using [Composer](#composer), that allows to easily update Pair framework.

#### <a name="composer">Composer</a>

You can ask Composer to create the project into your new folder. Composer [download it](https://getcomposer.org/download/).

Launch a command-line terminal and create a new composer project named `project_name`: $ composer create-project viames/pair_example project_name_eg_pair_user

### 2018.10.23
### J:
### cd J:\awww\www\zbig

```bash

$ composer7 create-project viames/pair_example pair_user

Installing viames/pair_example (1.4.2)
  - Installing viames/pair_example (1.4.2): Downloading (100%)
Created project in pair_user
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 1 install, 0 updates, 0 removals
  - Installing viames/pair (1.4.1): Downloading (100%)
viames/pair suggests installing ext-xdebug (*)
Generating autoload files

cd pair_user
composer7 update

  - Updating viames/pair (1.4.1 => 1.4.2): Downloading (100%)
Writing lock file
Generating autoload files

```

**NOT SO :** 
#### <a name="manual-installation">Manual installation</a>

1. Download [Pair_example](https://github.com/Viames/Pair_example/releases)’s latest available release;
2. Unzip the content into your project folder;
3. Run your browser at web-server root and add the sub-url as configured in `BASE_URI` constant of config.php.


### Configuration

### When launched http://dev1:8083/zbig/pair_user/
Pair framework will check `J:\awww\www\zbig\pair_user\config.php` file and, because it isn’t existing (bundled), starts web installer interface.   
Fill in all required data and in a second your Pair application will be up and running. If filled bad, slowwwwww, never ended.  
New database `pair2` has been created
Charset and collation will be forced to utf8mb4
Created a new user, please keep note.
### Username: slavkoss22@gmail.com
### Password: xkF-XjO-BsO-wQ5
Installer was deleted

### You can now use pair_user v1.0. Please login at url: /zbig/pair_user

In case you written something wrong in the `config.php` file, you can edit it manually. This is the file content

```PHP
<?php

// product
define ('PRODUCT_VERSION', '1.0');
define ('PRODUCT_NAME', 'Your application name');    // pair_user
define ('BASE_URI', '/any_subpath_on_url');                    // on J:\awww\www  /zbig/pair_user

// database
define ('DB_HOST', 'your_host');     // localhost
define ('DB_NAME', 'your_name');  // pair
define ('DB_USER', 'your_user');     // ss
define ('DB_PASS', 'your_pass');      // MYLONGPSW
```

By creating different versions of `config.php` file you can move the project on other web-servers. This is useful to run a development version, a test version and a production version of the same project.

Now it’s time to login using the account that have your email address as username and a strong 15 chars random password that’s shown at the installation end.

### http://dev1:8083/zbig/pair_user/tevent/  routes.php ???

---





[![Latest Stable Version](https://poser.pugx.org/viames/pair_example/v/stable)](https://packagist.org/packages/viames/pair_example)
[![Total Downloads](https://poser.pugx.org/viames/pair_example/downloads)](https://packagist.org/packages/viames/pair_example)
[![Latest Unstable Version](https://poser.pugx.org/viames/pair_example/v/unstable)](https://packagist.org/packages/viames/pair_example)
[![License](https://poser.pugx.org/viames/pair_example/license)](https://packagist.org/packages/viames/pair_example)
[![composer.lock](https://poser.pugx.org/viames/pair_example/composerlock)](https://packagist.org/packages/viames/pair_example)

This base project allows a fast start to develop small to medium PHP applications like CRM or web-portals.
With the addition of a few files more, here provided as sample, and an initial database structure, your web project will be up and running in a breeze.

## Features
This basic project manages users authentication, creates new custom ActiveRecord classes and [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) modules starting from a DB table by a magic module named `developer`, all thru a friendly route logic.
Also it acts as REST API server.



### Contributing

If you would like to contribute to this project, please feel free to submit a pull request.

### License

MIT






# Pair

light weight and versatile PHP framework, simple and fast, few frills, maybe none

[![Latest Stable Version]( https://poser.pugx.org/viames/pair/v/stable )]( https://packagist.org/packages/viames/pair )
[![Total Downloads](https://poser.pugx.org/viames/pair/downloads)](https://packagist.org/packages/viames/pair)
[![Latest Unstable Version](https://poser.pugx.org/viames/pair/v/unstable)](https://packagist.org/packages/viames/pair)
[![License](https://poser.pugx.org/viames/pair/license)](https://packagist.org/packages/viames/pair)
[![composer.lock](https://poser.pugx.org/viames/pair/composerlock)](https://packagist.org/packages/viames/pair)

## Features

Pair implements [Model-View-Controller](https://en.wikipedia.org/wiki/Model-View-Controller) pattern and a search friendly route logic.

#### ActiveRecord

Pair base tables are InnoDB utf-8mb4.

Pair allows the creation of OBJECTS RELATED TO DB TABLE using [ActiveRecord class](https://github.com/Viames/Pair/wiki/ActiveRecord). Objects retrieved from the DB are cast in both directions to the required type (int, bool, DateTime, float, csv). See [Automatic properties cast](https://github.com/Viames/Pair/wiki/ActiveRecord#automatic-properties-cast) page in the wiki.

In addition, each CLASS INHERITED FROM ACTIVERECORD supports many convenient methods including those for caching data that save queries.

#### Plugins

Pair supports MODULES AND TEMPLATES AS INSTALLABLE PLUGINS, but can easily be extended to other types of custom plugins. The Pair’s Plugin class allows you to create the manifest file, the ZIP package with the contents of the plugin and the installation of the plugin of your Pair’s application.

#### Time zone

The automatic time zone management allows to store the data on UTC and to obtain it already converted according to the connected user’s time zone automatically.

#### Log bar

A nice log bar shows all the details of the loaded objects, the system memory load, the time taken for each step and for the queries, the SQL code of the executed queries and the backtrace of the detected errors. Custom messages can be added for each step of the code.

## Installation

### Composer

```sh
composer require viames/pair
```
After having installed Pair framework you can get singleton object `$app` and the just start MVC. You can check any session before MVC, like in the following example.

```php
use Pair\Application;

// initialize the framework
require 'vendor/autoload.php';

// intialize the Application
$app = Application::getInstance();

// any session
$app->manageSession();

// start controller and then display
$app->startMvc();
```

If you want to test code that is in the master branch, which hasn’t been pushed as a release, you can use master.

```
composer require viames/pair dev-master
```
If you don’t have Composer, you can [download it](https://getcomposer.org/download/).

## Documentation

Please consult the [Wiki](https://github.com/Viames/Pair/wiki) of this project. Below are its most interesting pages that illustrate some features of Pair.

* [ActiveRecord](https://github.com/Viames/Pair/wiki/ActiveRecord)
* [Controller](https://github.com/Viames/Pair/wiki/Controller)
* [Router](https://github.com/Viames/Pair/wiki/Router)
* [index.php](https://github.com/Viames/Pair/wiki/index)
* [.htaccess](https://github.com/Viames/Pair/wiki/htaccess)
* [config.php](https://github.com/Viames/Pair/wiki/Configuration-file)
* [classes](https://github.com/Viames/Pair/wiki/Classes-folder)

## Requirements

| Software | Recommended | Minimum | Configuration          |
| ---      |    :---:    |  :---:  | ---                    |
| Apache   | 2.4+        | 2.2     | `modules:` mod_rewrite |
| MySQL    | 5.7+        | 5.6     | `character_set:` utf8mb4 <br> `collation:` utf8mb4\_unicode_ci <br> `storage_engine:` InnoDB |
| PHP      | 7+          | 5.6     | `extensions:` curl, fileinfo, gd, json, mcrypt, openssl, pcre, PDO, pdo_mysql, Reflection |

comment mcrypt in :
J:\awww\www\zbig\pairblog\installer\start.php
J:\awww\www\zbig\pairblog\modules\selftest\viewDefault.php

            https://github.com/phpseclib/mcrypt_compat
            composer require phpseclib/mcrypt_compat

              mcrypt was DEPRECATED in PHP 7.1.0, and REMOVED in PHP 7.2.0.
              There is no Windows release of this extension for PHP 7.2.
              Alternatives to this feature include:
                Sodium (available as of PHP 7.2.0)
                OpenSSL

              They didn't include this one
              PHPSecLib
              But it's a third party library so I can't say I blame them, I've used it for some time and never heard anything bad about it yet.

              To enable mcrypt extension in WAMP, left click wamp tray icon and select PHP > PHP Extensions > php_mcrypt  
              HERE MY CHANGES J:\wamp64\bin\php\php7.2.9\phpForApache.ini !!!

              May 04, 2013 extension php_mcrypt was statically linked into php exe
              But that library appears to uses this one which is not part of the php distribution
              libmcrypt.dll



## Examples

The [Pair_example](https://github.com/viames/Pair_example) is a good starting point to build your new web project in a breeze with Pair PHP framework using the installer wizard.

## Contributing

If you would like to contribute to this project, please feel free to submit a pull request.

# License

MIT
