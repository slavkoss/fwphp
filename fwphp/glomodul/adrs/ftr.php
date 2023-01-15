<!-- J:\awww\www\fwphp\glomodul\adrs\ftr.php -->
    <div class="footer">
        This is MINI3 PHP fw on code skeleton B12phpfw. Based on <a href="https://github.com/panique/mini3">MINI3 on GitHub. &copy; Slavko Srakočić, Zagreb, see on GitHub "B12phpfw"</a>.
            <?php
                if ($pp1->dbg == '1') {echo '<pre>'.__FILE__.' ln='.__LINE__.' said:</pre>';
                echo '<pre>';
                echo '<br />$pp1='; print_r($pp1) ; 
                echo '</pre>';
                }
           ?>
 </div>

             <!-- j Q u e r y, loaded in the recommended protocol-less way 
                   //code.j q uery.com/j query-1.11.1.min.js
           Used only as demo for rowcount. 
            -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <!--script src="/vendor/b12phpfw/themes/bootstrap/js/jquery.min.js"></script-->

    <!-- 
      define project's U R L 
      (to make AJAX calls possible, even when using this in sub-folders etc) 
      src="http://dev1:8083/fwphp/glomodul/adrs/module.js"
    -->
    <script>
        var MODULE_URL = "<?=$pp1->module_url?>";
    </script>

    <script src="<?=$pp1->shares_url?>util.js" type="text/javascript"></script>

    <!-- our JavaScript -->
    <script src="<?=$pp1->module_url?>module.js"></script>



    <script src="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl.js"></script>
    <script src="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl_new.js"></script>
    <!-- 




    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable("#table", {
            searchable: true,
            fixedHeight: true,
        });
    </script>
    -->


                     <!--script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script-->
        <!--script src="/vendor/b12phpfw/themes/datatables_s/simple_data_tbl_new.js"></script-->
                     <!--script src="js/datatables-simple-demo.js"></script-->

</body>
</html>
