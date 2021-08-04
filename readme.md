---
<a name="top"></a>
**Top**.....[1\.4 Dirs](#directories).....[1\.3 UML](#uml).....[1\.5 DM](#dm).....[2\. IDE](#ide).....[3\. CRUD](#crud).....[SW fw](#swfw)   
CRUD module example code 7 scripts:  
[Simplest CRUD](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)   
> **Clean code** : "Any fool can write code that a computer can understand. Good programmers write code that humans can understand." (Martin Fowler).
> 
> When you are dead, you don't know that you are dead. It is difﬁcult only for the others. It is the same when you are lazy (or stupid).
> 
> "Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live." (John Woods).
> 
> "Clean code reads like well-written prose" (Grady Booch). Good code reads close to natural speech.

> **Naming** is the best tool we have to express what we do in code (avoid comments). Classes and variables are nouns: Price, CurrentTrade. Booleans are predicates: isScheduled, isRunning. Methods should start with a verb: getStrategyResult, createStrategyResult. Common naming errors : Very small names ( $tr, dd() ),
Names that are not real words ($dgrtty), Methods that are nouns.

## 1. My PHP menu & CRUD code skeleton (application architecture I named  B12phpfw)


-----



**Developed** on home PC on (newest) Windows 10 64 bit with Laragon  (Apache web server, MariaDB).  **Tested** also on Windows Oracle Virtual box Oracle Linux virtual machine  (Apache web server)  and on Linux demo sites. B12phpfw is **result of 20 years learning PHP**. 
## 1\.1 Demo sites - free hosting with free Mysql
See [Code (signals) flow and data flow ](http://phporacle.eu5.net/fwphp/glomodul/blog/?i/read_post/id/54) or [here](http://phporacle.heliohost.org/fwphp/glomodul/blog/?i/read_post/id/54)
1. On Linux : http://phporacle.eu5.net/ (freehostingeu - fast, stable, has free MySQL) - here are newest programs (may be more problems than heliohost). Also PHP on Linux is a bit different than on Windows.
2. or On Linux :  http://phporacle.heliohost.org/ (heliohost - slow, stable, has free MySQL)
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


Explanations below are far less important than demo site, code download and modules mentioned above.

Besides explanations below are difficult to understand. They are "after battle philosophy" very useful to improve basic ideas (principles).

<br /><br /><br /><br />
## 1\.3 Project notable goals  - reasons
Notable package does something special, is also frequently innovative. 

1. I developed B12phpfw in my free time (my work for last 20 years was :  Oracle Forms & Reports 6i and Crystal reports. We wanted migrate them to PHP - never happend because **I cound not find near so good** tool as abandoned Oracle Forms 6i - shame.  See also below "...compared to all PHP frameworks...".

https://github.com/panique/mini3 is good but to simple.   OOP PHP. CMS blog Video (7.7 GB) Jazeb Akram (Udemy) is good but older programming style.
   
2. B12phpfw is good for developing **large sites** (more of them under web server root dir. path).

3. ***Innovative*** is : 
   1. each module in own folder like Oracle Forms 6i form, Blazor and APEX pages ee no M,V,C folders
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
   
5. Present best PHP learning code I could find. See [web server root dir. path]fwphp/glomodul/z_examples ee fwphp site dir -> glomodul dir (group of module- subgroups), z_examples dir (subgroup of modules)   
    https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples - to do make them best possible.

Conclusion after 20 years is : B12phpfw is most useful for CRUD in msg-blog and simmilar modules, so it is **precisely B12phpCRUDfw**. For mnu and mkd markdown WYSIWYG editor and simmilar modules we **most probably do not nead B12phpfw** code skeleton, see their code, is simmilar to B12phpfw - few important **adresses tricks** (see them below on op.system and on web), **includes instead http// jump to pages** (this is interesting question).

## 1\.4 To do - done
Everything important is done in current version 7 code. 

1.  2020.09.05 **DONE** On Linux demo sites : some PHP statement works different than on Windows (about dozen incompatibilities), eg links do not work in msg module, but work in mnu and mkd modules)  :   DONE in wsroot_path\zinc\Config_allsites.php :  
   Error on Linux not on Windows : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);  
   No error on both OS : $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;  
   
2. Difficult parts are not many : 
   1. PDO CRUD more DBI MySQL, Oracle... - any DB with DB adapter code. I have only basic code - working - should be improved.  

   2. Same for tables : sorting, cols filtering, rows filtering.  
        Grid with updatable fields, I think, is not needed.  

3. Details like data formats (page fieds should be all characters like in Oracle APEX), computations... are easy to find in other learning sources.  

4. No charts - see other learning sources.  

5. More security.

6.  2020.09.30 **DONE version 7.0.0 (declare(strict_types=1);)**. DBI improved : **trait Db_allsites** instead class Db_allsites. Each DB table (persistent storage) has adapter **class Tbl_crud :**
   1. use B12phpfw\core\zinc\Db_allsites
   2. implements Interf_Tbl_crud

   This means that :
   1. each module's views or ctrs, eg blog module (see blog folder)
     - work much easier with more Tbl_crud, ee with own Tbl_crud and with other tables Tbl_crud's.
   2. class Home_ctr extends class Config_allsites, no more also two DB CRUD classes which is unnatural and not easy (but seems easy because **logically all is in Home_ctr**).

## 1\.5 Adresses on op.system and on web are difficult to understand
and bad explained in all PHP frameworks and learning sources.

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
|                                                                                                 |......l   depends on                                                                    | |                                        
|                                                                                                 |......l                                                                                               | |
|                                                                                                 |......PoetryReader BL class ---> IObtainPoems <---depends on------|--- PoetryLibraryFileAdapter |

### B12phpfw simple module code skeleton (HA) eg users or post categories :
| **Application-managers-controllers on GUI-CLI input** | **BL** (Business Logic) and **interfaces-features-ports - processing** | **Adapters-implementations-tasks-dependencies  and output** |
| :-------------------------------------------------------: | :------------------------------------------------------------- | :--------------------------------------------------------- |
|    OUTSIDE LEFT  (User-Side) **drive domain** | INSIDE (core, domain, center) **drive infrastructure** |  OUTSIDE RIGHT (**infrastructure**, Server-Side)|
| ibrowser, **Home_ctr** ---depends on----------|--->methods to call/inc code ** Interf_Tbl_crud** <---depends on-------|--- DBI: cls **Tbl_crud** one tbl DB adapter (repository) |
|                                                                                                | (Interf_Home_ctr if needed !) (some BL class if needed) | DBI: trait **Db_allsites** : code type DB CRUD ADAPTER |

Concerning business code, the inside, a good idea is to choose to **organize domain modules (or directories) according to business logic**. The ideal case is to be able to open a directory or a business logic module and immediately understand business problems that your program solves; **rather than seeing only “repositories”, “services”, or other “managers” directories or M, V, C dirs**. See https://matthiasnoback.nl/2017/08/layers-ports-and-adapters-part-2-layers/ Aug 2nd 2017 by Matthias Noback. Matthias said : Simfony  framework was no longer my safe haven, I worked on more basic programming topics, like SOLID and Package Design.  I was fascinated by hexagonal architecture and command buses. **Place for (Simfony)  framework is the Infrastructure layer** and you can fully embrace any kind of RAD-stupid thing your framework offers, as long as it stays inside that layer, and nothing of it trickles down into either the Application or g\*d forbid the Domain layer. 

You can now write alternative adapters for your application's ports. You could run an experiment with a Oracle (Mongo... or in memory) adapter side by side with a MySQL adapter. Specialized adapters for running tests is the main reason why Cockburn proposed the ports & adapters architectural style.

### Dependency Rule - decoupling (code separation) - Dependency Inversion Principle - "D" in SOLID
( https://en.wikipedia.org/wiki/SOLID )
A practical implementation of Dependency Rule "**One should depend upon abstractions, not concretions**." in most object-oriented programming languages :
1. Define an **interface = abstraction** for the thing you want to depend on.
2. Then provide a **class implementing that interface**. This class contains all the low-level details that you've stripped away from the interface, hence, it's the **concretion** this design principle talks about.


[B12phpfw_UMLdiagram.png](B12phpfw_UMLdiagram.png "B12phpfw_UMLdiagram.png")  
![B12phpfw_UMLdiagram.png is less practical and altered](xxxB12phpfw_UMLdiagram.png "B12phpfw_UMLdiagram.png")  

I prefer UML below : 




-----


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



/\\   
  !   
  !   
  !   


-----



## 1\.6 1b. DBI: trait Db_allsites  : code type DB CRUD ADAPTER  
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
Line 69:   static public function get_or_new_dball(string $called_from ='**UNKNOWN CALLER**')
Line 120:   //  public static function disconnect() { self::$instance = null; }
Line 126:   static public function closeDBConn()
Line 134:   static public function getdbi()
Line 140:   static public function setdo_pgntion($new_val)
Line 162:   static public function dd(object $pp1, array $other)
Line 195:   static public function rrnext(object $cursor){
Line 203:   static public function rrcount($tbl)
Line 212:   static public function rr_last_id($tbl) {
Line 236:   static public function rr( $dmlrr, $binds = [], $other = [] )
Line 336:   static public function cc( string $tbl, string $flds, string $valsins
Line 397:   static public function uu( $tbl, $flds, $where, $binds = [] )
Line 461:   static public function debugPDO($raw_sql, $parameters) {
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
1.   public function \_\_construct(object $pp1, array $pp1_module_links)
     1. C H E C K  R E Q U I R E M E N T S
     2. DEFINE  A D R E S S E S  (NO CONSTANTS). Adresses = paths & relative paths
        3.1 R O U T I N G - find URL parts for user events methods calls ee $uri_arr = explode(QS, $REQUEST_URI)
        3.2 Assign  $ p p 1 = array of module properties
     4. D I S P A T C H I N G = calls Home_ctr cls method (CONVENTION : i=ctrakcmethod)
        which calls fns or includes view scripts (http jumps only to other module).
        Dispatching using home class methods is based on Mini3 php fw.

```
 J:\awww\www\zinc\Config_allsites.php (18 hits)
	Line 27:   public function __construct(object $pp1, array $pp1_module_links)
	Line 230:   public function setp($property, $value){
	Line 238:   public function getp($property){
	Line 256:     static public function rlows(object $r) //all row fld names lowercase
	Line 275:     static public function escp(string $string) //ESCAPING OUTPUT
	Line 288:     static protected function secure_form($form) {
	Line 296:     static public function Redirect_to($New_Location){
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


-----



 /\\  
  !  
  !  
  !  


-----



## 1\.6 3. Home_ctr cls : MODULE CONTROLLER CODE
B12PHPFW MODULE CODE. LEVEL : MODULE (SAME CODE FOR MODULE ee FOLDER, eg mnu or mkd or msg=blog)

For program execution class hierarchy is as all attributes and methods in classes above  Home_ctr are in Home_ctr class ee in **$this object** which is instantiated (created in memory) Home_ctr (and automatically all classes above). Why shared attributes and methods are in hierarchy above Home_ctr and not in Home_ctr ? Because we do not want write in each Home_ctr class code in class above. Instead we **reuse code in shared class (globals)** above Home_ctr. 


-----



 **Attributes**  
```php
declare(strict_types=1); //declare(strict_types=1, encoding='UTF-8');
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\module\blog ;

use B12phpfw\core\zinc\Config_allsites ;
use B12phpfw\dbadapter\user\Tbl_crud as Tbl_crud_user;  //to Login_ Confirm_ SesUsrId
use B12phpfw\dbadapter\post_category\Tbl_crud  as Tbl_crud_category ;
use B12phpfw\dbadapter\post\Tbl_crud         as Tbl_crud_post ;
use B12phpfw\dbadapter\post_comment\Tbl_crud as Tbl_crud_post_comment ;

//extends  = ISA relation type ("Is A something") = not "Home_ ctr is contained in Config_allsites" but :
//"Home_ ctr is addition to Config_ allsites" - technicaly could be in Config_ allsites (is not for sake of code reusability and clear code)
// May be named App, Router_dispatcher... :

class Home_ctr extends Config_allsites
...
```


-----



**Methods** in cls file  Home_ctr.php (27 fns)  
```
  J:\awww\www\fwphp\glomodul\blog\Home_ctr.php (27 hits)
	Line 29:   public function __construct(object $pp1)
	Line 92:   protected function callf(string $akc, object $pp1)  //fnname, params
	Line 108:   private function del_row_do(object $pp1) //used for all  t a b l e s !! //private
	Line 149:   private function Login_Confirm_SesUsrId(object $dm) {
	Line 153:   private function logout(object $pp1)
	Line 162:   private function loginfrm(object $pp1) //private
	Line 175:   private function login(object $pp1) //private
	Line 192:   private function home(object $pp1) //DI page prop.palette   
	Line 208:   private function dashboard(object $pp1) //private
	Line 223:   private function admins(object $pp1) //private
	Line 240:   private function read_user(object $pp1) //private
	Line 259:   private function categories(object $pp1) //private
	Line 273:   private function addnewpost(object $pp1) //private
	Line 288:   private function posts(object $pp1) //private
	Line 308:   private function filter_postcateg(object $pp1) //private
	Line 356:   private function read_post(object $pp1)
	Line 379:   private function editpost(object $pp1) //private
	Line 397:   private function edmkdpost(object $pp1) //private
	Line 423:   private function readmkdpost(object $pp1, string $fle_to_displ_name, string $only_help='') //private
	Line 477:   private function kalendar(object $pp1) //private
	Line 489:   private function comments(object $pp1) //private
	Line 502:   private function upd_comment_stat(object $pp1) //private
	Line 530:   private function upd_user_loggedin(object $pp1) //private
	Line 548:     private function errmsg(object $pp1, string $myerrmsg)
	Line 562:   private function contact(object $pp1)
	Line 569:   private function about(object $pp1)
	Line 577:   private function features(object $pp1)
```




<br /><br />


-----



## 1\.6 4. Autoload cls included in index.php : TO AVOID INC. COMMANDS IN MANY SCRIPTS
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

  J:\awww\www\zinc\Autoload.php (6 hits)
	Line 19:    public function __construct($pp1) {
	Line 27:    /*private static function _fatal_error_hndl() {
	Line 38:   private function get_path($nscls, &$nsdir_routTBLclsdir) // static ?
	Line 100:   //public static function autoload($cls) //namespaced className
	Line 101:   private function loader($nscls) //$ n s c l s is namespaced  c l a s s  name
	Line 143:   private function fmt(string $txt, string $color, string $bold='')
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

See Mini3 PHP framework [https://github.com/panique/mini3](https://github.com/panique/mini3) which is excellent rare not to simple MVC example (lot of good coding). My **routing using key-values** is different but **dispatching using home class methods is based on Mini3**. 

See very good coding (to simple examples and have no namespaces) : 
1. https://github.com/ngrt/MVC_todo 
2. or https://github.com/DawidYerginyan/simple-php-mvc/ 
3. or my dir \02_mvc\ (\\fwphp\\glomodul\\z_examples\\02_mvc\\03xuding_glob\\) - still version 6. (good exercize to upgrade to version 7.)  
   or many others



3 modules  :   
1. Menus (**Mnu module**) are not based - no need, but can be based on B12phpfw which is best for CRUD modules like Oracle Forms form. 
2. Most frequent (best ?) **Blog - msgs module** design today - Jazeb Akram, Abdul Wali, Edwin Diaz... I used it in Blog (Msg) module based on B12phpfw code skeleton
3. WYSIWYG web editing : Markdown or HTML (**Mkd module** is not based - no need, but can be based on B12phpfw is used for blog posts or any txt file). Blog posts may be :
    1. oper. system files - practicaly unlimited size
    2. or in MySQL/Oracle/or any DB : post (4000 characters I commented this in code), summary (4000 characters) and banner_img description (4000 characters oracle 11g, 32 kB >=12c) 



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




<br /><br />
## <a name="SimplestCRUD"></a> 1.9 Simplest user CRUD module

<a name="scrudIndex"></a>
### 1\.9\.1 index.php
[Simplest CRUD](#SimplestCRUD).....**index.php**.....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU) ....[adapter](#scrudadapter)   


<a name="scrudHome_ctr"></a>
### 1\.9\.2 Home_ctr.php router, dispatcher
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....**Home_ctr**.....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    


<a name="scrudHomeV"></a>
### 1\.9\.3 home.php - shows links assigned in Home_ctr.php for user interactions
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....**home (table page.....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    


<a name="scrudC"></a>
### 1\.9\.4 create.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....**create**.....[read (user profile - form)](#scrudR).....[update](#scrudU)....[adapter](#scrudadapter)    


<a name="scrudR"></a>
### 1\.9\.5 read.php - display user profile
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....**read (user profile - form**.....[update](#scrudU)....[adapter](#scrudadapter)    

curl -s https://api.github.com/markdown/raw -X "POST" -H "Content-Type: text/plain" --data-binary "@J:/awww/www/readme.md" >> "C:\Users\ss\AppData\Local\Temp\readme.htm"

See J:\\awww\\www\\vendor\\erusev\\parsedown\\styles>md2h.bat



<a name="scrudU"></a>
### 1\.9\.6 update.php
[index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....**update**....[adapter](#scrudadapter)   



<a name="scrudadapter"></a>
### 1\.9\.7 Tbl_crud.php - ORM, DM (Domain Model) adapter cls - pre CRUD class
[SimplestCRUD index.php](#SimplestCRUD).....[index.php](#scrudIndex).....[Home_ctr](#scrudHome_ctr).....[home (table page)](#scrudHomeV).....[create](#scrudC).....[read (user profile - form)](#scrudR).....[update](#scrudU)....**[adapter]**






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

My PHP IDE is **Symenu** as launcher for all SW (portable if possible) below :

1.  Laragon portable on Windows 10 64 bit
2.  **EDITOR**: Notepad++ (6 MB), also good, all portable : Notepad2-mod (2 MB), Atom (524 MB), Visual Studio Code (247 MB), CudaText (28 MB), PSPad (23 MB), RJ TextEd (416 MB), I avoid Dreamveawer, Microsoft Expression web (abandoned but still good), Komposer (abandoned, too old)  
    GT Text OCR IMG->TXT
3.  **COMMANDER**: **Locate** is old but best (Janne Huttunen) or simmilar see Symenu.     
    Freecommander       
    Q-dir          
4.  **BROWSER**: Firefox, Google Chrome, Cyberfox, Pale Moon
5.  **DEPLOY (INSTALL)**: Composer, Git  
6.  Winscp **FTP client**.  Ignore : ` | *.zip; J:\awww\www\.git; J:\awww\www\zinc\Dbconn_allsites.php`;
    

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

# 3\.1 B12phpfw core (CRUD) code - How to get ONLY banana ?
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

4. Other :
    1. video 8/2016 Paul Amissah [https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/](https://freecourseweb.com/building-database-web-app-php-oop-pdo-ajax-mysql/) :  PHP, procedural MVC PDO MySQL, Bootstrap, AJAX jQuery - good basic code. **Not good are (as in almost all tutorials)** : names, globals,  code snippets composing - no single entry point ee including scripts instead http jumping in scripts
    3.  video Shan Shah 2019 [https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/](https://desirecourse.com/login-registration-and-profile-management-in-php-mysql-2018/),
    4.  video Learn\_OOP\_PHP\_By\_Building\_Complete\_Website\_by\_Traversy\_2018 [bad example](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples/02_MVC/traversymvc) to complisated, despite some good code snippets.
    5.  Inanz, Hopkins, Xuding... to simple examples good only for clear ideas and for total beginers (dummies).

I made many changes (I hope improvements) which I did because I do not like proposed solutions in best php frameworks and in learning sources mentioned above  (especcialy coding eg Traversy tutorial). Shares (reusables, globals) are not well coded there. I think that eg invoice php code should be in **own folder - module - like Oracle forms invoice.fmb** (not all forms/reports in 3 folders: M,V,C). **Application** glomodul consists of group of modules subgroups - unlimited levels  eg subgroup [https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z\_examples](https://github.com/slavkoss/fwphp/tree/master/fwphp/glomodul/z_examples)

**Modules subgroups - unlimited levels**. This is important difference ! Can Laravel, Yii, Phalcon work this way (important for large applications) ?

I think that should be simple/fast/professional : **shares**, routing, dispaching, functional namespaces & classes loading , web rich text editing...  
It is why I spent so many hours on this (huge time wasting which should do tools-software authors, not tools-software users like me).


  
    
  

## Code with functional namespaces & class to autoload : shared, module-local and external classes

This code skeleton seems complicated compared with [https://github.com/panique/\*\*mini3](https://github.com/panique/**mini3)\*\* which is may be best fw code template for smaller projects (and learning PHP).

For large projects **SHARES - GLOBALS - REUSABLES** which I use here are very important, same as **modules in own folders (not all in only 3 dirs M,V,C)**.

About shares (globals) see discussion :  
[https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695](https://medium.com/@sameernyaupane/php-software-architecture-part-1-mvc-1c7bf042a695)  
[https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d](https://medium.com/@sameernyaupane/php-software-architecture-part-2-the-alternatives-1bd54e7f7b6d)  
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





<br /><br />
MD to HTML converters on inet :
1. **Notepad++ plugin https://github.com/nea/MarkdownViewerPlusPlus** then in npp Settings -> Import -> Import plugin(s)
2. **https://www.tutorialspoint.com/online_markdown_editor.php     or     https://markdowntohtml.com/**   
3. or (many converters)   https://www.browserling.com/tools/markdown-to-html   
4. or files convert to many formats :  https://products.aspose.app/pdf/conversion/md-to-html    
5. Links not working :     http://demo.showdownjs.com/ (no HTML source)  
  NOT WORKING : https://daringfireball.net/projects/markdown/dingus    or   https://pandoc.org/try/ 


<br /><br />
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


https://dev.to/jorgecc/a-minimalist-mvc-project-using-php-and-without-a-framework-4pd8

https://github.com/TRPB/ImmutableMVC





<br /><br /><br /><br />
## B12phpfw directories (modules) structure compared to (all ?) other PHP fw-s
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
# What is SW fw (Software framework)
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

