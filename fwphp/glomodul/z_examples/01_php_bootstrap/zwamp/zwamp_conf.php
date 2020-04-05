<?php
// J:\dev_web\htdocs\zwamp_conf.php
// J:\zwamp\vdrive\web\index_lang_ikone.inc.php
// textes J:\dev_web\htdocs\index_lang_ikone.inc.php
//
$test = '1';
$jezik = 'hr';
// mape koje se ne prikazuju u bloku "Programi" :
if ($test) $projectsListIgnore = array ('.','..');
else  $projectsListIgnore = array (
       '.','..','inc','z_bckup'
       ,'.idea'
      );
/* *************************************************
1. GLOB. VARIABLE :
      ADRESE (APSOLUTNE & REL): 
         PATH - kod se inkludira (bolje nego URL !!)
         URL
      PRIJEVODI
// ************************************************ */
//
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// ZA INKLUDIRANJE / OTVARANJE ; adrese: url, paths: apsolutni & rel
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//$phpinfo_url   = $murl.'/../inc/phpinfo2.php';
//$yiiinfo_url   = $murl.'/../inc/yiiinfo.php';
//$XEinfo_url    = $murl.'/../inc/utl/oci8testOOP_HR.php';
$angularjsinfo_url = $murl.'/test/books/angularjs/index.html';
   // http://dev/test/books/angularjs/index.html 
   // file:///J:/dev_web/htdocs/test/books/angularjs/index.html 
   // J:\dev_web\htdocs\test\books\angularjs\index.html
$f3fwinfo_url      = $murl.'/apl/instalac/F3_php_fw_bcosca.php';
// ********************** putanje:
$phpinfo_apsp  = $mdpath.'/../inc/phpinfo2.php';
$XEinfo_apsp   = $mdpath.'/../inc/utl/oci8testOOP_HR.php';
//$a ngularjsinfo_apsp = //$mdpath.'/test/books/angularjs/index.html';
//   'J:\dev_web\htdocs\test\books\angularjs\index.html';
$yiiinfo_apsp  = $mdpath.'/../inc/yiiinfo.php ';  //   'J:\dev_web\htdocs\..\inc\yiiinfo.php';
$composerphpinfo_apsp  = $mdpath.'/../yii/z_doc_composer/Composer_instalac.html';     //'file:///J:/dev_web/yii/z_doc_composer/Composer_instalac.html'; 
// J:\dev_web\yii\z_doc_composer\Composer_instalac.html
//ne skace na anchore: $f3fwinfo_apsp = $mdpath.'/z_doc/F3_php_fw_bcosca.php';
//
$aliasDir      = $mdpath.'/../alias/';
//
/*
// 2. ne koristiti: REL VRIJEDE I ZA PATH-OVE I ZA URL-OVE 
// ali nisu prakticni u pozvanim (inkludiranim) skriptama
// gdje je preglednije-tocnije koristiti apsolutne path i url.
//   ( to ide - vidi composer logo :
//     J:\dev_web\inc\yiiinfo\views\web\index.php, ali bolje ne tako)
$nrup_server_dir = "..";  // = J:\dev_web ili Z: = "J:\zwamp\vdrive"
$phpinfo_rel  = $nrup_server_dir.'/inc/phpinfo2.php';
$yiiinfo_rel  = $nrup_server_dir.'/inc/yiiinfo.php';
$f3fwinfo_rel = 'f3fw/z_doc/F3_php_fw_bcosca.php';
$XEinfo_rel   = $nrup_server_dir.'/inc/utl/oci8testOOP_HR.php';
*/
// ~~~~~~~~~~~~~~~~~ kraj ADRESE: URL, PATHS: APSOLUTNI & REL
//
//[main]
$zwamp_conffile                       = __FILE__    ;
            //'J:\dev_web\conf\zwamp_conf.php' -above main doc root
