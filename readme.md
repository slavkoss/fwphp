---
<a name="top"></a>
**Top**.....[1\.4 Dirs](#directories).....[1\.3 UML](#uml).....[1\.5 DM](#dm).....[IDE](#ide).....[3\. CRUD](#crud).....[SW fw](#swfw)   
CRUD module example code 7 scripts:  
[Simplest CRUD](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)   

## 1. My PHP menu & CRUD code skeleton (application architecture I named  B12phpfw)


-----




**B12phpfw : Developed** on home PC on (newest) Windows 10 64 bit with XAMPP  (Apache web server, MariaDB).  **Tested** also on Windows Oracle Virtual box Oracle Linux virtual machine  (Apache web server)  and on Linux demo sites. B12phpfw is **result of 20 years learning PHP as hobby** (but I have no production installations). 

## 1\.1 Demo sites - free hosting with free Mysql,  my blog and more sites
See [Code (signals) flow and data flow ](http://phporacle.eu5.net/fwphp/glomodul/blog/?i/read_post/id/54) or [here](http://phporacle.heliohost.org/fwphp/glomodul/blog/?i/read_post/id/54) - does not work because time limit.
1. **Demo sites on Linux** : **http://phporacle.eu5.net/** (freehostingeu - fast, stable, has free MySQL) - thanks for removing time limit.     
     PHP on Linux is a bit different than on Windows - see below "To do - done".     
     or On Linux :  http://phporacle.heliohost.org/ (heliohost - slow, stable, has free MySQL) - I asked them to remove time limit - no answer.      
2. **My blog**  at :  http://phporacle.altervista.org (January 2023, like a few months before, Google Chrome didn't work, Firefox did !?)      
    and demo site at http://phporacle.altervista.org/fwphp/www/ - tech core of Mondadori digital magazine (leading publishing company in Italy) plans to offer free MySQL. 
3. **My fwphp site on home PC**  (may be more sites : fwphp2, 3...) : XAMPP and virtual host outside XAMPP root dir, so XAMPP new version unzip is fast and easy :       
   OS (Oper. system) Windows adresses eg:       
   1.  WEBSERVERDOCROOT virtual host dev1 outside XAMPP root dir  OS adress J:\awww\www,  Web adress :  http://dev1:8083/fwphp/www/#page-top      
        Framework core in folder WEBSERVERDOCROOT/vendor/b12phpfw/  is less than 100 kB
   2.  WEBSERVERDOCROOT XAMPP root dir  OS adress J:\xampp\htdocs,  Web adress :  http://SSPC1:8083/       
    
## 1\.2 Download and unzip code from my Github repo

Download from **https://github.com/slavkoss/fwphp**

First "/" in paths below is "J:\\awww\\www\\" = "http://dev1:8083/" = ownWebServer_or_hosting_DOCROOT_PATH, eg **first "/" in "/vendor/b12phpfw"**      

Extract from fwphp-master.zip only  ~300 kB (B12phpfw core is less than 100 kB, with many added examples ~3 MB)   :

1. Folders : vendor (was zinc, now zinc no more exists, shares are in **/vendor/b12phpfw**)   

2. In phpmyadmin page :
    1. create database z_blogcms , utf8mb4
    2. import in My SQL J:\\awww\\www\\z_DDL_and_other\\01_DDL_mysql_blog.sql      
         or in Oracle DB  J:\\awww\\www\\z_DDL_and_other\\01_DDL_oracle_blog.sql

In J:\\awww\\www\\fwphp\\glomodul\\adrs\\ is **Adrs** module - first learning step beside Mnu module in J:\\awww\\www\\fwphp\\www\\. Adrs is not to simple example but is not enough to learn B12phpfw menu & CRUD code skeleton ! Enough not to simple learning modules are Mnu, Mkd and Msg modules ! Seems complicated but is not.      

>Most (all ?) PHP learning sources on internet and books (Nixon, Powers, Yank, Ullman...) seem simple, but are in my opinion good only for basic sintax and lead to wrong coding of
>menu & CRUD code skeleton, so are more complicated than B12phpfw ! It is one of life paradoxes : "illusion, semblance of appearance". 
>**Any systematic work is (at first) very difficult**. For example, high officials do not work systematically. The proof is incompatible SW tools, world crises (robbery of savings by inflation, printing money), crimes of inhuman predators like Hitler, Milošević, Putin, some religious high officials and their "brainwashed" believers (kill dissenters, mask women, ban their education and some other rights, for example abortion because of the imbecile idea that the fetus should be preserved at the cost of killing both the mother and the child through poverty - let them support the unwanted child and no one will ask for an abortion). In an orderly, non-anarchic society of educated people, such non-humans would not come to power. Voters do not recognize high officials who work unsystematic, i.e. they are not aware that **by not going to the polls or by electing always the same incompetent / liars / thieves** they are working against themselves, i.e. through ignorance / stupidity they fall prey to intense brainwashing by propagandists and commit a kind of suicide. Vote for someone else so that we don't always get squeezed by the same mafia octopuses of incompetent / lying / thieving high officials.
   
**We have to look at the whole - all the (main) functions of the code**, but PHP learning resources are more self-advertising to make money, not teaching all the (main) functions of the code. **I wish Microsoft Oracle, PHP "experts - ha,ha" and others would teach (eg Blazor) the way I teach PHP here**. Who can understand many megabytes of inexplicable inclusions? If something goes wrong look for an error in many megabytes of code? It's child's play for me, as complicated as Oracle Forms after the last client-server version of 6i. Installing, calling and maintaining servers is an (inexplicable) science. The post-6i call pattern is replaced by Oracle every few years with an incompatible one (problem: huge Java core library!). Microsoft's development tools, like Oracle's, are incompatible and some have been abandoned like Oracle Forms 6i.

**mnu** - menu module in  /fwphp/www  folder

**mkd** - Markdown content management module in  /fwphp/glomodul/mkd folder  

**msg** - CRUD msg-blog module in  /fwphp/glomodul/blog, ...user, ...post_category, ...post, ...post_comment (all in glomodul dir).





## First learning step : adrs module - URL-s of Youtube videos or of ...
Currently 2023.01.15, B12phpfw version 10.0.0.0 "Same module db adapter for any shared db adapter". 10.0.0.0 means :
1. 10=main version incopatibile with previous version
2. 0=DDL changed corresponding functions are incopatibile with previous version
3. 0=DML changed corresponding functions are different than in previous version (improved)
4. 0=error correct copatibile with previous version

January 2023 : only the adrs module works on Mysql or Oracle (11g) DB (not all functionalities, but enough to clearly see everything important). It's not hard to update the whole addrs module and msg module to version 10, but it takes a **lot of time, so I'm not in a hurry** because I think **I've achieved** the goal of the menu and CRUD skeleton code B12phpfw . A lot of time in the previous sentence means that SW tools as well as user applications require a lot of time for finishing if we change something. The best example of how to avoid this is shared (global) code eg "Same module db adapter for any shared db adapter".

The goal of B12phpfw PHP SW tool is, based on over twenty years of work with Oracle Forms 6i, to make tool for *.php websites with the logic like Oracle Forms 6i.

mnu, addrs... folders (modules) are like Oracle Forms 6i *.fmb and *.php are like programs inside some .fmb. I am convinced that this approach is much better than three folders M, V, C for all pages (*.fmb) which seems to me to be the work of authors of SW tools who do not have enough practical experience. Such authors have done a lot of damage in our time (Microsoft, Oracle, all Linux stupid versions and even Windows).

http://dev1:8083/fwphp/glomodul/adrs/         
Replace http://dev1:8083 with your Web adress eg http://localhost\b12 - opens Adrs module`s home page :        

**HOME.......EXAMPLE1.......EXAMPLE2.......ADDRESSES**         *-- MAIN MENU IN MODULE (OR SITE) HDR*        

Homepage           *--PAGE TITLE*        

*--PAGE CONTENT :*          

You are in View: J:\\awww\\www\\fwphp\\glomodul\\adrs\\home.php         

$pp1->module_relpath below site root = fwphp/glomodul/adrs       

$pp1->module_url = http://dev1:8083/fwphp/glomodul/adrs/           

B12phpfw is diffrent from other (PHP) frameworks (menu and CRUD code skeletons). Main (big) differences  :

1.  Each module (is like Oracle Forms6i .fmb) is in own folder, not all modules in 3 dirs: M, V, C.   
    So J:\\awww\\www\\fwphp\\glomodul\\adrs\\...MINI3 ADRS...NPPSES    
    contains scripts in only one adrs module folder : adrs.    
    Global scripts are in :  J:\\awww\\www\\vendor\\b12phpfw\\ folder.    

2.  Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree which is unnecessary, but dir is sufficient !).    
    Eg namespace B12phpfw\site_home\www ; or B12phpfw\site2_home\www (!) or B12phpfw\module\adrs      
        1. B12phpfw\module is FUNCTIONAL part of namespace - what script does - we may write here whatever we wish    
        2. adrs is folder in which script is (J:\awww\www\fwphp\glomodul\adrs\Home_ctr.php, http://dev1:8083/fwphp/glomodul/adrs/)    


Site logo (if you wish) : in CSS background: url('data:image/png;base64,iVBORw0KGgoAA...QmCC');     

*--MODULE (OR SITE) FOOTER :*     
This is MINI3 PHP fw on B12phpfw based on MINI3 on GitHub.      

#### Link EXAMPLE1 opens page :
This page EXAMPLE1 URL (web adress - web name) is :
http://dev1:8083/fwphp/glomodul/adrs/?i/ex1/
where ex1 is method in Home cls.

ex1 method I N C L U D E S this page = view whose oper.system adress is : J:\awww\www\fwphp\glomodul\adrs\example_one.php. 

#### Link EXAMPLE2 opens page :
This page EXAMPLE2 RECIVES TWO PARAMETERS p1='param1' and p2='param2'.
This page is i n c l u d e d with Home cls ex2 method.
This page URL is :
http://dev1:8083/fwphp/glomodul/adrs/?i/ex2/p1/param1/p2/param2/

Important part of Property pallette $pp1 is uriq = URL (URI) query parts :
[i] => ex2 where ex2 is method in Home cls to be called which calls some method or includes some script
[p1] => param1 This is method (script) parameter 1
[p2] => param2 This is method (script) parameter 2

url GET parameter p1=param1
url GET parameter p2=param2

You are in View: J:\awww\www\fwphp\glomodul\adrs\example_two.php

#### Link ADDRESSES opens page : "Links to youtube videos" or to... any page you wish
Trait Db_allsites static public function rrcnt called from "class Tbl_crud implements Interf_Tbl_crud" has problem :
>Deprecated: Calling static trait method B12phpfw\core\b12phpfw\Db_allsites::rrcount is deprecated,
>            it should only be called on a class using the trait -- **PHP authors did not explain this problem ?**
**so it is (abstract ?) Class for now** (2022-07-03) - **works but should be updated till end in Adrs module and in Msg module...**.
(Old good rule: do not use advanced language features because language authors don't test the changes in enough detail !)

There is lot to learn about Adrs module. If seems difficult try first [Mini3](https://github.com/panique/mini3) . 
Msg module adds "more modules" functionality which is real life programming not easy but neccessary.

## Steps of CODE FLOW in adrs module or any other B12phpfw module
Output from Autoload class after we change if ('') {... to if ('1') {...   displays code flow after Click on "ADDRESSES" button or any other link.                 

See clean_architecture.md where is code levels image from https://github.com/nazonohito51/clean-architecture-sample  .         

Try edit md file  : http://dev1:8083/fwphp/glomodul/mkd/?i/showhtml/path/J:\awww\www\clean_architecture.md

             



<br /><br /><br /><br />
# 1\.2\.a My developing environment (IDE)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....**IDE**.....[CRUD](#crud).....[SW fw](#swfw)   
<a name="ide"></a> 

## 1\.2\.a 1\. [Git SCM distributed version control system](https://git-scm.com/downloads)

see  https://help.github.com/en/github/writing-on-github    https://git-scm.com/book/en/v2      
   or eg  https://git-scm.com/docs/git-checkout         

### In Windows Symenu Cmder as administrator (or CLI or Git Bash CLI)
J:\symenu\ProgramFiles\SPSSuite\SyMenuSuite\Cmder_sps      

Go to your working directory or project folder (if not git status says: "fatal: not a git repository (or any of the parent directories): .git").      

**git config --global user.name 'yourname'         
git config --global --replace-all user.email 'youremail'         
git config --local -l**
Install Git Credential Manager for Windows to avoid login on each push - in  Cmder Git Extensions   (git update-git-for-windows)     

### cd j:\\awww\\www
j:\\awww\\www (master -> origin)
### git status
### git add .
or git add fwphp\\ (or whatever git asks)  or git add -A  or git add index.html
### git commit -am "ver 10.0.2.0 mnu, adrs, msg, mkd. Same module db adapter for any shared db adapter"
We stored our project files within our system hard drive.      
If Cmder shows error  "fatal: unable to auto-detect email address" : see above git config...       
git config --global user.email "you@example.com"      and         git config --global user.name "Your Name"       
to set your account's default identity.    Omit --global to set the identity only in this repository.       
### git push -u origin master
We stored our project files within our Github site.      

You want to restore an old revision of a file:
git checkout 8a7b201 index.html
If you specify "HEAD" as the revision, you will restore the last committed version of the file, effectively undoing any local changes that you current have in that file:       
git checkout HEAD index.html     

We can roll back our deleted files in working directory using command:      
**git checkout -- .**    
or git checkout -- filemame...         



Git is program and [Github](https://github.com/) is site - deploy ( [book](https://git-scm.com/book/en/v2/Git-Basics-Working-with-Remotes) ) [Tutorial](https://www.atlassian.com/git/tutorials/setting-up-a-repository)

Git we use eg to syncronize our scripts :     
1.  to your local repository (git commit to .git dir on local PC)     
2.  and from local repository to remote repository on Github site (git push)      

Beginning August 13, 2021, Github no longer accepts account passwords when authenticating Git operations on GitHub.com, and requires the use of **token-based authentication**, such as a **PAT, personal access token over HTTPS = psw 40 characters length (recommended) ** (for developers) or an OAuth or GitHub App installation token (for integrators) for all authenticated Git operations on GitHub.com. You may also continue using SSH keys where you prefer.

## Creating PAT (personal access token) from github's dev settings
https://docs.github.com/en/github/authenticating-to-github/keeping-your-account-and-data-secure/creating-a-personal-access-token     

1. Verify your email address, if it hasn't been verified yet https://docs.github.com/en/github/getting-started-with-github/verifying-your-email-address.     
2. Generate a new token from github's dev settings so :     
   1. go to https://github.com/slavkoss/fwphp or any Github page    
   2. in the upper-right corner click your profile photo => click Settings => Developer settings => Personal access tokens =>Generate new token      
       or https://github.com/settings/tokens/new
   3. Give your token a descriptive name, expiration (I 3 months).        
       Select the scopes, or permissions, you'd like to grant this token. To use your token **to access repositories from the command line** :       
       **select repo (also gist, user)**.       
   4. Click Generate 40 chars token       
3. Update remote URL      
    git remote set-url origin https://[token]@github.com/[git_url]      
    **git remote set-url origin https://[token]@github.com/slavkoss/fwphp.git **        
4. push (or pull : **git pull https://[token]@[git_url].git**)        
    **λ git push -u origin master**  - only one time, later  **git push** suffices     
    λ means I did it in Cmder (contained in SyMenu portable apps collection)        


λ git remote -v  outputs :     
origin  https://[token]@github.com/slavkoss/fwphp.git (fetch)    
origin  https:/[token]@github.com/slavkoss/fwphp.git (push)    


## To purge remote repository

So only last commit remains and it is first commit :

Save your .git/config before, and restore it after. (I delete it in recycle bin).
1. delete .git/   (< 10 MB) - without this command : git remote add origin... issues error : fatal: remote origin already exists !!
2. git init   (< 20 kb)
3. git add .  (< 3 MB)
4. git commit -am "ver 7.0.1 mnu, msg, mkd FUNCTIONAL namespaces, CRUD PDO trait, pretty URL-s"
5. git remote add origin https://github.com/slavkoss/fwphp.git
6. git push --mirror --force

  
  
## 1\.2\.a 2\. Development environment & source code

My PHP IDE is **[Symenu zip package](https://www.ugmfree.it/SyMenuDownload.aspx)** as launcher for all SW listed below (portable if possible) :

1.  ## [xampp](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows//)   is Apache web server, PHP, MySql < 100 MB   
   
2.  ## Text editor : Symenu\'s npp (Notepad++)  (7 MB).       
   **[Notepad++ Markdown plugin](https://github.com/nea/MarkdownViewerPlusPlus)**      
   Copy tMarkdownViewerPlusPlus.dll to the plugins sub-folder at your Notepad++ installation directory.     
   The plugin adds a small Markdown icon to the toolbar to toggle the viewer as dockable panel.     
   Then in npp Settings -> Import -> Import plugin(s).     
   
   See in J:\\awww\www\\  GLOBALS  nppsess file and other nppsess files.
   
   MD to HTML converters on inet :     
   1. **https://www.tutorialspoint.com/online_markdown_editor.php     or     https://markdowntohtml.com/    
   3. or (many converters)   https://www.browserling.com/tools/markdown-to-html      
   4. or files convert to many formats :  https://products.aspose.app/pdf/conversion/md-to-html      
   
   Also good, all portable all in Symenu : Notepad2-mod (2 MB), Atom (524 MB),       
   Visual Studio Code (247 MB),  CudaText (28 MB), PSPad (23 MB), RJ TextEd (416 MB),       
   HTML WYSIWYG editors :  **Microsoft Expression web** (abandoned but still good).     
   I avoid Dreamveawer, Komposer (abandoned, too old).        
   
   ### OCR IMG->TXT :  Symenu\'s "GT Text" program      

3.  **COMMANDER**:    
    ### Locate 
    is old but best (Janne Huttunen) or simmilar **Everything**, see Symenu      
    **MeinPlatz** (x64) (part of Symenu portable programs) like **Treesize**    
    ### Freecommander
    or Multicommander, Q-dir, Totalcommander...       

4.  **BROWSER**: 
   ### Firefox (portable in Symenu collection)
   Google Chrome, Cyberfox, Pale Moon     
   
5.  **DEPLOY (INSTALL)**: 
   ### Cmder
   (in Symenu) is Win CMD line, has Git.    
   [Composer](https://getcomposer.org/) helps you declare, manage, and install dependencies of PHP projects.     
   FTP client **Winscp**.  Ignore :  | *.zip; J:\awww\www\.git; J:\awww\www\vendor/B12phpfw/Dbconn_allsites.php;    
   FTP server Symenu\'s  **Serva Community**


### Other tools

[PHP Manual](https://www.php.net/manual/en/index.php)

[PHP Style Guide](https://gist.github.com/ryansechrest/8138375)

[PHP tutorial by W3Schools](https://www.w3schools.com/php/)

[Guzzle](https://github.com/guzzle/guzzle) is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services.

[DesignPatternsPHP](https://designpatternsphp.readthedocs.io/) is a collection of known design patterns and some sample code how to implement them in PHP 7.4. Every pattern has a small list of examples.

[Grav](https://getgrav.org/) portable flat-file CMS with powerful Package Management System of plugins and themes and Grav itself.

[PHP Guide](https://github.com/mikeroyal/PHP-Guide)
   
   









<br /><br />
## Explanations below are far less important than installation and demo site mentioned above - open code and learn it.
```

         _.-'''''-._
       .'  _     _  '.
      /   (o)   (o)   \
     |                 |
     |  \           /  |
      \  '.       .'  /
       '.  ''---''  .'
         '-._____.-' 

```




<br><br><br>
# 1\.6 B12phpfw UML diagram 
shows classes structure - Attributes and Methods
<a name="uml"></a>

[Top](#top)......[Dirs](#directories).....**UML**.....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

#### Adapters (implementations - classes or methods) depend on interfaces (features, ports), not on other classes.




-----

# B12phpfw core 
### 1\.6 1a. DBI (DB interface, DB adapter):

```php
<?php
// J:\awww\www\vendor/b12phpfw\Dbconn_allsites.php
// Is required in trait Db_allsites
//$conn_params = 
return [
    null
  , 'mysql'
  , 'localhost'
  , 'z_blogcms'
  , 'root'
  , ''
] ;
```


-----




### 1\.6 1b. DBI:  class Db_allsites  : code type MODEL, DB PDO CRUD ADAPTER, PDOQueryBuilder  

B12PHPFW CORE CODE.   
LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL, COMMON)      
(**MODEL**, AbstractEntity)     

class Dbconn_allsites . **Trait is simmilar to class**. Reason for trait is net code structure :       
some class may use more traits - **net** - more parents,  but may extend only one class - **hierarchy**.     
I do not use trait - had some bug as advanced code frequently has.


-----



### Attributes in J:\awww\www\vendor\b12phpfw\Db_allsites.php
```php
// see class script
```


-----



### Methods in Db_allsites.php (~ 12 fns)
```
// see class script
```



-----



### Db_allsites.php is based on SOLID and Clean Code programming principles
Basically Db_allsites.php read (rr , report) works like the code in  :       
/awww/www/clean_architecture.md. I did it in version 10 Jan. 2023.

 


-----



### 1\.6 2. Conﬁg_allsites abstract cls : CONFIG AND UTILS (functions)
B12PHPFW CORE CODE.     
LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL)     


-----



### Attributes in J:\awww\www\vendor\b12phpfw\Config_allsites.php
```php
// see class script
```


-----



### Methods in cls file Config_allsites.php (~ 16 fns) **less than 250 important lines**
1.   public function \_\_construct(object $pp1, array $pp1\_module)    
     1. C H E C K  R E Q U I R E M E N T S     
     2. DEFINE  A D R E S S E S  (NO CONSTANTS). Adresses = paths & relative paths      
        2.1 R O U T I N G - find URL parts for user events methods calls ee $uri_arr = explode(QS, $REQUEST_URI)    
        2.2 Assign  $ p p 1 = array of module (and above module) properties     
     3. D I S P A T C H I N G      
        DISPATCHER code calls Home_ctr cls method (CONVENTION : i=ctrakcmethod)    
        which calls fns or includes view scripts (http jumps only to other module)    
        Dispatching using home class methods is based on Mini3 php fw.    
        "?" in "?edit" is QS (U R L Query Separator)     

```php
// see class script
```




<br /><br />


-----



### 1\.6 3. Autoload cls included in index.php (J:\awww\www\vendor\b12phpfw\Autoload.php)
TO AVOID INC. COMMANDS IN MANY SCRIPTS        
B12PHPFW CORE CODE.     
LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL, COMMON)      

```php
// see class script
```



-----


### J:\awww\www\fwphp\www\index.php

```php
// see script
```


-----






#### J:\awww\www\fwphp\glomodul\z_examples\03_call_child_fn_from_parent_cls.php explains B12phpfw routing and dispatching principle




-----



## 1\.6 4. Home_ctr cls : MODULE CONTROLLER CODE, ROUTES, CALLS
B12PHPFW MODULE CODE.     
LEVEL : MODULE (SAME CODE FOR MODULE ee FOLDER, eg mnu or mkd or msg=blog)

For program execution, the class hierarchy is: as if all attributes and methods in classes above Home_ctr are in the Home_ctr class.
That is, they are in **$this object** which is instantiated (created in memory) in Home_ctr (which seems to contain all classes - descriptions of attributes and methods above it).

Why are the shared (common) attributes and methods in the hierarchy above Home_ctr and not in Home_ctr?

  **We don't want to write in every Home_ctr script the complete shared (common) code above Home_ctr**.


-----





<br /><br />
<a name="directories"></a>
## 1\.7 B12phpfw directories (modules) structure
[Top](#top).....**Dirs**.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

See **info code :**        
http://phporacle.eu5.net/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php       
https://github.com/slavkoss/fwphp/blob/master/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php        

B12phpfw is very diferent than (all ?) other PHP frameworks (I prefer "menu & CRUD code skeletons") because :      
1. dirs are like Oracle FORMS form module .fmb 
     https://github.com/ngrt/MVC_todo - very good coding  (but to simple example,no globals, no namespaces...) , shows usual PHP frameworks dirs and routing idea : 
     ...\\glomodul\\z_examples\\MVC_FW\\ngrt_MVC_todo    or many others in my MVC_FW dir or search Google :  Github php framework

2. and other reasons mentioned below        


See Mini3 PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good coding). My **routing using key-values** is different but **dispatching using home class methods is based on Mini3**. 


B12phpfw has 3 modules  and some utilities :   
1. Menus (**Mnu module**) are not based - no need, but can be based on B12phpfw which is best for CRUD modules like Oracle Forms form. 
2. Most frequent (best ?) **Blog - msgs module** design today - Jazeb Akram, Abdul Wali, Edwin Diaz... I used it in Blog (Msg) module based on B12phpfw code skeleton
3. WYSIWYG web editing : Markdown or HTML (**Mkd module** is not based - no need, but can be based on B12phpfw is used for blog posts or any txt file). Blog posts
    may be :
    1. oper. system files - practicaly unlimited size
    2. or in MySQL/Oracle/or any DB : post (4000 characters I commented this in code), summary (4000 characters) and banner_img description
        (4000 characters oracle 11g, 32 kB >=12c) 
4. http://dev1:8083/fwphp/glomodul/z_examples/RespectValidation/test.php





## <a name="dm"></a>1\.8 DM (Domain model)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....**DM**.....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   










  
<br /><br /><br /><a name="crud"></a>
# 3\. PHP 7 or 8, Bootstrap 5 : DB tbls rows PDO CRUD
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....[IDE](#ide).....**CRUD**.....[SW fw](#swfw)   

May be jQuery, PHP, Bootstrap AJAX DB table rows CRUD is simplest, fastest best CRUD but I prefer no jQuery, no AJAX . Only Javascript I need is dialog yes or no.





<br /><br />
## <a name="SimplestCRUD"></a> 3\.1 Simplest "adrs" CRUD module (MINI3, play Youtube songs)
CRUD rows in **table song(#id, artist, track, link)**. **MINI3 framework https://github.com/panique/mini3 is I think best to learn PHP** and frameworks code skeleton. My adrs module in glomodul modules-group is MINI3 on B12phpfw. Why ? I think **for large sites MINI3 is to simple** - no shares...


1. **index.php** single entry point in module
2. **Home_ctr.php** DEFAULT CTR (ONLY ONE IN MODULE). router, dispatcher
3. **home.php** - shows links assigned in Home_ctr.php for user interactions or some txt
4. **cre_row_frm.php** - code behind form and form
5. **read_tbl.php**
6. **upd_row_frm.php** - code behind form and form
7. **Tbl_crud.php** - ORM, DM (Domain Model) adapter cls - pre CRUD class, PHPQueryBuilder

See scripts.


<a name="scrudIndex"></a>
### 3\.1\.1 index.php single entry point in module
[Simplest CRUD](#SimplestCRUD).....**index.php**.....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU) ....[adapter](#scrudadapter) 

We need single entry point in module to avoid mess with links (https://... links are not clear, better are includes and method calls).

```php
<?php
/**     
 * J:\awww\www\fwphp\glomodul\adrs\index.php
 */
...
/**     
 * J:\awww\www\fwphp\glomodul\adrs\index.php
 * DISPATCHING is calling method according URL parts (extracted with ROUTING code).    
 * Because MODULE METHODS PARAMS ARE MOSTLY GLOBAL (same for all modules), eg paths,      
 * to avoid lot of same code in modules (code redundancy) :    
 * 1. WE ASSIGN GLOBALS IN PARENT CONF&UTL CLS METHOD
 *    (not knowing which module is going to use them)        
 * 2. THEN, FROM PARENT CLS WE CALL METHOD IN CHILD MODULE CLS. 
 *    Module method knows how to use globals 
 *    and what module needs for parameters beside globals.       
 */

/** 
 *         ns (NAMESPACES) we use in clses script autoloading.
 * vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
 * eg B12phpfw is vendor_namesp_prefix  ; //FUNCTIONAL, NOT POSITIONAL
 *     FUNCTIONAL parts are not requirad, we use them to better understand script purpose.
 *eg clsdir - only this part of namespace is POSITIONAL, CAREFULLY ! 
 */

/**
 *                    **HELPNS
 * first namespace part B12phpfw is NOT REQUIRED : vendor's name NS's prefix (FUNCTIONAL NSPART)
 * 2nd ns part m o d u l e is NOT REQUIRED : FUNCTIONAL NSPART = processing (behavior) 
 *
 * FNSPs (FUNCTIONAL NS PARTS) are ignored by fw, ee we name them as we wish.
 *    We use FNSPs as description to depict WHAT CODE DOES (processing, behavior).
 *    May be more functional ns parts as we wish - all are ignored !
 *
 * PNSP (POSITIONAL NS Part) CAREFULLY! : LAST NS part (BEFORE CLSNAME IF ANY) eg "blog" is DIRNAME.
 *    PNSP is actually (de facto, in fact, indeedded) DIRNAME and module name.
 *    Path OF DIRNAME (of PNSP) is in $pp1 array,       
 *        used for Autoload class to include classes from dir DIRNAME.
 *    Autoload class is include, global, common, reusable.
*/                                                     

```


<a name="scrudHome_ctr"></a>
### 3\.1\.2 Home_ctr.php DEFAULT CTR (ONLY ONE IN MODULE). router, dispatcher
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....**Home_ctr**.....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php
...
    *  ------------------------------------------------------------------------------
    * ROUTING TBL - module links, (IS OK FOR MODULES IN OWN DIR) key-keyvalue pairs :
    *  LINK ALIAS IN VIEW SCRIPT (eg l d d) => HOME METHOD TO CALL (eg del_ row_do)
    *  ------------------------------------------------------------------------------
    * 1. ALL MODULE VIEWS LINKS SHOULD BE IN $pp1_ module, SHAPED SO :
    * 2. $pp1->urlqrystringpart1_name => i/M E T H O D NAME/param1name/ param1value...2,3... 
    *    (urlqrystring LAST PART IS IN VIEW SCRIPT WHICH KNOWS IT, eg idvalue !)
    * 3. IF LINK key-keyvalue pair IS NOT HERE THEN EG : 
    *    in URLurlqrystring : QS.'i/home/' home must be M E T H O D NAME in this script.
    *    Eg http://dev1:8083/fwphp/glomodul/adrs/?i/ex1/  or
    *       http://dev1:8083/fwphp/glomodul/adrs/?i/home/ or
    *       http://dev1:8083/fwphp/glomodul/adrs/
    */




          /** *****************************************
           *       CALL DISPATCH  M E T H O D S
           * they 1.call other fns or 2.include script or 3.URL call script
           * CALLED FROM abstract class Config_ allsites, m ethod __c onstruct
           * so: $pp1->call_module_m ethod($akc, $pp1) ;
           *    $ a k c  is  m o d u l e  m ethod (in MM Home_ ctr, not global fn !!
           *      because MM Home_ ctr knows akc parameters)
           * ****************************************** 
          */

```

<a name="scrudHomeV"></a>
### 3\.1\.3 home.php - shows links assigned in Home_ctr.php for user interactions or some txt
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....**home (table page.....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    
```html
<!-- J:\awww\www\fwphp\glomodul\adrs\home.php -->
<div class="container">
    <h1>Homepage</h1>

    <p>You are in View: <?=__FILE__?></p>

    <p>$pp1->module_relpath below site root = <?=$pp1->module_relpath?></p>
    <p>$pp1->module_url=<?=$pp1->module_url?></p>
    
    <p>Namespaces are FUNCTIONAL, not POSITIONAL (not dir tree).</p>
    <p>Each module (is like Oracle Forms .fmb) is in own folder, not all modules in 3 dirs: M, V, C.</p>


    <p>In CSS background: url('data:image/png;base64,iVBORw0KGgoAA...QmCC');</p>
</div>






<!-- J:\awww\www\fwphp\glomodul\adrs\example_one.php -->
<div class="container">
    This page EXAMPLE1 URL (web adress - web name) is :
    <h3><?=$pp1->module_url?>?i/ex1/</h3>
     where ex1 is method in Home cls.

  <p>
  ex1 method  I N C L U D E S  this page = view whose oper.system adress is : <?=__FILE__?>.
  </p>

  <p> </p>
</div>





<!-- J:\awww\www\fwphp\glomodul\adrs\example_two.php -->
<div class="container">
    This page EXAMPLE2 RECIVES TWO PARAMETERS p1='param1' and p2='param2'.<br>
    This page is  i n c l u d e d  with Home cls ex2 method.<br>
    This page URL is :
    <h3><?=$pp1->module_url?>?i/ex2/p1/param1/p2/param2/</h3>
  <p>Important part of Property pallette $pp1 is <b>uriq = URL (URI) query parts</b> : </p>
  [i] => ex2 where ex2 is method in Home cls to be called which calls some method or includes some script<br>
  [p1] => param1 This is method (script) parameter 1<br>
  [p2] => param2 This is method (script) parameter 2
  </p>


    <p>url GET parameter p1=<?=$param1?> <br>
    url GET parameter p2=<?=$param2?> </p>

    <p>You are in View: <?=__FILE__?></p>
</div>
```




<a name="scrudC"></a>
### 3\.1\.4 cre_row_frm.php - code behind form and form
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....**create**.....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php
<?php
// J:\awww\www\fwphp\glomodul\adrs\cre_row_frm.php
...
```



<a name="scrudR"></a>
### 3\.1\.5 read_tbl.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....**read (user profile - form**.....[update](#scrudU)....[adapter](#scrudadapter)    

```php
<?php
//J:\awww\www\fwphp\glomodul\adrs\read_tbl.php
```



<a name="scrudU"></a>
### 3\.1\.6 upd_row_frm.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....**update**....[adapter](#scrudadapter)   

```php
<?php
// J:\awww\www\fwphp\glomodul\adrs\upd_row_frm.php

```




<a name="scrudadapter"></a>
### 3\.1\.7 Tbl_crud.php - ORM, DM (Domain Model) adapter cls - pre CRUD class, PHPQueryBuilder
[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....**[adapter]**

```php
<?php
/**
*  J:\awww\www\fwphp\glomodul\adrs\Tbl_crud.php
*        DB (PERSISTENT STORAGE) ADAPTER C L A S S - PDO DBI
*        (PRE) CRUD class - DAO (Data Access Object) or data mapper
*      This c l a s s is for one module - does know module's CRUD
* Other such scripts should be (may be not ?) for csv persistent storage, web services...
*
* DM=domain model aproach not M,V,C classes but functional classes (domains,pages,dirs)
* MVC is code separation not functionality !
*/

/**
*         (PRE) CRUD class - DAO (Data Access Object) or data mapper
*/

} // e n d  c l s  T b l_ c r u d

```










## 3\.2 B12phpfw core (CRUD) code - How to get ONLY banana ?


<br /><br />
It is not easy to see need to eg for user module convert code from procedural MVC to OOP MVC with namespaces and autoloading  For navigation (url-s, links) code is same - OOP does not help. Procedural MVC user module code is more clear and readable. So why is OOP better ?

Some say: "is OOP mistake ?" - eg **lack of reusability in OOP** - to get banana (some method or attribute) you get also gorilla holding banana and whole gorilla\`s jungle (all **higher classes with complicated dependencies**). It is why B12phpfw code skeleton is for CRUD modules, I do not use it in mnu and mkd modules.

Eg Interfaces help to get ONLY banana, but coding is complicated - I could find only strong-talk-weak-work code examples about this subject.  
1. So my not complicated **interface Interf_Tbl_crud** I made **to standardize coding Tbl_crud classes**. Each simple ee **one table module** like "invoice items" module has own dir and own Tbl_crud class leading to more than 100 Tbl_crud.php model adapter scripts in big application (eg material and financial book keeping).
```
*  J:\awww\www\vendor/b12phpfw\Interf_Tbl_crud.php (4 hits)
* 9:   static public f unction rr(
* 12:  static public f unction rrnext(object $cursor): object ;  //returns $cursor
* 16:  static public f unction rr_all(
* 23:  static public f unction cc(object $pp1, array $other): string ;
```

2. With **DBI trait Db_allsites** I eliminated two higher DB classes. So if banana (some method or attribute) is **rr (read) from more tables** it is not in two higher DB classes which seems simplest solution but caused complicated coding in version 6.   Eg invoice module works with two (or three - bill) tables : invoice and invoice_items. Simmilar "simplest solution" three dirs M,V,C is bad,  I have -:) for 3dirs lovers who put coding technik (M,V,C code separation) in foreground instead pages (functionality, business logic), eg invoice page. How unimportant is coding technik (M,V,C code separation) in functionality, business logic story, but M,V,C code separation is most important in coding, in each script.

   rr banana is not in jungle any more, gorilla and jungle is only one abstract class Config_allsites which is de facto $pp1 = properties.

   **Banana $pp1 = properties palette** may cause difficulties in aggregate (compound, composed, multiplex) modules like Blog, Invoice... but $pp1 is inevitably (imminence, necessity) gorilla-jungle and can not be further simplified. I worked 20 years in $pp1 and globals jungle (Oracle Forms 6i) not so well grounded as here. 


See [https://phpthewrongway.com/](https://phpthewrongway.com/), or Joe Armstrong why OOP sucks [http://harmful.cat-v.org/software/OO\_programming/why\_oo\_sucks](http://harmful.cat-v.org/software/OO_programming/why_oo_sucks).

  
  
  
  
<br /><br /><br />
B12phpfw is based on ideas in many tutorials eg next few are among best (but also on some ideas in best PHP frameworks Laravel, Simfony, Yii, Phalcon...) .         
I did much simpler B12phpfw code based on ideas in Jazeb Akram CMS blog and Mini3 PHP fw. Books about PHP are not so good.

1.  CMS blog Video (7.7 GB) Jazeb Akram : Udemy - The Complete PHP MYSQL Professional Course with 5 Projects - **rare not to simple tutorial**. Similar is video (12.3 GB) Edwin_Diaz_PHP for Beginners - Become a PHP Master - CMS Project. Also some other videos - so seems they are **best/simplest page designs** (not code skeletons) for CMS blog  ee posts, messages. Videos are huge for commercial reasons to reach higher num_of_GB ee $/GB but there is not best code - older programming style.

2.  [**Mini3**](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs) (Mini3 PHP fw [https://github.com/panique/mini3](https://github.com/panique/mini3) - rare not to simple module but could have more functionality.

3.  /glomodul/z_examples/MVC_FW/hcstudio_easy/public/  to simple fw example but good code for learning PHP (only Read of CRUD), explained Middleware. To complicated routing and Middleware.

4.  https://github.com/ngrt/MVC_todo Code is explained in this article blog 2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19
5.  https://dev.to/jorgecc/a-minimalist-mvc-project-using-php-and-without-a-framework-4pd8
6.  https://github.com/TRPB/ImmutableMVC

7. Other :
   1. video 8/2016 Paul Amissah [https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/](https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/) :  PHP, procedural MVC PDO MySQL, Bootstrap, AJAX jQuery - good basic code. **Not good are (as in almost all tutorials)** : names, globals,  code snippets composing - no single entry point ee including scripts instead http jumping in scripts
   3.  video Shan Shah 2019 [https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/](https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/),
   4.  video Learn\_OOP\_PHP\_By\_Building\_Complete\_Website\_by\_Traversy\_2018 [bad example](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/traversymvc) to complicated despite some good code snippets.            
   5.  Inanz, Hopkins, Xuding... to simple examples, good only for clear ideas and for total beginners.         
      fwphp/glomodul/z_examples/MVC_FW/02hopkins_2009_clickme/         
      /fwphp/glomodul/z_examples/MVC_FW/02L2adlian_mvc_2009/          
      /fwphp/glomodul/z_examples/MVC_FW/01inanz/        
      /fwphp/glomodul/z_examples/MVC_FW/03xuding_users2017/       

I made many changes (I hope improvements) which I did because I do not like proposed solutions in best php frameworks and in learning sources mentioned above  (especcialy coding eg Traversy tutorial). Shares (reusables, globals) are not well coded there. I think that eg invoice php code should be in **own folder - module - like Oracle forms invoice.fmb** (not all forms/reports in 3 folders: M,V,C). **Application** glomodul consists of group of modules subgroups - unlimited levels  eg subgroup [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples)

**Modules subgroups - unlimited levels**. This is important difference ! Can Laravel, Yii, Phalcon work this way (important for large applications) ?

I think that should be simple/fast/professional : **shares**, routing, dispaching, functional namespaces & classes loading , web rich text editing...  
It is why I spent so many hours on this (huge time wasting which should do tools-software authors, not tools-software users like me).


  
    
  

## 3\.3 Code with functional namespaces and Autoload class to include classes scripts : shared, module-local and external
This code skeleton seems complicated compared with [https://github.com/panique/***mini3](https://github.com/panique/**mini3)*** which is may be best fw code template for smaller projects (and learning PHP).

For large projects **SHARES - GLOBALS - REUSABLES** which I use here are very important, same as **modules in own folders (not all in only 3 dirs M,V,C)**.

About shares (globals) see discussion :  
[https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695](https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695)  
[https://medium.co## 3\.2m/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d](https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d)  
[https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html](https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html)       


<br /><br /><br />
During winter 2019/2020 year (much to late because I tested lot what others did) I made Version 6. of **menu and CRUD PHP code skeleton (own framework named "B12phpfw")** - core code is ~ 50 kB.  Version 7. : PHP 7 and trait DBI is in October 2020.  
<br />
Why ?  I do not like proposed solutions in  in best php frameworks (Laravel, Simfony, Yii...) and learning sources (internet, books). I think that eg module invoice php code should be in own folder like Oracle Forms form invoice.fmb (not all forms/reports in 3 folders: M,V,C). I think that should be simple/fast/professional :
**globals**, routing, dispaching, classes loading , web rich text editing - it is why I wasted many hours coding my B12phpfw (huge time wasting which should do software authors, not sw users-programers like me).      

Why I do not like proposed solutions and what I did to (I hope) improve them. <span style="color:red;">Red colored features are main reasons for B12phpfw, but I improved also other features.</span> :      

### Compared B12phpfw Msg (blog) module and Mini3 module (URLs Youtube songs adresses) and TraversyMVC blog module
TraversyMVC (has video) and Mini3 are simplified, with some (many?) differences compared to Laravel, Simfony, Yii, Falcon... B12phpfw is much more different - see red colored features. PHP framework authors do not show such fitures table, for me it is hiding fitures (sell cat in bag).

|                                    Feature                                         |                           B12phpfw                                |  Mini3 MVC PHP fw and TraversyMVC| 
| ----------------------------------------------------------------- | ------------------------------------------------------- | ------------------------------------------ |
|  1.  <span style="color:red;">**Modules in own folder** like Oracle Forms .fmb</span> |  has - it is one of main reasons for B12phpfw !     |   has not all forms/reports in 3 dirs: M,V,C <br /> |
|  2.  **Name spaced** classes (functional name spacing)  |   has  |  **Mini3** which is in my opinion better than TraversyMVC : https://github.com/panique/mini3  has name spaced classes. <br />  TraversyMVC blog has not  <br />|
|  3.  **Number of folders** (my opinion)     |  optimal      |  to many <br />|
|  4.  **Minimal PHP code** to learn (medium) PHP  (my opinion) |  optimal (but we could add additional code) |  good but not enough eg see WYSIWYG, globals... <br />|
|  5.  **Functional methods, attr. etc naming** (my opinion)     |  good      |  could be better <br />|
|  6.  <span style="color:red;">**Global classes, methods etc** (my opinion) </span> |  good  see below CRUD test output |  bad <br />|
|  7.  (Posts edited with any) **WYSIWYG editor** |  has      |  has not |
|  8.  Home_ctr or Home_mdl CRUD layer methods <span style="color:red;">**do not know for underlaying Db_allsites layer PDO** methods, MySql, Oracle...</span> |  has much improved |  has not <br />|
|  9.  **OOP** |  has      |  has like Mini3 <br />|
| 10.  namespaces (own **PSR-4 (or Composer's) autoloading** classes scripts) |  improved  |  Mini3 has, TraversyMVC blog has not <br />|
| 11.  <span style="color:red;">**All scripts are included**</span> (ee no http jumps except some jumps in other module) |  has  |  Mini3 has, B12phpfw took it from Mini3, TraversyMVC blog has not <br />|
| 12.  **jQuery** only for Bootstrap 5 |  yes  |  Mini3 has own CSS, TraversyMVC blog has <br />|
| 13.  AJAX, JSON |  has not  |  Mini3 has basic jQuery AJAX explained, TraversyMVC blog has <br />|
| 14.  server side **validation** |  has |  has <br />|
| 15. **authentification** (log in / out) |  has |  has not, TraversyMVC blog has <br />|
| 16. **authorization** (only logged in users may execute some code ee CRUD code...) |  has |   Mini3 has not, TraversyMVC blog has <br />|
| 17. <span style="color:red;">**Own debugging** very simple and useful</span> : msg in pre tag or popup JS msg). **xdebug** also helps. |  has |  has not <br />|
| 18. <span style="color:red;">PHP code here is good for (more) **large sites**</span>|  yes | no <br />|
| 19. **multilanguage pages** |  has, see https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/multilang/ |  has not <br />|
| 20. **<span style="color:red;">DM</span> (Domain model)** |  has, simplest possible, no complicated namespaces, interfaces, adapters, data mappers... see https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/03xuding_glob |  has not <br />|








<br /><br /><br /><br />
## 3\.4 B12phpfw directories (modules) structure compared to (all ?) other PHP fw-s

##  B12phpfw directories (modules) 
```
One of (Apache) WEB SERVER DOCROOT-s, my is  J:\\awww\\www\\
|       
|       
|-- **I. fwphp** (app)       # **or SITE1, or APLications1** = Main MVC site dirs structure,               
|            # my J:\\awww\\www\\fwphp\\ = Apache_docroot\site_root         
|            # Contains **MODULE GROUPS** eg APLication1 or **www** (main menu), **glomodul**,       
|            # **finance**, **material**. fwphp is optional name. Namespace is only one: B12phpfw.            
|      
|       
|-- **II. index.php**         # redirects to main menu url fwphp/www/index.php        
|      
|                
|--**III. vendor **           
|  └──--**B12phpfw**   # B12phpfw has own (internal) resources here, external in other vendor subdirs.       
|                      # Here are **class Autoload and other for all sites shared - common - global**                  
|                      # **classes** Db_allsites and Config_allsites....                   
```


###  other PHP fw-s
```
One of (Apache) WEB SERVER DOCROOT-s, my is  J:\\awww\\www\\
|       
|       
|-- **I. fwphp** (app)       # **or SITE1, or APLications1** = Main MVC site dirs structure,               
|   |              # my J:\awww\www\fwphp\ = Apache_docroot\fwphp         
|   |              # Contains **MODULE GROUPS** eg APLication1 or **www** (main menu), **glomodul**,       
|   |              # **finance**, **material**. fwphp is optional name. Namespace is only one: B12phpfw.            
|   |-- ~~Controllers~~          # **NO M,V,C dirs but dirs are like Oracle FORMS form module.fmb  !**         
|  └── ~~example.php~~      # NO Example Controller 
|   |                             
|   |       
|   |-- ~~Models~~               # **NO M,V,C dirs** ee NO Models directory       
|  └── ~~example.php~~      # Example Model with functionality explanation       
|   |                        
|   |         
|   |--~~Views~~   # **NO M,V,C dirs** ee NO Views directory, no template engines (PHP is template language)        
|        
|        
|   |-- ~~app.php~~   # **NO** Main fw file. nice abstraction (questionable value in real life programming) :       
|   |                        # **$app = new App();  $app->autoload(); $app->config(); $app->start();**       
|   |                        # Where is UML diagram for this beauty ?        
|   |                        # I think much better is **new Home\_ctr($pp1) ** // Home\_ ctr "inherits" index.php       
|   |                        # ee "inherits" $pp1, (global & module prroperties palette array),       
|   |                        # but also inherits see B12phpfw core UML diagram below.      .      
|   |             
|   |-- ~~classes~~              # **NO** classes directory for autoloading.         
|   |   |                    # B12phpfw global classes are in vendor/b12phpfw dir, module clses are in module dir.       
|   |  └──-- ~~controller.php~~   # **NO** but **in module dir global abstract DISPATCHER (RESPONSE) class**             
|   |   |                    # **Home\_ctr ** extends Config\_allsites         
|   |   |--~~model.php~~        # **NO, no model class for each table** but **in vendor/b12phpfw** dir                
|   |                        # global abstract CRUD class **Db_allsites  ** includes Dbconn_allsites             
|   |                        # In Db_allsites are **cc, rr, uu, dd methods** instead model class for each table !        
|   |                        # cc, rr, uu, dd methods are like Oracle Forms           
|   |                        # pre-insert, pre- and execute- query, pre-update instead model class for each table !         
|   |                        # To me seems not needed :  model class for each table and ORM-s, active records         
|   |       
|   |-- ~~config~~   # **NO** config dir but in vendor/B12phpfw dir             
|   |   |                    # **Config_allsites** extends Db_allsites (see core UML diagram). 
|   |   |                    # Here is property palette array.           
|   |   |-- ~~database.php~~     # = in vendor/b12phpfw **Dbconn_allsites.php**        
|   |   |-- ~~session.php~~            
|   |                     
|   |-- ~~helpers~~     # **NO** helpers dir, but classes Db_allsites and Config_allsites.          
|       |-- ~~examplhelper.php~~ # **NO** but own debugging (and Xdebug php extension - I do not use it any more).              
|      
|       
|-- **II. index.php**         # redirects to main menu url fwphp/www/index.php        
|      
|                
|   |-- **III. vendor **           
|       |--**B12phpfw**   # B12phpfw has own (internal) resources here, external in other vendor subdirs.       
|                      # Here are **class Autoload and other for all sites shared - common - global**                  
|                      # **classes** Db_allsites and Config_allsites....             
|         
|-- .htaccess        # **NO** .htaccess (Apache mod_rewrite) URL rewriting all requests to MVC endpoint         
                    # index.php  (single module entry point). B12phpfw has **QS=?** constant instead.       
```

Common fw dir structure are **items in marked with NO - are not used in B12phpfw** but basics are same. B12phpfw is better for large sites.             




<br /><br /><br /><br /><a name="swfw"></a>
## 3\.5 What is SW fw (Software framework)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....**SW fw**   

See "What is SW fw (Software framework)" (using mkd in fwphp/glomodul/mkd/02/01\_fwphp/**PHP_DIP\_DI.txt/**)  which states :        

1. Provides a STANDARD WAY TO BUILD and deploy applications     
2. Is abstraction in which SW providing GENERIC FUNCTIONALITY can be selectively applied / supplemented (NOT changed!!) by user-written code, providing appl-specific SW.       
   IoC  (inversion of control) is **key difference fw - library of reusable code** : does your code call into a fw, or does it plug something into fw, and then fw calls back ?      
   Code flow (of control messages) in sw fw is dictated by sw fw, not by the caller method.
3. Is universal, REUSABLE SW environment that provides particular functionality as part of a larger SW platform to facilitate development of SW applications     

Code flow terms : DI is about **code flow tie - wiring**, IoC is about **code flow direction**, and DIP is about **code flow shape**.      

1. DI (Dependency Injection) is about how one code object knows about another, dependent object (master table does not know about its details which have FK - knowlege about master).
   DI is about **how dependent (lower) object acquires a dependency (higher) object**.      
2. IoC (Inversion of Control) is about **who initiates the call**. If your code initiates a call, it is not IoC.     
   If  the container/system/library/fw calls back into code that you provided, it is IoC.      
   If  B12phpfw OUR CODE in Home\_ctr extends Config\_allsites \_\_construct($pp1) contains code 
   **$akc = $this->uriq->i ; $this->$akc() ; **   - it is in fact NOT OUR CODE but fw core code - pure IoC :
    1. can easily be moved  in framework core (ee in parent constructor)
    2. but is more clear then if it were (hidden) in parent constructor 
    3. allows us to also, beside from fw core, call / include something (which will never be needed) 
3. DIP (Dependency Inversion Principle) is about the **level of the abstraction** in messages sent from your code to the thing it is calling.       
   Eg high-level module A --- uses ---> low-level module B.      
   When applying DIP, both modules --- depend ---> on abstraction - interface, so A and B can be built, used, deployed independently    
   (note that **in UML diagrams all arrows point to dependency**) 
   Eg High-level module (your business logic) defines DB CRUD interface "ClientRepository" which contains the methods the business logic needs.     
   Then a "MySQLClientRepository" DB CRUD concretion implements that interface and uses a database library to submit the queries.     
   Because I did not yet realized ideas above, for now B12phpfw has : cc, rr, uu, dd methods which are global like in Oracle FORMS form module .fmb (using or not on-insert, on-update...)
   Example in fwphp/glomodul/z_examples/02_mvc/domain_model/ seems to me tipical not enough explained strong talk, week doing (not suitable for each form in own dir) :        
   1. http://www.sitepoint.com/building-a-domain-model/ February 24, 2012  By Alejandro Gervasio - last cry in frameworks night (unnecessary complicated ?)
   2. https://www.sitepoint.com/integrating-the-data-mappers/
   3. https://www.sitepoint.com/handling-collections-of-aggregate-roots/
   4. https://www.sitepoint.com/an-introduction-to-services/

To be sure, use DI or IoC with DIP.     


> B12phpfw means: B=table rows blocks for CRUD like in Oracle Forms eg invoice.fmb master (B1) and detail rows (B2).     
> 12 = steps of code flow must be clear, good explained.  **cs01 means code flow step 1.**       
> phpfw = PHP framework = code skeleton for menus & CRUD (and many other functionalities,      

I never understood enough fw authors explanations which is one of reasons why I do not believe them).   


<br /><br /><br /><br />
Code is small and simple but needs :      
> few hours (advanced user) - days (intermediate) - weeks/months (beginner) to understand it.           
**Understand code is must for any good code skeleton !**       

> **Clean code** : "Any fool can write code that a computer can understand. Good programmers write code that humans can understand." (Martin Fowler).
> 
> When you are dead, you don't know that you are dead. It is difﬁcult only for the others. It is the same when you are lazy (or stupid).
> 
> "Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live." (John Woods).
> adapter
> "Clean code reads like well-written prose" (Grady Booch). Good code reads close to natural speech.

> **Naming** is the best tool we have to express what we do in code (avoid comments). Classes and variables are nouns: Price, CurrentTrade. Booleans are predicates: isScheduled, isRunning. Methods should start with a verb: getStrategyResult, createStrategyResult. Common naming errors : Very small names ( $tr, dd() ),
Names that are not real words ($dgrtty), Methods that are nouns.




<br /><br /><br /><br />
## 1\.3 Project notable goals  - reasons
Notable package does something special, is also frequently innovative. 

1. I developed B12phpfw in my free time (my work for last 20 years was :  Oracle Forms & Reports 6i and Crystal reports. We wanted migrate them to PHP - never happend      
    because **I cound not find near so good** tool as abandoned Oracle Forms 6i - shame.  See also below "...compared to all PHP frameworks...".     
    - https://github.com/panique/mini3 is good but to simple.      
    - OOP PHP. CMS blog Video (7.7 GB) Jazeb Akram (Udemy) is good but older programming style
    - other books / videos / inet tutorials same plus routing to complicated, does not work... (authors understand own code ?). 
      Slim routing if app is below web server doc root is not clear before 2021 year version !
   
2. B12phpfw is good for developing **large sites** (more of them under web server root dir. path).

3. ***Innovative*** is : 
   1. each module in own folder like Oracle Forms \>= 6i form, Blazor and APEX pages ee no M,V,C folders
   2. routing : URL parts in key-keyvalue form
   3. dispatching : call or include like https://github.com/panique/mini3
   4. **simple module** - one table CRUD eg "users" table or **compound module** - more tables CRUD eg my msg (Blog) module or invoice... 

4. Compared to all PHP frameworks and learning sources  : 
   1. clean code, easier to understand (as much as possible)
   2. smallest code
   3. reusable (**globals on site level or below** - shares, commons, includes)
   4. namespaces for autoloading classes scripts - own solution
   5. routing (URL disassembled in parts in key-value form) and dispatching (call or include) - own solution
   6. PHP PDO CRUD (Create, Read, Upd, Del) on **any DB** - own solution
       1. **simple module** eg "users" table rows 
       2. or **compound module** eg my msg (Blog) module or invoice... 
   7. own debugging to find logical errors (Xdebug is not enough - shows only sintax errors) - own solution
   
5. Based on best PHP learning code I could find. See [web server root dir. path]fwphp/glomodul/z_examples, where :    
    1. my [web server root dir. path] is J:/awww/www/ which contains vendor folder
    2.  fwphp is site dir     
    3. glomodul dir is group of modules    
    4. z_examples dir is subgroup of modules  
    https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples - to do make them best possible.

Conclusion : B12phpfw is most useful for CRUD in msg-blog and simmilar modules, so it is **precisely B12phpCRUDfw**. For mnu and mkd markdown WYSIWYG editor and simmilar modules we **do not nead B12phpfw** code skeleton, but I did it.     

**Includes and method calls instead URL jumps (http// jump to pages)** - this is interesting question. http// jump to pages in B12phpfw is used only to jump somethimes  in other module.

It is a shame that Oracle does not support the latest client-server SW Forms6i (replacement for the infamous Power objects) and Reports6i, but only the WEB version, which has repeatedly changed some basic functionalities (incompatibilities as with Microsoft tools) and which, for smaller companies, has too many flaws . Why does the WEB version of F6i, R6i not generate something like razor code or PHP code that do not need several servers and have no problem with large Java libraries, with starting...
(The simplest Blazor form (#ID, name) is ~ 6 MB, PHP form 6 kB !)

Mr. Ferrante says "strongly discourage" which means "with the lure of Power objects, F6i, R6i..." we have hooked you on expensive and for smaller businesses inappropriate SW.

Is this the reason why few developers start new projects with Oracle Forms, the transition from Oracle to Java, APEX (declarative programming with attributes - can clicking be done seriously!?) . These are harmful wanderings similar to those of Microsoft, which is unable to explain the basics of, for example, Blazor without killing several months of hard work for a student?

Do Microsoft, Oracle and other manufacturers of SW tools have anyone from real life who can save us from their children's games?




<br /><br /><br /><br />
## 1\.4 To do - done

Done : 
1. Code logic like Oracle Forms.
2. Modules mnu (main menu), msg (blog), mkd (WYSIWYG markdown editor, with Simplemde or with Summernote HTML).
3. FUNCTIONAL namespaces - last part is **module folder name**, parts before last part code ignores, should be **functionality description** :    
    1. namespace B12phpfw\\core\\b12phpfw       **shares** in b12phpfw dir
    2. namespace B12phpfw\\site_home\\www ;   **Mnu** module
    3. namespace B12phpfw\\module\\blog ;         **Msg** module      
    4. namespace B12phpfw\flatFilesEd\\mkd ;     **Mkd** module
    Namespace last part and class name concatenated to some dir in index.php gives class script path to automatic include - see below Autoload class code.
4. CRUD PDO trait
5. pretty URL-s only php, without web server magic

I not intend to do :
1. TO DO Grid with updatable fields, I think, is not needed, but could be useful.
2. TO DO No charts - see other learning sources.  
3. TO DO Details like data formats (**page fields should be all characters** like in Oracle APEX), computations... are easy to find in other learning sources.  
4. TO DO More security.

Difficult parts are : 
1. **DONE** Navigation - links - I think this is ok.
2. TO DO PDO CRUD for more DBI eg : MySQL (DONE), Oracle (DONE)... or TO DO any DB with DB adapter code like for MySQL and Oracle. 
       I did only basic code - is working - should be improved.   
3. Tables : sorting, cols filtering, rows filtering. I have only basic code - working - should be improved.      

### TO DO / DONE :

version 8.0.0.0 means (https://semver.org/) :     
- 8 is main ver. (refactored core code)
- 1st 0 is MAJOR incompatible API changes eg DB change
- 2nd 0 is MINOR backwards compatible code change
- 3rd 0 is PATCH  ee error correction change

November 2021. Current version code is 8.  Msg module version 8 is not finished, but is visible what should be done during next few months (Mkd ver. 8 was finished in half hour, Mnu simmilar, Msg needs much more time because of bootstrap 5, improve CRUD sintax...).     
See http://phporacle.eu5.net/ (freehostingeu - fast, stable, has free MySQL) how it should work.    

What’s new in version 8.1.0.0 :       
User (TODO: or any) module may be caled from blog module so http://dev1:8083/fwphp/glomodul/blog/?i/home/p/1/ -> login -> tables (dashboard) ->admins       
but also **independent of some compound module** so :  http://dev1:8083/fwphp/glomodul/user/ .      

What’s new in version 8.0.0.0 :      

1. **Autoload.php** is refactored, much simpler, see old z_NOT_USED_TO_COMPLICATED_Autoload_1stVersion.php
    This is good case showing that first code versions are to complicated code – very frequent case – which is one of reasons why I have 8 versions.
2. **Shares** are not any more in /zinc folder but in in /vendor folder eg shared class /vendor/b12phpfw/Autoload.php (below web server doc root eg J:\awww\www\). 
    Site root(s) are on same place in folders hierarchy eg \fwphp (may be named site_x). 
    Also group of modules are on same place in folders hierarchy eg  \fwphp\glomodul. 
    Also modules are on same place in folders hierarchy eg  \fwphp\glomodul\blog – dir like oracle Forms form module.
3. **Views are classes** - clearer and cleaner code than **include scripts and URL jumps** - eg Upd class as include script was complicated.
4. Improve CRUD sintax - **Tbl_crud** DB adapters in module dirs should contain most code which is now in view scripts. 
    Global code snippets are in global methods where possible.
5. Improve **links aliases** in Home_ctr and in view scripts
6. **PHP 8** (ver. 7 still works) and **Bootsrap 5**

2021.08.28 ver 7.0.5 : I added  **folder (module) WEBSERVERROOT/fwphp/glomodul/img_gallery**     
    J:\\awww\\www is my WEBSERVERROOT.    
    J:\\awww\\www\\fwphp is MYDEVSITEROOT1. You may have more MYDEVSITEROOT2, 3... See how in **WEBSERVERROOT/index_laragon.php** script.    
    glomodul is group of folders - modules which are not 01mater or 02financ or 03...  glomodul may be named othermodules.     
    img_gallery module is **first lesson** about (theory behind) code skeleton (application architecture) B12phpfw     
    

2020.09.30 **DONE version 7.0.0.0** 
    1. declare(strict_types=1) ; - PHP 7
    2.  DBI improved : **trait Db_allsites** instead class Db_allsites. 
    3. Each DB table (persistent storage) has adapter **class Tbl_crud :**  which uses B12phpfw\core\vendor/B12phpfw\Db_allsites  and  implements Interf_Tbl_crud
       This means that :
       1. Module's views or ctrs, eg blog module (see blog folder) work much easier with more Tbl_crud, ee with own Tbl_crud and with other tables Tbl_crud's.
       2. class Home_ctr extends class Config_allsites. ( **Logically all is in Home_ctr**).


2020.09.05 **DONE** On Linux demo sites : some PHP statement works different than on Windows (about dozen incompatibilities), eg links do not work in msg module, but work in mnu and mkd modules)  :   DONE in wsroot_path\vendor/b12phpfw\Config_allsites.php :  
Error on Linux not on Windows : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);  
No error on both OS : $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;  
    

##  [xampp](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.6/)

I use xampp-portable-windows-x64-8.1.5-0-VS16.7z  92 Mb or newer on newest Windows 10, 64 bit.
No more : Laragon portable laragon.7z, 19 MB.  No more WAMP because is not fully portable,  Composer needs coding displayed below and it is only for Windows. It seems WAMP and Laragon not giving newest/simplest solutions as xampp does.

        WAMP does not like PHP in Windows PATH variable, so :
        1. I installed Composer-Setup.exe and removed PHP from PATH. 
        2. **C:\composer\composer7.bat** :
        ```
        @echo OFF  
        :: in case DelayedExpansion is on and a path contains ! 
        setlocal DISABLEDELAYEDEXPANSION
        J:\wamp64\bin\php\php7.2.9\php.exe "%~dp0composer.phar" %*
        ```
        Save file along with the originally installed composer.bat file.
    
        3. Now call the php7 composer with the new command:
        ```
        In Windows CLI, cd J:\awww\www and as admin : 
           composer7 selfupdate   (1.8.4, 2019-02-25, Use composer self-update --rollback to return to version 1.7.3)
           composer7 update
        ```




***  
## Links
https://kevinsmith.io/modern-php-without-a-framework/           
https://github.com/PatrickLouys/no-framework-tutorial           
https://github.com/mmeyer724/Frameworkless        

https://symfony.com/doc/current/create_framework/index.html

http://dev1:8083/fwphp/glomodul/mkd/?edit=001_MDcheatsheet.txt        

http://dev1:8083/fwphp/www/      
http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/01_oracle_DB_18c_instalac.txt        
http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/02_oracle_APEX_20_1_instalac.txt           
http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/03_1oracle_apex_sales_module.txt             
http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/03_2oracle_apex_sales_apl_cloud.txt            

http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/devsuite10g_instalac.txt           
http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/devsuite10g_F6i_to_apex.txt              


http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_vbox/001_instalac_moj_vbox_oralin76.mkd          
http://dev1:8083/fwphp/glomodul/mkd/?showhtml=J:/awww/www/readme.md             



[Top](#top).....<a href="#directories" id="lnkdirectories">Dirs</a>.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)           


[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)        

See http://dev1:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme_thoughts.md for my earlier thoughts.          

