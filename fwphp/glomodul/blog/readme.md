Blog module has a lot of functionality:      

  1. details table **post** has two masters **admins** and **category** and has subdetails **comments**. 
  2. table posts contains column post 10 kB but it's CRUD code I commented and I use mkd module to read and update oper.system markdown text files which contain post content. Eg J:\\awww\\www\\fwphp\\glomodul\\blog\\msgmkd\\001. Menu\_CRUD.txt
  3. Home\_ctr CRUD layer methods do not know for underlaying Db\_allsites layer PDO methods      
  4. OOP        
  5. namespaces (own PSR-4 autoloading classes scripts)        
  6. all scripts are included (ee no http jumps except some jumps in other module)        
  7. jQuery only for Bootstrap 5       
  8. no AJAX, no JSON       
  9. server side validation        
  10. authentification (log in )       
  11. authorization (only logged in users may execute some code ee CRUD code...)        
  12. own very simple debugging and xdebug also helps        
  13. Notepad++ sessions (open group of files) are VERY USEFULL ,       
see : J:\\\\awww\\\\www\\\\fwphp\\\\glomodul4\\\\blog\\\\\`\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_ MSG (BLOG) \_\_\_\_\_\_\_\_\_\_\_\_\_\_\_.NPPSES\`       

In J:\awww\www\fwphp\glomodul\blog\index.php,  ../../../ is J:\awww\www doc_root dir  http://dev1:8083/fwphp/glomodul/blog/

C O N F I G  coding step cs01. and cs02. are in $pp1 in index.php        
  
From PHP's viewpoint all code 1. - 6. could be in index.php :        
  
  1. index.php script is "inherited (extended)" by :          
  2. Home\_ctr inherits (extends) Config\_allsites or Home\_mdl cls (if we have one)       
  3. or also Home\_mdl cls (if needed) inherits Config\_allsites cls          
  4. Config\_allsites cls inherits Db\_allsites cls            
  5. Db\_allsites cls inherits (extends) Dbconn\_allsites cls         
     contains 4 methods: C, R, U, D for all tables !!          
  6. Dbconn\_allsites cls is single access point to our database (singleton class)          
     returns private static self::$instance accessed             
     or new PDO($dsn, $usr, $psw, $options)              


Why 5 or 6 levels code flow (why not all code 1. - 6. in index.php) ?          
  1. To reduce number of settings/methods in module scripts placing them as many as         
      possible in (all) SITES GLOBAL SCRIPTS (for all modules) which NEVER CHANGE            
      (except during developing), changes are only in one place, CODE REUSE is optimal.           
  2. Eg Home\_mdl cls is needed to reduce size of Home\_ctr for clearer code.              
      Separating concerns C and M. But for simpler modules is not needed.           