$language                       = 'english'   ;
$defaultLanguage                = 'english'   ;
$status                         = "online"    ;
$wampserverVersion              = '2.2.1'     ; 
$wampserverLastKnown            = '2.2.1'     ;
$installDir                     = "j:/zwamp"  ;
$navigator = "C:\Program Files (x86)\Google\Chrome\Application\chrome.exe";
$editor = "notepad.exe";

//[php]
$phpVersion                    = "5.5.17 (Win 64) built: May 28 2014" ;
$phpLastKnown                  = '5.4.12'                           ;
$phpIniDir                     = '.'                                ;
$phpConfFile                   = 'php.ini'                          ;
$phpExeDir                     = '.'                                ;

//[phpCli]
$phpCliVersion                 = '5.5.17'            ;
$phpExeFile                    = 'php.exe'              ;
$phpCliFile                    = 'php-win.exe'          ;
                                   

//[apache]
$doca_version                     = 'doca'.'2.4';
$apacheVersion                    = "2.4.9"                    ;
$apacheLastKnown                  = '2.4.3'                      ;
$apacheExeDir                     = 'bin'                        ;
$apacheConfDir                    = 'conf'                       ;
$apacheExeFile                    = 'httpd.exe'                  ;
$apacheConfFile                   = 'httpd.conf'                 ;
$apacheServiceInstallParams   = '-n wampapache64 -k install'     ;
$apacheServiceRemoveParams    = '-n wampapache64 -k uninstall'   ;

//[oraclexe]
$oracleVersion     = "XE11.2.0.2.0 (Win64)  Production"  ;
$oraclexeAPEXVersion = "4.2.5.00.08"                   ;
$oraclexeDir         = "win+x cd C:\oraclexe\app\oracle\product\11.2.0\server\bin sqlplus / as sysdba <br />&nbsp;&nbsp;&nbsp;ili sqlplus /nolog conn SYS/ss141@XE as SYSDBA";

//[mysql]
$mysqlVersion                  = "5.0.10"                        ;
$mysqlLastKnown                = '5.0.10'                        ;
$mysqlConfDir                  = '.'                             ;
$mysqlConfFile                 = 'my.ini'                        ;
$mysqlExeDir                   = 'bin'                           ;
$mysqlExeFile                  = 'mysqld.exe'                    ;
$mysqlServiceInstallParams     = '--install-manual wampmysqld64'   ;
$mysqlServiceRemoveParams      = '--remove wampmysqld64'           ;

//[apps]
$phpmyadminVersion            = '4.1.14' ;
$sqlbuddyVersion              = '1.3.3'  ;
$webgrindVersion              = '1.0'    ;
                                       
//[service]
$ServiceApache                = "wampapache64" ;
$ServiceMysql                 = "wampmysqld64" ;

