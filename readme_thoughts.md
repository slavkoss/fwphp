Explanations below are difficult to understand. They are "after battle philosophy" very useful to improve basic ideas (principles).


---
<a name="top"></a>
**Top**.....[1\.4 Dirs](#directories).....[1\.3 UML](#uml).....[1\.5 DM](#dm).....[2\. IDE](#ide).....[3\. CRUD](#crud).....[SW fw](#swfw)   
CRUD module example code 7 scripts:  
[Simplest CRUD](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)   
# 1. My PHP menu & CRUD code skeleton (I named it B12phpfw)


-----





<br><br><br>




-----







## <a name="dm"></a>1\.8 DM (Domain model)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....**DM**.....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

[UML diagram](#uml)  above does not show DM adapter classes. Each  tbl in DB (ee each object in data source eg web servis...) has DM adapter class **Tbl_crud** which is **pre CRUD code - calls cc, rr, uu, dd... methods** like in Oracle Forms **pre-query, pre-insert, pre-update... on-insert, on-update...**.

In Db_allsites class is **eg execute-query code** - only creates cursor to (loop) read row by row in view scripts or in ctr scripts).        

### Events flow (E1) --- (E2)... - caseflow through Blog module (CRUD data skeleton)
```
(E1) User types URL --- index.php instantiates C (Home_ctr, App...) --- C calls own method, see (T1) - signals flow
(E2) Home_ctr own method includes (E3) V (home.php) - signals flow  V --URL--> C
                        |
                        --  OR --calls--> some method (eg delete row) - signals flow C --parameters -->method
                        |
                        -- OR URL jumps in other module - signals flow in _GET (=URL query) or _POST global arrays

(E3) V (home.php view script) --- V calls DM see (T2), ee V calls Tbl_crud to <==pull== array (of row objects) from data source (T3) - DATA FLOW
         |
         -- if user cliks link or button or types URL --- it is event (E1) - signals flow V --URL--> C - ee user adds INTERACTIVITY (T4) in C which requires ROUTING.
```

#### Terms
(T1) Own controller method is Mini3 PHP framework **dispatching** idea using home class methods (My **routing using key-values** is different)      

(T2) **DM** (Domain Model) are classes :
1. Tbl_crud (**users table PdoAdapter**) called by V script - **pre CRUD (PRE-INSERT, PRE-UPDATE...) methods** cc, rr, uu, dd
2. Db_allsites (**AbstractDataMapper**) called by Tbl_crud - same for all tables, contains **CRUD (ON-INSERT, ON-UPDATE...) methods** cc, rr, uu, dd

(T3) **DS (data source)** -  tbl row objects from DB or web service, or.... Only DM classes know about DS. CRUD code skeletons calls DM classes FUNCTIONALY ee WHAT ee "get invoice items", not HOW and from which DS. DS is assigned only once in config class abstract class Config_allsites extends Db_allsites (and class Home_ctr extends Config_allsites). 

(T4)  User **INTERACTIVITY** (cliks link or button or types URL) requires ROUTING in C ee C (Home_ctr) is not needed for Mnu module, even for Mkd module - enough is simple controller code snippet. 


<br /><br />
### Signals, data and code flow
Graph 4 node (vrh), 7 edge (brid, border, boudary). Graph is simmilar to Euler's 4 Königsberg  city parts (nodes) and 7 bridges (edges) - Chinese postman **transport problem** - how to Euler walk to cross each  bridge (edge)  only once. Traveler sailsman problem is : how to shortest walk graph to cross each  city part (node)  at least once and return to start node. 

```
Db_allsites, Tbl_crud_crud     _.-'(DM)'-._       Domain Model
                          .'/          '.
                   calls / /DATA         \C includes V, before inc. C can manipulate M (state changes)
DM updates V           (V) -----URL-----> (C)  View (home.php) and Controller (Home_ctr)
V calls DM              |  \              |
V sees URL              \  \              /U uses C - sends URL (signal) to C through link in V
                       URL'. \HTML      .'
                            '-._(U)_.-'User types URL or cliks link or button
```

Picture shows M-V data flow. Model code is most complicated. **C and V code can be standardized, M only partially** :      

**M in B12phpfw is DM (Domain Model)** meaning eg for users table :     

M consists of :
1. abstract class Db_allsites which is same for all tables (cc, rr, uu, dd methods are standardized)
2. and class Tbl_crud - **bussines logic** in this M code can not be standardized. This M code is most complicated, it is fat (lot of code)

User`s events are handled in Controller class.
1. C (class Home_ctr) assigns users orders in URL to array variables telling V what user wants (signals flow) and includes V 
2. **V pulls data from M data source (DB or web servis or...)** (calls Tbl_crud which calls Db_allsites) according C variables (user orders in URL)
3. V links ee user orders in URL call C method which can do some state changes in M data

V script may contain class but I do not see need for view classes because view script is included in Home_ctr class and can use $this to access methods and attributes in whole class hierarchy : Home_ctr, Config_allsites, Db_allsites. If we do not need CRUD than we do not need class hierarchy Home_ctr, Config_allsites, Db_allsites meaning that simple coding like in Mnu and Mkd modules suffices..

M-C-V data flow - controller instantiates M and pushes M data to V.
I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow is only possible solution, M-C-V data flow makes C fat in large modules (lot of code). C in my Msg (Blog) module has lot of code, but code is very simple.

So view instantiates model and pulls data from M or C instantiates model and pulls data from M.  Both styles work ok, difference is important only for us - for clearer code.

If we have user`s interactions (events) eg filter displayed rows (**pagination is also filtering**), than **M-V data flow is only possible** solution (M-V data flow is original MVC idea). 


















## 1\.5 Adresses on op.system and on web are difficult to understand
and bad explained in all PHP frameworks and learning sources.

See readme_thoughts.md


1. My **developing** web server root dir. path:  wsroot_path = **J:\\awww\\www** . wsroot_url = http://dev1:8083 or http://localhost:8083 !! (dev1 is Apache vitual host).  
   For **testing**  wsroot_path = `J:\ylaragon\www` , wsroot_url =  http://dev1:8083 or http://localhost:8083 !!
   For **production** are Linux demo sites, see below.  

2. For mnu module **module_url** = http://dev1:8083/fwphp/www/ so module_towsroot = '../../' - I do not use it for mnu and mkd. 
   **$module_towsroot** variable in index.php is** always same value for both variables wsroot_path and wsroot_url**.
   For msg module in index.php : ** $module_towsroot = '../../../' ;** because module_path = J:\awww\www\fwphp\glomodul\blog and three times "../" means **path from blog dir to www dir ee to wsroot_path = 3 times up**.  So module_url = http://dev1:8083/fwphp/glomodul\blog  and 3 times up is http://dev1:8083 = wsroot_url.


IIS wsroot_path = %SystemDrive%\\inetpub\\wwwroot = http://localhost, see Win icon -> IIS manager. For APEX learning on Oracle cloud open  https://apex.oracle.com/en/ click link "Get started" and install few demo apps before making own based on eg Riaz Ahmed 2020 year "Oracle APEX 20 For Beginners" (on 18c XE DB) .






<br><br><br>
Package contains modules (folders) in ownWebServer_or_hosting_DOCROOT_PATH = "/". My DOCROOT_PATHs ('/') are :

1. on Windows my home PC Apache virtual host `J:\awww\www` for development and `J:\ylaragon\www` for testing
2. on Linux free demo sites for production /phporacle.eu5.net on Freehostingeu and /home/slavkoss/public_html on Heliohost - you can easily make own.
3. on Oracle Linux on my home PC Virtual Box machine

Each module is in own (functional) folder like Oracle Forms someForm.fmb, Blazor and APEX pages - is best to develop more large sites. Oracle Forms authors knew this 2 dozen years ago.

No M,V,C folders which, seems are mistake, delusion : putting coding technik (M,V,C code separation) in foreground instead pages (each page in own folder = module). M,V,C code separation idea is beter explained good old structured programming idea - M and V code manager = C, processing code may be M = CRUD DB table rows, output code = V. M,V,C code in one script is valid MVC coding ! 

Interesting is that PHP frameworks authors and learning code authors do not even mention **M,V,C folders reflecting code separation in opposition (antithesis) to functional folders - modules reflecting business functions (business logic)**. Is it one sells what one has ee no lies, no sells ? If is, is ugly.

First "/" in paths below is ownWebServer_or_hosting_DOCROOT_PATH. Modules (functional folders) are :

1. 50 kB "mnu" module, in folder /fwphp/www, is Main Menu code. "fwphp" folder is one site (may be more sites on same folder level). "www" folder is mnu module. Is not based on core CRUD code skeleton (possible, but not need). 

2. 60 kB "mkd" module, in folder /fwphp/glomodul/mkd, to write help pages in Markdown WYSIWYG editor (plus Simplemde code, or may be HTML editor Summernote code or ...), with mkd2html and html2mkd conversion. Is not based on core CRUD code skeleton (possible, but not need).

"fwphp" folder is one site, "glomodul" is group of shared modules reused in other modules, or testing modules or...

3. 90 kB, "core" module in folder /zinc is CRUD code skeleton (I call it B12phpfw) is shared (global) for all sites. "core" module is in folders /zinc 90 kB plus /zinc/themes (bootstrap) 392 kB and /zinc/img 200 kB (my /zinc/img/img_big is 30 MB but is not in this package).

4. 86 kB  "msg" or "blog" module in folder /fwphp/glomodul/**msg** 86 kB. Blog Is based on "core" CRUD code skeleton like every CRUD module should be.
   Uses   core (**zinc**) shares, two master modules (tbls) = $app_dir_path.'/**user**/'  100 kB and $app_dir_path.'/**post_category**/' 10kB, two detail & subdet modules (tbls)  $app_dir_path.'/**post**/' 50 kB and $app_dir_path.'/**post_comment**/' 15 kB  
   where app_dir_path is glomodul dir = application dir

5. 3 MB folders - a lot of testing / learning modules. See /fwphp/glomodul/z_examples/00_index_of_important.php






<br><br><br><a name="uml"></a>
# 1\.6 B12phpfw UML diagram - classes structure - Attributes and Methods
[Top](#top)......[Dirs](#directories).....**UML**.....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

## Adapters (implementations - classes or methods) depend on interfaces (features, ports)
**3-layer code skeleton (application architecture) left, center, right :** "The object-oriented version of spaghetti code is, of course, lasagna code'. Too many layers." - Roberto Waltman Mar 7, 2016. HA (hexagonal architecture) is a case of application of DDD (Domain Driven Design) eg verses in OS file :

| **Application-managers-controllers on GUI-CLI input** | **BL** (Business Logic) and **interfaces-features-ports - processing** | **Adapters-implementations-tasks-dependencies  and output** |
| :-------------------------------------------------------: | :------------------------------------------------------------- | :--------------------------------------------------------- |
|    OUTSIDE LEFT  (User-Side) **drive domain** | INSIDE (core, domain, center) **drive infrastructure** |  OUTSIDE RIGHT (**infrastructure**, Server-Side)|
| ConsoleAdapter ---------depends on---------|---> IRequestVerses                                                                | |
|                                                                                                 |......A                                                                                             | |
|                                                                                                 |......l   depends on                                                                    | |                                        
|                                                                                                 |......l                                                                                               | |
|                                                                                                 |......PoetryReader BL class ---> IObtainPoems <---depends on------|--- PoetryLibraryFileAdapter |

### B12phpfw simple module code skeleton (HA) eg users or post categories :
| **Application-managers-controllers on GUI-CLI input** | **BL** (Business Logic) and **interfaces-features-ports - processing** | **Adapters-implementations-tasks-dependencies  and output** |
| :-------------------------------------------------------: | :------------------------------------------------------------- | :--------------------------------------------------------- |
|    OUTSIDE LEFT  (User-Side) **drive domain** | INSIDE (core, domain, center) **drive infrastructure** |  OUTSIDE RIGHT (**infrastructure**, Server-Side)|
| ibrowser, **Home_ctr** ---depends on----------|--->methods to call/inc code ** Interf_Tbl_crud** <---depends on-------|--- DBI: cls **Tbl_crud** one tbl DB adapter (repository) |
|                                                                                                | (Interf_Home_ctr if needed !) (some BL class if needed) | DBI: trait **Db_allsites** : code type DB CRUD ADAPTER |

Concerning business code, the inside, a good idea is to choose to **organize domain modules (or directories) according to business logic**. The ideal case is to be able to open a directory or a business logic module and immediately understand business problems that your program solves; **rather than seeing only “repositories”, “services”, or other “managers” directories or M, V, C dirs**. See https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-2-layers/ Aug 2nd 2017 by Matthias Noback. Matthias said : Simfony  framework was no longer my safe haven, I worked on more basic programming topics, like SOLID and Package Design.  I was fascinated by hexagonal architecture and command buses. **Place for (Simfony)  framework is the Infrastructure layer** and you can fully embrace any kind of RAD-stupid thing your framework offers, as long as it stays inside that layer, and nothing of it trickles down into either the Application or g\*d forbid the Domain layer. 

You can now write alternative adapters for your application's ports. You could run an experiment with a Oracle (Mongo... or in memory) adapter side by side with a MySQL adapter. Specialized adapters for running tests is the main reason why Cockburn proposed the ports & adapters architectural style.

### Dependency Rule - decoupling (code separation) - Dependency Inversion Principle - "D" in SOLID
( https://en.wikipedia.org/wiki/SOLID )
A practical implementation of Dependency Rule "**One should depend upon abstractions, not concretions**." in most object-oriented programming languages :
1. Define an **interface = abstraction** for the thing you want to depend on.
2. Then provide a **class implementing that interface**. This class contains all the low-level details that you've stripped away from the interface, hence, it's the **concretion** this design principle talks about.


[B12phpfw_UMLdiagram.png](B12phpfw_UMLdiagram.png "B12phpfw_UMLdiagram.png")  
![B12phpfw_UMLdiagram.png is less practical and altered](xxxB12phpfw_UMLdiagram.png "B12phpfw_UMLdiagram.png")  

I prefer UML below : 










<br /><br />
<a name="directories"></a>
## 1\.7 B12phpfw directories (modules) structure
[Top](#top).....**Dirs**.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

See **info code :**        
http://phporacle.eu5.net/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php       
https://github.com/slavkoss/fwphp/blob/master/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php        

B12phpfw is very diferent than (all ?) other PHP frameworks (I prefer "menu & CRUD code skeleton") because dirs are like Oracle FORMS form module .fmb and other reasons mentioned below.    
But basics are same : HexArch (Hexagonal architecture) application of DDD (Domain Driven Design) :  example img gallery code https://github.com/oumarkonate/hexagonal-architecture 
1. **application** directory : src/Config contains ~ code in my Config_allsites cls
2. application directory : src/Controller contains ~ code in my  Config_allsites cls  and Home_ctr cls
3. **Domain (model)** code in directory src/Domain contains ~ code in my Db_allsites cls
4. **Infrastructure (or Common)** dir contains dependencies that app code needs to work - my zinc dir
See [**"What is SW fw"**](#swfw).

![B12phpfw favicon DEVELOPMENT DOCROOT](B12phpfw_1DEVELOPMENT_DOCROOT.ico "B12phpfw_1DEVELOPMENT_DOCROOT.ico")  my **DEVELOPMENT DOCROOT** J:\\awww\\www ee http://dev1:8083/   OR       
 ![B12phpfw favicon TEST DOCROOT](B12phpfw_2TEST_DOCROOT.ico "B12phpfw_2TEST_DOCROOT.ico")  **TEST DOCROOT** J:\\ylaragon\\www (was J:\\xampp\\htdocs) ee   http://localhost:8083/  (http://SSPC2:8083/ ) OR       
 ![B12phpfw favicon PRODUCTION DOCROOT](B12phpfw_3PRODUCTION_DOCROOT.ico "B12phpfw_3PRODUCTION_DOCROOT.ico") **PRODUCTION (DEMO) DOCROOT** http://phporacle.eu5.net/       
|   
In Windows **tree /A** shows :
```
+---1. J:\awww\www\index.php redirects to main menu module url /fwphp/www/index.php
|
|
+---2. J:\awww\www\fwphp SITE, group of apps (modules groups) = Apache_docroot\fwphp
|   |  NO Models, V, C dirs, but dirs are like Oracle FORMS form .fmb !
|   |         
|   +---www  - MAIN MENU MODULE (static) pages, 
|   |   not on B12phpfw code skeleton, but similar coding
|   |
|   | APPLICATION DIRS HAVE SIMILAR DIR STRUCTURE AS glomodul :
|   |
|   +---01mater app (app = modules group) - material book keeping - empty dir
|   +---02financ app (dir name is module name) - empty dir
|   +---03salary app - empty dir
|   |
|   +---glomodul "app" modules group not in previous 01, 02... dirs.
|       |
|       |
|       +---mkd module - plain text Op.sys files (markdown or html) 
|       |   WYSIWYG web editor, not on b12phpfw code skeleton, but similar
|       |
|       |
|       +---blog (Msg) MODULE
|       |   |-- MODULE CONTROLLER class Home_ctr extends Config_allsites
|       |   |-- MODULE MODEL - DATA SOURCE ADAPTER class Tbl_crud
|       |   |-- VIEW scripts (not view classes !) to be included in Home_ctr
|       |   +---msgmkd dir - markdown texts .txt = POSTS
|       |   \---Uploads dir
|       |
|       | blog module consists of : two masters, detail, subdetail :
|       | which, like blog module, have Home_ctr.php, Tbl_crud.php 
|       | and VIEW scripts :
|       |
|       +---user/            module - master 1
|       |
|       |
|       +---post_category/   module - master 2 - Home_ctr.php and VIEW scripts
|       |
|       |
|       +---post/            module - detail - relations M : 1 user,  M : 1 post_category
|       |
|       |
|       +---post_comment/    module - subdetail - relation M : 1 post.
|       |
|       |
|       |
|       +---adrs (Mini3 fw) module https://github.com/panique/mini3
|       |   Excellent rare not to simple MVC example (lot of good coding). 
|       |   My ROUTING USING KEY-VALUES is different, but  
|       |   DISPATCHING USING HOME CLASS METHODS is based on Mini3.
|       |
|       +---z_examples      modules group - LEARNING EXAMPLES. Eg :
|       |   |
|       |   +---02_MVC      modules group  OOP and MVC learn
|       |       |
|       |       +---03xuding/ STEP BY STEP SHOWS WHY AND HOW TO USE B12PHPFW
|       |           Simple, small, elegant code. I improved it (?) in step 1 and 2.
|       |           https://www.startutorial.com/articles/view/php-crud-tutorial-part-1, 2, 3
|       |
|       |
|       +---lsweb module - web server dirs navigate & run .html and .php
|       +---oraedoop
|       +---z_help modules group - (static) pages
|
|
+---3. J:\awww\www\zinc (core) - GLOBAL INCLUDES for all sites (eg 2. fwphp SITE)
|   |  zinc is for search more selective than core  -:).
|   |  Here are dirs img, lang, theme and global classes (for all sites)
|   |  which are MVC engine.
|   |
|   | GLOBAL RESOURCES :
|   |-- hdr.php, ftr.php
|   +---img
|   +---lang
|   +---themes some public resources (some are in vendor dir)
|   |
|   | MVC ENGINE :
|   +---class Autoload in class script Autoload.php
|   |   CONVENTION FOR NAMESPACES :
|   |   Eg in tbl view script J:\awww\www\fwphp\glomodul\post\posts.php :
|   |          namespace B12phpfw\dbadapter\post ;
|   |          use B12phpfw\module\dbadapter\post\Tbl_crud ;
|   |   vendor_namesp_prefix \ processing_(behavior) \ proc2 \ ... \ cls_dir
|   |   before cls_dir is FUNCTIONAL part of name space, any string "\" separated 
|   |   cls_dir='post' is POSITIONAL part of ns, CAREFULLY it is dir name!
|   |   If we change dir names than we must change also cls_dir in ns in scripts !
|   |-- DB conn parameters Dbconn_allsites
|   |-- class Db_allsites - global data source adapter (includes Dbconn_allsites)
|   |-- class Config_allsites - routing, dispatching, utils (helpers)
|   |-- class Pgn - PAGINATION
|   |
|   |
|   |-- showsource.php
|
|
+---4. J:\awww\www\vendor dir for external code (vendor's plugins) & resources :
|      JS files, stylesheets.            
|      B12phpfw own (internal) resources are in zinc dir, external in vendor dir.          
|   +---erusev (parsedown markdown to html)         
|   +---php2wsdl        
|   +---simplemde WYSIWYG editor for markdown (or Summernote for html)         
|     
```






















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

https://community.notepad-plus-plus.org/topic/17366/how-to-install-emmet-plugin/2   Meta Chuh 26 Mar 2019, 15:45   @Alexander–Rudenko

#### Old notepad++ plugin manager is not compatible with notepad++ 7.6 and above.
 -it will write files to wrong locations.
first revert all changes you made to your notepad++ installation, by uninstalling plugin manager and removing everything you might have installed with plugin manager.
make sure you do not see any error messages at notepad++ startup, and make sure you do not see plugin manager at your plugins menu anymore.

next, follow the >>> Guide: 
### I do not use this: How to install the PythonScript plugin and emmet plugin on Notepad++ 7.6.3, 7.6.4 and above 
<<<, to install pythonscript manually :
https://community.notepad-plus-plus.org/topic/17256/guide-how-to-install-the-pythonscript-plugin-on-notepad-7-6-3-7-6-4-and-above

for notepad++ 7.6.4, 64 bit (installed version):

download and extract PythonScript_Full_1.3.0.0_x64.zip from >>> here <<< to your desktop.
note: do not use any other available release type, except this zip.
1. https://github.com/bruderstein/PythonScript/releases/download/v1.3.0/PythonScript_Full_1.3.0.0_x64.zip

2. open %ProgramFiles%\Notepad++\plugins\ in windows explorer and create a folder called PythonScript.

3. copy PythonScript.dll from the plugins folder of this extracted zip to:
%ProgramFiles%\Notepad++\plugins\PythonScript\PythonScript.dll

4. copy python27.dll from this extracted zip to:
%ProgramFiles%\Notepad++\python27.dll

5. copy the folders scripts containing machine level scripts and lib containing python libraries, from the zip’s plugins\PythonScript folder to:
%ProgramFiles%\Notepad++\plugins\PythonScript\


for notepad++ 7.6.4, 32 bit (installed version):
...


6. then download the emmet plugin emmet-npp.zip from >>> here <<< and extract it.
http://download.emmet.io/npp/emmet-npp.zip

7. go to the notepad++ 7.6.4 menu plugins > open plugins folder to open your plugins folder, and create a new folder called EmmetNPP.

8. copy EmmetNPP.dll from the extracted emmet-npp.zip into the EmmetNPP folder you have created.

9. copy all files and folders from the folder EmmetNPP within the extracted emmet-npp.zip into the EmmetNPP folder you have created.
note: your plugins\EmmetNPP folder should now contain 
EmmetNPP.dll, _PyV8.pyd, editor.js, npp_emmet.py, PyV8.py and a folder called emmet.

now restart notepad++ and you will see both at your plugins menu :
    the emmet plugin 
    and the python script plugin


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
