---
<a name="top"></a>
**Top**.....[1\.4 Dirs](#directories).....[1\.3 UML](#uml).....[1\.5 DM](#dm).....[2\. IDE](#ide).....[3\. CRUD](#crud).....[SW fw](#swfw)   
CRUD module example code 7 scripts:  
[Simplest CRUD](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)   
# 1. My PHP menu & CRUD code skeleton (I named it B12phpfw)


-----





<br><br><br>




-----






<br /><br />
<a name="directories"></a>
## 1\.4 B12phpfw directories (modules) structure
[Top](#top).....**Dirs**.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   


<br />        
       
<br />

         _.-'''''-._
       .'  _     _  '.
      /   (o)   (o)   \
     |                 |
     |  \           /  |
      \  '.       .'  /
       '.  ''---''  .'
         '-._____.-' 



## <a name="dm"></a>1\.5 DM (Domain model)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....**DM**.....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   



<br /><br /><a name="SimplestCRUD"></a>
## Simplest user CRUD module - 7 scripts which are in all CRUD modules (same named)
**SimplestCRUD**.....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    



<a name="scrudIndex"></a>
### 1\.5\.1 index.php
[Simplest CRUD](#SimplestCRUD).....**index.php**.....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU) ....[adapter](#scrudadapter)   

```php

```

<a name="scrudHome_ctr"></a>
### 1\.5\.2 Home_ctr.php router, dispatcher
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....**Home_ctr**.....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php

```


<a name="scrudHomeV"></a>
### 1\.5\.3 home.php - shows links assigned in Home_ctr.php for user interactions
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....**home (table page.....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php


```


<a name="scrudC"></a>
### 1\.5\.4 create.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....**create**.....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php

```


<a name="scrudR"></a>
### 1\.5\.5 read.php - display user profile
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....**read (user profile - form**.....[update](#scrudU)....[adapter](#scrudadapter)    

curl -s https://api.github.com/markdown/raw -X "POST" -H "Content-Type: text/plain" --data-binary "@J:/awww/www/readme.md" >> "C:\Users\ss\AppData\Local\Temp\readme.htm"

See J:\\awww\\www\\vendor\\erusev\\parsedown\\styles>md2h.bat

```php

```



<a name="scrudU"></a>
### 1\.5\.6 update.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....**update**....[adapter](#scrudadapter)   

```php

```


<a name="scrudadapter"></a>
### 1\.5\.7 Tbl_crud.php - ORM, DM (Domain Model) adapter cls - pre CRUD class
[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....**[adapter]**

```php

```


<br /><br /><a name="ide"></a>
# 2\. My developing environment (IDE)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....**IDE**.....[CRUD](#crud).....[SW fw](#swfw)   



  
<br /><br /><br /><a name="crud"></a>
# 3\. PHP 7, Bootstrap 4 : DB tbls rows PDO CRUD
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....[IDE](#ide).....**CRUD**.....[SW fw](#swfw)   

May be jQuery, PHP, Bootstrap AJAX DB table rows CRUD is simplest, fastest best CRUD but I prefer no jQuery AJAX . Only Javascript I need is dialog yes or no.

CRUD db tables rows modules like my msg (blog) should be based on code skeleton shown in  UML diagram. Non CRUD modules like my mnu and mkd : without such code skeleton **may be code is simpler ?** If mnu module (which is links to pages / modules) needs CRUD functionality (I think never needs), we should base it on code skeleton shown in  UML diagram. Both global db classes are ~400 lines, global config class is ~400 lines - they are so small that may be included in any module. 

Interesting detail (solved): Msg (blog) module has no problem, but in Mnu module global ftr.php displays: Fatal error: Uncaught Error: Using $this when not in object context in J:\awww\www\zinc\ftr.php       


<br /><br />
**$do\_pgntion attribute** in class Dbconn\_allsites is used in **module msg ee blog**  fwphp\glomodul\blog, in home.php, home_side_area.php and dashboard.php eg so :     
```
self::$do_pgntion = '1'; //command for all tables global read fn "rr" to read paginated ee to read rows block (recordset)
$cursor = $this->rr("SELECT * FROM posts ORDER BY datetime desc", $binds, __FILE__ .' '.', ln '. __LINE__ ) ;
```

There are not many important PHP statements in classes above, but we must understand them !!       
Understand means learn all **conventions** (which are more important then **configurations**). Eg :       

**../../../** is path to www dir ee to web server or to ISP (inet hosting) folder.       

**$pp1** is properties global container array like Oracle forms property palette.     

In msg (blog) module are two masters (usr, category) 1:M posts rows, and two level of details posts 1:M comments.     

**R O U T I N G  T A B L E  is in Property Palette array $this->pp1** assigned in class Home_ctr which extends Config_allsites     

After **i/** is method in this->Home_ctr which **includes/calls** same named (or not) script/method or calls some (global method) or...     

**QS=?**=url adress Query separator (url query is key-value pairs). Without QS we must use **Apache mod-rewrite** and Composer auto loading classes instead **own simple-fast auto loading**.        

**DISPATCHER**  includes, calls or **http jumps only to other module**. So **we may not use constants** but module property palette $pp1 which contains globals ! **to be able to change $pp1 elements**.

**cc, rr, uu, dd** rows CRUD methods are used for all tables  on level "all sites" !!

# 3\.1 B12phpfw core (CRUD) code
Core framework code we change only for new functionality and testing.

Core framework code is module bootstrap, configuration, router, dispatcher - see Domain model [DM](#dm) for 7 module scripts which use it.    

Three module scripts (index.php, two classes Home_ctr.php extends Config_allsites,  Tbl_crud.php) and four classes scripts global for all sites (autoload, 2xDB, conf) are  B12phpfw core (programs **skeleton** for links = menus and for CRUD). Like any good programing **templates (framework)**, it is not easy to understand them but is very useful !!        

1. GLOBAL FOR ALL SITES SCRIPT 4: Autoload.php Autoload.php,150 lines, contains autoload class which includes :
   1. namespaced classes **shared** (global) for all sites
   2. or **module** classes
   3. or **external** classes

2. GLOBAL FOR ALL SITES SCRIPT 3. :   **Dbconn_allsites**.php 60 lines.
   Singleton dbconnect to Oracle or MySQL or... Singleton means that method "get\_or\_new" called many times instatiates class Db\_allsites only once ee for each start of index.php. TODO: if possible do this code better.  **This code knows PDO DBI exsistance ee is data source DB or service or csv or...**     

3. GLOBAL FOR ALL SITES SCRIPT 2: **Db_allsites**.php 350 lines  extends Dbconn_allsites.
   Contains global PDO CRUD class which contains 4 CRUD methods for any table : cc, rr, uu, dd.  **This code knows PDO DBI exsistance ee is data source DB or service or csv or...**     

4. GLOBAL FOR ALL SITES SCRIPT 1: **Config_allsites**.php  550 lines (with comments), contains global configs class which extends Db_allsites.



  
  
<br /><br /><br />
### WHY
Nobody made OOP MVC menu and CRUD PHP code skeleton (especially for each module in own folder) **clear and readable, instantly visible that it is best way** of coding - hence so much blah-blah. Modules for master-detail and link tables are even more rare. Strong-talk-weak-work people pollute info space wit hypes, vapor wares... because of ignorance or to promote himself, to earn money.

### To simple examples plague (in 99% learning materials)
Other reason : I tested ideas which seemed good, but after I added functionality (huge work !!), code was to complicated. This is why **to simple examples (in 99% learning materials) are bad idea !!**. We see if code (skeleton) is ok ONLY on **not to simple code examples (and on more of them)**. Code elements (snippets, mosaic pieces) must be as simple as possible but referencing - looking at not to simple example ! 

I think main reason for pretty URL-s is much simpler routing. Using $\_GET variables for routing is in my experience. ok only for simple modules like my mnu, mkd, lsweb, but not for msg or oraedoop modules.

> **Routing** - finding in URL what code call or include (calls/links constructing)  
> and **dispatching** - call or include code  
> was **nightmare** in all B12phpfw versions before 6.0 !! - **main reason for so many versions**.

My pretty URL-s are key-value pairs, so no need for "controller/action/param1/param2..." url style ee order of url pairs is as we wish. Next Notepad++ display shows how routing is **in 3 simple steps, all routings are so simple**. I do not like routing-dispatching I found during learning, next is what I think best dispatching.

**DISPATCHING HTML DISPLAY OF MARKDOWN FILE IN MSG (BLOG) MODULE ( Routing is in Config\_allsites.php ~30 lines code)** :

    Search "readmkdpost" (4 hits in 2 files)
      J:\awww\www\fwphp\glomodul\blog\Home_ctr.php (3 hits)
        Line 41:        $this->pp1->readmkdpost = QS.'i/readmkdpost/' ;
        Line 277:   private function readmkdpost($fle_to_displ_path)
      J:\awww\www\fwphp\glomodul\post\read_post.php (1 hit)
        Line 123:                   $this->readmkdpost($mkdflename);
    Search "readmkdpost" (5 hits in 2 files)

Explanation of code above :

1.  Routing table in Home\_ctr.php assigns  
    $this->pp1->readmkdpost = QS.'i/readmkdpost/' ; // key-value pair is i, readmkdpost , QS='?', $pp1=property palette = global parameters array.  
    Without QS (url adress Query Separator) we must use Apache mod-rewrite and Composer auto loading classes instead own simple-fast auto loading.  
    I tested Apache mod-rewrite and Composer auto loading classes in previous versions - worked, but we really do not need this complication.
2.  read\_post.php calls private function readmkdpost($fle\_to\_displ\_path) in Home\_ctr.php (uppercse script name means class script)
3.  readmkdpost method in Home\_ctr.php calss Parsedown text method to echo HTML of mkd txt (eg of J:/awww/www/fwphp/glomodul/blog/msgmkd/001. Menu\_CRUD.txt) :  
    echo $pdown->text(file\_get\_contents($fle\_to\_displ\_path)) ;


### WHAT

1. FW core code - **globals for all sites** in zinc directory is less than 50 kB. Site fwphp (wit many learning examples) is 4 MB like Bludit flat files CMS.  
   OctoberCMS site (not better, less pages) based on Laravel framework is ~20 times bigger, has complicated settings (Dashboard, control panel like Yoomla).
    
2. Do not fear of lot of global and module variables. Module and global config classes Home\_ctr.php and Config\_allsites.php are like Oracle Forms Property palette, but better.
    
Most important modules are :      
    
2.  **mnu module** [https://github.com/slavkoss/fwphp/tree/master/fwphp/www](https://github.com/slavkoss/fwphp/tree/master/fwphp/www) = main menu for groups of modules (home of site "fwphp" ). Like mkd module it is not B12phpfw CODE CONFIGURATION - not needed for simple modules.     

3.  **blog = msg module** See readme.md in  [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/blog](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/blog) 
See first easier to understand:
 **adrs module based on Mini3** PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good work). My **routing using key-values** is different but **dispatching using home class methods** is based on mini3. This is CRUD of one table songs - ee of URL-s (adresses) of youtube songs. Songs can be played clicking on link. [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs)               

4.  **mkd module** is used in msg (blog) module to dispatch (include) html display of post in markdown file. [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/mkd](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/mkd) = markdown WYSIWYG editor (SimpleMDE & Parsedown) Parsedown sintax highlighting [https://highlightjs.org/download/](https://highlightjs.org/download/) : \`\`\`css hljs.initHighlightingOnLoad(); \`\`\` mkd module is good to learn OOP programming (commented in index.php because for simple view scripts we do not need OOP). Simmilar small code is for Summernote HTML text WYSIWYG editor as for Markdown WYSIWYG markdown text editor which I use .         

5.  **lsweb module** is utility to all sites navigation and run php scripts, good for z\_examples dir (group of modules) which are not in mnu module links [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/lsweb](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/lsweb)          

6.  **oraedoop** is utility to all tables edit and export. Lot of session variables.          

8.  Many learning examples are in **modules in learn directory z\_examples** [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\\\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples)

 
  

### HOW
Important is to learn :

1.  code skeleton,
2.  globals,
3.  how to include class script and instantiate contained class ("new" command) - namespaces, PSR-4 autoloading (was tested, still possible ?), class methods parameters in global parameters array $pp1
4.  how to include script (http jumps only to other modules), if you (as I) choose that not all included scripts are classes.

Home controller's methods include scripts or call methods according URL query parameters (uriq object). Important is that home controller's methods enable us to put some parameters in home controller's methods instead in URL - simple and clear coding.  
Routing table contains almost all module-in-own-folder\`s links. It is some more coding but code is very simple and clear.

### WHERE
Directories :

1.  **zinc** = includes, assets, framework core
2.  **fwphp** better named modules (we may use any name) = **site** = modules groups (unlimited levels) and modules :
    1.  modules groups are dirs eg glomodul, z\_examples...
    2.  modules like Oracle Forms are subdirs of modules groups dirs, eg www, adrs, blog, lsweb, mkd, post, user... There are no 3 dirs M, V, C for all modules ! Web server doc root (our hosting provider dir) eg J:\\awww\\www is all sites root (I have only fwphp site).

### WHO, WHEN
I tested more than 6 versions of mnu, mkd and msg modules based on other people work mentioned below. Lot, lot of work wasted during dozen years (thanks parasits) because of strong-talk-weak-work people. There is lot of details to do for which I had no time but can be easily built on grounds given here.

  
  
  

<br /><br /><br />


<br /><br /><br /><br /><a name="swfw"></a>
# What is SW fw (Software framework)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....**SW fw**   

    

***  
## Links
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

 (font Century Gothic 16)  

[Top](#top).....<a href="#directories" id="lnkdirectories">Dirs</a>.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   


[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)     