//
//
$txtlang = array(
   'hr' => array(
      'faq' => 'http://sourceforge.net/projects/zwamp',
      'langue' => 'Hrvatski',
      'locale' => 'croatian',
      'autreLangue' => 'Engleski',
      'autreLangueLien' => 'en',
'titreHtml' => 'Z-WAMPSERVER prva stranica',
      //
      // ************ TRI IZBORNIKA I LISTA :
'1mainleft' => '1.Alati',
      
      
      '2maincenter' => 
      '<span>
         <abbr title="Mape čitljive web serveru (i korisnicima) koje su ispod glavne mape dokumenata">
2.Programi (projekti)</abbr>
      </span>',
      'txtNoProjet' => 'Nemate projekata (podmapa glavne mape dokumenata<br /> in \'www\', ili u \'dev_web/htdocs\').',
      
      
      '3mainright' => '<span>
         <abbr title="Mape programa čitljive web serveru koje RADI SIGURNOSTI I REINSTALACIJA nisu ispod glavne mape dokumenata">
3.Aliasi i virt.hostovi</abbr>
         </span>',
         // ****************
      'txtNoAlias' => 'Nemate mapa programa čitljivih web serveru koje RADI SIGURNOSTI I REINSTALACIJA nisu ispod glavne mape dokumenata.',
      
      
      '4maindown' => 
'4.Serverska kofiguracija',
      'server' => 'Serverski Software:',
      
      'versa' => 'Apache Verzija :',
      'doca2.2' => 'httpd.apache.org/docs/2.2/en/',
      'doca2.4' => 'httpd.apache.org/docs/2.4/en/',
      
      'versp' => 'PHP Verzija :',
      'phpExt' => 'Aktivne PHP extenzije (plug-in-ovi) :',
      'docp' => 'www.php.net/manual/en/',
      // kraj TRI IZBORNIKA I LISTA
      'versm' => 'MySQL Verzija :',
      'docm' => 'dev.mysql.com/doc/index.html',
      'versora' => 'Oracle DB Verzija :',
      'docoraxe' => 'www.oracle.com/technetwork/database/database-technologies/express-edition/downloads/index-083047.html'
   ),
   
   
   'en' => array(
      'langue' => 'English',
      'locale' => 'english',
      'autreLangue' => 'Francuski',
      'autreLangueLien' => 'fr',
      'titreHtml' => 'Z-WAMPSERVER home page',
      '4maindown' => 'Server cofiguration',
      'versa' => 'Apache Version :',
      'doca2.2' => 'httpd.apache.org/docs/2.2/en/',
      'doca2.4' => 'httpd.apache.org/docs/2.4/en/',
      'versp' => 'PHP Version :',
      'server' => 'Server Software:',
      'docp' => 'www.php.net/manual/en/',
      'versm' => 'MySQL Version :',
      'docm' => 'dev.mysql.com/doc/index.html',
      'phpExt' => 'Loaded PHP Extensions :',
      '1mainleft' => 'Help & tools',
      '2maincenter' => 'Programs (projects)',
      'txtNoProjet' => 'No projects yet.<br />To create new one - create directory in \'www\', tj u \'dev_web/htdocs\'.',
      '3mainright' => 'Aliases & virt.hosts',
      'txtNoAlias' => 'No Alias yet.<br />To create a new one, use ...',
      'faq' => 'http://sourceforge.net/projects/zwamp'
   ),   
   
   
   
   'fr' => array(
      'langue' => 'Français',
      'locale' => 'french',
      'autreLangue' => 'Hrvatski',
      'autreLangueLien' => 'hr',
      'titreHtml' => 'Accueil WAMPSERVER',
      '4maindown' => 'Configuration Serveur',
      'versa' => 'Version Apache:',
      'doca2.2' => 'httpd.apache.org/docs/2.2/fr/',
      'doca2.4' => 'httpd.apache.org/docs/2.4/fr/',
      'versp' => 'Version de PHP:',
      'server' => 'Server Software:',
      'docp' => 'www.php.net/manual/fr/',
      'versm' => 'Version de MySQL:',
      'docm' => 'dev.mysql.com/doc/index.html',
      'phpExt' => 'Extensions Chargées: ',
      '1mainleft' => 'Outils',
      '2maincenter' => 'Vos Projets',
      'txtNoProjet' => 'Aucun projet.<br /> Pour en ajouter un nouveau, créez simplement un répertoire dans \'www\'.',
      '3mainright' => 'Vos Alias',
      'txtNoAlias' => 'Aucun alias.<br /> Pour en ajouter un nouveau, utilisez le menu de WAMPSERVER.',
      'faq' => 'http://www.wampserver.com/faq.php'
   )
);



