# Free CMSs with flat files DB (websites code skeletons)
1. last few years very popular
2. good for learning PHP, also see "Ideas & code my B12phpfw is based on" on fwphp site home page.
4. Best in my opinion: Typemill (doc navigation most simmilar to my glomodul/mkd),  Yellow (blog, site, wiki), Wondercms, cms.js is pure js, has potential.

## My markdown documents navigator module **fwphp/glomodul/mkd**
Simmilar to Typemill MD documents navigator) is based on my B12phpfw code skeleton. 
Compared with Free CMSs other flat files DB in my opinion is :
1. Improved code, all additional features can be added, but are not needed for porsonal rich text editor (and more !). 
2. Serves me better than :
    1. Kompozer (abandoned, to old), 
    2. Microsoft Expression Web 4. (abandoned, still usable 2018.05), 
    3. Dreamweaver (huge, expensive, I do not use it anymore)...
2. faster, simpler code, smaller

### Mkd features
1. Technology: 
    1. PHP 5.6+, 
    2. own B12phpfw code skeleton  
    3. I prefer own autoloading classes scripts, can be used "composer update" (comment/uncomment some code in fwphp\zinc\core\_02autoload.php)
    4. no admin panel
    5. no admin login, no users login
    6. Templating: own native PHP   
    7. Formatting: Markdown  SimpleMDE or easy to change to html Summernote
2. Open source: yes, free
3. CODE SIZE & SPEED: 
    1. Markdown rich text edit/show application Mkd is 25 kB
    2. Core **B12phpfw.php** is 9 kB, Helper.php is 9 kB  (also used for DB CRUD apps) 
    3. Main **PHP native template layout_tpl_main.html contains CSS**  (both ~10 kB)  (also used for DB CRUD apps),
    4. background picture is ~11kB
    1+2+3+4 :    25 + 18 + 10 + 11 = **~65 kB**   and  no huge external SW !
    5. markdown SimpleMDE or html Summernote rich txt editor less than 200 kB
    6. Pages are rendered in **2-10 miliseconds**
4. Website:  https://github.com/slavkoss/fwphp   



## Typemill MD documents navigator 2 MB is most simmilar to my Mkd

Technology: PHP 5.6+, Slim, Simfony    Templating: Twig   Formatting: Markdown   Open source: yes
Website: http://typemill.net/    no admin panel, free, open-source, no admin login
composer update
Run Locally

If you are a developer and if you want to run TYPEMILL locally, then download TYPEMILL (zip or git) and visit your local folder like localhost/typemill. No additional work is required.
    Recommended: Copy file settings.yaml.example in the root folder of TYPEMILL
    and rename it to settings.yaml. Fill out the settings directly in the file. It is human readable, so no problem for you!
    Recommended: If you run you website on your local machine, you can also go to your-local-adress/setup and fill out the setup form.
    Be careful: You can also upload TYPEMILL to a live server and fill out the form live. Just visit your-website.com/setup. But be aware, that everybody can visit this adress and setup your website easily. It is not a big deal, because you can always upload your own settings.yaml file with your ftp program.

To run a live website, upload TYPEMILL to your webserver (e.g. with ftp). You have to make some folders and files writable:
    \cache
    \content
To make the folders and files writable, use your ftp programm, click on the folder, choose permissions and change the permission to 744. Use the recursive permission for all containing files and folders. If 744 does not work, try 774.

To fill the website with your own content, upload your folders and markdown files to the content folder of TYPEMILL (with ftp again). Visit your website and press F5 to actualize the cache.


## Yellow 0.5 MB, SimpleMDE markdown rich text editor

Local site     Local site admin   J:\awww\apl\dev1\af1blog\system\config\user.ini
Technology: PHP    Templating: HTML / PHP    Formatting: Markdown   Open source: yes
Website: http://datenstrom.se/yellow/   https://developers.datenstrom.se/help/how-to-make-a-blog

blog, website or wiki templates, no admin panel, free, open-source


### Wondercms 2.4.2, ~60 kB, Summernote  0.8.8 HTML rich text editor

https://github.com/robiso/wondercms/wiki/5-file-structure   https://www.wondercms.com/

61 kB PHP 5.5+, jQuery 1.12.4, Bootstrap 3.3.7 & Fontawesome, **one file .json DB**.
One file .json DB could be minus, jQuery, Bootstrap & Fontawesome are slow (overkill) in my opinion.
Extremely simple and will not be  feature soup  (over-bloated with features). I like it's help, way of thinking.

You'll need to install a certificate to avoid the persistent "update" message (or comment it in index.php):
https://stackoverflow.com/questions/14987857/what-exactly-is-cacert-pem-for  - not explained enough.


