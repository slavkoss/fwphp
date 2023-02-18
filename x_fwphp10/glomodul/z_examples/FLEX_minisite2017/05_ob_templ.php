<?php
// formatting (skin, template) is separated from content (here)
//      CODE HERE IS SAME FOR ALL SKINS (only some global formatting)
// WE SUBSTITUTE SAME CODE FOR ALL SKINS INTO SPECIFIC SKIN (TEMPLATE)

// http://dev1:8083/fwphp/index.php
// https://dev1:8083/fwphp/index.php

$sitedirname          = basename(dirname(dirname(__DIR__))) ; //fwphp
$module_group_dirname = basename(dirname(__DIR__)) ;          //glomodul
$module_dirname       = basename(__DIR__) ;                   //z_examples
// site  U R L :   $_SERVER['REQUEST_SCHEME']
$url = '//'.$_SERVER['SERVER_NAME']
       . ':'.$_SERVER['SERVER_PORT']
       // dir below web server doc root (all apps relative dir):
       . '/'.$sitedirname           //fwphp
       . '/'.$module_group_dirname  //glomodul
       . '/'
;

$urlcall = [
  // (S I D E)  L I N K S :  eg http://dev1:8083/<MarkdownCheatsheet>
    'home' => $url . $module_dirname
  , 'MarkdownCheatsheet' => $url.'/aplw/glomodul/help/mkd/01_pomoc_MarkdownCheatsheet.php'
  , 'blog'         => $url.'/blog/'
  , 'kalendar'     => $url.'/blog/'
  , 'bookmark'     => $url.'/blog/'
  , 'bookm_song'   => $url.'/bookm_song/'
  , 'tipdok'       => $url.'/fwphp/possys/tipdok/'
  , 'artikl'       => $url.'/fwphp/possys/artikl/'
  , 'helpappgroup' => $url.'/fwphp/help/'
  // http://sspc1:8083/utl/ddns.php
  , 'ddns'         => $url.'/utl/ddns.php'
  , 'ddnsdev'      => $url.'/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php'
  , 'myddns'       => 'http://phporacle.mooo.com'.':'.$_SERVER['SERVER_PORT'].'/'
  , 'myddnslocal'  => 'http://phporacle.mooo.com.localtest.me'
                      .':'.$_SERVER['SERVER_PORT'].'/'
  //
  // (F O O T E R)  L I N K S :
  , 'lsweb'         => $url.'/utl/lsweb/lsweb.php'
  , 'info_php'      => $url.'/utl/01info/00info_php.php'
  , 'phpmyadmin'    => $url.'/phpmyadmin/index.php'
  , 'zwampmenu'     => $url.'/help/test/zwampmenu/index_zwamp.php'
  , 'phpsysinfo'    => $url.'/utlbig/phpsysinfo/'
  , 'webgrind'      => $url.'/utlbig/webgrind/'
  , 'phporablog'    => 'http://phporacle.altervista.org'
  , 'github'        => 'https://github.com/slavkoss/fwphp'
];


ob_start(); require_once('05_ob_templ.html') ;
$html = ob_get_contents(); ob_end_clean();
//$html = file_get_contents('index_templ.html');

// SUBSTITUTE SAME CODE FOR ALL SKINS INTO SPECIFIC SKIN (TEMPLATE) $html
ob_start(); ?>
      <a class="button button-primary" href="#">Home</a>
      <a class="button" href="#">Our Clients</a>
      <a class="button" href="#">About Us</a>
      <a class="button" href="#">Careers</a>
      <?php
//STICKY top section
$hdr1 = ob_get_contents(); ob_end_clean();

ob_start(); ?>
    <h2>HTML5, CSS3, PHP7, JS</h2>
    <h5>  &nbsp;&nbsp;Composer PSR-4, Git and Github  &nbsp;&nbsp;</h5>
    <a href="#" class="button button-primary">Learn More</a>
<?php
//black top section
$hdr2 = ob_get_contents(); ob_end_clean();
//echo $hdr2;