// -----------------~~~~~~~~~~~~~~~~~~~~~-----------------------
// 2. FORMIRANJE SADRZAJA STRANICE
// --------------------------------------~~~~~~~~~~~~~~~~~~~~~--
// -----------------~~~~~~~~~~~~~~~~~~~~~-----------------------
// 2.1 LIJEVI LINKOVI  vidi gore:
//   ZA INKLUDIRANJE / OTVARANJE ; adrese: url, paths: apsolutni & rel
// --------------------------------------~~~~~~~~~~~~~~~~~~~~~--
//
// -----------------~~~~~~~~~~~~~~~~~~~~~-----------------------
// 2.2 LIJEVI LINKOVI  Programi-Projekti (apl. mape) - FORMIRANJE LINKOVA 
// --------------------------------------~~~~~~~~~~~~~~~~~~~~~--
// ucitavanje liste des projets
$idmape=opendir(".");
$projectContents = '';
while (($mapa = readdir($idmape))!==false) 
{
   if (is_dir($mapa) && !in_array($mapa,$projectsListIgnore)) 
   {      
      //
      $projectContents .= 
      '<li>'
      .'<a target="_blank" href="'
      .( $suppress_localhost ? 'http://dev:8083/inc/fw/' : '' )
      .$mapa.'">'.$mapa
      .'</a>'
      .'</li>';
   }
}
closedir($idmape);
if (empty($projectContents))
   $projectContents = "<li>".$txtlang[$jezik]['txtNoProjet']."</li>\n";;

// ----------------------------------------
// 2.3 LIJEVI LINKOVI -  alias-i 
// ----------------------------------------
$aliasContents = '';
// ucitavanje liste (récupération) alias-a
if (is_dir($aliasDir)) // =../alias/
{
    $idalias_mape=opendir($aliasDir);
    while (($konfig_datot = readdir($idalias_mape))!==false) 
    { // npr $konfig_datot = dev.conf -> alias je "dev"

    if (!is_dir($aliasDir.$konfig_datot) && strstr($konfig_datot, '.conf'))
       {      
          //$msg = '';
          // naziv .conf datoteke je apache alias koji je
          // u url-u kao alias_ime docroota
          $alias_ime = str_replace('.conf','',$konfig_datot);
          $urlbit = $alias_ime;
          //
          
          // npr dev.conf -> dev a apache napravi localhost/dev
          // Ako je dev i alias i  v h o s t,  
          // trebamo http://dev a ne localhost/dev :
          if ($alias_ime == 'dev') { // http://dev/
              // apache sada nece dodati localhost/ ispred dev :
              $urlbit = 'http://'.$alias_ime ;
              $alias_ime = $alias_ime . ' (vhost)';
          }
          else // svi ostali aliasi su kao adminer ispod .sys :
          
          {
               // /.sys/adminer  tj  http://localhost/adminer/
               $urlbit = 'http://localhost/'.$alias_ime ;
          }
          ;

          $aliasContents .= 
          '<li>'.'<a href="'.$urlbit.'">'.$alias_ime.'</a>'.'</li>';
       }
    }
    closedir($idalias_mape);
}
if (empty($aliasContents))
   $aliasContents = "<li>" . $txtlang[$jezik]['txtNoAlias']."</li>\n";
else $aliasContents = 'Aliasi su .conf u mapi "alias" ispod Z:.'
    .'<br />'.'Služe za aplik. u mapi "apps" ispod Z:.'
    .$aliasContents;

// ----------------------------------------~~~~~~~~~~~
// 2.4 POPIS php extenzija - ISPOD 3 STUPCA LINKOVA
// ----------------------------------------~~~~~~~~~~~
$phpExtContents = '';
// ucitavanje liste des extensions PHP
$loaded_extensions = get_loaded_extensions();
// [modif oto] classement alphabétique des extensions
setlocale(LC_ALL,"{$txtlang[$jezik]['locale']}");
sort($loaded_extensions,SORT_LOCALE_STRING);
foreach ($loaded_extensions as $extension)
   $phpExtContents .= "<li>${extension}</li>";



