<!-- J:\awww\www\fwphp\glomodul\adrs\hdr.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADDRESS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- < 3 kB -->
    <link href="/vendor/b12phpfw/themes/mini3.css" rel="stylesheet">
    <!-- < 3.5 kB  Similar to jQuery DataTables for use in modern browsers, but without the jQuery dependency. https://github.com/fiduswriter/Simple-DataTables


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">


    -->
    <link href="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl.css" rel="stylesheet">


</head>
<body>
    <!-- logo, check the CSS file for more info how the logo "image" is shown 
    <?=$pp1->module_url?>
    -->
    <div class="logo"></div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?=$pp1->module_url?>">home</a>
        <a href="<?=$pp1->module_url.QS?>i/ex1/">example1</a>
        <a href="<?=$pp1->module_url.QS?>i/ex2/p1/param1/p2/param2/">example2</a>
        <a href="<?=$pp1->module_url.QS?>i/rt/">Addresses</a>
    </div>
        <!-- CODE FLOW after Click on "Addresses" or any above button :

        B12phpfw\core\b12phpfw\Autoload::autoloader ln=37 said: 
        SHARED (GLOBAL) CLS TO LOAD $clsname=Db_allsites_ORA $module_dir=b12phpfw                        
             instantiated in index.php so :
                          //3. SAME MODULE DB ADAPTER FOR ANY shared DB adapter
                          //$pp1->dbicls = Db_allsites_ORA or Db_allsites for MySql :
                          $tmp = 'B12phpfw\\core\\b12phpfw\\'. $pp1->dbicls ;
                          //shared DB adapter :
                          $AllTbl_crud_obj = new $tmp() ; 
                          //module DB adapter IS SAME for Db_allsites_ORA and Db_allsites for MySql !!
                          $Tbl_crud_obj = new Tbl_crud($AllTbl_crud_obj) ; 
        namespaced class $nscls=B12phpfw\core\b12phpfw\Db_allsites_ORA

        B12phpfw\core\b12phpfw\Autoload::autoloader ln=37 said: 
        SHARED (GLOBAL) CLS TO LOAD $clsname=Db_allsites_Intf $module_dir=b12phpfw                  
        PHP Interface is a list of methods as a package in oracle plsql. PHP class is like package body in oracle plsql. Reasons for using Interface: 1. mandatory form of method call, 2. same module db adapter for any shared db adapter. 
        namespaced class $nscls=B12phpfw\core\b12phpfw\Db_allsites_Intf

        B12phpfw\core\b12phpfw\Autoload::autoloader ln=37 said: 
        SHARED (GLOBAL) CLS TO LOAD $clsname=Tbl_crud $module_dir=adrs                  
        has constructor to achieve SAME MODULE DB ADAPTER FOR ANY shared DB adapter :
                          public function __construct(Db_allsites_Intf $utldb) { 
                             self::$utldb = $utldb;
                          } 
        namespaced class $nscls=B12phpfw\dbadapter\adrs\Tbl_crud

        B12phpfw\core\b12phpfw\Autoload::autoloader ln=37 said: 
        SHARED (GLOBAL) CLS TO LOAD $clsname=Home_ctr $module_dir=adrs
        Home_ctr extends Config_allsites (alias, nickname is utl)
        namespaced class $nscls=B12phpfw\module\adrs\Home_ctr

        B12phpfw\core\b12phpfw\Autoload::autoloader ln=37 said: 
        SHARED (GLOBAL) CLS TO LOAD $clsname=Config_allsites $module_dir=b12phpfw
        namespaced class $nscls=B12phpfw\core\b12phpfw\Config_allsites
        -->