ob_start(); ?>
    <h5>PHP PDO CRUD Home - Glavni izbornik (Main menu)</h5>
<?php
$info_titles = ob_get_contents(); ob_end_clean();


ob_start(); ?>
          <b>Git and Github</b>
          <p>
          To copy this script (and -a = all changed files since last copy) to your local (git commit) and remote (git push) Github repository (see details in git_help.ini):
          <br />in Windows CLI (C:\Windows\SysWOW64\cmd.exe), in J:\awww\apl\dev1\fwphp
          <br />&nbsp; &nbsp; &nbsp; or in Git Bash CLI slavk@sspc1 MINGW64 /j/awww/apl/dev1/fwphp (master)
          <br />git status
          <br />git add SOME_DIR SOMEPATH_TO_SCRIPT...
          <br />git commit -am "Improved"  (git commit -am "Initial commit")
          <br />git pull
          <br />git push -u origin master
          </p>


        <p><a href="#" class="button">More Git</a></p>

      <ol>
      <li><a href="<?=$urlcall['lsweb']?>">lsweb</a>
      &nbsp; &nbsp;<a href="<?=$urlcall['info_php']?>" target="_blank">info_php</a>
      &nbsp; &nbsp;<a href="<?=$urlcall['phpmyadmin']?>" target="_blank">phpMyAdmin</a>
      <li><a href="<?=$urlcall['zwampmenu']?>" target="_blank">Z-WAMP menu</a>
      <li><a href="<?=$urlcall['phpsysinfo']?>" target="_blank">phpsysinfo</a>
      <!-- (alias) for J:\zwamp64\vdrive\.sys\webgrind : -->
      &nbsp;<a href="<?=$urlcall['webgrind']?>" target="_blank">Webgrind</a>
      </ol>
          <!--a href="http://localhost:8083/index.php?XDEBUG_PROFILE=true" target="_blank">xdebug & webgrind</a><br-->

          <!--a href="http://localhost:8083/webgrind/" target="_blank">Webgrind</a><br-->
        <?php
$info1 = ob_get_contents(); ob_end_clean();




ob_start(); ?>
          <!-- ftr section SAME CODE IN ALL SKINS - ftr 1 -->
          <?php //include_once('index8ftr.php'); ?>
          <ol>
          <li><a href="./fwphp/glomodul/help/">Help</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['helpappgroup']?>">Help predložak (template) no DB</a>
          <li><a href="./utl/down_upload/">down-up load</a>

          <li><a href="<?=$url?>">Home http</a>
          &nbsp; &nbsp;<a href="<?='https://'.$url?>">Home https</a>

          <hr />
          <!-- U R L  calling SPA-s
               WORKS  http://dev1:8083/fwphp/possys/bookm_song/h
               NOT NOW   http://sspc1:8083/bookm_song/h (complicated routing)
          -->
          <li><a href="<?=$urlcall['blog']?>">Blog</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['kalendar']?>">Kalendar (msgs, todos) MySql</a>
          <li><a href="<?=$urlcall['bookm_song']?>">Adrese (links): Songs MySql</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['bookmark']?>">Adrese: Bookmarks MySql</a>
          <hr />
          <li><a href="<?=$urlcall['artikl']?>">Artikl Oracle 11G</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['tipdok']?>">Tip dokumenta Oracle 11G</a>
          <hr />
          <li><a href="<?=$urlcall['MarkdownCheatsheet']?>">Markdown Cheat Sheet</a>


          <hr />
          <li><a href="<?=$urlcall['ddns']?>">My DDNS</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['ddnsdev']?>">My DDNS development</a>
          <br /><a href="<?=$urlcall['myddnslocal']?>">My DDNS from local netw.</a>
          &nbsp; &nbsp;<a href="<?=$urlcall['myddns']?>">My DDNS from internet</a>
          </ol>
<?php
$info2 = ob_get_contents(); ob_end_clean();





