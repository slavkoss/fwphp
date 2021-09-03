---
<a name="top"></a>
**Top**.....[1\.4 Dirs](#directories).....[1\.3 UML](#uml).....[1\.5 DM](#dm).....[2\. IDE](#ide).....[3\. CRUD](#crud).....[SW fw](#swfw)   
CRUD module example code 7 scripts:  
[Simplest CRUD](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)   

## 1. My PHP menu & CRUD code skeleton (application architecture I named  B12phpfw)


-----



**B12phpfw : Developed** on home PC on (newest) Windows 10 64 bit with Laragon  (Apache web server, MariaDB).  **Tested** also on Windows Oracle Virtual box Oracle Linux virtual machine  (Apache web server)  and on Linux demo sites. B12phpfw is **result of 20 years learning PHP**. Framework core J:\awww\www\vendor\b12phpfw\ is ~ 80 kB.
## 1\.1 Demo sites - free hosting with free Mysql
See [Code (signals) flow and data flow ](http://phporacle.eu5.net/fwphp/glomodul/blog/?i/read_post/id/54) or [here](http://phporacle.heliohost.org/fwphp/glomodul/blog/?i/read_post/id/54)
1. On Linux : http://phporacle.eu5.net/ (freehostingeu - fast, stable, has free MySQL) - thanks for removing time limit. 
     PHP on Linux is a bit different than on Windows - see below "To do - done".
2. or On Linux :  http://phporacle.heliohost.org/ (heliohost - slow, stable, has free MySQL) - I asked them to remove time limit - no answer.
3. My blog :  http://phporacle.altervista.org
    and  http://phporacle.altervista.org/fwphp/www/ - tech core of Mondadori digital magazine (leading publishing company in Italy) plans to offer free MySQL. 
4. My fwphp site (may be more : fwphp2, 3...) : http://SSPC2:8083/
    
## 1\.2 Download and unzip code from my Github repo

Download from **https://github.com/slavkoss/fwphp**

First "/" in paths below is ownWebServer_or_hosting_DOCROOT_PATH    

Extract from fwphp-master.zip (with many adds ~ 3 MB) only next ~300 kB  :

1. Two folders : vendor and zinc   

2. Menu module  /fwphp/www  folder

3. Markdown content management module in  /fwphp/glomodul/mkd folder  

4. In phpmyadmin 
    1. create database z_blogcms  
    2. import in My SQL J:\awww\www\01_DDL_mysql_blog.sql 

5. CRUD msg-blog module  /fwphp/glomodul/blog, ...user, ...post_category, ...post, ...post_comment (all in glomodul dir).
    Blog module works with other 4 modules in innovative way (see /fwphp/glomodul/blog/index.php).


<br />

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


<br /><br /><br />
<span style="color:red;">Explanations below are far less important than demo site and installation mentioned above - open code and learn it.</span>       
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
   
5. Based on best PHP learning code I could find. See [web server root dir. path]fwphp/glomodul/z_examples ee fwphp site dir -> glomodul dir (group of module- subgroups), z_examples dir (subgroup of modules)   
    https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples - to do make them best possible.

Conclusion after 20 years is : B12phpfw is most useful for CRUD in msg-blog and simmilar modules, so it is **precisely B12phpCRUDfw**. For mnu and mkd markdown WYSIWYG editor and simmilar modules we **most probably do not nead B12phpfw** code skeleton, but I did it.     
**Includes and method calls instead http// jump to pages** - this is interesting question. http// jump to pages in B12phpfw is used only to jump in other module.



<br /><br /><br /><br />
## 1\.4 To do - done
Everything important is done in current version code. 

Done : 
1. Code logic like Oracle Forms.
2. Modules mnu (main menu), msg (blog), mkd (WYSIWYG markdown editor, with Simplemde or with Summernote HTML).
3. FUNCTIONAL namespaces
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
1.   2020.09.05 **DONE** On Linux demo sites : some PHP statement works different than on Windows (about dozen incompatibilities), eg links do not work in msg module, but work in mnu and mkd modules)  :   DONE in wsroot_path\zinc\Config_allsites.php :  
   Error on Linux not on Windows : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);  
   No error on both OS : $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;  

2.  2020.09.30 **DONE version 7.0.0.0** where 7 is main ver. (refactored core code), 1st 0 is DB change, 2nd 0 is code change, 3rd 0 is error correction change
    1. declare(strict_types=1) ; - PHP 7
    2.  DBI improved : **trait Db_allsites** instead class Db_allsites. 
    3. Each DB table (persistent storage) has adapter **class Tbl_crud :**  which uses B12phpfw\core\zinc\Db_allsites  and  implements Interf_Tbl_crud
       This means that :
       1. Module's views or ctrs, eg blog module (see blog folder) work much easier with more Tbl_crud, ee with own Tbl_crud and with other tables Tbl_crud's.
       2. class Home_ctr extends class Config_allsites. ( **Logically all is in Home_ctr**).

3.  2021.xx.xx **TO DO version 8.0.0.0** where 8 is main ver. (refactored core code), 1st 0 is DB change, 2nd 0 is code change, 3rd 0 is error correction change
     1. Framework module is not in J:\\awww\\www\\zinc folder but in J:\\awww\\www\\vendor\\b12phpfw - like any package used for our applications modules.
     2. CRUD & navigation code is generalized - global snippets are in global methods where possible.
     3. Views are classes - clearer and cleaner code than include scripts - eg Upd class as include script was complicated.

    DONE ver. 8.0.0.0  J:\\awww\\www\\fwphp\\01mater\\book\\index.php  http://dev1:8083/fwphp/01mater/book/
    
4. TO DO See J:\\awww\\www\\fwphp\\glomodul\\user_ver8 : 
    1. DONE framework core in [sitedocroot]/vendor/b12phpfw (v. 7 in [sitedocroot]/zinc)
    2. improve CRUD sintax
    3. improve links aliases in view scripts
    4. Views are classes

5. 2021.08.28 ver 7.0.5 : I added  **folder (module) WEBSERVERROOT/fwphp/glomodul/img_gallery**     
    J:\\awww\\www is my WEBSERVERROOT.    
    J:\\awww\\www\\fwphp is MYDEVSITEROOT1. You may have more MYDEVSITEROOT2, 3... See how in **WEBSERVERROOT/index_laragon.php** script.    
    glomodul is group of folders - modules which are not 01mater or 02financ or 03...  glomodul may be named othermodules.     
    img_gallery module is **first lesson** about (theory behind) code skeleton (application architecture) B12phpfw     
    




<br /><br /><br /><br />
## 1\.5 Adresses on op.system and on web are difficult to understand
and bad explained in all PHP frameworks and learning sources.

See readme_thoughts.md




<br><br><br><a name="uml"></a>
## 1\.6 B12phpfw UML diagram - classes structure - Attributes and Methods
[Top](#top)......[Dirs](#directories).....**UML**.....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

### Adapters (implementations - classes or methods) depend on interfaces (features, ports)

See readme_thoughts.md


-----

# B12phpfw core 
## 1\.6 1a. DBI: NO MORE in ver. 7 Dbconn_allsites abstract cls : DB CONNECT
B12PHPFW CORE CODE. LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL)


-----


No more Dbconn_allsites class, only trait Db_allsites and :
```php
<?php
// J:\awww\www\zinc\Dbconn_allsites.php
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




## 1\.6 1b. DBI: trait Db_allsites  : code type DB PDO CRUD ADAPTER, PDOQueryBuilder  
B12PHPFW CORE CODE. LEVEL : ALL SITES (SAME CODE FOR ALL SITES, SHARED, GLOBAL, REUSABLE)  
(MODEL, AbstractEntity)

Was abstract class. **Trait is simmilar to class**, but **some class may use more traits (net - more parents),  but may extend only one class (hierarchy)**. 


-----



**Attributes**
```php
declare(strict_types=1);
namespace B12phpfw\core\zinc ;
use B12phpfw\core\zinc\Config_allsites ;
trait Db_allsites
{
    private static $instance = null ; //singleton! or protected static $DBH;

