  <div id="footer">
    <div>
  
      &copy;  &nbsp; ja pa ja šđčćž
      <?php
      $startYear = 2001;
      $thisYear = date('Y');
      if ($startYear == $thisYear) { echo $startYear;
      } else { echo "{$startYear} - {$thisYear}"; }
      
      # show/notshow test output = tekst na dnu stranice itd:
      echo '&nbsp; &nbsp; '
         .'<a href="'
            // 1. c a l l  script:
            //. $SITEURL .'/'.$APLDIR .'/glovars_get.php'
            .''
            // 2. there toggle test output:
            .'?test=1'
            // 3. from there c a l l  h o m e  p a g e :
            //.'&call='. $SITEURL . '/' . $APLDIR . '/'
         .'">'
         // link prompt:
         //.'<span Color="gray">Ses.test=' . $_SESSION['test'] . '</span>'
         .'</a>'; 
      //echo ' *********', $SITEURL . '/' . $APLDIR . '/' ;  
      ?>
   
     </div>

   
  </div>


</div><!-- e n d  div id="w rapper" -->
</body>
</html>