ob_start(); ?>
      <br><b>DDNS (Dynamic DNS)</b>
        <br>
          After completing 3 steps below (see details link "My DDNS"):
        <ol>
        <li>
          On intranet click link "My DDNS from local netw." eg
          <a href="http://phporacle.mooo.com.localtest.me:8083/">http://phporacle.mooo.com.localtest.me:8083/</a>
          or <a href="http://localtest.me:8083/">http://localtest.me:8083/</a> is free (non commercial) wildcarded DNS Domain which always resolve back to 127.0.0.1 (your local machine)
        <li>
          On internet click link "My DDNS from internet" eg
          <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a>
        </ol>


          <ol>
          <li>Find your inet provider's nonstatic public IP adress eg 213.191.136.167 eg here: <a href="https://www.yougetsignal.com/">https://www.yougetsignal.com/</a>

          <li>Register (sign up) eg here: <a href="https://freedns.afraid.org/">https://freedns.afraid.org/</a> for free or payed DDNS account
          <li>Send your public IP adress eg 213.191.136.167 to DDNS provider so :
              <br />https://freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&amp;myip=213.191.136.167 <br />(asks user name and password aquired in register step)
          </ol>


        <p><a href="#" class="button">More DDNS</a></p>




        <!-- info section SAME CODE IN ALL SKINS - content 2 -->
        <?php //include_once('index06info.php'); ?>
          <b>CSS designs</b>
          <ol>
          <li>LayoutGala site <a href="http://blog.html.it/layoutgala/" target="_blank">http://blog.html.it/layoutgala/</a> offers 40 different CSS designs.

          <li>Gridinator <a href="http://gridinator.com" target="_blank">http://gridinator.com</a> provides a simple tool for creating a complex multicolumn grid.<br>
          </ol>
        <p><a href="#" class="button">More CSS</a></p>
    <?php
$info3 = ob_get_contents(); ob_end_clean();




ob_start(); ?>

        &copy; My Company, 2018. 


        <!--ul class="social-media-list">
          <li-->
            <a href="https://github.com/slavkoss/fwphp">
              <span class="icon">
                <svg viewBox="0 0 1024 16">
                  <path fill="#828282" d="M7.999,0.431c-4.285,0-7.76,3.474-7.76,7.761 c0,3.428,2.223,6.337,5.307,7.363c0.388,0.071,0.53-0.168,0.53-0.374c0-0.184-0.007-0.672-0.01-1.32 c-2.159,0.469-2.614-1.04-2.614-1.04c-0.353-0.896-0.862-1.135-0.862-1.135c-0.705-0.481,0.053-0.472,0.053-0.472 c0.779,0.055,1.189,0.8,1.189,0.8c0.692,1.186,1.816,0.843,2.258,0.645c0.071-0.502,0.271-0.843,0.493-1.037 C4.86,11.425,3.049,10.76,3.049,7.786c0-0.847,0.302-1.54,0.799-2.082C3.768,5.507,3.501,4.718,3.924,3.65 c0,0,0.652-0.209,2.134,0.796C6.677,4.273,7.34,4.187,8,4.184c0.659,0.003,1.323,0.089,1.943,0.261 c1.482-1.004,2.132-0.796,2.132-0.796c0.423,1.068,0.157,1.857,0.077,2.054c0.497,0.542,0.798,1.235,0.798,2.082 c0,2.981-1.814,3.637-3.543,3.829c0.279,0.24,0.527,0.713,0.527,1.437c0,1.037-0.01,1.874-0.01,2.129 c0,0.208,0.14,0.449,0.534,0.373c3.081-1.028,5.302-3.935,5.302-7.362C15.76,3.906,12.285,0.431,7.999,0.431z"></path>
                </svg>
              </span>
              <span class="username">Github</span>
            </a>

            &nbsp; &nbsp; &nbsp;
            <a href="https://twitter.com/slavkoss22">
              <span class="icon">
                <svg viewBox="0 0 1024 16">
                  <path fill="#828282" d="M15.969,3.058c-0.586,0.26-1.217,0.436-1.878,0.515c0.675-0.405,1.194-1.045,1.438-1.809
                  c-0.632,0.375-1.332,0.647-2.076,0.793c-0.596-0.636-1.446-1.033-2.387-1.033c-1.806,0-3.27,1.464-3.27,3.27 c0,0.256,0.029,0.506,0.085,0.745C5.163,5.404,2.753,4.102,1.14,2.124C0.859,2.607,0.698,3.168,0.698,3.767 c0,1.134,0.577,2.135,1.455,2.722C1.616,6.472,1.112,6.325,0.671,6.08c0,0.014,0,0.027,0,0.041c0,1.584,1.127,2.906,2.623,3.206 C3.02,9.402,2.731,9.442,2.433,9.442c-0.211,0-0.416-0.021-0.615-0.059c0.416,1.299,1.624,2.245,3.055,2.271 c-1.119,0.877-2.529,1.4-4.061,1.4c-0.264,0-0.524-0.015-0.78-0.046c1.447,0.928,3.166,1.469,5.013,1.469 c6.015,0,9.304-4.983,9.304-9.304c0-0.142-0.003-0.283-0.009-0.423C14.976,4.29,15.531,3.714,15.969,3.058z"></path>
                </svg>
              </span>
              <span class="username">Twitter</span>
            </a>
            &nbsp; &nbsp; &nbsp;
              <a href="<?=$urlcall['phporablog']?>" target="_blank">phporacle blog</a>
            <!--/li>
        </ul-->


        <br>My Company is a registered trademark of His Company, 
        which is a wholly owned subsidiary of Her Company. 
        Any similarity to existing web sites is purely coincidence.
        
        
        
        