//----------------------------------------------
// NE TO 2.5 konfig. datoteka 2 - podaci o instaliranom itd
//----------------------------------------------
$fp = fopen($zwamp_conffile,'r');
$zwamp_conffileContents = fread ($fp, filesize ($zwamp_conffile));
fclose ($fp);
$zwamp_conffileContents = str_replace('<','&lt;', $zwamp_conffileContents);
$zwamp_conffileContents = '<pre>'.$zwamp_conffileContents.'</pre>';
/*
//----------------------------
preg_match('|phpVersion = (.*)\n|',$zwamp_conffileContents,$result);
$phpVersion = str_replace('"','',$result[1]);
preg_match('|apacheVersion = (.*)\n|',$zwamp_conffileContents,$result);
$apacheVersion = str_replace('"','',$result[1]);
$doca_version = 'doca'.'2.4'; //'doca'.substr($apacheVersion,0,3);
//
preg_match('|mysqlVersion = (.*)\n|',$zwamp_conffileContents,$result);
$mysqlVersion = str_replace('"','',$result[1]);
preg_match('|oracleVersion = (.*)\n|',$zwamp_conffileContents,$result);
$oracleVersion = str_replace('"','',$result[1]);
//
preg_match('|wampserverVersion = (.*)\n|',$zwamp_conffileContents,$result);
$wampserverVersion = str_replace('"','',$result[1]);
*/    


