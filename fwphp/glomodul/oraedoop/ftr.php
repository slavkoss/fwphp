<?php
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .'Coding step cs03. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'
                    //."\$_SESSION['cncts']->username=".$_SESSION['cncts']->username
                    ;
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '<b>$_POST</b>='; print_r($_POST); 

                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<br /><b>$this->pp1</b>='; print_r($this->pp1);
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 
                  echo '<br /><b>uri_arr is exploded string REQUEST_URI '.$_SERVER['REQUEST_URI'].' (on QS=?)</b>'
                  .'<br />0 is $module_relpath,'
                  .'<br />1 is $uri_qrystring = key-value pairs ee = url parameters after QS.'
                  .'  <br />$this->pp1->uri_arr='; print_r($this->pp1->uri_arr);
                  echo '<br /><b>exploded $uri_qrystring (on /) is'
                  .'<br />$this->pp1->uri_qrystring_arr</b>=';
                      print_r($this->pp1->uri_qrystring_arr);
                  //echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                  echo '<br /><b>$this->uriq</b>='; print_r($this->uriq); 

                  echo '</pre>'; 
                  }
                    //.'<span style="color: red; font-size: large; font-weight: bold;">'
                    //.'B A D &nbsp;R O U T I N G'
                    //.'<br /> See if $uriq is created OK in Config_blog.php.'
                    //.'</span>'
?>

<hr />
Oracle tables oop edit. Oracle DB 11gXE Release 11.2.0.2.0 - 64bit Production through PHP extension PDO_OCI
<p>
Copyright &copy; 2019... ver. <?php echo $this->pp1->module_version; ?> 

</article>


         <!-- *************************************
         FOOTER SVIH (OBJE) STRANICA = 1 redak html-a
         ****************************************** -->
<?php include 'read_tbl_aside_right.php'?>
</main>

<footer>
<p>
           <a href="https://github.com/tistre/oracleeditor/" 
              title="based on Tim Strehle's oraed on Github 2006 year">
           </a> 
           &nbsp;<a href="https://github.com/slavkoss/fwphp" title="Github">Github</a>&nbsp;
           &nbsp;<a href="mailto:slavkoss22@gmail.com" title="Poslati e-mail">Email to Slavko</a>&nbsp;

         <!--  <br /
           &copy; 2006 by
           <a href="http://tim.digicol.de/" title="Tim Strehle's homepage on tim.digicol.de tim@strehle.de">
             Tim Strehle
           </a> 
         -->



</p>

</footer>


</body>
</body>
</html>