<?php
$ftr1 = ob_get_contents(); ob_end_clean();



ob_start(); ?>
        <!-- ftr section SAME CODE IN ALL SKINS - ftr 3 -->
        <?php //include_once('index11ftr.php'); ?>
        <form class="container">
          <label for="exampleEmailInput">Sign up for our newsletter </label>
          <input type="email" placeholder="test@mailbox.com" id="exampleEmailInput">
          <input class="button-primary" type="submit" value="Submit">
        </form>



  </div>



                  <!-- F O O T E R -->
  <div id="msgftr">
  </div> <!--end div id="msgftr"-->

  <?php
    $phptxt = '<br />';
    if (isset($_SERVER['HTTPS']) ) {
      $phptxt .= 'SECURE connection: $_SERVER[HTTPS] is set';
    } else {
      $phptxt .=  'UNSECURE connection: $_SERVER[HTTPS] is NOT set';
    }
  ?>
  <script>
     var vmsgftr =  document.getElementById('msgftr');
     if (location.protocol == 'https:')
        //alert('<h1>Page is using HTTPS
        vmsgftr.innerHTML = ' <?=str_replace('\\','\\\\',__FILE__)?>
        says: ' + ' <?=$phptxt?>'
        +'JS in same PHP script says: ' + ' location.protocol=<b>' + location.protocol
        +'</b>';
     else
        vmsgftr.innerHTML = ' <?=str_replace('\\','\\\\',__FILE__)?>
        says: ' + ' <?=$phptxt?>'
        +', JS in same PHP script says: ' + ' location.protocol=' + location.protocol
        ;
  </script>
    <?php
    echo "<p>\$url=$url</p>" ;
$ftr2 = ob_get_contents(); ob_end_clean();




// substitute page parts into specific skin (hdr, content, ftr) :

$html = str_replace('{{ hdr1 }}', $hdr1, $html) ;
$html = str_replace('{{ hdr2 }}', $hdr2, $html) ;

$html = str_replace('{{ info_titles }}', $info_titles, $html) ;
$html = str_replace('{{ info2col.1 }}', $info1, $html) ;
$html = str_replace('{{ info2col.2 }}', $info2, $html) ;
$html = str_replace('{{ info3 }}', $info3, $html) ;

$html = str_replace('{{ ftr1 }}', $ftr1, $html) ;
$html = str_replace('{{ ftr2 }}', $ftr2, $html) ;

echo $html ;
//echo $hdr2 ;