// ----------------------------------------
// ikonice
// ----------------------------------------
// images $pngFolder, $pngFolderGo, $gifLogo
//        $pngPlugin, $pngWrench,   $favicon
$pngFolder = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAABhlBMVEX//v7//v3///7//fr//fj+/v3//fb+/fT+/Pf//PX+/Pb+/PP+/PL+/PH+/PD+++/+++7++u/9+vL9+vH79+r79+n79uj89tj89Nf889D88sj78sz78sr58N3u7u7u7ev777j67bL67Kv46sHt6uP26cns6d356aP56aD56Jv45pT45pP45ZD45I324av344r344T14J734oT34YD13pD24Hv03af13pP233X025303JL23nX23nHz2pX23Gvn2a7122fz2I3122T12mLz14Xv1JPy1YD12Vz02Fvy1H7v04T011Py03j011b01k7v0n/x0nHz1Ejv0Hnuz3Xx0Gvz00buzofz00Pxz2juz3Hy0TrmznzmzoHy0Djqy2vtymnxzS3xzi/kyG3jyG7wyyXkwJjpwHLiw2Liw2HhwmDdvlXevVPduVThsX7btDrbsj/gq3DbsDzbrT7brDvaqzjapjrbpTraojnboTrbmzrbmjrbl0Tbljrakz3ajzzZjTfZijLZiTJdVmhqAAAAgnRSTlP///////////////////////////////////////8A////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////9XzUpQAAAAlwSFlzAAALEgAACxIB0t1+/AAAAB90RVh0U29mdHdhcmUATWFjcm9tZWRpYSBGaXJld29ya3MgOLVo0ngAAACqSURBVBiVY5BDAwxECGRlpgNBtpoKCMjLM8jnsYKASFJycnJ0tD1QRT6HromhHj8YMOcABYqEzc3d4uO9vIKCIkULgQIlYq5haao8YMBUDBQoZWIBAnFtAwsHD4kyoEA5l5SCkqa+qZ27X7hkBVCgUkhRXcvI2sk3MCpRugooUCOooWNs4+wdGpuQIlMDFKiWNbO0dXTx9AwICVGuBQqkFtQ1wEB9LhGeAwDSdzMEmZfC0wAAAABJRU5ErkJggg==
EOFILE;
$pngFolderGo = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAJISURBVDjLpZPLS5RhFIef93NmnMIRSynvgRF5KWhRlmWbbotwU9sWLupfCBeBEYhQm2iVq1oF0TKIILIkMgosxBaBkpFDmpo549y+772dFl5bBIG/5eGch9+5KRFhOwrYpmIAk8+OjScr29uV2soTotzXtLOZLiD6q0oBUDjY89nGAJQErU3dD+NKKZDVYpTChr9a5sdvpWUtClCWqBRxZiE/9+o68CQGgJUQr8ujn/dxugyCSpRKkaw/S33n7QQigAfxgKCCitqpp939mwCjAvEapxOIF3xpBlOYJ78wQjxZB2LAa0QsYEm19iUQv29jBihJeltCF0F0AZNbIdXaS7K6ba3hdQey6iBWBS6IbQJMQGzHHqrarm0kCh6vf2AzLxGX5eboc5ZLBe52dZBsvAGRsAUgIi7EFycQl0VcDrEZvFlGXBZshtCGNNa0cXVkjEdXIjBb1kiEiLd4s4jYLOKy9L1+DGLQ3qKtpW7XAdpqj5MLC/Q8uMi98oYtAC2icIj9jdgMYjNYrznf0YsTj/MOjzCbTXO48RR5XaJ35k2yMBCoGIBov2yLSztNPpHCpwKROKHVOPF8X5rCeIv1BuMMK1GOI02nyZsiH769DVcBYXRneuhSJ8I5FCmAsNomrbPsrWzGeocTz1x2ht0VtXxKj/Jl+v1y0dCg/vVMl4daXKg12mtCq9lf0xGcaLnA2Mw7hidfTGhL5+ygROp/v/HQQLB4tPlMzcjk8EftOTk7KHr1hP4T0NKvFp0vqyl5F18YFLse/wPLHlqRZqo3CAAAAABJRU5ErkJggg==
EOFILE;
$gifLogo = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAAGAAAABTCAYAAABgdgI7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdp
bj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6
eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEz
NDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJo
dHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlw
dGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEu
MC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVz
b3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1N
Ok9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo1ODg0QkM3NUZBMDhFMDExODkyQ0U2NkE5ODVB
M0Q2OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyMEQ2RDU5MDA5M0UxMUUwOUUwRkYwRTg2
NjQyMzQzQyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyMEQ2RDU4RjA5M0UxMUUwOUUwRkYw
RTg2NjQyMzQzQyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3Mi
PiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1ODg0QkM3NUZB
MDhFMDExODkyQ0U2NkE5ODVBM0Q2OSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1ODg0QkM3
NUZBMDhFMDExODkyQ0U2NkE5ODVBM0Q2OSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRG
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
EOFILE;
$pngPlugin = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsSAAALEgHS3X78AAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAABmklEQVR42mL4//8/AyUYIIDAxK5du1BwXEb3/9D4FjBOzZ/wH10ehkF6AQIIw4B1G7b+D09o/h+X3gXG4YmteA0ACCCsLghPbPkfm9b5PzK5439Sdg9eAwACCEyANMBwaFwTGIMMAOEQIBuGA6Mb/qMbABBAEAOQnIyMo1M74Tgiqf2/b3gVhgEAAQQmQuKa/8ekdYMxyLCgmEYMHJXc9t87FNMAgACCGgBxIkgzyDaQU5FxQGQN2AUBUXX/vULKwdgjsOQ/SC9AAKEEYlB03f+oFJABdSjYP6L6P0guIqkVjt0DisEGAAQQigEgG0AhHxBVi4L9wqvBBiEHtqs/xACAAAIbEBBd/x+Eg2ObwH4FORmGfYCaQRikCUS7B5YBNReBMUgvQABBDADaAtIIwsEx9f/Dk9pQsH9kHTh8XANKMAIRIIDAhF9ELTiQQH4FaQAZCAsskPNhyRpkK7oBAAEEMSC8GsVGkEaYIlBghcU3gbGzL6YBAAEEJnzCgP6EYs/gcjCGKQI5G4Z9QiswDAAIIAZKszNAgAEAHgFgGSNMTwgAAAAASUVORK5CYII=
EOFILE;
$pngWrench = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAABO1BMVEXu7u7n5+fk5OTi4uLg4ODd3d3X19fV1dXU1NTS0tLPz8+7z+/MzMy6zu65ze65zu7Kysq3zO62zO3IyMjHx8e1yOiyyO2yyOzFxcXExMSyxue0xuexxefDw8OtxeuwxOXCwsLBwcGuxOWsw+q/v7+qweqqwuqrwuq+vr6nv+qmv+m7u7ukvumkvemivOi5ubm4uLicuOebuOeat+e0tLSYtuabtuaatuaXteaZteaatN6Xs+aVs+WTsuaTsuWRsOSrq6uLreKoqKinp6elpaWLqNijo6OFpt2CpNyAo92BotyAo9+dnZ18oNqbm5t4nt57nth7ntp4nt15ndp3nd6ZmZmYmJhym956mtJzm96WlpaVlZVwmNyTk5Nvl9lultuSkpKNjY2Li4uKioqIiIiHh4eGhoZQgtVKfNFdha6iAAAAaXRSTlMA//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////914ivwAAAACXBIWXMAAAsSAAALEgHS3X78AAAAH3RFWHRTb2Z0d2FyZQBNYWNyb21lZGlhIEZpcmV3b3JrcyA4tWjSeAAAAKFJREFUGJVjYIABASc/PwYkIODDxBCNLODEzGiQgCwQxsTlzJCYmAgXiGKVdHFxYEuB8dkTOIS1tRUVocaIWiWI8IiIKKikaoD50kYWrpwmKSkpsRC+lBk3t2NEMgtMu4wpr5aeuHcAjC9vzadjYyjn7w7lK9kK6tqZK4d4wBQECenZW6pHesEdFC9mbK0W7otwsqenqmpMILIn4tIzgpG4ADUpGMOpkOiuAAAAAElFTkSuQmCC
EOFILE;
$favicon = <<< EOFILE
iVBORw0KGgoAAAANSUhEUgAAAB8AAAAfCAYAAAAfrhY5AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJ
bWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdp
bj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6
eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEz
NDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJo
dHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlw
dGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEu
MC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVz
b3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1N
Ok9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo1ODg0QkM3NUZBMDhFMDExODkyQ0U2NkE5ODVB
M0Q2OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoxRkI1ODNGRTA5MDMxMUUwQjAwNEEwODc0
OTk5N0ZEOCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxRkI1ODNGRDA5MDMxMUUwQjAwNEEw
ODc0OTk5N0ZEOCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3Mi
PiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1ODg0QkM3NUZB
MDhFMDExODkyQ0U2NkE5ODVBM0Q2OSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1ODg0QkM3
NUZBMDhFMDExODkyQ0U2NkE5ODVBM0Q2OSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRG
PiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiUukzAAAAHHSURBVHja5FfRccIwDLVz
/W+7QdggbJBM0HQCwg+/LRNwTJDymx9ggmYDsgEZwRuUDVI5ET1XyE5CuIa76k7ABVtPluQnRVZV
JcYST4woD85/ZRbC5wxUf/sdbZagBehGVAvlNM+GXWYaaIugQ+QDdA1OnLqByyyAzwPo042iqyMx
BwdKN7jMNODREWKFyonv2KdPPqERoDlPGQMKQ7drPWPjfAy6Inb080/QiK/2Js8JMacBpzWwzGIs
QFdxhujkFMNtSkj3m1ftjTnxEg0f0XNXAYb1mmatwFPSFM1s4NTwuUp18QU9CiyonWj2rhkHWXAK
kNeh7gdMQ5wzRdnKcAo9DwZcsRBtqL70qm7Ior3B/5zbI0IKrvv8mxarhXSsXtrY8m5OfjB+F5SN
BkhKrpi8635uaxAvkO9HpgZSB/v57f2cFpEQzz+UeZ28Yvq+bMXpkb5rSgwLc+Z5Fylwb+y68x4p
MlNW2CLnPUmnrE/d7F1dOGXJ+Qb0neQqre9ptZiAscTI38ng7YTQ8g6Budlg75pktkxPV9idctss
1mGYOKciupsxatQB8pJkmkUTpgCvHZ0jDtg+t4/60vAf3tVGBf8WYAC3Rq8Ub3mHyQAAAABJRU5E
rkJggg==
EOFILE;
