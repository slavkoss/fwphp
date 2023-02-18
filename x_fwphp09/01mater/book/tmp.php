<?php
MODULE HOME   
B12phpfw\dbadapter\book\Tbl_crud::uu, line 301 SAYS

$_POST=Array
(
    [id] => 19
    [submit_uu] => Upd row
    [title] => dd xxxx
    [author] => 1
    [isbn] => dd
    [publisher] => dd
    [year] => 2222
    [summary] => dd
)

$id=int(19)

$r=object(stdClass)#9 (6) {
  ["title"]=>
  string(7) "dd xxxx"
  ["author"]=>
  string(1) "1"
  ["isbn"]=>
  string(2) "dd"
  ["publisher"]=>
  string(2) "dd"
  ["year"]=>
  string(4) "2222"
  ["summary"]=>
  string(2) "dd"
}

$err=Array
(
)

$pp1=stdClass Object
(
    [dbg] => 1
    [stack_trace] => Array
        (
            [0] => Array
                (
                    [0] => J:/awww/www/fwphp/01mater/book/index.php, lin=14
                )

            [1] => J:/awww/www/vendor/b12phpfw/Autoload.php, lin=24 (B12phpfw\core\b12phpfw\Autoload::__construct)
            [2] => B12phpfw\core\b12phpfw\Autoload::get_path, lin=37 $nscls=B12phpfw\module\book\Home_ctr
            [3] => B12phpfw\core\b12phpfw\Autoload::get_path, lin=37 $nscls=B12phpfw\core\b12phpfw\Config_allsites
            [4] => B12phpfw\core\b12phpfw\Autoload::get_path, lin=37 $nscls=B12phpfw\dbadapter\book\Tbl_crud
            [5] => B12phpfw\core\b12phpfw\Autoload::get_path, lin=37 $nscls=B12phpfw\core\b12phpfw\Interf_Tbl_crud
        )

    [wsroot_path] => J:/awww/www/
    [shares_path] => J:/awww/www/vendor/b12phpfw/
    [app_path] => J:/awww/www/fwphp/01mater/
    [module_version] => Product (Book) 1.0.0.0
    [module_path_arr] => Array
        (
            [0] => J:/awww/www/fwphp/01mater/book/
            [1] => J:/awww/www/vendor/b12phpfw/
        )

    [col_names] => Array
        (
            [0] => title
            [1] => author
            [2] => isbn
            [3] => publisher
            [4] => year
            [5] => summary
        )

    [uriq] => stdClass Object
        (
            [i] => uu_frm
            [id] => 19
            [HELP_ROUTING_AND_URL_QUERY] => 
      $pp1_module is ROUTES (LINKS) ASSIGNED IN MODULE CONTROLLER Home_ ctr.php ~~~~~~~~~~~~~~~~~
      $pp1_ module is part of $pp1 (module property pallette).
      Contains properties = key-keyvalue pairs : 
          LINKALIAS => ?i/HOME_METHOD_TO_CALL/param1/param1value... (? is QS below)
      
          Eg in view script : href = QS."i/cc/" or href = LINKALIAS = $pp1->cre_ row_ frm. 
          1. URLurlqrystring QS."i/cc/" CALLS cc fn in Home_ ctr.php .
             LINK key-keyvalue PAIR IS NOT IN $pp1_ module, SO :
                   cc must be M E T H O D NAME in Home_ ctr.php.
          2. BETTER : LINKALIAS $pp1->cre_ row_ frm in view script is more generalized, 
             but we have more writing than QS."i/cc/" in view script.
             Ee $pp1_ module must contain :
              LINKALIAS            URLurlqrystring        CALLED METHOD
              IN VIEW SCRIPT       IN Home_ ctr           IN Home_ ctr
            ,'cre_row_frm'     => QS.'i/cc/'               cc or cre_row_frm or... 
            ,'home_url'        => QS.'i/home/'             home
            ,'ldd_category'    => QS.'i/del_category/id/'  del_category, l in ldd means link
               (method parameter /idvalue we assign in view script after ldd_category)
            ,'loginfrm'        => QS.'i/loginfrm/'         loginfrm
            ,'login'           => QS.'i/login/'            login
      
            [submit_uu] => Upd row
            [posted_r] => stdClass Object
                (
                    [title] => dd xxxx
                    [author] => 1
                    [isbn] => dd
                    [publisher] => dd
                    [year] => 2222
                    [summary] => dd
                )

        )

    [HELP_STATES_ATTRIBUTES] => 
            F O R  $_S E S  ARR. (D B S H E M A...) ~~~~~~~~~~~~~~~~~
    [cncts] => stdClass Object
        (
        )

    [states] => stdClass Object
        (
        )

    [HELP_PATHS_IN_UTL_CLS] => 
          cs02. R O U T I N G - A D R E S S E S  in Config_ allsites.php ~~~~~~~~~~~~~~~~
    [wsroot_url] => http://dev1:8083/
    [shares_url] => http://dev1:8083/zinc/
    [img_url] => http://dev1:8083/zinc/img/
    [lang] => en
    [module_path] => J:/awww/www/fwphp/01mater/book/
    [uri_qrystring] => i/uu_frm/id/19
    [uri_qrystring_arr] => Array
        (
            [0] => i
            [1] => uu_frm
            [2] => id
            [3] => 19
        )

    [uri_arr] => Array
        (
            [0] => /fwphp/01mater/book/index.php/index.php/index.php
            [1] => i/uu_frm/id/19
        )

    [module_relpath] => fwphp/01mater/book/index.php/index.php/index.php
    [module_url] => http://dev1:8083/fwphp/01mater/book/index.php/index.php/index.php/
    [ROUTING_TABLE] => 
        $pp1_module IS MODULE PROPERTIES PART OF PROPERTY PALLETTE
    [home_url] => ?i/home/
    [cc_frm] => ?i/cc_frm/
    [dd] => ?i/dd/id/
    [uu_frm] => ?i/uu_frm/id/
)
