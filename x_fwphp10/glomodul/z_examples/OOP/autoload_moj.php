<?php
// J:\awww\www\fwphp\glomodul\help_sw\test\user1\autoload.php
// works, use it if Composer's PSR-4 autoloader does not work
    function loadClsScript($fqcn)
    {
      $script_relname=str_replace('\\',DIRECTORY_SEPARATOR,$fqcn). '.php';
        {

          //       L O C A L  C L A S S E S
          // 1. book\Ctr
          $script_absdir = __DIR__ ; //dirname(__DIR__).DS
          $incfile = $script_absdir. DIRECTORY_SEPARATOR .$script_relname;
          if (file_exists($incfile)) require_once $incfile;

          else {

          }
        }
    
                  if('1')
                  { ?><SCRIPT LANGUAGE="JavaScript"><!-- Begin
                    alert( '<?php echo str_replace('<br>','\n'
                                      ,str_replace('<br>','\n',
                      '000. '.str_replace('\\','\\\\',__FILE__).' SAYS:'
                      .'<br>'.'json encoded :'
                      .'<br>===========p a r a m e t e r s :'
                      //.'<br>$clsns='.json_encode($clsns)
                      .'<br>$fqcn='.json_encode($fqcn)
                      .'<br>===========c a l c u l a t e d :'
                      //.'<br>$eqal_prfx_class='.json_encode($eqal_prfx_class)
                      .'<br>$script_absdir='.json_encode($script_absdir)
                      //.'<br>$relative_class='.json_encode($relative_class)
                      .'<br>$incfile='.json_encode($incfile)
                      .'<br>include_path='.json_encode(ini_get("include_path"))
                                       ));?>'
                    ); //alert(t1+"\n"+t2+"\n"+t3);
                    // End --></SCRIPT><?php
                  }
    }
    //Registers autoloadfn :
    spl_autoload_register('loadClsScript');

    /**
    * LOCAL ClassScriptsAutoload FN (see help below)
    * FQCN = fully qualified (namespaced) class name
    * eg $fqcn = PDOOCI\PDO //script relative name
    *   *** CONVENTION (over configuration) !! : ***
    *   PDOOCI is PROJECT-SPECIFIC NAME SPACE PREFIX
    *             and class script directory name
    *   PDO is class name and script name
    */
    
    /**
    * T R Y  ALL ABSOLUTE INCLUDE DIRS, WE NEED :
    * (php 7 has constants arrays - more elegant code)
    */
      /*
      // EXTERNAL, G L O B A L  C L A S S E S
      // 1. Core\Request
      $script_absdir = dirname(dirname(__DIR__)) . DS;
      $incfile = $script_absdir.$script_relname ;
      if (file_exists($incfile)) require_once $incfile;

      else {
        // 2. PDOOCI\PDO
        $script_absdir = ROOTDIR.DS.'inc'.DS.'db'.DS;
        $incfile = $script_absdir.$script_relname;
        if (file_exists($incfile)) require_once $incfile;

        else
      */