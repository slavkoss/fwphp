<br>
    <!-- FOOTER -->
    <footer class="bg-dark text-white">

      <div class="container">
        <div class="row">
          <div class="col">

            <p class="lead text-center"> 
              | <!--span id="year"></span--> <?=$curtime?> &copy; phporacle (Slavko Srakočić, Zagreb) MIT licence All right Reserved.</p>


            <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" 
              href="https://github.com/slavkoss/fwphp" 
              target="_blank">PHP 7 PDO DBI <?=''?> | Bootstrap 4.3.1,
              $wsroot_url=<?=$wsroot_url?> &nbsp;&nbsp;
              __FILE__ =<?=__FILE__?>
              <br>&trade; B12phpfw on <?=PHP_OS.', '.php_uname()?></a></p>


           </div> <!-- e n d  c o l-->
         </div>
      </div>

    </footer>
    <!-- FOOTER END-->


<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/jquery.min.js"></script>
<!--script src="<?=$wsroot_url?>zinc/themes/bootstrap/js/popper.min.js"></script-->
<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>


</body></html>
