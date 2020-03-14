<a name="top"></a>
**Top**      <a href="#directories" id="lnkdirectories">Directories</a>    [UML](#uml)     [DM](#dm)      [2. IDE](#ide)    [3. CRUD](#crud)     [4.  SW fw](#swfw)        
# 1. My PHP menu & CRUD code skeleton (I named it B12phpfw)
## 1\.1 Demo site - free hosting with free Mysql
1. On Linux : http://phporacle.eu5.net/ (freehostingeu- fast, stable) 
2. or  http://phporacle.heliohost.org/ (heliohost - slow, stable)
3. My blog :  http://phporacle.altervista.org/13-php-7-4-2-bootstrap-4-3-1-laravel-6-12-crud-tutorial/  
    and  http://phporacle.altervista.org/fwphp/www/ - tech core of Mondadori digital magazine (leading publishing company in Italy) plans to offer free MySQL. 
     
## 1\.2 Download and install code from here
1. https://github.com/slavkoss/fwphp - PHP code here is good for (more) large sites
2. In webserver doc root - my is J:\xampp\htdocs  or virtual host  J:\awww\www
3. Unpack fwphp-master.zip (with many adds < 3 MB) : 3 subfolders : **fwphp,  vendor (from 00_vendor.zip file) and zinc**        



<span id="directories"></span>
## 1\.3 B12phpfw directories (modules) structure
[Top](#top)     **Directories**     [UML](#uml)     [DM](#dm)     [2. IDE](#ide)     [DM](#dm)     [3. CRUD](#crud)     [4.  SW fw](#swfw)        

See **info code :**        
http://phporacle.eu5.net/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php       
https://github.com/slavkoss/fwphp/blob/master/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php        

B12phpfw is very diferent than (all ?) other PHP frameworks (I prefer "menu & CRUD code skeleton") because dirs are like Oracle FORMS form module .fmb and other mentioned below, see at this text end  [4.  **"What is SW fw"**](#swfw).     

![B12phpfw favicon DEVELOPMENT DOCROOT](B12phpfw_1DEVELOPMENT_DOCROOT.ico "B12phpfw_1DEVELOPMENT_DOCROOT.ico")  my **DEVELOPMENT DOCROOT** J:\\awww\\www ee http://dev1:8083/   OR       
 ![B12phpfw favicon TEST DOCROOT](B12phpfw_2TEST_DOCROOT.ico "B12phpfw_2TEST_DOCROOT.ico")  **TEST DOCROOT** J:\\xampp\\htdocs ee   http://localhost:8083/  OR       
 ![B12phpfw favicon PRODUCTION DOCROOT](B12phpfw_3PRODUCTION_DOCROOT.ico "B12phpfw_3PRODUCTION_DOCROOT.ico") **PRODUCTION (DEMO) DOCROOT** http://phporacle.eu5.net/       
|   
In Windows tree /A shows :
```
+---1. J:\awww\www\index.php redirects to main menu url fwphp/www/index.php
|
|
+---2. J:\awww\www\fwphp SITE, group of apps = Apache_docroot\fwphp
|   |  NO Models, V, C dirs, but dirs are like Oracle FORMS form .fmb !
|   |         
|   +---www  - MAIN MENU MODULE (static) pages, 
|   |   not on B12phpfw code skeleton, but similar
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
|   |-- class Dbconn_allsites - global data source adapter
|   |-- class Db_allsites extends Dbconn_allsites - global data source adapter
|   |-- class Config_allsites extends Db_allsites - routing, dispatching, utils (helpers)
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



## 1\.4 B12phpfw directories (modules) structure compared to (all ?) other PHP fw-s
```
One of (Apache) WEB SERVER DOCROOT-s (see B12phpfw directories (modules) structure)
|       
|       
|-- **1. fwphp** (app)       # **or SITE1, or APLications1** = Main MVC site dirs structure,               
|   |                        # my J:\awww\www\fwphp\ = Apache_docroot\fwphp         
|   |                        # Contains **MODULE GROUPS** eg APLication1, 2.  eg  **www** (main menu), **glomodul**,       
|   |                        # **finance**, **material**. fwphp is optional name. Namespace is only one: B12phpfw.            
|   |-- Controllers          # **NO M,V,C dirs (ee Controllers) but dirs are like Oracle FORMS form module.fmb  !**         
|   |   └── example.php      # Example Controller with basic functionality explanation. Start here learning !         
|   |                        # My is https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/       
|   |                        # (03xuding, 01vanilla...)
|   |       
|   |-- Models               # **NO M,V,C dirs** ee NO Models directory       
|   |   └── example.php      # Example Model with functionality explanation       
|   |                        #  My is .../fwphp/glomodul/z_examples/02_MVC/01vanilla       
|   |         
|   |__ Views                # **NO M,V,C dirs** ee NO Views directory, no template engines (PHP is template language)        
|        
|        
|-- **2. zinc** (core)       # Basically mvc engine directory. zinc is for search more selective than core  -:).                  
|   |                        # Here are **class Autoload and other all sites global classes** and some public resources                 
|   |                        # (some are in vendor dir).            
|   |-- app.php              # **NO** Main fw file. nice abstraction (questionable value in real life programming) :       
|   |                        # **$app = new App();  $app->autoload(); $app->config(); $app->start();**       
|   |                        # Where is UML diagram for this beauty ?        
|   |                        # I think much better is **new Home\_ctr($pp1) ** // Home\_ ctr "inherits" index.php       
|   |                        # ee "inherits" $pp1, (global & module prroperties palette array),       
|   |                        # but also inherits see B12phpfw core UML diagram below.      .      
|   |             
|   |-- classes              # **NO** classes directory for autoloading.         
|   |   |                    # B12phpfw global classes are in zinc dir, module clses are in module dir.       
|   |   |-- controller.php   # **NO** but **in module dir global abstract DISPATCHER (RESPONSE) class**             
|   |   |                    # **Home\_ctr  (<span style="color:blue;">level 4<span>)** extends Config\_allsites         
|   |   |__ model.php        # **NO, no model class for each table** but **in zinc dir global abstract CRUD class               
|   |                        # Db_allsites  (<span style="color:blue;">level 2<span>)** extends Dbconn_allsites             
|   |                        # In Db_allsites are **cc, rr, uu, dd methods** instead model class for each table !        
|   |                        # cc, rr, uu, dd methods are like Oracle Forms           
|   |                        # pre-insert, pre- and execute- query, pre-update instead model class for each table !         
|   |                        # To me seem model class for each table and ORM-s, active records not needed.         
|   |       
|   |-- config               # **NO** config dir but **in zinc dir global abstract CONFIG & ROUTING (REQUEST) class**            
|   |   |                    # **Config_allsites  (level 3)** extends Db_allsites (see core UML diagram). 
|   |   |                    # Here is property palette array.           
|   |   |-- database.php     # **NO** but in zinc dirabstract class **Dbconn_allsites  (<span style="color:blue;">level 1<span>)**        
|   |   |__ session.php            
|   |                     
|   |__ helpers              # **NO** helpers dir, but in zinc dir global abstract classes Db_allsites and Config_allsites.          
|       |__ examplhelper.php # **NO** but own debugging and Xdebug php extension.              
|      
|       
|-- **3. index.php**         # redirects to main menu url fwphp/www/index.php        
|      
|         
|-- **4. vendor** (public)   # dir for external code (vendor's plugins) & resources :  javascript files, stylesheets.            
|   |                        # B12phpfw has own (internal) resources in zinc dir, external in vendor dir.          
|   |-- javascripts          
|   |-- stylesheets          
|   |__ vendor           
|     
|         
|-- .htaccess                # **NO** .htaccess (Apache mod_rewrite) URL rewriting all requests to MVC endpoint index.php            
                             # (single module entry point). B12phpfw has **QS=?** constant instead.       

```


**Common fw dir structure are items in (...) and marked with NO - are not used in B12phpfw but basics are same**. B12phpfw is better for large sites.      
See Mini3 PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good coding). My **routing using key-values** is different but dispatching using home class methods is based on Mini3. 
See to simple examples and have no namespaces  : very good coding : 
1. https://github.com/ngrt/MVC_todo 
2. or https://github.com/DawidYerginyan/simple-php-mvc/ 
3. or my dir \02_mvc\ (\\fwphp\\glomodul\\z_examples\\02_mvc\\03xuding_glob\\) 
4. or many others



## <a name="uml"></a>1\.5 B12phpfw core UML diagram - classes structure
[Top](#top)     <a href="#directories" id="lnkdirectories">Directories</a>     **UML**    [DM](#dm)     [2. IDE](#ide)     [3. CRUD](#crud)     [4.  SW fw](#swfw)        

For programmer this hierarchy is as all attributes and methods in classes above  Home_ctr are in Home_ctr class ee in **$this object** which is instantiated Home_ctr (and automatically all classes above). Why all attributes and methods are not in Home_ctr ? Because we do not want write in each Home_ctr class code in 3 classes above.      
Instead we **reuse code in 3 classes (globals)** above Home_ctr.     

![B12phpfw core UML diagram](B12phpfw_UMLdiagram.png "B12phpfw_UMLdiagram.png")    
<br /><br />

Developed on home PC Windows 10 64 bit and Apache web server. Some details are to do in version 6.1 but all important is visible in current version 6.0. 

1. Menus (Mnu module) are not based - no need, but can be based on B12phpfw which is best for CRUD modules like Oracle Forms form. 
2. Most frequent (best ?) blog design today - Jazeb Akram, Abdul Wali, Edwin Diaz... I used it in Blog (Msg) module based on B12phpfw code skeleton
3. WYSIWYG Markdown or HTML editing (Mkd module not based - no need, but can be based on B12phpfw is used for blog posts or any txt file). Blog posts may be :
    1. oper. system files - practicaly unlimited size
    2. or in MySQL/Oracle/or any DB : post (4000 characters I commented this in code), summary (4000 characters) and banner_img description (4000 characters) 



<br />        
Explanations below are far less important than demo site and code download mentioned above - open code and learn it, it is simple but needs      
> few hours (advanced user) - days (intermediate) - weeks/months (beginner) to understand it.           
**Understand code is must for any professional code skeleton !**       
<br />

         _.-'''''-._
       .'  _     _  '.
      /   (o)   (o)   \
     |                 |
     |  \           /  |
      \  '.       .'  /
       '.  ''---''  .'
         '-._____.-' 



## <a name="dm"></a>1\.6 DM (Domain model)
[Top](#top)     <a href="#directories" id="lnkdirectories">Directories</a>     [UML](#uml)     ** DM**      [2. IDE](#ide)     [3. CRUD](#crud)     [4.  SW fw](#swfw)     

[UML diagram](#uml)  above does not show DM adapter classes. Each  tbl in DB (ee each object in data source eg web servis...) should have DM adapter class which is **pre CRUD code** like in Oracle Forms **pre-query**, pre-insert, pre-update... In Db_allsites class are **execute-query (here only creates cursor for read row by row loop in view scripts)**, on-insert, on-update... .        

### Events flow (E1) --- (E2)... - caseflow through Blog module (CRUD data skeleton)
```
(E1) User types URL --- index.php instantiates C (Home_ctr, App...) --- C calls own method, see (T1) - signals flow
(E2) Home_ctr own method includes (E3) V (home.php) - signals flow  V --URL--> C
                        |
                        --  OR --calls--> some method (eg delete row) - signals flow C --parameters -->method
                        |
                        -- OR URL jumps in other module - signals flow in _GET (=URL query) or _POST global arrays

(E3) V (home.php view script) --- V calls DM see (T2), ee V calls Admin_crud to <==pull== array (of row objects) from data source (T3) - DATA FLOW
         |
         -- if user cliks link or button or types URL --- it is event (E1) - signals flow V --URL--> C - ee user adds INTERACTIVITY (T4) in C which requires ROUTING.
```

#### Terms
(T1) Own controller method is Mini3 PHP framework **dispatching** idea using home class methods (My **routing using key-values** is different)      

(T2) **DM** (Domain Model) are classes :
1. Admin_crud (**users table PdoAdapter**) called by V script - **pre CRUD (PRE-INSERT, PRE-UPDATE...) methods** cc, rr, uu, dd
2. Db_allsites (**AbstractDataMapper**) called by Admin_crud - same for all tables, contains **CRUD (ON-INSERT, ON-UPDATE...) methods** cc, rr, uu, dd

(T3) **DS (data source)** -  tbl row objects from DB or web service, or.... Only DM classes know about DS. CRUD code skeletons calls DM classes FUNCTIONALY ee WHAT ee "get invoice items", not HOW and from which DS. DS is assigned only once in config class abstract class Config_allsites extends Db_allsites (and class Home_ctr extends Config_allsites). 

(T4)  User **INTERACTIVITY** (cliks link or button or types URL) requires ROUTING in C ee C (Home_ctr) is not needed for Mnu module, even for Mkd module - enough is simple controller code snippet. 


<br /><br />
### Signals, data and code flow
Graph 4 node (vrh), 7 edge (brid, border, boudary). Graph is simmilar to Euler's 4 Königsberg  city parts (nodes) and 7 bridges (edges) - Chinese postman **transport problem** - how to Euler walk to cross each  bridge (edge)  only once. Traveler sailsman problem is : how to shortest walk graph to cross each  city part (node)  at least once and return to start node. 

```
Db_allsites, Admin_crud     _.-'(DM)'-._       Domain Model
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
2. and class Admin_crud - **bussines logic** in this M code can not be standardized. This M code is most complicated, it is fat (lot of code)

User`s events are handled in Controller class.
1. C (class Home_ctr) assigns users orders in URL to array variables telling V what user wants (signals flow) and includes V 
2. **V pulls data from M data source (DB or web servis or...)** (calls Admin_crud which calls Db_allsites) according C variables (user orders in URL)
3. V links ee user orders in URL call C method which can do some state changes in M data

V script may contain class but I do not see need for view classes because view script is included in Home_ctr class and can use $this to access methods and attributes in whole class hierarchy : Home_ctr, Config_allsites, Db_allsites. If we do not need CRUD than we do not need class hierarchy Home_ctr, Config_allsites, Db_allsites meaning that simple coding like in Mnu and Mkd modules suffices..

M-C-V data flow - controller instantiates M and pushes M data to V.
I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow is only possible solution, M-C-V data flow makes C fat in large modules (lot of code). C in my Msg (Blog) module has lot of code, but code is very simple.

So view instantiates model and pulls data from M or C instantiates model and pulls data from M.  Both styles work ok, difference is important only for us - for clearer code.

If we have user`s interactions (events) eg filter displayed rows (**pagination is also filtering**), than **M-V data flow is only possible** solution (M-V data flow is original MVC idea). 

  


What is DM is best explained in example code in **module (folder) 03xuding_glob** which is whole below :     
https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/03xuding_glob  (\_glob means "with globals").       

This example is step 2 in learning. Step 1 is dir (module) ...z_examples/02_MVC/03xuding.     

### 1\.6\.1 index.php

```php
<?php
/**
* step 1
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\index.php
*               Instantiates Home_ ctr cls - router, dispatcher
* step 1 in Module  U S E R  T B L  C R U D on B12phpfw CRUD code skeleton. 
* see https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
* For more code comments see blog module J:\awww\www\fwphp\glomodul\blog\Home_ctr.php
*/
namespace B12phpfw ;
//$dirup_tmp = str_replace('\\','/', dirname(__DIR__) ) ; 
$pp1 = (object)
[   'dbg'=>'1', 'module_version'=>'6.0.4.0 Users'
  , 'module_towsroot'=>'../../../../../'
  , 'vendor_namesp_prefix'=>'B12phpfw'
  , 'module_path_arr'=>[ //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
        str_replace('\\','/', __DIR__ ).'/' //=thismodule_cls_script_path (CONVENTION!!)
      //, $dirup_tmp.'/user/', $dirup_tmp.'/post_category/' //two master modules (tbls)
      //, $dirup_tmp.'/post/', $dirup_tmp.'/post_comment/'  //detail & subdet modules (tbls)
  ] , 'caller'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]
] ;

require($pp1->module_towsroot.'zinc/Autoload.php');
new Autoload($pp1); //global cls loads classes scripts automatically
                if ('') {Db_allsites::jsmsg( [ basename(__FILE__) //. __METHOD__ 
                   .', line '. __LINE__ .' SAYS'=>' '
                   ,'where am I'=>'AFTER  A u t o l o a d'
                ] ) ; }
//step 2 (step 3 is parent::__construct : fw core calls method in Home_ctr cls)
$db = new Home_ctr($pp1) ;

exit(0);



/*
// Module autoloader (not used here but may be needed in some modules) :
namespace Model; //FUNCTIONAL NAME SPACING (not dir names ee positional)
//Instead of require 'm.php'; require 'v.php';  require 'c.php'; :
//    ***** namespaced cls name --> cls script path *****
class Autoloader
{
  private static function get_module_cls_script_path($class, $nsprefix) {
    //replace name space backslash to current operating system directory separator
    $DS = DIRECTORY_SEPARATOR ;

    $cls_script_path = __DIR__ .'/'
      . str_replace( [$nsprefix,'\\'] //substrings to replace
                       , ['', '/']    //replacements
                       , $class       //in string
        ).'.php'; //append cls script extension and convert (to Windows) backslash :
   $cls_script_path = str_replace(['/','\\'], [$DS,$DS], $cls_script_path) ;

   return $cls_script_path ;
  }

  public static function autoload($class) //namespaced className
  {
    // ********** 1. module_ cls_ script_ path **********  eg B12phpfw\\clickmeModule
    $cls_script_path1 = self::get_module_cls_script_path($class, $nsprefix1='Model') ;
    $cls_script_path2 = self::get_module_cls_script_path($class, $nsprefix2='Model\\') ;
    $cls_script_path3 = self::get_module_cls_script_path($class, $nsprefix3='ModelMapper\\') ;
    $cls_script_path4 = self::get_module_cls_script_path($class, $nsprefix4='CoreDB\\') ;

    // ********** 2. cls_ script_ path_ external_ module **********
    //$cls_script_path = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


      // ********** 3. r e q u i r e  cls_ script_ path **********
      switch (true) {
        case file_exists($cls_script_path1): include_once $cls_script_path1 ; break;
        case file_exists($cls_script_path2): include_once $cls_script_path2;  break;
        case file_exists($cls_script_path3): include_once $cls_script_path3;  break;
        case file_exists($cls_script_path4): include_once $cls_script_path4;  break;
        //case file_exists($cls_script_path_external_m): include_once $cls_script_path_external_m; break;
        default:
          if ('1') { echo 'For namespaced class '. $class
            . '<br />Possible CLASS SCRIPTS NAMES derived from functional namespaces,'
            . '<br />ee from vendor name space prefixes :'
            . "<br />\"$nsprefix1\" or \"$nsprefix2\" or \"$nsprefix3\" or \"$nsprefix4\" are :"
            ; 
            echo '<pre>';
            print_r([$cls_script_path1, $cls_script_path2, $cls_script_path3, $cls_script_path4]);
            //print_r('Namespaced class '. $class .' has not class script ?');
            echo '</pre>';
          }
          break;
      }
  }
}
//spl_autoload_register('config\Autoloader::autoload');
*/
```

### 1\.6\.2 Home_ctr.php router, dispatcher

```php
<?php
namespace B12phpfw ;

/**
* step 2
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Home_ctr.php
* Instantiated in i ndex.php 
*
* Home_ ctr cls is router, dispatcher :
* 1. Assigns links for user interactions (module routing table) in home.php
* 2. Calls own method when user clicks link/button in home.php 
*    or any URL is entered in ibrowser adress field
* 3. Own method includes view CRUD scripts h ome.php or c reate.php or r ead.php or ... 
*    (no need for view classes ?) or calls some method or url calls other module i ndex.php
*/
class Home_ctr extends Config_allsites
{

  public function __construct($pp1)
  {
    if (!defined('QS')) define('QS', '?');
    $pp1_module_links = [ 
      'P P 1 _ M O D U L E' => '~~~~~~~~~~~~~~~~~' ,
      'h'   => QS.'i/home/' ,
      'c'   => QS.'i/c/' ,
      'r'   => QS.'i/r/id/' ,
      'u'   => QS.'i/u/id/' , //in view script href = $this->pp1->u . $id
      //$this->uriq->i/home_fn, t/tbl_name, id/idval key/value
      //in home.php onclick does jsmsgyn dialog,  home_fn "d" calls dd() (no need include script)
      'd'   => QS.'i/d/t/admins/id/' //in view script href = $this->pp1->d . $id
    ] ;

    //step 3 : fw core calls method in this cls : see home_fn above
    parent::__construct($pp1, $pp1_module_links);

                if ('') { /* self::jsmsg( [ //basename(__FILE__).' '.
                   __METHOD__ .', line '. __LINE__ .' SAYS'=>'s001. AFTER Config_allsites construct '
                   ,'ses. userid'=>isset($_SESSION["userid"])?$_SESSION["userid"]:'NOT SET'
                   ,'$this->uriq'=>$this->uriq
                   ] ) ; */
                   echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                   echo '<pre>$_GET='; print_r($_GET); echo '</pre><br />'; // [d/39] => 
                   echo '<pre>$_POST='; print_r($_POST); echo '</pre><br />'; // [d/39] => 
                   echo '<pre>$this->uriq='; print_r($this->uriq); echo '</pre><br />';
                   // $this->uriq=stdClass Object( [d] => 39 )
                }


  } // e n d  f n


  //Called own methods when user clicks link/button or any URL is entered in ibrowser adress field :
  public function c()
  {
      $title = 'TEST USER CREATE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'create.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function home()
  {
    //t b l  r e a d
      $title = 'TEST USER CRUD';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'home.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }


  public function r()
  {
    //r o w  r e a d
      $title = 'TEST USER READ PROFILE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'read.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function u()
  {
      $title = 'TEST USER UPDATE';
      require $this->pp1->wsroot_path . 'zinc/hdr.php';
        //require_once("navbar.php");
        require $this->pp1->module_path . 'update.php';
      require $this->pp1->wsroot_path . 'zinc/ftr.php';
  }

  public function d()
  {
                              if ('') { echo __METHOD__ .', line '. __LINE__ .' SAYS: '
                              .'<br />U R L  query array ='.'$this->uriq=' ;
                              if (isset($this->uriq))
                                { echo '<pre>'; print_r($this->uriq) ; echo '</pre>'; }
                              else { echo ' not set' ; } }
      $this->dd() ;
      // R e d i r e c t = r e f r e s h  t b l  v i e w :
      switch ($this->uriq->t)
      {
        case 'admins' : $this->Redirect_to($this->pp1->h) ; break;
        default: 
          echo '<h3>'.__FILE__ .', line '. __LINE__ .' SAYS: '.'T a b l e '. $this->uriq->t 
          .' does not exist (put it in home.php, in del link !)'.'</h3>';
          break;
      }

  }


} // e n d  c l s  

```

### 1\.6\.3 home.php - shows links assigned in Home_ctr.php for user interactions
```php
<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\home.php
* called from Home_ ctr cls method h ome() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method rr_all() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*
* Adds user request (interaction, event) eg $id at link end, for read user profile or update or delete.
* 
* Admin_ crud is ORM (tbl adapter) class, when instantiated is DM object of row in memory to/from DB tbl row
*     Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Admin_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
*/
namespace B12phpfw ;
$Admin_crud = new Admin_crud ;
$cursor = $Admin_crud->rr_all($this);
?>
<!--             U S E R  T B L  R E A D -->
<div class="container">
<div class="row">
      <h3>USERS TABLE CRUD PDO MySQL/Oracle BOOTSTRAP OOP MVC šđčćž</h3>
</div>

<div class="row">

  <p><a href="<?=$this->pp1->c?>" class="btn btn-success">Create</a></p>

  <table class="table table-striped table-bordered">

  <thead><tr><th>Name</th><th>Email Address</th><th>Action</th></tr></thead>

  <tbody>
      <?php
    $SrNo = 0;
    while ($r = $this->rrnext($cursor))
    {
      $id = self::escp($r->id) ;
      ?>
      <tr>

      <td><a class="btn" href="<?=$this->pp1->u . $id?>"><?=self::escp($r->username)?></a></td>

      <td><?=self::escp($r->email)?></td>

      <!-- $this->pp1->d?>t/admins/id/ . $id 
        var vodg ; alert('vodg='+vodg) ;
        vodg = jsmsgyn('Erase row <?=$id?> ?','') ; // '' means no URL to redirect
        if (  ) { location.href= '<?=$this->pp1->d . $id?>/'; }
      -->
      <td width=9%>
         <a id="erase_row" class="btn btn-danger"
            onclick="
            var vodg ;
            vodg = jsmsgyn('Erase row <?=$id?> ?','') ; // '' means no URL to redirect
            //alert('vodg='+vodg) ; // if OK vodg=1, if CANCEL vodg=0
            if ( vodg == 1 ) { location.href= '<?=$this->pp1->d . $id?>/'; }
            "
         >Del <?=$id?></a>
      </td>

      <td width=5%><a class="btn" href="<?=$this->pp1->r . $id?>">Profile</a></td>

      </tr> <?php
    }
    self::disconnect();
       ?>
      </tbody>
    </table>
 
 </div>
</div> <!-- /container -->

```

### 1\.6\.4 create.php
```php
<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\create.php
* called from Home_ ctr cls method  c() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method cc()     =pre-insert tbl row
* which calls Db_ allsites method cc() =on-insert tbl-row
*/
namespace B12phpfw ;
//Admin_ crud is ORM class : DM of row in memory to/from DB tbl row
//where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row


if ( !empty($_POST))
{
  // keep track validation errors
  $nameError   = null;
  $emailError  = null;
  $mobileError = null;

  // keep track post values
  $username   = $_POST['username'];
  $email  = $_POST['email'];
  $mobile = '' ; //$_POST['user_telefon'];

  // 1. validate input
  $valid = true;
  if (empty($username)) {
      $usernameError = 'Please enter Name';
      $valid = false;
  }

  if (empty($email)) {
      $emailError = 'Please enter Email Address';
      $valid = false;
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $emailError = 'Please enter a valid Email Address';
      $valid = false;
  }

  // 2. insert data
  if ($valid) {
    $fldvals = [$username, $email] ;
    $Admin_crud = new Admin_crud ;
    $id = $Admin_crud->cc($this, $fldvals);
    echo "<h3>Created id=$id </h3>" ;
    //header("Location: index.php");
  }
}
?>


    <div class="container">

      <div class="span10 offset1">
          <div class="row">
              <h4>Create a Customer</h4>
          </div>

          <form class="form-horizontal" action="<?=$this->pp1->c?>" method="post">

            <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
              <label class="control-label">Name</label>
              <div class="controls">
                  <input name="username" type="text"  placeholder="Name"
                         value="<?php echo !empty($username)?$username:'';?>">
                  <?php if (!empty($usernameError)): ?>
                      <span class="help-inline"><?php echo $usernameError;?></span>
                  <?php endif; ?>
              </div>
            </div>

          <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Email Address</label>
              <div class="controls">
                  <input name="email" type="text" placeholder="Email Address"
                         value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                      <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>

                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>

    </div> <!-- /container -->
```

### 1\.6\.5 read.php - display user profile
```php
<?php
/**
* step 3  - display user profile
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\read.php
* called from Home_ ctr cls method  r() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method rr() =pre-query which sets rows filter (default-where), sort... 
* which calls Db_ allsites method rr() =execute-query which creates cursor for read row by row loop here
*/
namespace B12phpfw ;

use Parsedown ; //in global namespace (version 1.7.4 stil has no namespace)

//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require '../../../../../vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown(); //OR NO use : \Parsedown() where "\" means global namespace
          //echo $Parsedown->text('Hello _Parsedown_!'); # prints: <p>Hello <em>Parsedown</em>!</p>
          ///////// You can also parse inline markdown only:
          //echo $Parsedown->line('Hello _Parsedown_!'); # prints: Hello <em>Parsedown</em>!

$id = (int)$this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); exit(0) ; }

$Admin_crud = new Admin_crud ;
$cursor = $Admin_crud->rr($this, $id) ;
while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;

?>

    <div class="container">

      <div class="span10 offset1">
        <div class="row">
            <h3>Admin <?=$r->aname?>, id <?=$id?> profile</h3>
        </div>

        <div class="form-horizontal" >

          <div class="control-group">
            <label class="control-label">User name</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->username;?>
                </label>
            </div>
          </div>

        <div class="control-group">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $r->email;?>
                </label>
            </div>
          </div>

        <div class="control-group">
            <label class="control-label">Biography</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $Parsedown->text($r->abio);?>
                </label>
            </div>
          </div>



          <div class="form-actions">
              <a class="btn" href="index.php">Back</a>
           </div>


        </div>
    </div>

    </div> <!-- /container -->
```

### 1\.6\.6 update.php
```php
<?php
/**
* step 3
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\update.php
* http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/03xuding_glob/index.php?i/u/id/79
*
* called from Home_ ctr cls method  u() when usr clicks link/button or any URL is entered in ibrowser  
* calls Admin_crud cls method uu()     =pre-update
* which calls Db_ allsites method uu() =on-update
*/
namespace B12phpfw ;
                if ('') { 
                  echo '<h3>'. basename(__FILE__).' '.__METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>URL query array $this->uriq='; print_r($this->uriq); echo '</pre>';
                        // $this->uriq=stdClass Object( [i] => u  [d] => 79 )
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  //exit();
                }
$id = (int)$this->uriq->id ;
if ( null==$id ) { header("Location: index.php"); }

if ( !empty($_POST) ) 
{
        // keep track validation errors
        $anameError = null;
        $emailError = null;

        // keep track post values
        $username  = $_POST['username']; //hidden !!
        $aname     = $_POST['aname'];
        $email     = $_POST['email'];
        $abio      = $_POST['abio'];

        // validate input
        $valid = true;
        if (empty($aname)) {
            $anameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if ($valid) {
          $fldvals = [$aname, $email, $id, $abio] ;
          $Admin_crud = new Admin_crud ;
          $Admin_crud->uu($this, $fldvals);
          //echo "<h3>Updated id=$id </h3>" ;
        }
} else {
          //show row to update
          $Admin_crud = new Admin_crud ;
          $cursor = $Admin_crud->rr($this, $id) ;
          while ($row = $this->rrnext($cursor)): {$r = $row ;} endwhile;
          $username = $r->username ;
          $aname    = $r->aname ;
          $email    = $r->email ;
          $abio     = $r->abio ;
}
    ?>

    <div class="container">

      <div class="span10 offset1">
          <div class="row">
            <h3><?php if (isset($_POST['username'])): echo 'UPDATED'; else: echo 'Update';  endif; ?>  
                  Admin user
            </h3>
          </div>

          <form class="form-horizontal"  method="post"
                action="<?=$this->pp1->u . $id?>">

            <div class="control-group <?php echo !empty($anameError)?'error':'';?>">
              <label class="control-label">
                 Admin username=<?=$username?>, id=<?=$id?> name</label>
              <div class="controls">
                  <input name="aname" type="text"  placeholder="Admin user name" 
                         value="<?php echo !empty($aname)?$aname:'';?>">
                  <?php if (!empty($anameError)): ?>
                      <span class="help-inline"><?php echo $anameError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Email Address</label>
              <div class="controls">
                  <input name="email" type="text" placeholder="Email Address" 
                         value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                      <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php //echo !empty($abioError)?'error':'';?>">
              <label class="control-label">Biography</label>
              <div class="controls">
                  <input name="abio" type="text" placeholder="Biography" 
                         value="<?php echo !empty($abio)?$abio:'';?>">
                  <?php //if (!empty($emailError)): ?>
                      <span class="help-inline"><?php //echo $emailError;?></span>
                  <?php //endif;?>
              </div>
            </div>

            <!-- name="category[id]"   $id ?? '' ...z_examples\01_php_bootstrap\jokeyank\templates\editcategory.html.php
                   NO NEED FOR THIS :
            -->
            <!--input type="hidden" name="id" value="<?=$id?>"-->
            <input type="hidden" name="username" value="<?=$username?>">

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <!--  -->
                <a class="btn" href="index.php">Back</a>
              </div>
          </form>
      </div>

    </div> <!-- /container -->
```

### 1\.6\.7 Admin_crud.php - ORM, DM (Domain Model) adapter cls - pre CRUD class
```php
<?php
/**
* step 4 (pre) CRUD class
* J:\awww\www\fwphp\glomodul\z_examples\02_mvc\03xuding_glob\Admin_crud.php
*    or User_db.php, or UserMapper.php
* called from view CRUD scripts c reate.php, r ead.php... 
*    when usr clicks link/button or any (CRUD) URL is entered in ibrowser  
* calls Db_ allsites method cc() (=on-insert tbl-row), rr()...
*
* Admin_ crud separates CRUD code skeleton (B12phpfw) from data source (DB or web service or...).
* Admin_ crud is ORM (TBL ADAPTER) CLASS. When instantiated it is DM object of row in memory
*    Where ORM = Object Relational Mapper, DM = Domain Model, row in memory is model of DB tbl row
* Admin_ crud maps (adapts) model of tbl row in memory to tbl row in DM data source (DB, web service...)
* Admin_ crud is used to move data to/from data source.
*
* REASON WHY EACH DB TBL SHOULD HAVE DM CLASS NAMED EG TblNAME_crud :
* CRUD code should be separated from C and V code ee should be in TblNAME_crud.
* TblNAME_crud is FAT MODEL - When business logic is complicated here is lot of code
* - most importand module code (can not be in global model cls) !!
* C and V are tiny. HTML in V is eg one of bootstrap templates - PHP CRUD code in it is tiny,
* only calls TblNAME_crud methods.
*
* So this example is not MVC, it is DMVC
*
* Domain Model definition 
* =======================
* 1. System of abstractions that describe selected aspects of a sphere of knowledge,
*    influence or activity (a domain). DM can be used to solve problems related to domain.
* 
* 2. An object model of the domain that incorporates both behavior and data.
*    Creates a web of interconnected objects, where each object represents some
*    meaningful individual, whether as large as a corporation or as small as a 
*    single line on an order form.
*/

namespace B12phpfw ; //ModelMapper
//use Model\UserInterface,
//    Model\User ;

class Admin_crud //extends AbstractDataMapper implements User_db_intf
{
  protected $tbl = "admins";

  // pre-query
  public function rr_all($db) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM $this->tbl ORDER BY username", [], __FILE__ .', ln '. __LINE__ ) ;
    $db::disconnect();
    return $cursor ;
  }

  // pre-query
  public function rr($db, $id) {
    // open cursor (execute-query loop is in view script)
    $cursor = $db->rr("SELECT * FROM admins WHERE id=:AdminId"
        , [ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int']
          ] , __FILE__ .' '.', ln '. __LINE__) ;
    //while ($row = $db->rrnext($cursor)): {$r = $row ;} endwhile;
    $db::disconnect();
    return $cursor ;
  }

  // on-insert
  //public function cc(UserInterface $user) {
  public function cc($db, $vv) {
    //  1. c r e  r o w   
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "username,email" ;
    $qrywhat = "VALUES(:username,:email)" ;
    $binds = [
      ['placeh'=>':username', 'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':email',    'valph'=>$vv[1], 'tip'=>'str']
    ] ;
    $cursor = $db->cc($db, $this->tbl, $flds, $qrywhat, $binds);

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !"; }
    //$db->Redirect_to($db->pp1->admins);

    // 2. g e t  i d
    $c_r = $db->rr("SELECT max(id) id FROM $this->tbl" 
        , [] //[ ['placeh'=>':AdminId', 'valph'=>$id, 'tip'=>'int'] ]
        , __FILE__ .' '.', ln '. __LINE__) ;
    while ($row = $db->rrnext($c_r)): {$r = $row ;} endwhile; 

    $db::disconnect();

    return $r->id;
  }

  // on-update
  public function uu($db, $vv) {
    //  1. u p d  r o w   
    $flds     = "SET aname=:AName, email=:Aemail, abio=:abio" ;
    $qrywhere = "WHERE id=:AdminId" ;
    $binds = [
      ['placeh'=>':AName',  'valph'=>$vv[0], 'tip'=>'str']
     ,['placeh'=>':Aemail', 'valph'=>$vv[1], 'tip'=>'str']
     ,['placeh'=>':AdminId','valph'=>$vv[2], 'tip'=>'int']
     ,['placeh'=>':abio',   'valph'=>$vv[3], 'tip'=>'str']
    ] ;
    $cursor = $db->uu($db, $this->tbl, $flds, $qrywhere, $binds);
    $db::disconnect();
    //header("Location: index.php");
    return null ;
  }


  //public function dd($id) {  } //no need, 
  //dd is jsmsgyn dialog in home.php + call dd() in Home_ctr d() method


}
```


<br /><br />
# <a name="ide"></a>2\. My developing environment (IDE)
[Top](#top)      <a href="#directories" id="lnkdirectories">Directories</a>     [UML](#uml)   [DM](#dm)   **2. IDE**     [3. CRUD](#crud)     [4.  SW fw](#swfw)        



## 2\.1 [Git SCM distributed version control system](https://git-scm.com/downloads)

see  https://git-scm.com/book/en/v2   or eg  https://git-scm.com/docs/git-checkout         

### In Windows Symenu Cmder as administrator (or CLI or Git Bash CLI)
J:\\aplp\\aplp\\0\_symenu\\ProgramFiles\\SPSSuite\\SyMenuSuite\\Cmder\_sps       

Go to your working directory or project folder (if not git status says: "fatal: not a git repository (or any of the parent directories): .git").      

git config --global user.name 'yourname'         
git config --global --replace-all user.email 'youremail'         
Install Git Credential Manager for Windows to avoid login on each push.      

### git status

### cd j:\\awww\\www

### j:\\awww\\www (master -> origin)

### git status

### git add .
or git add fwphp\\ (or whatever git asks)  or git add -A  or git add index.html

### git commit -am "ver 6.0 mnu, msg, mkd FUNCTIONAL namespaces, CRUD PDO, pretty URL-s"
We stored our project files within our system hard drive.      
If Cmder shows error  "fatal: unable to auto-detect email address" :      
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

Track the history of the changes where, when, who and why made. git SW stores or host the versions of project within our hard drive. From where we can backup our project history.  GitHub  site is like hosting to store our versions of projects (case HD crash !).       
Staging is like a queue, add drops modified files here for push.      
Push (commit) is method to send the files from working directory to repository.         
Pull is method to fetch the record from repository to our working directory.   


## To purge remote repository

So only last commit remains and it is first commit :

Save your .git/config before, and restore it after. (I delete it in recycle bin).
1. delete .git/   (< 10 MB) - without this command : git remote add origin... issues error : fatal: remote origin already exists !!
2. git init   (< 20 kb)
3. git add .  (< 3 MB)
4. git commit -am "ver 6.0 mnu, msg, mkd FUNCTIONAL namespaces, CRUD PDO, pretty URL-s"
5. git remote add origin https://github.com/slavkoss/fwphp.git
6. git push --mirror --force

  
  
## 2\.2 Development environment & source code

My PHP IDE is **Symenu** as launcher for all SW (portable if possible) below :

1.  **EDITOR**: Notepad++ (6 MB), also good, all portable : Notepad2-mod (2 MB), Atom (524 MB), Visual Studio Code (247 MB), CudaText (28 MB), PSPad (23 MB), RJ TextEd (416 MB), I avoid Dreamveawer, Microsoft Expression web (abandoned but still good), Komposer (abandoned, too old)  
    GT Text OCR IMG->TXT
2.  **COMMANDER**: **Locate** is old but best (Janne Huttunen) or simmilar see Symenu.     
    Freecommander       
    Q-dir          
3.  **BROWSER**: Firefox, Google Chrome, Cyberfox, Pale Moon
4.  **DEPLOY (INSTALL)**: Composer  
    Git and Github      

##  2\.3 [Composer](https://getcomposer.org/download/)

I use newest XAMPP 64 bit xampp-portable-windows-x64-7.3.7-1-VC15.7z on newest Windows 10, 64 bit. WAMP not any more because is not fully portable and Composer needs coding displayed below and it is only for Windows. It seems WAMP is not giving newest/simplest solutions as XAMPP does.

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


## 2\.4 Free hosting with free MySql (or Mariadb) DB
**Demo site** free hosting where blog (msg) module is installed **http://phporacle.eu5.net/ (freehostingeu) or  http://phporacle.heliohost.org/ (heliohost) **. Some details are to do in version 6.1 but all important is visible in version 6.0.      
I do not like heliohost activity requirement: "you must visit your site each month" or will be suspended for inactivity after 30 days. They should allow for ever free sites useful for sharing knowledge. I like heliohost simple, clever, very useful pages. I do not like freehostingeu feature "upload zip files not allowed".   

|       Web hosts PHP,  MySQL DB                             |                           Features                                |Other Features |
| ----------------------------------------------------------------- | ------------------------------------------------------- | ------------------------------------------ |
|  **http://phporacle.eu5.net/ (freehostingeu)**        | stable, fast FTP (6x faster than heliohost) |  upload zip files not allowed, but possible  |
|  **http://phporacle.heliohost.org/ (heliohost) **     |  stable FTP, Web Disk  | ~~not fast (I am in Europe, Zagreb), activity requirement~~ |
| Heroku                                                               |  ~~only Postgres DB~~  |  ~~seems complicated to me~~  |
| https://www.gigarocket.net/free-hosting.php    |  ~~does not send confirmation email~~  |  |
| https://infinityfree.net/                                       |   ~~does not send confirmation email~~  |  |
| https://www.ilbello.com/en/                              |   ~~does not send confirmation email~~  |  |
| https://www.000webhost.com/                          |  ~~**unstable FTP**~~  |  |
Some ask 3, 5 or 15 $ (per year ?) for domain (eg https://client.googiehost.com/ , https://www.freehosting.com/free-hosting.html , https://cp1.awardspace.net/beta/login/).      



  
# <a name="crud"></a>3\. PHP 7, Bootstrap 4 : DB tables rows PDO CRUD
  [Top](#top)      <a href="#directories" id="lnkdirectories">Directories</a>     [UML](#uml)     [DM](#dm)     [2. IDE](#ide)     **3. CRUD**     [4.  SW fw](#swfw)        

May be jQuery, PHP, Bootstrap AJAX DB table rows CRUD is simplest, fastest best CRUD but I prefer no jQuery AJAX . Only Javascript I need is dialog yes or no.

## B12phpfw code snippets
### B12phpfw core UML diagram - classes attributes & methods (made with Symenu yEd)
CRUD db tables rows modules like my msg (blog) should be based on code skeleton shown in  UML diagram. Non CRUD modules like my mnu and mkd : without such code skeleton **may be code is simpler ?** If mnu module (which is links to pages / modules) needs CRUD functionality (I think never needs), we should base it on code skeleton shown in  UML diagram. Both global db classes are ~400 lines, global config class is ~400 lines - they are so small that may be included in any module. Interesting detail: Msg (blog) module has no problem, but in Mnu module global ftr.php displays: Fatal error: Uncaught Error: Using $this when not in object context in J:\awww\www\zinc\ftr.php       


<br /><br />
$do\_pgntion attribute in class Dbconn\_allsites is used in **module msg ee blog**  fwphp\glomodul\blog, in home.php, home_side_area.php and dashboard.php eg so :     
```
self::$do_pgntion = '1'; //command for all tables global read fn "rr" to read paginated ee to read rows block (recordset)
$c_posts = $this->rr( "SELECT * FROM posts WHERE $qrywhere", $binds
   , __FILE__ .' '.', ln '. __LINE__ ) ;
```

There are not many important PHP statements in classes above, but we must understand them !!       
Understand means learn all **conventions** (which are more important then **configurations**). Eg :       

**../../../** is path to www dir ee to web server or to ISP (inet hosting) folder.       

**$pp1** is properties global container array like Oracle forms property palette.     

In msg (blog) module are two masters (usr, category) 1:M posts rows, and two level of details posts 1:M comments.     

R O U T I N G  T A B L E  is in array $this->pp1 assigned in class Home_ctr which extends Config_allsites     
After **i/** is method in this->Home_ctr which **includes/calls** same named (or not) script/method or calls some (global method) or...     
**QS=?**=url adress Query separator (url query is key-value pairs). Without QS we must use Apache mod-rewrite and Composer auto loading classes instead own simple-fast auto loading.        

DISPATCHER  includes, calls and **http jumps only to other module**. So **we may not use constants but module property palette $pp1 which contains globals !**

**cc, rr, uu, dd** rows CRUD methods are used for all tables !!

# 3\. 1 B12phpfw CRUD module code snippets
- module bootstrap, configuration, router, dispatcher - see Domain model [DM](#dm).        

Three module scripts and four scripts global for all sites are  B12phpfw (programs **skeleton** for links = menus and CRUD).        
Like any good programing **templates** (**framework**), it is not easy to understand them but is very useful !!        

### BLOG (MSG) MODULE SCRIPT 1:   index.php
```php
<?php
//J:\awww\www\fwphp\glomodul\blog\index.php, J:\awww\www=WEBSERVER_DOC_ROOT_DIR=../../../
...
```
see [DM](#dm).


### BLOG (MSG) MODULE SCRIPT 2:   Home_ctr.php
see [DM](#dm).


### BLOG (MSG) MODULE SCRIPT 3:   Admin_crud.php
see [DM](#dm).


# 3\.2 B12phpfw core code snippets

### GLOBAL FOR ALL SITES SCRIPT 1: Config_allsites.php
17 kB, contains global configs class which we change only for new functionality and testing
```php
// J:\awww\www\zinc\Config_allsites.php
... 
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
//extends  = ISA ("is a something") relation = not "conf is contained in db" but
//"conf is addition to db" - technicaly could be in db (is not for sake of clear code)

abstract class Config_allsites extends Db_allsites
{
  // can be named AbstractEntity
  /** 
  * ****************************************************
  * 1. R O U T I N G  - IS NOT NEEDED IF NO USER INTERACTIONS (ee links) 
  * ****************************************************
  */
  public $uriq ; //url parameters (url query string) after QS='?' are key-value pairs
                 // if using Composer autoloading classes set QS=''.
  public $pp1 ;  //M O D U L E  PROPERTIES PALLETE like Oracle Forms

  public function __construct($pp1, $pp1_module_links)
  {
     ...  
     $this->uriq = (object)$uriq ;
     ...
     $this->pp1 = (object)$pp1 ;
  ...
      /**
      *           **** 2. D I S P A T C H I N G
      * may be in module`s Home_ctr (code here is global for all sites)
      */
    /** ************** coding step cs04. *******************
    * DISPATCHER: calls Home_ctr cls method which 
    * calls fns or includes view scripts (http jumps only to other module)
    ***************************************************** */
        // CONVENTION :
        // i = ctrakcmethod of  H o m e_c t r  cls which includes view script or calls method (does tblrow CRUD...)
        $akc = $this->uriq->i ; //uriq = url query string, default = home
        $this->$akc() ; //dispatching using home class methods is based on Mini3 php fw
              /*
              //         Slim does same so :
              use Psr\Http\Message\ResponseInterface as Response;
              use Psr\Http\Message\ServerRequestInterface as Request;
              use Slim\Factory\AppFactory;

              require __DIR__ . '/../vendor/autoload.php';

              $app = AppFactory::create();

              $app->get('/hello/{name}', f unction (Request $request, Response $response, array $args) {
                  $name = $args['name'];
                  $response->getBody()->write("Hello, $name");
                  return $response;
              });

              $app->run();
              */

...
// also some helper methods :
static public function escp($string) //ESCAPING OUTPUT (XSS attacks : hacker injects malicious client-side code into output of your page)
public function Redirect_to($New_Location){
public function ErrorMessage(){
public function SuccessMessage(){
public static function get_pgnnav( // P A G I N A T O R
```

### GLOBAL FOR ALL SITES SCRIPT 2: Db_allsites.php
17 kB contains global PDO CRUD class.
Contains 4 CRUD methods for any table : cc, rr, uu, dd. Outside code which calls cc, rr, uu, dd does know what they do (CRUD) but **does not know how (does not know PDO DBI exsistance).**      
```php
// J:\awww\www\zinc\Db_allsites.php
...
class Db_allsites extends Dbconn_allsites {
...
```



### GLOBAL FOR ALL SITES SCRIPT 3. :   Dbconn_allsites.php
**We other connection(s) on any lower level (site, group of modules, module)**      

### Copy one of next two to J:\awww\www\zinc\Dbconn_allsites.php !!  
Singleton dbconnect to Oracle or MySQL or... Singleton means that method "get\_or\_new" called many times instatiates class Db\_allsites only once (for each start of index.php).     
TODO: if possible do this code better. 

```php
<?php
// J:\awww\www\zinc\Dbconn_allsites_mysql.php
// single access point to our database (singleton class).
namespace B12phpfw ;
use PDO;
class Dbconn_allsites
{
    protected static $dbi    = null;
    private static $instance = null;

    private function __construct() {
    }

    public static function get_or_new_dball($caller)
    {
      self::$dbi = 'mysql' ;
      if(is_null(self::$instance)) {
        $dsn = "mysql:host=localhost;dbname=cmsakram" ;
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];
        self::$instance=new PDO($dsn,'root','',$options);
        //self::$instance=new PDO("mysql:host=localhost;dbname=cmsakram",'root','',$options);
      }
      return self::$instance;
    }
}
```

```php
<?php
// J:\awww\www\zinc\Dbconn_allsites_oracle.php
// single access point to our database (singleton class).
namespace B12phpfw ;
use PDO;
class Dbconn_allsites
{
    protected static $dbi    = null;
    private static $instance = null;

    private function __construct() {
    }

     public static function get_or_new_dball($caller)
    {
      self::$dbi = 'oracle' ;
      if(is_null(self::$instance)) {
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];

        $host = // USERDOMAIN = pcname eg sspc2 is ok for oracle not for mysql
          getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8' ;
        $dsn  ='oci:dbname='.$host ;
        self::$instance = new PDO($dsn, 'hr', 'hr', $options); 
        //$dsn = "mysql:host=localhost;dbname=cmsakram" ;
        //self::$instance=new PDO($dsn,'root','',$options);
      }
      return self::$instance;
    }
}
      //WORK ALL THREE : (etenv('USERDOMAIN') does not work for MySql !!)
      //,'host'=>getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
      //,'host'=>'sspc2/XE:pooled;charset=UTF8'
      //,'host'=>'localhost/XE:pooled;charset=UTF8'
      //
      // Safely get the value of an environment variable, ignoring whether 
      // or not it was set by a SAPI or has been changed with putenv
      //$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR')
      // define  h o s t :
      //, 'host'=>'define  h o s t  in Config_ allsites.php'
```





### GLOBAL FOR ALL SITES SCRIPT 4: Autoload.php
6 kB contains autoload class which includes namespaced classes global for all sites, different modules classes or external classes
```php
// J:\awww\www\zinc\Autoload.php
...
```
  
  
  
  
  

  
  
  
  
  

**WHY**  
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


**WHAT**

1.  FW core code - **globals for all sites** in zinc directory is less than 50 kB. Site fwphp (wit many learning examples) is 4 MB like Bludit flat files CMS. OctoberCMS site (not better, less pages) based on Laravel framework is ~20 times bigger, has complicated settings (Dashboard, control panel like Yoomla).
    
    1.  **Config\_allsites.php** 17 kB contains global configs class which we change only for new functionality and testing
    2.  **Autoload.php** 6 kB contains autoload class which includes namespaced classes global for all sites, different modules classes or external classes
    3.  **Db\_allsites.php** 17 kB contains global PDO CRUD class CRUD methods cc, rr, uu, dd 
    4. ** Dbconn_allsites.php** class = singleton dbconnect to Oracle or MySQL or...  
        Contains 4 CRUD methods for any table : cc, rr, uu, dd.  
        
    4.  hdr, ftr
    
Do not fear of lot of global and module variables. Module and global config classes Home\_ctr.php and Config\_allsites.php are like Oracle Forms Property palette, but better.
    
Most important modules are :      
    
2.  **mnu module** [https://github.com/slavkoss/fwphp/tree/master/fwphp/www](https://github.com/slavkoss/fwphp/tree/master/fwphp/www) = main menu for groups of modules (home of site "fwphp" ). Like mkd module it is not B12phpfw CODE CONFIGURATION - not needed for simple modules.     

3.  **blog = msg module** See readme.md in  [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/blog](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/blog) 
See first easier to understand:
 **adrs module based on Mini3** PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good work). My **routing using key-values** is different but **dispatching using home class methods** is based on mini3. This is CRUD of one table songs - ee of URL-s (adresses) of youtube songs. Songs can be played clicking on link. [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs)               

4.  **mkd module** is used in msg (blog) module to dispatch (include) html display of post in markdown file. [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/mkd](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/mkd) = markdown WYSIWYG editor (SimpleMDE & Parsedown) Parsedown sintax highlighting [https://highlightjs.org/download/](https://highlightjs.org/download/) : \`\`\`css hljs.initHighlightingOnLoad(); \`\`\` mkd module is good to learn OOP programming (commented in index.php because for simple view scripts we do not need OOP). Simmilar small code is for Summernote HTML text WYSIWYG editor as for Markdown WYSIWYG markdown text editor which I use .         

5.  **lsweb module** is utility to all sites navigation and run php scripts, good for z\_examples dir (group of modules) which are not in mnu module links [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/lsweb](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/lsweb)          

6.  **oraedoop** is utility to all tables edit and export. Lot of session variables.          

8.  Many learning examples are in **modules in learn directory z\_examples** [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\\\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples)

  
  
  

**HOW**  
Important is to learn :

1.  code skeleton,
2.  globals,
3.  how to include class script and instantiate contained class ("new" command) - namespaces, PSR-4 autoloading, class methods parameters in global parameters array $pp1
4.  how to include script (http jumps only to other modules), if you (as I) choose that not all included scripts are classes.

Home controller's methods include scripts or call methods according URL query parameters (uriq object). Important is that home controller's methods enable us to put some parameters in home controller's methods instead in URL - simple and clear coding.  
Routing table contains almost all module-in-own-folder\`s links. It is some more coding but code is very simple and clear.

**WHERE**  
Directories :

1.  **zinc** = includes, assets, framework core
2.  **fwphp** better named modules (we may use any name) = **site** = modules groups (unlimited levels) and modules :
    1.  modules groups are dirs eg glomodul, z\_examples...
    2.  modules like Oracle Forms are subdirs of modules groups dirs, eg www, adrs, blog, lsweb, mkd, post, user... There are no 3 dirs M, V, C for all modules ! Web server doc root (our hosting provider dir) eg J:\\awww\\www is all sites root (I have only fwphp site).

**WHO, WHEN**  
I tested more than 6 versions of mnu, mkd and msg modules based on other people work mentioned below. Lot, lot of work wasted during dozen years (thanks parasits) because of strong-talk-weak-work people. There is lot of details to do for which I had no time but can be easily built on grounds given here.

  
  
  


Explanations below are far less important than code mentioned above - open code and learn it, it is simple but needs few hours (advanced user) - days - weeks/months (beginner) to understand it.
  
  
PHP WEB modules like Oracle forms, ee each module in own dir (not three dirs M, V, C for all modules) - it is not easy to see need to eg for user module convert code from procedural MVC to OOP MVC with namespaces and autoloading like my fwphp modules : main mnu fwphp\\www5 and op.system files cRUd fwphp\\glomodul4\\mkd (c and d we do in op.system, not in mkd !). To me seems that my fwphp modules www5 and mkd could be best standard for large sites but I am not shure. For navigation (url-s, links) code is same - OOP does not help. Procedural MVC user module code is more clear and readable. So why is OOP better ?

Some say: "is OOP mistake ?" - eg lack of reusability in OOP - to get banana (some method or attribute) you get also gorilla holding banana and whole gorilla\`s jungle (all higher classes with complicated dependencies). Eg Interfaces help to get ONLY banana, but coding is complicated - I could find only strong-talk-weak-work code examples about this subject.

*   see [https://phpthewrongway.com/](https://phpthewrongway.com/), or Joe Armstrong why OOP sucks [http://harmful.cat-v.org/software/OO\_programming/why\_oo\_sucks](http://harmful.cat-v.org/software/OO_programming/why_oo_sucks).

  
  
  
  

B12phpfw is based on ideas in many tutorials eg next few are among best (but also on some ideas in best PHP frameworks Laravel, Simfony, Yii, Phalcon...) .         
I did much simpler B12phpfw code based on ideas in CMS blog, Mini3, Todo  example and others listed below. Books about PHP are not so good.

1.  CMS blog Video (7.7 GB) Jazeb Akram : Udemy - The Complete PHP MYSQL Professional Course with 5 Projects - **rare not to simple tutorial**. Similar is video (12.3 GB) Edwin_Diaz_PHP for Beginners - Become a PHP Master - CMS Project. Also some other videos - so seems they are best/simplest code skeletons for CMS blog  ee posts, messages. Videos are huge for commercial reasons to reach higher num_of_GB * $/GB but there is only minimal amount of code.
2.  [**Mini3**](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/adrs) (Mini3 PHP fw [https://github.com/panique/mini3](https://github.com/panique/mini3) - rare not to simple module but could have more functionality.
3.  https://github.com/ngrt/MVC_todo Code is explained in this article blog 2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19
4. Other :
    1. video 8/2016 Paul Amissah [https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/](https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/) :  PHP, procedural MVC PDO MySQL, Bootstrap, AJAX jQuery - good basic code. **Not good are (as in almost all tutorials)** : names, globals,  code snippets composing - no single entry point ee including scripts instead http jumping in scripts
    3.  video Shan Shah 2019 [https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/](https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/),
    4.  video Learn\_OOP\_PHP\_By\_Building\_Complete\_Website\_by\_Traversy\_2018 [bad example](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/traversymvc) to complisated, despite some good code snippets.
    5.  Inanz, Hopkins, Xuding... to simple examples good only for total beginers (dummies).

I made many changes (I hope improvements) which I did because I do not like proposed solutions in best php frameworks and in learning sources mentioned above  (especcialy coding eg Traversy tutorial). Globals are not well coded there. I think that eg invoice php code should be in **own folder - module - like Oracle forms invoice.fmb** (not all forms/reports in 3 folders: M, V, C). **Application** glomodul consists of group of modules subgroups - unlimited levels  eg subgroup [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples)

**Modules subgroups - unlimited levels**. This is important difference ! Can Laravel, Yii, Phalcon work this way (important for large applications) ?

I think that should be simple/fast/professional : **globals**, routing, dispaching, functional namespaces & classes loading , web rich text editing...  
It is why I spended so many hours on this (huge time wasting which should do tools-software authors, not tools-software users like me).


  
    
  

## Code with functional namespaces & class to autoload : global, module-local and external classes

This code skeleton seems complicated compared with [https://github.com/panique/\*\*mini3](https://github.com/panique/**mini3)\*\* which is may be best fw code template for smaller projects (and learning PHP).

For large projects **GLOBALS** which I use here are very important, same as **modules in own folders (not all in 3 dirs M, V, C)**.

About globals see discussion :  
[https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695](https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695)  
[https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d](https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d)  
[https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html](https://blog.ircmaxell.com/2014/11/alternatives-to-mvc.html)       


<br /><br /><br />
During winter 2019/2020 year (much to late because I tested lot what others did) I made Version 6. of **menu and CRUD PHP code skeleton (own framework named "B12phpfw")** - core code is less than 50 kB.     
I also made Blog (posts, messages) module **"Msg"** with posts edited with Mkd module's WYSIWYG Markdown SimpleMDE editor (or HTML WYSIWYG Sumernote editor or ... any editor you wish). Msg module is based on B12phpfw, also very small code.     
<br />
B12phpfw code skeleton and Msg application based on B12phpfw  are minimal PHP code to learn (medium knowlege) PHP !
<br />
Why ?  I do not like proposed solutions in  in best php frameworks (Laravel, Simfony, Yii...) and learning sources (internet, books). I think that eg module invoice php code should be in own folder like Oracle Forms form invoice.fmb (not all forms/reports in 3 folders: M, V, C). I think that should be simple/fast/professional :
**globals**, routing, dispaching, classes loading , web rich text editing - it is why I wasted many hours coding my B12phpfw (huge time wasting which should do software authors, not sw users-programers like me).      

Why I do not like proposed solutions and what I did to (I hope) improve them. <span style="color:red;">Red colored features are main reasons for B12phpfw, but I improved also other features.</span> :      

### Compared B12phpfw Msg (blog) module and Mini3 module URLs Youtube songs adresses and TraversyMVC blog module
TraversyMVC (has video) and Mini3 are simplified, with some (many?) differences compared to Laravel, Simfony, Yii... B12phpfw is much more different - see red colored features. PHP framework authors do not show such fitures table, for me it is hiding fitures (sell cat in bag).

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


### CRUD test output with PDO DEBUG message (line 65)

INSERT INTO users(registration_date,user_name,user_pass) VALUES('2019-12-16 17:30:28','test','test')--SAYS Database.php, line 65

C R E A T E : User with name test added Successfully    

R E A D : Logged in user is test    
***** password_verify NOT SUCCESSFUL >*****        
***** After password_hash, password_verify SUCCESSFUL >*****        
           
U P D A T E : User with name test updated Successfully.          
psw test===>$2y$10$rUTt2mZiptroPegqtYIjY.T01I95p5mNpPWm4iKanr8FNjnvQ3pHG       
           
D E L E T E :          
Allways empty : $cursor=         
R E A D : User test deleted !             
zip
### Code to display above output :
```php
<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_MVC\traversymvc\learn\interface_tasks\index.php
//namespace B12phpfw ;
//use PDO;

include 'Dbconn_params.php';
include "Database.php";
//include "User.php";

$db = new Database ;

$username_cre = 'test' ;
$password_cre = 'test' ;

//             C R E A T E   dbi for all tables, sites, MySql, Oracle...
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "registration_date,user_name,user_pass" ;
    $qrywhat = "VALUES(:dateTime,:username,:password)" ;
    $binds = [
      ['placeh'=>':dateTime',  'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':username',  'valph'=>$username_cre, 'tip'=>'str']
     ,['placeh'=>':password',  'valph'=>$password_cre, 'tip'=>'str']
    ] ;
$cursor = $db->cc($db,'users',$flds,$qrywhat,$binds);
    if($cursor){
      echo "<h3>C R E A T E : User with name ".$username_cre." added Successfully</h3>" ;
    }else { 
      echo "<h3>C R E A T E : User with name ".$username_cre." NOT added. Something went wrong !</h3>" ;
    }



//          R E A D   dbi for all tables, sites, MySql, Oracle...
$c_r = $db->rr("SELECT * FROM users WHERE user_name=:username" //AND user_pass=:password
  , [ ['placeh'=>':username', 'valph'=>$username_cre, 'tip'=>'str']
  ]
, __FILE__ .' '.', ln '. __LINE__) ;
$r = $db->rrnext($c_r);
  $dbpass = $r->user_pass;
  $id_cre = $r->user_id;

echo "<h3>R E A D : Logged in user is $r->user_name</h3>" ;

if(password_verify($password_cre, $dbpass)) {
    echo "<h3>***** password_verify SUCCESSFUL >*****</h3>" ;
    //exit(0) ;
}


echo "<h3>***** password_verify NOT SUCCESSFUL >*****</h3>" ;

$dbpass = password_hash($password_cre, PASSWORD_DEFAULT); //$_POST["password"]
if(password_verify($password_cre, $dbpass)) {
    echo "<h3>***** After password_hash, password_verify SUCCESSFUL >*****</h3>" ;
    //exit(0) ;
}





//                   U P D A T E
$id = $r->user_id;
      $flds     = "SET user_pass = :dbpass" ;
      $qrywhere = "WHERE user_id=:id" ;
      $binds = [
          ['placeh'=>':dbpass', 'valph'=>$dbpass, 'tip'=>'str']
        , ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int']
      ] ;
$cursor = $db->uu($db,'users',$flds,$qrywhere,$binds);

    if($cursor){
      echo "<h3>U P D A T E : User with name ".$username_cre." updated Successfully.</h3>"
       .'psw '.$password_cre.'===>'.$dbpass
      ;
    }else {
      echo "<h3>U P D A T E : User with name ".$username_cre." NOT updated new \$dbpass = $dbpass</h3>" ;
    }


//                   D E L E T E
$cursor = $db->dd('user_id', 'users', $id_cre);
//$cursor = $db->dd('user_id', 'users', -100);
       echo '<h3>D E L E T E :</h3><pre>'; echo '<br />Allways empty : $cursor='; print_r($cursor) ; echo '</pre>';
//if($cursor){ echo "<h3>D E L E T E : User with name ".$username_cre." deleted Successfully</h3>" ;
//}else {echo "<h3>D E L E T E : User with name ".$username_cre." NOT deleted</h3>";}

//          R E A D   dbi for all tables, sites, MySql, Oracle...
$c_r = $db->rr("SELECT * FROM users WHERE user_name=:username" //AND user_pass=:password
  , [ ['placeh'=>':username', 'valph'=>$username_cre, 'tip'=>'str']
  ]
, __FILE__ .' '.', ln '. __LINE__) ;
$r = $db->rrnext($c_r);
if ($r) {
  echo "<h3>R E A D : User to delete is $username_cre, read him returns: $r->user_name</h3>" ;
} else {
  echo "<h3>R E A D : User $username_cre deleted !</h3>" ;
}



exit(0) ;

```




<br /><br />
> // https://community.notepad-plus-plus.org/topic/17366/how-to-install-emmet-plugin/2

Meta Chuh 26 Mar 2019, 15:45  
@Alexander–Rudenko

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


https://dev.to/jorgecc/a-minimalist-mvc-project-using-php-and-without-a-framework-4pd8

https://github.com/TRPB/ImmutableMVC


# <a name="swfw"></a>What is SW fw (Software framework)
[Top](#top)      <a href="#directories" id="lnkdirectories">Directories</a>     [UML](#uml)     [DM](#dm)     [2. IDE](#ide)     [3. CRUD](#crud)    **4.  SW fw**        

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

I never understood enough fw authors explanations which is one of reasons why I do not believe them).   (font Century Gothic 16)      