    private static $do_pgntion; //used in home.php...

    private static $dbi ; // mysql or oracle or any  d b i  you wish

    // See list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
    //     , self::$db_username, self::$db_userpwd) 
    // = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_once !!
    private static $db_hostname ;
    private static $db_name ;
    private static $dsn ;
    private static $db_username ;
    private static $db_userpwd ;

    private static $dbobj;   // or $conn
    //private $stmt;    //P D O  statement handler, I use it only in dd fn
    private $errmsg;  //handle our error not used currently, can be useful
```


-----



**Methods** in J:\awww\www\zinc\Db_allsites.php (13 hits) :  
```
Line   74:   static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**')
Line 129:   static public function closeDBConn()
Line 137:   static public function getdbi()
Line 143:   static public function setdo_pgntion($new_val)
Line 165:   static public function dd(object $pp1, array $other)
Line 197:   static public function rrnext(object $cursor){
Line 214:   static public function rrcount($tbl)
Line 225:   static public function rr_last_id($tbl) {
Line 250:   static public function rr( $dmlrr, $binds = [], $other = [] )
Line 348:   static public function cc( string $tbl, string $flds, string $valsins
Line 409:   static public function uu( $tbl, $flds, $where, $binds = [] )
Line 475:   static public function debugPDO(string $dmlxx, array $binds, array $ph_val_arr): string
```



-----



  


-----



## 1\.6 2. Conﬁg_allsites abstract cls : CONFIG AND UTILS (functions)
B12PHPFW CORE CODE. LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL)


-----



 **Attributes**  
```php
declare(strict_types=1);
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;
//use B12phpfw\core\zinc\Config_allsites ;

//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj

abstract class Config_allsites //extends Db_allsites
{
  // can be named AbstractEntity
  /** 
  * ****************************************************
  * 1. R O U T I N G - IS NOT NEEDED IF NO USER INTERACTIONS (ee links) 
  * ****************************************************
  */
  //url parameters (url query string) after QS='?' are key-value pairs
 
 //M O D U L E  & GLOBAL (COMMON) PROPERTIES (for all sites) PALLETE like Oracle Forms
  private $pp1 ; //was public. If using Composer autoloading classes set QS=''.

```


-----



**Methods** in cls file Config_allsites.php (18 fns) **less than 250 important lines**
1.   public function \_\_construct(object $pp1, array $pp1\_module)
     1. C H E C K  R E Q U I R E M E N T S
     2. DEFINE  A D R E S S E S  (NO CONSTANTS). Adresses = paths & relative paths
        3.1 R O U T I N G - find URL parts for user events methods calls ee $uri_arr = explode(QS, $REQUEST_URI)
        3.2 Assign  $ p p 1 = array of module properties
     4. D I S P A T C H I N G = calls Home_ctr cls method (CONVENTION : i=ctrakcmethod)
        which calls fns or includes view scripts (http jumps only to other module).
        Dispatching using home class methods is based on Mini3 php fw.

```
 J:\awww\www\zinc\Config_allsites.php (18 hits)
	Line   28:   public function __construct(object $pp1, array $pp1_module_links)
	Line 296:   public function setp($property, $value){
	Line 238:   public function getp($property){
	Line 256:     static public function rlows(object $r) //all row fld names lowercase
	Line 275:     static public function escp(string $string) //ESCAPING OUTPUT
	Line 288:     static protected function secure\_form($form) {
	Line 296:     static public function Redirect\_to($New_Location){
	Line 315:     public function ErrorMessage(){
	Line 324:     public function SuccessMessage(){
	Line 345: public static function get_pgnnav( $rtbl = 0, $mtd_to_inc_view = '/i/home/', $uriq, $rblk = 5 ) //paginator
	Line 439:   public function setcsrf() {
	Line 448:   public static function jsmsg($msg) 
	Line 479:     public function toArray($cls) {
	Line 484:   public function print_objvars($obj)
	Line 491:   public function print_clsmethods($obj)
	Line 499:   public function class_parentage($obj, $class)
	Line 513:   public function uname2clsses($username) { //was auth
	Line 527:   public function has_rights() {
```




<br /><br />


-----



## 1\.6 3. Autoload cls included in index.php : TO AVOID INC. COMMANDS IN MANY SCRIPTS
B12PHPFW CORE CODE. LEVEL : ALL SITES (SAME CODE FOR ALL SITES ee SHARED, GLOBAL)  


-----



**Attributes**  
```php
declare(strict_types=1);
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;

if (strnatcmp(phpversion(),'7.0.0') >= 0) {
      if (session_status() == PHP_SESSION_NONE) { session_start(); }
} else { 
  if(session_id() == '') { session_start(); } 
}


class Autoload
...
```


-----



**Methods** in cls file   Autoload.php (6 fns)
**public function \_\_construct($pp1)**
```
   public function __construct($pp1) {
     $this->pp1 = $pp1 ;
     spl_autoload_register(array($this, 'loader'));
     return null ;
   }

  J:\awww\www\zinc\Autoload.php (4 hits)
	Line 17:    public function __construct(&$pp1) {
	Line 32:   private function get_path($nscls, &$nsdir_routTBLclsdir) // static ?
	Line 97:   private function loader($nscls) //$ n s c l s is namespaced  c l a s s  name
	Line 139:   private function fmt(string $txt, string $color, string $bold='')
```




-----




# B12phpfw modules
### call_child_fn_from_parent_cls.php explains B12phpfw routing and dispatching principle

```php
<?php
/**     
 * J:\awww\www\fwphp\glomodul\z_examples\call_child_fn_from_parent_cls.php  WHY ?      
 * DISPATCHING is calling method according URL parts (extracted with ROUTING code).    
 * Because MODULE METHODS PARAMS ARE MOSTLY GLOBAL (same for all modules), eg paths,      
 * to avoid lot of same code in modules (code redundancy) :    
 * 1. WE ASSIGN GLOBALS IN PARENT CONF&UTL CLS METHOD
 *    (not knowing which module is going to use them)        
 * 2. THEN, FROM PARENT CLS WE CALL METHOD IN CHILD MODULE CLS. 
 *    Module method knows how to use globals 
 *    and what module needs for parameters beside globals.       
 */

declare(strict_types=1);

/** 
 *         ns (NAMESPACES) we use in clses script autoloading.
 * vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
 * eg B12phpfw is vendor_namesp_prefix  ; //FUNCTIONAL, NOT POSITIONAL
 *     FUNCTIONAL parts are not requirad, we use them to better understand script purpose.
 *eg clsdir - only this part of namespace is POSITIONAL, CAREFULLY ! 
 */
namespace B12phpfw\module\z_examples ;

abstract class utl { // Config_ allsites & global utilities
  // utilities class

  public function __construct(string $called_module_method) {
    echo '<br><b>echo from PARENT CONFIG&UTILS cls :</b> '. __METHOD__ 
    .'<br>MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules !!' ;
    $obj_params = (object)['p1'=>'p1value'] ; //global elements of property pallete 
    return static::$called_module_method($obj_params); // Here comes Late Static Bindings
  }

    public static function call_module_method(string $akc, object $obj_params) {
      echo '<br><b>echo from PARENT CONFIG&UTILS cls :</b> See how is created  m e t h o d  name  $ a k c  in abstract class Config_ allsites, m ethod __c onstruct :<br>
      $this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr) calls private fns (in child cls Home_ ctr)
      ' ;
                //static::called_module_method(); // Here comes Late Static Bindings
                //return $this->$akc($pp1) ;
      return static::$akc($obj_params); // Here comes Late Static Bindings
    }
}

class Home_ctr extends utl {
  // module controller

  public function __construct() {
    // Do global configuration because 
    // MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules
    parent::__construct('called_module_method'); 
    //Home_ctr::call_module_method('called_module_method', (object)['p1'=>'p1value']);
  }

    protected static function called_module_method(object $obj_params) {
      // here can be added module dependent parameters
        echo '<br><br><b>echo from child cls :</b> '. __METHOD__ ;
        echo '<pre><b>$obj_params</b>='; print_r($obj_params) ; echo '</pre>';
    }
}


$module_ctr = new Home_ctr(); // instatiated in index.php
//    or :
//Home_ctr::call_module_method('called_module_method', (object)['p1'=>'p1value']);


/*
//outputs : 
echo from PARENT CONFIG&UTILS cls : B12phpfw\module\z_examples\utl::__construct
MODULE METHODS PARAMS ARE MOSTLY GLOBAL - same for all modules !!

echo from child cls : B12phpfw\module\z_examples\Home_ctr::called_module_method

$obj_params=stdClass Object
(
    [p1] => p1value
)
*/
```

## 1\.6 4. Home_ctr cls : MODULE CONTROLLER CODE, ROUTES, CALLS
B12PHPFW MODULE CODE. LEVEL : MODULE (SAME CODE FOR MODULE ee FOLDER, eg mnu or mkd or msg=blog)

For program execution class hierarchy is as all attributes and methods in classes above  Home_ctr are in Home_ctr class ee in **$this object** which is instantiated (created in memory) Home_ctr (and automatically all classes above). Why shared attributes and methods are in hierarchy above Home_ctr and not in Home_ctr ? Because we do not want write in each Home_ctr class code in class above. Instead we **reuse code in shared class (globals)** above Home_ctr. 


-----



 **Attributes**  
```php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\blog ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\dbadapter\user\Tbl_crud                  as Tbl_crud_admin;  //to Login_ Confirm_ SesUsrId
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\post\Tbl_crud                  as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

//extends  = ISA relation type ("Is A something") = not HAS_A :  "Home_ ctr has property Config_allsites, like kitchen has knife" but :
//"Home_ ctr is addition to Config_ allsites" - technicaly could be in Config_ allsites, but is not for sake of code reusability and clear code because Home_ ctr is module code and we do not want all modules code in shared code Config_ allsites.
// May be named App, Router_dispatcher... :

class Home_ctr extends Config_allsites //implements Interf_Tbl_crud
...
```


-----



**Methods** in blog dir where is blog module code,  cls file  Home_ctr.php (27 fns)  
```
  J:\awww\www\fwphp\glomodul\blog\Home_ctr.php (41 hits)
	Line 8: // *************** FUNCTION 1. N A M E S P A C E S  ***************
	Line 29:   // *************** FUNCTION 2. S H A R E S  ***************
	Line 30:   public function __construct(object $pp1)
	Line 113:   protected function call_module_method( // also other module method !!
	Line 130:   private function del_row_do(object $pp1) // *************** SHARED  d d (
	Line 177:   private function del_category(object $pp1)
	Line 188:   private function del_admins(object $pp1)
	Line 199:   private function del_posts(object $pp1)
	Line 210:   private function del_comments(object $pp1)
	Line 223:   private function errmsg(object $pp1, string $myerrmsg)
	Line 235:   * *************** FUNCTION 3.  S E S S I O N  M E T H O D S ***************
	Line 238:   private function Login_Confirm_SesUsrId() {
	Line 242:   private function logout(object $pp1)
	Line 252:   * *************** FUNCTION 4. C R U D  M E T H O D S ***************
	Line 259:   // *************** FUNCTION COMPAUND MODULE BLOG ***************
	Line 260:   private function home(object $pp1) //DI page prop.palette   
	Line 280:   private function dashboard(object $pp1) //private
	Line 294:   private function kalendar(object $pp1) //private
	Line 305:   // *************** FUNCTION 5. TO I N C L U D E  P A G E S  WITHOUT  C R U D ***************
	Line 307:   private function contact(object $pp1)
	Line 314:   private function about(object $pp1)
	Line 322:   private function features(object $pp1)
	Line 331:   // *************** FUNCTION SIMPLE MODULE TBL1  A D M I N S - ALL should be in user dir (where is user module code)
	Line 336:   private function admins(object $pp1) //private
	Line 351:   private function read_user(object $pp1) //private
	Line 369:   private function loginfrm(object $pp1) //private
	Line 382:   private function login(object $pp1) //private
	Line 388:   private function upd_user_loggedin(object $pp1) //private
	Line 408:   // *************** FUNCTION SIMPLE MODULE TBL2  C A T E G O R Y ***************
	Line 410:   private function categories(object $pp1) //private
	Line 426:   // *************** FUNCTION SIMPLE MODULE TBL3  P O S T S ***************
	Line 427:   private function addnewpost(object $pp1) //private
	Line 442:   private function posts(object $pp1) //private
	Line 462:   private function filter_postcateg(object $pp1) //private
	Line 510:   private function read_post(object $pp1)
	Line 533:   private function editpost(object $pp1) //private
	Line 551:   private function edmkdpost(object $pp1) //private
	Line 577:   private function readmkdpost(object $pp1, string $fle_to_displ_name, string $only_help='') //private
	Line 634:   // *************** FUNCTION SIMPLE MODULE TBL4  C O M M E N T S ***************
	Line 636:   private function comments(object $pp1) //private
	Line 649:   private function upd_comment_stat(object $pp1) //private

```





-----


<br /><br />
<a name="directories"></a>
## 1\.7 B12phpfw directories (modules) structure
[Top](#top).....**Dirs**.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   

See **info code :**        
http://phporacle.eu5.net/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php       
https://github.com/slavkoss/fwphp/blob/master/fwphp/glomodul/z_examples/03_info_php_apache_config_scripts.php        

B12phpfw is very diferent than (all ?) other PHP frameworks (I prefer "menu & CRUD code skeleton") because dirs are like Oracle FORMS form module .fmb and other reasons mentioned below.    

See readme_thoughts.md


See Mini3 PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good coding). My **routing using key-values** is different but **dispatching using home class methods is based on Mini3**. 

See very good coding (to simple examples and have no namespaces) : 
1. https://github.com/ngrt/MVC_todo 
2. or https://github.com/DawidYerginyan/simple-php-mvc/ 
or many others, Google :  Github php framework



3 modules  and some utilities :   
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

See readme_thoughts.md







<br /><br />
## <a name="SimplestCRUD"></a> 1.9 Simplest "adrs" (MINI3, songs) CRUD module
CRUD rows in **table song(#id, artist, track, link)**. MINI3 framework https://github.com/panique/mini3 is I think best to learn PHP and frameworks code skeleton. My adrs module in glomodul modules group is MINI3 on B12phpfw. Why ? I think for large sites MINI3 is to simple.

<a name="scrudIndex"></a>
### 1\.9\.1 index.php single entry point in module
[Simplest CRUD](#SimplestCRUD).....**index.php**.....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU) ....[adapter](#scrudadapter) 

We need single entry point in module to avoid mess with links (https://... links are not clear, better are includes and method calls).

```php
<?php
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

declare(strict_types=1);

/** 
 *         ns (NAMESPACES) we use in clses script autoloading.
 * vendor_namesp_prefix \ processing (behavior) \ clsdir [\ cls] [as clsalias]
 * eg B12phpfw is vendor_namesp_prefix  ; //FUNCTIONAL, NOT POSITIONAL
 *     FUNCTIONAL parts are not requirad, we use them to better understand script purpose.
 *eg clsdir - only this part of namespace is POSITIONAL, CAREFULLY ! 
 */
namespace B12phpfw\module\adrs ;
use B12phpfw\core\zinc\Autoload ;

//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
$wsroot_path = str_replace('\\','/', realpath('../../../')) .'/' ;
$shares_path = $wsroot_path.'zinc/' ; //includes, globals, commons, reusables

//$Dbconn = [ null, 'mysql', 'localhost', 'z_adrs', 'root', ''] ;

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'7.0.0.0 Adrs (Mini3)' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[
    //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
    $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
    //dir of global clses for all sites :
    ,$shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
              /* //two master modules (tbls) = blocks in Ora. Forms
              ,$app_dir_path.'user/'
              ,$app_dir_path.'post_category/'
              //detail & subdet modules (tbls) = blocks in Ora. Forms
              ,$app_dir_path.'post/'
              ,$app_dir_path.'post_comment/' */
  ]
  //1.4
  //     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
  //    , self::$db_username, self::$db_userpwd) 
  //    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
  // Dbconn_allsites.php : return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
  //, 'Dbconn'=>$Dbconn
] ;

//2. //2. global cls loads (includes, bootstrap) classes scripts automatically
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); //eliminates need to include class scripts

//3. process request from ibrowser & send response to ibrowser :
//Home_ ctr "inherits" index.php ee DI $p p 1
$module = new Home_ctr($pp1) ; //also instatiates higher cls : Config_ allsites
        if ('') {$module::jsmsg( [ str_replace('\\','/',__FILE__ ) //. __METHOD__ 
           .', line '. __LINE__ .' SAYS'=>'where am I'
           ,'After Codeflow Step cs05 '=>'AFTER A u t o l o a d and new Home_ctr($pp1), cs01=bootstraping, cs02=INIT; config; routing, cs03=dispaching, cs04. PROCESSING (model or business logic - preCRUD onCRUD), cs05. OUTPUT (view)'
        ] ) ; }


exit(0);


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
### 1\.9\.2 Home_ctr.php router, dispatcher
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....**Home_ctr**.....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php
<?php
// J:\awww\www\fwphp\glomodul\adrs\Home_ctr.php
// DEFAULT CTR (ONLY ONE IN MODULE), HAS 3 METHODS WHICH  I N C  PAGE VIEW SCRIPT
namespace B12phpfw\module\adrs ;
//use PDO;
use B12phpfw\core\zinc\Config_allsites as utl;
use B12phpfw\dbadapter\adrs\Tbl_crud   as utl_adrs ;  // Tbl_ crud_ adrs

class Home_ctr extends utl //Config_ allsites
{
  public function __construct(object $pp1) 
  {
                        if ('') { self::jsmsg( [ //b asename(__FILE__).
                           __METHOD__ .', line '. __LINE__ .' SAYS'=>'testttttt'
                           ,'aaaaaa'=>'bbbbbb'
                           ] ) ; 
                        }
    if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

    //$akc = $pp1->uriq->i ; //=home
    //$pp1->$akc() ; //include(str_replace('|','/', $db->uriq->i.'.php'));
    /**
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
    $pp1_module = [ // Property pallette module properties
      '<b style="color: blue">ROUTES (LINKS)  assigned  IN  M O D U L E  CTR Home_ctr.php' => '~~~~~~~~~~~~~~~~~</b>'
      , '<b>Part of $pp1 is $pp1_module = (module) property pallette.
          Contains properties =  key-keyvalue pairs : 
          LINKALIAS => ?i/HOME_METHOD_TO_CALL/param1/param1value...</b>' 
      => 
      '
          <b>~~~~~ Eg in view script :
          href =  LINKALIAS $pp1->$pp1->cre_row_frm CALLS cc fn in module ctr so: QS."i/cc/"
              $pp1->cre_row_frm - more generalized, but more writing than QS."i/cc/", 
                  cc fn is not visible in URL (visible is what cc calls/includes)
              //,\'home_adrs\'        => QS.\'i/home/\'
              //,\'cre_row_frm\'        => QS.\'i/cc/\'
              //,\'ldd_category\'     => QS.\'i/del_category/id/\'
              //,\'loginfrm\'        => QS.\'i/loginfrm/\'
              //,\'login\'           => QS.\'i/login/\'
      IF LINK key-keyvalue PAIR IS NOT IN $pp1_module THEN EG : 
      in URLurlqrystring : QS.\'i/loginfrm/\' loginfrm must be M E T H O D NAME in this script.
      </b>'
      //, 'cre_row_frm'     => QS.'i/cc/'
    ] ;  //e n d  R O U T I N G  T A B L E
    //is better $pp1->cre_row_frm ? - more writing, cc fn in module ctr not visible

    parent::__construct($pp1, $pp1_module);


  } // e n d  f n  __ c o n s t r u c t



          /* *****************************************
                 CALL DISPATCH  M E T H O D S
           they 1.call other fns or 2.include script or 3.URL call script
           CALLED FROM abstract class Config_ allsites, m ethod __c onstruct
           so: $pp1->call_module_m ethod($akc, $pp1) ;
               $ a k c  is  m o d u l e  m ethod (in Home_ ctr, not global fn !!
                 because )
          ***************************************** */
                //$accessor = "get" . ucfirst(strtolower($akc));
  protected function call_module_method(string $akc, object $pp1)  //fnname, params
  {
    //This fn calls fn $ a k c in Home_ ctr which has parameters in  $ p p 1
    if ( is_callable(array($this, $akc)) ) { // and m ethod_exists($this, $akc)
      return $this->$akc($pp1) ;
    } else {
      echo '<h3>'.__METHOD__ .'() '.', line '. __LINE__ .' SAYS: '.'</h3>' ;
      echo 'Home_ ctr  m e t h o d  "<b>'. $akc .'</b>" is not callable.' ;
      
      echo '<br><br>See how is created  m e t h o d  name  $ a k c  in abstract class Config_ allsites, m ethod __c onstruct :<br>
      $this->call_module_method($akc, $pp1) ; //protected fn (in child cls Home_ ctr) calls private fns (in child cls Home_ ctr)
      ' ;
      return '0' ;
    }

  }




  /**
  * pgs01. I N C  TEXT SHOWING  P A G E  S C R I P T S
  */
  private function home(object $pp1)
  {
    // Ver. 7 : Dependency Injection $pp1
    //http://dev1:8083/fwphp/glomodul/adrs
      require $pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $pp1->module_path . 'home.php';
      require $pp1->module_path . 'ftr.php';
  }

  private function ex1(object $pp1)
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex1/
      require $pp1->module_path . 'hdr.php';
      require $pp1->module_path . 'example_one.php';
      require $pp1->module_path . 'ftr.php';
      
                  echo '<pre>Property pallette $pp1='; print_r($pp1) ; echo '</pre>';
  }

  private function ex2(object $pp1)
  {
    //http://dev1:8083/fwphp/glomodul/adrs?i/ex2/p1/param1/p2/param2/
    $param1 = $pp1->uriq->p1 ;
    $param2 = $pp1->uriq->p2 ;
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'example_two.php';
    require $pp1->module_path . 'ftr.php';
                  echo '<pre><b>Property pallette $pp1</b>='; print_r($pp1) ; echo '</pre>';
  }






  /**
  * pgs02. I N C  R  (c R u d)  P A G E  SCRIPTS
  */
  private function rt(object $pp1)
  {
    // D I S P L A Y  T A B L E (was AND R O W C R E FRM)
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'read_tbl.php';  
    require $pp1->module_path . 'ftr.php';
  }



  /**
  * pgs03.   I N C  C R U D  P A G E  SCRIPTS   &   (code behind) C R U D  M E T H O D S
  */
  private function cc(object $pp1)
  {
    // I N C  C R U D P A G E  S C R I P T
    // f o r m : http://dev1:8083/fwphp/glomodul/adrs/?i/cc/
    //http://dev1:8083/fwphp/glomodul/adrs
      require $pp1->module_path . 'hdr.php'; // MODULE_PATH
      require $pp1->module_path . 'cre_row_frm.php';
      require $pp1->module_path . 'ftr.php';
  }


    private function dd(object $pp1) // dd_song
    {
      // http://dev1:8083/fwphp/glomodul/adrs/?i/d/rt/song/id/37
      //$this->uriq=stdClass Object  [i] => d  [t] => song  [id] => 37
                    if ('') {self::jsmsg('D BEFORE dbobj '. __METHOD__, __LINE__
                    , ['$pp1->dbi_obj'=>$pp1->dbi_obj //, 
                    ] ) ; }
    // D e l  &  R e d i r e c t  to  r e f r e s h  t b l  v i e w :
    $tbl = $pp1->uriq->t = 'song' ; 
    $other=['caller'=>__FILE__.' '.', ln '.__LINE__, ', d e l  in tbl '.$tbl] ;

    utl_adrs::dd($pp1, $other); //used for all  t a b l e s !! 
    utl::Redirect_to($pp1->module_url.QS.'i/rt/') ; //to read_ tbl

    }


  private function uu(object $pp1)
  {
           //       R O W U P D  FRM
    //echo 'Method '.__METHOD__ .' SAYS: I   i n c l u d e   p h p  
    //http://dev1:8083/fwphp/glomodul/adrs?i/uu/t/song/id/22  see switch default: above !!
                  if ('0') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>'; echo '<b>$pp1</b>='; print_r($pp1);
                  echo '</pre>'; }

    if (isset($pp1->uriq->id)) {
       $uriq = $pp1->uriq ;
       if (isset($uriq->id)) 
         $IdFromURL = (int)utl::escp($uriq->id) ; //NOT (int)utl::escp($_GET['id']) ; 
    } else $IdFromURL = NULL ;
    require $pp1->module_path . 'hdr.php';
    require $pp1->module_path . 'upd_row_frm.php';  
    require $pp1->module_path . 'ftr.php';
  }





   /**
    * AJAX-ACTION: ajax Get Stats
    */
    private function ajaxcountr()  //p ublic f unction ajaxGetStats()
    {
                        //$Song = new Song();
                        //$amount_of_songs = $Song->getAmountOfSongs();
                        //supersimple API would be possible by echoing JSON here
                        //echo $amount_of_songs;
                    if ('') {self::jsmsg('s001ajax. '. __METHOD__, __LINE__
                    , ['$this->uriq'=>$this->uriq, '$instance'=>$instance
                    , '$this->dbobj'=>$this->dbobj ] ) ; }
      echo utl_adrs::rrcount('song'); // not $this->dbobj->R_tb... !!!
    }





    public function errmsg($myerrmsg, object $pp1)
    {
        // h d r  is  in  p a g e  which  i n c l u d e s  t h i s
                   //require $pp1->module_path . 'hdr.php'; //or __DIR__
        require $pp1->module_path . 'error.php';
        require $pp1->module_path . 'ftr.php';
    }




} // e n d  c l s  Home_ ctr
```

<a name="scrudHomeV"></a>
### 1\.9\.3 home.php... - shows links assigned in Home_ctr.php for user interactions or some txt
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....**home (table page.....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    
```html
<!-- J:\awww\www\fwphp\glomodul\adrs\home.php -->
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
### 1\.9\.4 cre_row_frm.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....**create**.....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    

```php
<?php
// J:\awww\www\fwphp\glomodul\adrs\cre_row_frm.php
declare(strict_types=1);
//namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\adrs ;

//vendor_namesp_prefix \ processing (behavior) \ cls dir 
use B12phpfw\core\zinc\Db_allsites   as utldb ;
use B12phpfw\dbadapter\adrs\Tbl_crud as utl_adrs ;

if (isset ($_SESSION["submitted_cc"])) {
  list( $artist, $track, $link) = $_SESSION["submitted_cc"] ;
  unset ($_SESSION["submitted_cc"]) ;
} else { list( $artist, $track, $link) = ['','',''] ; }


//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["submit_add_song"])){
  // returns string
  utl_adrs::cc( $pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ]) ; 
} //E n d  of Submit Button If-Condition

?>


<!--             r o w c r e  frm
http://dev1:8083/fwphp/glomodul/adrs/?i/c/t/song/
    <form action="<?=$pp1->module_url.QS?>i/c/t/song/" method="POST">
-->
  <br /><br />
  <div class="xxbox">


    <form action="<?=$pp1->module_url.QS?>i/cc/" method="POST">

        <label>Artist </label><input type="text" name="artist" value="" required />
        <label>Track </label> <input type="text" name="track" value="" required />
        <label>Link </label>  <input type="text" name="link" value="" />

        <input type="submit" name="submit_add_song" value="Add row" />
    </form>


  </div>
```



<a name="scrudR"></a>
### 1\.9\.5 read_tbl.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....**read (user profile - form**.....[update](#scrudU)....[adapter](#scrudadapter)    

```php
<?php
//J:\awww\www\fwphp\glomodul\adrs\read_tbl.php
//  <!--            display table (was and r o w c r e frm)  -->
declare(strict_types=1);

namespace B12phpfw\module\adrs ;

use B12phpfw\core\zinc\Config_allsites as utl ;    // init, setings, utils
use B12phpfw\core\zinc\Db_allsites   as utldb ;    // model (fns) for all tbls
use B12phpfw\dbadapter\adrs\Tbl_crud as utl_adrs ; //Tbl_ crud_ adrs is model (fns) for song tbl

$tbl='song';

$rcount = utldb::rrcount('song') ;
$cursor = utl_adrs::rr($sellst='*', $qrywhere= "'1'='1'" // ORDER BY aname
  , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

?>
<div class="container">

  <b><span id="ajax_pgtitle_box">Adressess (Links) count : </span><?=$rcount?></b>
         <!--input type="submit" name="submit_add_song" value="Add row" /-->
       <a href="<?=$pp1->module_url.QS.'i/cc/'?>">Add row</a>

     <div style="display: inline;" >
    <button id="ajax_rcount_btn" 
            title="<?=$pp1->module_url.QS?>i/ajaxcountr/">
      Display rows count via jQuery Ajax in span id="ajax_rcount_box"
    </button>
    <span id="ajax_rcount_box"></span>
  </div>


  <!--        main content output : List of songs  -->
  <div class="xxbox">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
     <tr><td>Id</td><td>Artist</td><td>Track</td><td>Link</td><td> </td><td> </td></tr>
        </thead>

    <tbody>
    <?php
    //foreach ($songs as $song) 
    while ( $r = utldb::rrnext($cursor) and isset($r->id) ): 
    { 
      $id = utl::escp($r->id) ; //htmlspecialchars($r->id, ENT_QUOTES, 'UTF-8'); 
      ?>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php if (isset($r->artist)) echo utl::escp($r->artist); ?></td>
        <td><?php if (isset($r->track)) echo utl::escp($r->track); ?></td>
        <td>
            <?php if (isset($r->link)) { ?>
              <a href="<?=utl::escp($r->link)?>">
                 <?=utl::escp($r->link)?></a>
            <?php } ?>
        </td>
        <!-- 
          <td><a href="<=$pp1->module_url . QS . 'i/dd/t/song/id/'.$id?>">Del</a></td>
          $pp1->ldd_admins.$id
          <=str_repeat(' ', 8 - strlen($id)) . $id ?>
        -->
        <td>
           <a id="erase_row" class="btn btn-danger"
              onclick="var yes ; yes = jsmsgyn('Erase row <?=$id?>?','') ;
              if (yes == '1') { location.href= '<?=$pp1->module_url.QS.'i/dd/t/song/id/'.$id?>/'; }"
              title="Delete tbl row ID=<?=$id?>"
           ><b style="color: red">Del</b></a>
        </td>
        
        <td><a href="<?=$pp1->module_url.QS.'i/uu/t/song/id/'.$id?>">Edit</a></td>
      </tr>
    <?php } endwhile; ?>
    </tbody>
    </table>
  </div>


    <p>You are in View: <?=__FILE__?></p>
</div>
```



<a name="scrudU"></a>
### 1\.9\.6 upd_row_frm.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....**update**....[adapter](#scrudadapter)   

```php
<?php
// J:\awww\www\fwphp\glomodul\adrs\upd_row_frm.php
declare(strict_types=1);

//       <!-- u p d  r o w  f o r m -->
namespace B12phpfw\module\adrs ;

use B12phpfw\core\zinc\Config_allsites as utl ;      // init, setings, utils
use B12phpfw\core\zinc\Db_allsites     as utldb ;    // model (fns) for all tbls
use B12phpfw\dbadapter\adrs\Tbl_crud   as utl_adrs ; // model (fns) for song tbl

$tbl='song'; 

//    1. S U B M I T E D  A C T I O N S
if(isset($_POST["submit_update"]))
{
  $cursor = utl_adrs::uu($pp1, $other=['caller' => __FILE__ .' '.', ln '. __LINE__]);

  utl::Redirect_to($pp1->module_url.QS.'i/rt/');
} //E n d  of Submit Button If-Condition
//$fle=basename(__FILE__); $lne=__LINE__; $mtd=__FILE__;
                        if ('') {self::jsmsg( [ basename(__FILE__). //__METHOD__ .
                           ', line '. __LINE__ .' SAYS'=>'s002. BEFORE Rtbl'
                           ,'$pp1->dbi_obj'=>isset($pp1->dbi_obj)?:'NOT SET'
                           ,'$pp1->uriq'=>isset($pp1->uriq)?json_encode($pp1->uriq):'NOT SET'
                           ] ) ; }

$c_rr = utl_adrs::rr( $sellst='*', $qrywhere='id=:id'
  , $binds = [['placeh'=>':id', 'valph'=>$IdFromURL, 'tip'=>'int']] //str or int or no 'tip'
  , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] );
//while ($row_cnt=$this->rrnext($c_rcnt)): {$rcnt=$row_cnt;} endwhile; $rcnt=$rcnt->COUNT_ROWS;
while ( $rx = utldb::rrnext($c_rr) and isset($rx->id) ): {$r = $rx ;} endwhile;
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ;
                  echo '<pre>';
                  echo '<b>$pp1->uriq</b>='; print_r($pp1->uriq);
                  echo '<b>$pp1->uriq->id</b>='; print_r($pp1->uriq->id);
                  echo '<br /><b>$r</b>='; print_r($r); //var_dump($r);
                  echo '</pre><br />';
                  }
if (!$r) { // r o w wasn't found, display error page  $errobj = new Error_C();
  $this->errmsg( '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
    . "r o w id=***{$pp1->uriq->id}*** does not exists in table $tbl"
       ."~~~~~~~~~~~~~~~~~~~~~~~~~~~~"
  );
  exit(0) ;
}
?>


<div class="container">
  <div>
    <h3>E d i t  r o w</h3>

    <form action="<?=$pp1->module_url.QS?>i/uu" method="POST">
      <label>Artist </label><input autofocus type="text" name="artist" 
         value="<?=utl::escp($r->artist)?>" required />
      
      <label>Track </label><input type="text" name="track" 
         value="<?=utl::escp($r->track)?>" required />
      
      <label>Link </label><input type="text" name="link" 
         value="<?=utl::escp($r->link)?>" />
      
      <input type="hidden" name="id" value="<?=$IdFromURL?>" />
      
      <input type="submit" name="submit_update" value="Update id <?=$IdFromURL?>" />
    </form>

  </div>
  <p>You are in View: <?=__FILE__?></p>

</div>
```




<a name="scrudadapter"></a>
### 1\.9\.7 Tbl_crud.php - ORM, DM (Domain Model) adapter cls - pre CRUD class, PHPQueryBuilder
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

//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)

declare(strict_types=1);

namespace B12phpfw\dbadapter\adrs ;

use B12phpfw\core\zinc\Config_allsites as utl ;
use B12phpfw\core\zinc\Interf_Tbl_crud ;
use B12phpfw\core\zinc\Db_allsites     as utldb ;

use B12phpfw\module\adrs\Home_ctr ;
//use B12phpfw\dbadapter\adrs\Tbl_crud   as utl_adrs ;

// Gateway class - separate DBI layers
class Tbl_crud implements Interf_Tbl_crud //Db_post_category extends utldb
{
  static protected $tbl = "song";


  static public function rr(
    string $sellst, string $qrywhere='', array $binds=[], array $other=[] ): object
  { 
    $cursor =  utldb::rr("SELECT $sellst FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    return $cursor ;
  }

  static public function rrcnt( string $tbl, array $other=[] ): int { 
    $rcnt = utldb::rrcount($tbl) ;
    return (int)utl::escp($rcnt) ;
  } 
  static public function rrcount( //string $sellst, 
    string $qrywhere='', array $binds=[], array $other=[] ): int
  { 
    /*
    $cursor_rowcnt =  utldb::rr(
        "SELECT COUNT(*) COUNT_ROWS FROM ". self::$tbl ." WHERE $qrywhere"
       , $binds, $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;
    $rcnt = self::rrnext( $cursor_rowcnt
     , $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] )->COUNT_ROWS ;
    */
    $rcnt = utldb::rrcount('song') ;
    return (int)utl::escp($rcnt) ;
  }


  // pre-query
  static public function rr_all( string $sellst, string $qrywhere="'1'='1'"
     , array $binds=[], array $other=[]): object  //returns $cursor
  {
      // default SQL query
      $cursor =  utldb::rr("SELECT $sellst FROM ". self::$tbl
      ." WHERE $qrywhere ORDER BY title"
        , $binds=[], $other=['caller' => __FILE__ .' '.', ln '. __LINE__ ] ) ;

    //$utldb::disconnect(); //problem ON LINUX
    return $cursor ;
  }


  /* public function rr_last_id(object $dm) {
    return utl::rr_last_id(self::$tbl) ;
  } */





  // *******************************************
  //                   C R E A T E,  D,  U
  // *******************************************

  static public function get_submitted_cc(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
      utl::escp($_POST["artist"]), utl::escp($_POST["track"]), utl::escp($_POST["link"])
    ] ;
    return $submitted ;
  }

  /*
  * O N - I N S E R T  (P R E - I N S E R T)
  * 
  * called from submit code in view script cre_ row_ frm.php
  *     not via H o m e _ c t r  (also possible if you wish) !
  *
  * public function cc
  * returns id or 'err_c c' 
  */
  static public function cc( // *************** c c (
     object $pp1, array $other=[]): string
  {
                if ('') {
                  echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS'.'</h3>';
                  echo '<pre>$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>$pp1='; print_r($pp1); echo '</pre>';
                             //for deleting: $this->uriq=stdClass Object([i]=>dd [id]=>79)
                  //exit(0);
                }

    // 1. S U B M I T E D  F L D V A L S
      $submitted_cc = self::get_submitted_cc() ;
      list( $artist, $track, $link) = $submitted_cc ;
      $_SESSION["submitted_cc"] = $submitted_cc ;

    // 2. C C  V A L I D A T I O N
    $err = '' ;
    switch (true) {
      case (empty($link)): //||empty($Name)||empty($password)||empty($Confirmpassword))
        $err = "Link field must be filled out"; break ;
      //default: break;
    }
    
    if ($err > '') { $_SESSION["ErrorMessage"]= $err ;
      utl::Redirect_to($pp1->module_url.QS.'i/cc/'); goto fnerr ; // Add row
      //better Redirect_to($pp1->cre_row_frm) ? - more writing, cc fn in module ctr not visible
      //exit(0) ;
    }


    // 3. C R E A T E  D B T B L R O W - O N  I N S E R T
    $flds    = "artist, track, link" ; //names in data source
    $valsins = "VALUES(:artist, :track, :link)" ;
    $binds = [
      ['placeh'=>':artist',   'valph'=>$_POST['artist'], 'tip'=>'str']
     ,['placeh'=>':track',    'valph'=>$_POST['track'],  'tip'=>'str']
     ,['placeh'=>':link',     'valph'=>$_POST['link'],   'tip'=>'str']
    ] ;
    //$last_id1 = utldb::rr_last_id($tbl) ;
    $cursor = utldb::cc(self::$tbl, $flds, $valsins, $binds
                 , $other=['caller'=>__FILE__.' '.',ln '.__LINE__]);
    //$last_id2 = utldb::rr_last_id($tbl) ;

    //if($cursor){$_SESSION["SuccessMessage"]="Admin with the name of ".$Name." added Successfully";
    //}else { $_SESSION["ErrorMessage"]= "Something went wrong (cre admin). Try Again !"; }

      utl::Redirect_to($pp1->module_url.QS.'i/cc/');
      return('1');
      fnerr:
      return('0');
  }


  //dd is jsmsgyn dialog in util.js + dd() in Home_ctr dd() method which calls this method
  static public function dd( object $pp1, array $other=[] ): string
  { 
    // Like Oracle forms triggers - P R E / O N  D E L E T E"
    $cursor =  utldb::dd( $pp1, $other ) ;
    return '' ;
  }



  static public function get_submitted_uu(): array //return '1'
  {
    $submitted = [ //strftime("%Y-%m-%d %H:%M:%S",time()) //'2020-01-18 13:01:33'
      utl::escp($_POST["artist"]), utl::escp($_POST["track"]), utl::escp($_POST["link"])
      , $_POST["id"]
    ] ;
    return $submitted ;
  }

  // O N - U P D A T E (P R E - U P D A T E)
  //return id or 'err_c c'
  static public function uu( object $pp1, array $other=[]): string // *************** u u (
  {
    // 1. S U B M I T E D  F L D V A L S - P R E  U P D A T E
      $get_submitted_uu = self::get_submitted_uu() ;
      list( $artist, $track, $link, $id) = $get_submitted_uu ;
      //$_SESSION["get_submitted_uu"] = $get_submitted_uu ;

    // 2. U U  V A L I D A T I O N
    $valid = '1' ;
    switch (true) {
      case (empty($link)): $valid = "Link Cant be empty"; break ;
      //default: break;
    }
    if ($valid === '1') {} else {
      $_SESSION["ErrorMessage"]= $valid ;
      //utl::Redirect_to($pp1->posts);
      utl::Redirect_to($pp1->module_url.QS.'i/rt/');
      goto fnerr ; //exit(0) ;
    }


    // 3. U P D A T E  D B T B L R O W
      // Query to Update Post in DB When everything is fine
      // NOT USED : post='$PostText' I replaced it with mkd file
      $flds     = "SET artist=:artist, track=:track, link=:link" ;
      $qrywhere = "WHERE id=:id" ;
      $binds = [
        ['placeh'=>':artist',  'valph'=>$artist, 'tip'=>'str']
       ,['placeh'=>':track',   'valph'=>$track,  'tip'=>'str']
       ,['placeh'=>':link',    'valph'=>$link,   'tip'=>'str']
       ,['placeh'=>':id',  'valph'=>$id, 'tip'=>'int']
      ] ;

      $cursor = utldb::uu( self::$tbl, $flds, $qrywhere, $binds ); //same for all tbls

      //var_dump($cursor);
      if($cursor){ $_SESSION["SuccessMessage"]="Post Updated Successfully";
      }else { $_SESSION["ErrorMessage"]= "Post Update went wrong. Try Again !"; }

      return('1');
      fnerr:
      return('0');
  }



  // *******************************************
  //             E N D  C R E A T E,  D,  U
  // *******************************************



} // e n d  c l s  T b l_ c r u d
```





<br /><br /><br /><br />
# <a name="ide"></a> 2\. My developing environment (IDE)
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....**IDE**.....[CRUD](#crud).....[SW fw](#swfw)   


## 2\.1 [Git SCM distributed version control system](https://git-scm.com/downloads)

see  https://help.github.com/en/github/writing-on-github    https://git-scm.com/book/en/v2      
   or eg  https://git-scm.com/docs/git-checkout         

### In Windows Symenu Cmder as administrator (or CLI or Git Bash CLI)
J:\\aplp\\aplp\\0\_symenu\\ProgramFiles\\SPSSuite\\SyMenuSuite\\Cmder\_sps       

Go to your working directory or project folder (if not git status says: "fatal: not a git repository (or any of the parent directories): .git").      

git config --global user.name 'yourname'         
git config --global --replace-all user.email 'youremail'         
Install Git Credential Manager for Windows to avoid login on each push.      

### cd j:\\awww\\www
j:\\awww\\www (master -> origin)
### git status
### git add .
or git add fwphp\\ (or whatever git asks)  or git add -A  or git add index.html
### git commit -am "ver 7.0.1 mnu, msg, mkd FUNCTIONAL namespaces, CRUD PDO trait, pretty URL-s"
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

https://github.blog/2020-12-15-token-authentication-requirements-for-git-operations/ - I did not need     
Beginning August 13, 2021, Github no longer accepts account passwords when authenticating Git operations on GitHub.com, and requires the use of **token-based authentication**, such as a **PAT, personal access token over HTTPS = psw 40 characters length (recommended) ** (for developers) or an OAuth or GitHub App installation token (for integrators) for all authenticated Git operations on GitHub.com. You may also continue using SSH keys where you prefer.

### Creating PAT (personal access token) from github's dev settings
https://docs.github.com/en/github/authenticating-to-github/keeping-your-account-and-data-secure/creating-a-personal-access-token     
```
1 Verify your email address, if it hasn't been verified yet https://docs.github.com/en/github/getting-started-with-github/verifying-your-email-address.
2 Generate a new token from github's dev settings so : 
   1. go to https://github.com/slavkoss/fwphp or any Github page
   2. in the upper-right corner click your profile photo => click Settings => Developer settings => Personal access tokens =>Generate new token
   3. Give your token a descriptive name, expiration (I 3 months).
       Select the scopes, or permissions, you'd like to grant this token. To use your token to access repositories from the command line, 
       **select repo (also gist, user)**.
   4. Click Generate 40 chars token
3 Update remote URL **git remote set-url origin https://<token>@github.com/<git_url>**     
   git remote set-url origin https://<token>@github.com/slavkoss/fwphp
4 push (or pull : **git pull https://<token>@<git_url>.git**)
```


### Configuring two-factor authentication using a TOTP mobile app - I did not need     
https://docs.github.com/en/github/authenticating-to-github/securing-your-account-with-two-factor-authentication-2fa/configuring-two-factor-authentication      
We strongly recommend using a time-based one-time password (**TOTP**) application to configure 2FA.    
TOTP applications are more reliable than SMS, especially for locations outside the United States. TOTP apps support the secure backup of your authentication codes in the cloud and can be restored if you lose access to your device. 



## To purge remote repository

So only last commit remains and it is first commit :

Save your .git/config before, and restore it after. (I delete it in recycle bin).
1. delete .git/   (< 10 MB) - without this command : git remote add origin... issues error : fatal: remote origin already exists !!
2. git init   (< 20 kb)
3. git add .  (< 3 MB)
4. git commit -am "ver 7.0.1 mnu, msg, mkd FUNCTIONAL namespaces, CRUD PDO trait, pretty URL-s"
5. git remote add origin https://github.com/slavkoss/fwphp.git
6. git push --mirror --force

  
  
## 2\.2 Development environment & source code

My PHP IDE is **Symenu** as launcher for all SW listed below (portable if possible) :

1.  Laragon portable (PHP, Apache, Mariadb or MySQL) on Windows 10 64 bit instead XAMPP, WAMP, ZWAMP...      
   
2.  **EDITOR**: **npp (Notepad++)** (7 MB).       
   http://dev1:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme_thoughts.md  or    
   **Notepad++ Markdown plugin https://github.com/nea/MarkdownViewerPlusPlus**      
   Copy tMarkdownViewerPlusPlus.dll to the plugins sub-folder at your Notepad++ installation directory.     
   The plugin adds a small Markdown icon to the toolbar to toggle the viewer as dockable panel.     
   Then in npp Settings -> Import -> Import plugin(s).     
   
   See in J:\\awww\www\\  GLOBALS  nppsess file and other nppsess files.
   
   MD to HTML converters on inet :     
   1. **Notepad++ plugin https://github.com/nea/MarkdownViewerPlusPlus** then in npp Settings -> Import -> Import plugin(s)     
   2. **https://www.tutorialspoint.com/online_markdown_editor.php     or     https://markdowntohtml.com/**     
   3. or (many converters)   https://www.browserling.com/tools/markdown-to-html      
   4. or files convert to many formats :  https://products.aspose.app/pdf/conversion/md-to-html      
   
   Also good, all portable : Notepad2-mod (2 MB), Atom (524 MB),       
   Visual Studio Code (247 MB),  CudaText (28 MB), PSPad (23 MB), RJ TextEd (416 MB),       
   HTML WYSIWYG editors :  **Microsoft Expression web** (abandoned but still good).     
   I avoid Dreamveawer, Komposer (abandoned, too old).        
   
   **OCR IMG->TXT**  **GT Text**      

3.  **COMMANDER**:    
    **Locate** is old but best (Janne Huttunen) or simmilar see Symenu.     
    MeinPlatz (x64) (part of Symenu portable programs) like Treesize    
    Freecommander, Multicommander, Q-dir, Totalcommander       

4.  **BROWSER**: **Firefox (portable in Symenu collection)**, Google Chrome, Cyberfox, Pale Moon     
   
5.  **DEPLOY (INSTALL)**: **Cmder** (in Symenu) is Win CMD line, has Git.
   Composer.
   FTP client **Winscp**.  Ignore : ` | *.zip; J:\awww\www\.git; J:\awww\www\zinc\Dbconn_allsites.php`;
    

##  2\.3 [Composer](https://getcomposer.org/download/)

I use Laragon portable laragon.7z, 19 MB on newest Windows 10, 64 bit. Not any more xampp-portable-windows-x64-7.3.7-1-VC15.7z, 79 MB. WAMP not any more because is not fully portable,  Composer needs coding displayed below and it is only for Windows. It seems WAMP is not giving newest/simplest solutions as Laragon does.

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
|  **http://phporacle.eu5.net/ (freehostingeu)**        | stable, fast FTP (6x faster than heliohost) | ~~activity requirement~~ ,  upload zip files not allowed, but possible  |
|  **http://phporacle.heliohost.org/ (heliohost) **     |  stable FTP, Web Disk  | ~~activity requirement, not fast (I am in Europe, Zagreb),~~  |
| Heroku                                                               |  ~~only Postgres DB~~  |  ~~seems complicated to me~~  |
| https://www.gigarocket.net/free-hosting.php    |  ~~does not send confirmation email~~  |  |
| https://infinityfree.net/                                       |   ~~does not send confirmation email~~  |  |
| https://www.ilbello.com/en/                              |   ~~does not send confirmation email~~  |  |
| https://www.000webhost.com/                          |  ~~**unstable FTP**~~  |  |
Some ask 3, 5 or 15 $ (per year ?) for domain (eg https://client.googiehost.com/ , https://www.freehosting.com/free-hosting.html , https://cp1.awardspace.net/beta/login/).      



  
<br /><br /><br /><a name="crud"></a>
# 3\. PHP 7, Bootstrap 4 : DB tbls rows PDO CRUD
[Top](#top)......[Dirs](#directories).....[UML](#uml).....[DM](#dm).....[IDE](#ide).....**CRUD**.....[SW fw](#swfw)   

May be jQuery, PHP, Bootstrap AJAX DB table rows CRUD is simplest, fastest best CRUD but I prefer no jQuery AJAX . Only Javascript I need is dialog yes or no.

See readme_thoughts.md.  

## 3\.1 B12phpfw core (CRUD) code - How to get ONLY banana ?
See readme_thoughts.md.  

<br /><br />
It is not easy to see need to eg for user module convert code from procedural MVC to OOP MVC with namespaces and autoloading  For navigation (url-s, links) code is same - OOP does not help. Procedural MVC user module code is more clear and readable. So why is OOP better ?

Some say: "is OOP mistake ?" - eg **lack of reusability in OOP** - to get banana (some method or attribute) you get also gorilla holding banana and whole gorilla\`s jungle (all **higher classes with complicated dependencies**). It is why B12phpfw code skeleton is for CRUD modules, I do not use it in mnu and mkd modules.

Eg Interfaces help to get ONLY banana, but coding is complicated - I could find only strong-talk-weak-work code examples about this subject.  
1. So my not complicated **interface Interf_Tbl_crud** I made **to standardize coding Tbl_crud classes**. Each simple ee **one table module** like "invoice items" module has own dir and own Tbl_crud class leading to more than 100 Tbl_crud.php model adapter scripts in big application (eg material and financial book keeping).
```
*  J:\awww\www\zinc\Interf_Tbl_crud.php (4 hits)
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

3.  https://github.com/ngrt/MVC_todo Code is explained in this article blog 2017.12.17: https://medium.com/@noufel.gouirhate/create-your-own-mvc-framework-in-php-af7bd1f0ca19
4.  https://dev.to/jorgecc/a-minimalist-mvc-project-using-php-and-without-a-framework-4pd8
5.  https://github.com/TRPB/ImmutableMVC

6. Other :
   1. video 8/2016 Paul Amissah [https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/](https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/) :  PHP, procedural MVC PDO MySQL, Bootstrap, AJAX jQuery - good basic code. **Not good are (as in almost all tutorials)** : names, globals,  code snippets composing - no single entry point ee including scripts instead http jumping in scripts
   3.  video Shan Shah 2019 [https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/](https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/),
   4.  video Learn\_OOP\_PHP\_By\_Building\_Complete\_Website\_by\_Traversy\_2018 [bad example](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/traversymvc) to complisated, despite some good code snippets.
   5.  Inanz, Hopkins, Xuding... to simple examples good only for clear ideas and for total beginers (dummies).

I made many changes (I hope improvements) which I did because I do not like proposed solutions in best php frameworks and in learning sources mentioned above  (especcialy coding eg Traversy tutorial). Shares (reusables, globals) are not well coded there. I think that eg invoice php code should be in **own folder - module - like Oracle forms invoice.fmb** (not all forms/reports in 3 folders: M,V,C). **Application** glomodul consists of group of modules subgroups - unlimited levels  eg subgroup [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples)

**Modules subgroups - unlimited levels**. This is important difference ! Can Laravel, Yii, Phalcon work this way (important for large applications) ?

I think that should be simple/fast/professional : **shares**, routing, dispaching, functional namespaces & classes loading , web rich text editing...  
It is why I spent so many hours on this (huge time wasting which should do tools-software authors, not tools-software users like me).


  
    
  

## 3\.2 Code with functional namespaces and Autoload class to include classes scripts : shared, module-local and external
This code skeleton seems complicated compared with [https://github.com/panique/\*\*mini3](https://github.com/panique/**mini3)\*\* which is may be best fw code template for smaller projects (and learning PHP).

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
## 3\.3 B12phpfw directories (modules) structure compared to (all ?) other PHP fw-s
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
|   |                        # Db_allsites  (<span style="color:blue;">level 2<span>)** includes Dbconn_allsites             
|   |                        # In Db_allsites are **cc, rr, uu, dd methods** instead model class for each table !        
|   |                        # cc, rr, uu, dd methods are like Oracle Forms           
|   |                        # pre-insert, pre- and execute- query, pre-update instead model class for each table !         
|   |                        # To me seem model class for each table and ORM-s, active records not needed.         
|   |       
|   |-- config               # **NO** config dir but **in zinc dir global abstract CONFIG & ROUTING (REQUEST) class**            
|   |   |                    # **Config_allsites  (level 3)** extends Db_allsites (see core UML diagram). 
|   |   |                    # Here is property palette array.           
|   |   |-- database.php     # = in zinc **Dbconn_allsites.php**        
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
Common fw dir structure are **items in (...) and marked with NO - are not used in B12phpfw** but basics are same. B12phpfw is better for large sites.             




<br /><br /><br /><br /><a name="swfw"></a>
## 3\.4 What is SW fw (Software framework)
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

I never understood enough fw authors explanations which is one of reasons why I do not believe them).   (font Century Gothic 16)      

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



[Top](#top).....<a href="#directories" id="lnkdirectories">Dirs</a>.....[UML](#uml).....[DM](#dm).....[IDE](#ide).....[CRUD](#crud).....[SW fw](#swfw)   


[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)     