### cms.js  
Pure js, no PHP, less then 50 kB  https://cdmedia.github.io/cms.js/ 
J:\awww\apl\dev1\zz\mkd>git clone https://github.com/cdmedia/cms.js.git
Configure js/config.js, comment so #Options Indexes in all .htaccess (but not in httpd.conf)


### Herbie 3 MB   https://www.getherbie.org/
Technology: PHP    Templating: Twig   Formatting: Markdown   Open source: yes
Website: https://getherbie.org/
composer create-project getherbie/start-website myproject
or :
$ git clone https://github.com/getherbie/start-website.git myproject
$ cd myproject
$ composer update

### Htmly  PHP 5.3+   

### Monstra


### Pico MD, 2 MB

no admin panel, free, open-source, no admin login. A simple & fast, flat file CMS.
Technology: PHP    Templating: Twig     Formatting: Markdown      Open source: yes github    
Website: http://pico.dev7studios.com/index.html

Not very clever as almost all mentioned here :
| Database files physical location	| My URL | 
|-----------------------|------| 
| content/index.md	| / | 
| content/sub.md	|  ?sub | 
| content/sub/index.md	| ?sub | 
| content/sub/page.md	| ?sub/page | 
| content/a/very/long/url.md	| ?a/very/long/url (doesn't exist) | 


### puppy
-parsedown, purecss, font-awesome.css. You will be prompted to enter the password = admin (default is puppycms) 




### Grav MD, 3rd best (first two are commercial), 30 MB

Fast, has sophisticated caching, and a light footprint.
admin login slavkoss22@gmail.com / Admin111
Technology: PHP / YAML Templating: Twig Formatting: Markdown
Open source: yes
Website: http://getgrav.org/
3rd best free, much slower than Yellow or Limonade Local site


### Get Simple CMS 3.3.13, 4 MB

XML based, stand-a-alone, fully independant and lite CMS.
Technology: 4 MB, PHP 5.2+, SimpleXML, Javascript
Templating: HTML, PHP    Formatting: HTML / WYSIWYG editor    Open source: yes
Website: http://get-simple.info/    http://get-simple.info/docs/installation
    Visit your domain and navigate to /admin (or your gsadmin path set in gsconfig)
    You will be redirected to install / upgrade scripts
GetSimple Installation
GetSimple Upgrade Check Failed ! 3.3.13
Download
PHP Version 7.1.9 - OK     Folder Permissions OK - Writable     cURL Module Installed - OK   GD Library Installed - OK
ZipArchive Installed - OK   SimpleXML Module Installed - OK
Apache web server Apache/2.4.25 (Win64) OpenSSL/1.0.2k PHP/7.1.9 - OK    Apache Mod Rewrite Installed - OK
For more information on the required modules, see http://sspc1:8083/zz/mkd/getsimple/admin/health-check.php
visit requirements page.
Language: en_US Download Languages
Your registration information has been sent to slavkoss22@gmail.com.. Your username is admin and your password is CHgm2m
Login here..



### Have potential Javasscript based

AjaxCMS

**cms.js  site generator** https://github.com/cdmedia/cms.js/
      1. Without the aid of server-side scripting (no Node.js, PHP, Ruby, etc.).
      1. In the spirit of [Jekyll]( https://github.com/jekyll/jekyll )
      1. [**Server Mode**]( https://github.com/cdmedia/cms.js/wiki/Server-Support-&-Setup ) if you choose to self host your content. Apache and NGINX servers are supported. Make sure the server's directory indexing feature is enabled. CMS.js takes advantage of the Server's Directory Indexing feature. **By allowing indexes, CMS.js sends an AJAX call to your specified folders and looks for Markdown files**. After they are found, it takes care of everything else and delivers a full website.
      1. Apache - Make sure htaccess is enabled OR Options Indexes is set for your directory.
      1. NGINX - Make sure autoindex on is set for your directory
      1. **Github Mode** is default mode for CMS.js. Host your website on Github using Github Pages, similar to Jekyll. CMS.js uses the Github API to get the content of your gh-pages repo and serve them as a full website.
      1. Install
         1. Clone the repo: git clone https://github.com/cdmedia/cms.js.git
            or download the latest release
         1. Configure js/config.js to your liking
         1. Make sure to set your githubUserSettings in js/config.js if using Github mode
         1. If using Github mode, create a new branch from your master or working branch called gh-pages (**Github's default branch for hosting**)

### Have potential PHP based

Baun 2015 requires ssl, I like it's help, way of thinking

Bludit 4 MB, admin/admin1, has dashboard like Wordpress.   How to import it's own pages ?

Netify 2 MB - cloud computing only
